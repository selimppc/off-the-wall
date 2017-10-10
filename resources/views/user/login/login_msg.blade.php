
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<div class="span6 well">
    <div>
        <p>A user has logged in at affifact system now.</p>
        <p>Email:  {{isset($email)?$email:''}}</p>
        <p>Type: {{ isset($user_type)?ucfirst($user_type):''}}</p>
        <p>Login time : {{ isset($date)?$date:'' }}</p>
    </div>

</div>
</body>
</html>
