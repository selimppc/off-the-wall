<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<div class="span6 well">
    <div>
        You have been successfully activated by the admin ! Now you can login:
    </div>
    <div>
        {!! URL::to('user/status_active_mail/'.$link) !!}.
    </div>
</div>
</body>
</html>
