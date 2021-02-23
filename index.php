<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png">
    <title>My new app</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <!--[if lt IE 9]>
    <p class="browsehappy">You are using an
        <strong>outdated</strong>browser. Please
        <a href="http://browsehappy.com/">upgrade your browser</a>to improve your experience.</p>
    <![endif]-->
</head>

<body>
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<?php
$url = parse_url(getenv("MySQL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$connected = new mysqli($server, $username, $password, $db);
if ($connected == true) {
    echo "SQL working <br>" ;
}

else {
    echo "not connected" ;
}

$result = mysqli_query($connected, "Select * from heroku_1f36bfdfc189f3e.details");
while ($row = mysqli_fetch_array($result)){
    echo $row ["Username"];
}
?>
</body>

</html>