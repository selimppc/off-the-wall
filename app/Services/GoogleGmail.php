<?php
namespace App\Services;
use App\GmailEmail;
use Google_Client;
use Google_Service_Gmail;
use Illuminate\Support\Facades\Config;
use PhpSpec\Exception\Exception;

class GoogleGmail
{
    protected $client;
    protected $service;
    protected $auth_url;
    protected $defaultUserId;
    protected $batch;
    //Get config variables
    function __construct()
    {
        session_start();
        $this->defaultUserId = 'me';
        $this->client = new Google_Client();
        $this->client->setClientId(Config::get('google.client_id'));
        $this->client->setClientSecret(Config::get('google.client_secret'));
        $this->client->setRedirectUri(Config::get('google.redirect_uri'));
        $this->client->addScope([Google_Service_Gmail::MAIL_GOOGLE_COM,
            Google_Service_Gmail::GMAIL_MODIFY, Google_Service_Gmail::GMAIL_READONLY]);
        $this->client->setAccessType("offline");
        $this->auth_url = $this->client->createAuthUrl();
        $this->service = new Google_Service_Gmail($this->client);
        if (isset($_REQUEST['logout']))
        {
            unset($_SESSION['access_token']);
        }
        if(isset($_GET['code']))
        {
            $this->client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $this->client->getAccessToken();
        }
    }
// @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    public function redirectToAuth()
    {
        //redirect to get access code

        return redirect($this->auth_url);
    }
// @param null $optParam
// @return array 
    public function getEmailsList() //get list of gmail email_template id's
    {
        if(isset($_SESSION['access_token']))
        {
            $this->client->setAccessToken($_SESSION['access_token']);
            $messages = $this->listMessages($this->service, $this->defaultUserId);
            return  $messages;
        }
    }


//send get request to google for gmail email contents

// @param null $list
//  @return array 
    public function getMailsContents($list = null)
    {
        $messagesContents = [];
        if($list)
        {
            foreach($list as $k => $v)
            {
                $content = $this->messagesGetRequest($v->id);
                array_push($messagesContents, $content);
            }
        }
        return $messagesContents;
    }


// @param null $id
// @return array|string 
    public function messagesGetRequest($id = null)
    {
        if($id)
        {
            $data  = $this->service->users_messages->get($this->defaultUserId, $id,
                ['format' => 'full', 'fields' => 'historyId, id, internalDate, labelIds, payload, raw,
                  sizeEstimate, threadId'
                ]);
            $payLoad = $data->getPayload();
            $headers = $payLoad->getHeaders();
            $parts = $payLoad->getParts();
            $mimeType = $payLoad->getMimeType();
            $body = $payLoad->getBody()->getSize() ? $payLoad->getBody()->getData(): null;
            $parsedEmail = [
                'mail_id' =>  $data->id, 'history_id' => $data->historyId, 'thread_id' => $data->threadId,
                'internal_date' => $data['modelData']['internalDate']
            ];
            foreach ($headers as $header)
            {
                switch ($header['name'])
                {
                    case 'To':
                        $parsedEmail['received_to'] = $header['value'];
                        break;
                    case 'From':
                        $parsedEmail['received_from'] = $header['value'];
                        break;
                    case 'Subject':
                        $parsedEmail['subject'] = $header['value'];
                        break;
                    case 'Date':
                        $parsedEmail['date'] = $header['value'];
                        break;
                    default:
                        break;
                }
            }
            $parsedEmail['content_body_plain'] = $body && $mimeType === 'text/plain'
                ? $body : $this->getBodyContentByGmail($parts, true);
            $parsedEmail['content_body_html'] = $body && $mimeType === 'text/html'
                ? $body : $this->getBodyContentByGmail($parts, false);
            return $parsedEmail;
        } else {
            return '';
        }
    }


//this method we use to get ids of all messages in our getEmailsList() method /**

// @param $service
// @param $userId
// @return array   */
    public function listMessages($service, $userId)
    {
        $pageToken = NULL;
        $messages = array();
        $opt_param = array();
        do {
            try {
                if ($pageToken)
                {
                    $opt_param['pageToken'] = $pageToken;
                }
                $messagesResponse = $service->users_messages->listUsersMessages($userId,$opt_param);
                if($messagesResponse->getMessages())
                {
                    $messages = array_merge($messages,
                        $messagesResponse->getMessages());
                    $pageToken = $messagesResponse->getNextPageToken();
                }
            } catch(Exception $e)
            {
                print 'An error occurred: ' .$e->getMessage();
            }
        } while($pageToken);
        return $messages;
    }


//get new messages id's list /**

// @return array
    public function listHistory()
    {
        $service = $this->service;
        $userId = $this->defaultUserId;
        $startHistoryId = null;
        $opt_param = array('startHistoryId' => $startHistoryId);
        $pageToken = NULL;
        $histories = array();
        $newestMessage = GmailEmail::orderBy('internal_date','desc')->first();
        $opt_param['startHistoryId'] = $newestMessage->history_id;
        do {
            try {
                if($pageToken)
                {
                    $opt_param['pageToken'] = $pageToken;
                }
                $historyResponse = $service->users_history->listUsersHistory($userId, $opt_param);
                if ($historyResponse->getHistory())
                {
                    $histories = array_merge($histories,
                        $historyResponse->getHistory());
                    $pageToken = $historyResponse->getNextPageToken();
                }
            } catch(Exception $e){
                print 'An error occurred: ' . $e->getMessage();
            }
        } while ($pageToken);
        return $histories;
    }


//extract body content from gmail messages /**

// @param null $parts
// @return mixed
    public function getBodyContentByGmail($parts = null, $getPlain = false)
    {
        if($parts)
        {
            foreach($parts as $part)
            {
                if($part->getBody()->getSize())
                {
                    if($part->getMimeType() === 'text/plain' && $getPlain)
                    {
                        return $part->getBody()->getData();
                    }
                    if($part->getMimeType() === 'text/html')
                    {
                        return $part->getBody()->getData();
                    }
                }
                $innerParts = $part->getParts();
                foreach($innerParts as $innerPart)
                {
                    if($innerPart->getMimeType() === 'text/plain' && $getPlain)
                    {
                        return $innerPart->getBody()->getData();
                    }
                    if($innerPart->getMimeType() === 'text/html')
                    {
                        return $innerPart->getBody()->getData();
                    }
                }
            }
        }
    }


//save our messages to db

//@param null $mails 
    public function saveMailsToDb($mails = null)
    {
        if($mails)
        {
            foreach($mails as $mail)
            {
                GmailEmail::firstOrCreate($mail);
            }
        }
    }


//convert history list to messages list

//@param null $historyList
//@return array 
    public function prepareHistoryList($historyList = null)
    {
        $messagePartCollection = [];
        $itemArray = null;
        if($historyList)
        {
            foreach($historyList as $historyItem)
            {
                $itemArray = $historyItem->getMessages();
                $itemArray = array_values($itemArray)[0];
                array_push($messagePartCollection, $itemArray);
            }
        }
        return $messagePartCollection;
    }
}