
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<div class="span6 well">
    <div>
        you are invited for registration at user login system.<br>
        User Type:{{ $type }}.<br>
        You can follow the activation link to get signup :
    </div>
    <div>
        {{ URL::to('user-confirmation/'.$link) }}.
        {{--<p><strong>If you don't use this link within 30 minutes, it will expire.</strong></p>--}}
    </div>
</div>
</body>
</html>