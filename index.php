<?php
session_start();

// check if logged in or not
// if not, head to login page
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false){
    header("Location: login.php");
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Logged-in page</title>
</head>
    
<body>
    
    <h1>Welcome</h1>
    
</body>
</html>
