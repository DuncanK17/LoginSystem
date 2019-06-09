<?php
session_start();

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
    <link rel="stylesheet" href="../css/admin.css">
    <title>Mii-Fit Admin</title>
</head>
<body>

<?php require_once '../includes/nav-admin.html'?>

    <div class="main">
        <h1>Welkom</h1>

        <p>
            Hier kunt u afspraken bekijken en tijden inplannen.
        </p>
    </div>

</body>
</html>