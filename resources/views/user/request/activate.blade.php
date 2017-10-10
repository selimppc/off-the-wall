
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<div class="span6 well">
    <div>

        You can use the following link to activate:
    </div>
    <div>
        {{ URL::to('user-activation/'.$link) }}.
        {{--<p><strong>If you don't use this link within 30 minutes, it will expire.</strong></p>--}}
    </div>
</div>
</body>
</html>
