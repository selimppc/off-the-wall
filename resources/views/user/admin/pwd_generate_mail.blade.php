
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<div class="span6 well">
    <div>
        You can use the following link to generate your password:
    </div>
    <div>
      {!! URL::to('generate_password/'.$link) !!}.
    </div>
</div>
</body>
</html>
