<?php
    session_start();

    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false){
        header("Location: login.php");
    }

    require_once '../includes/connect.php';   

    $uName = '';
    $pass1 = '';

    if(isset($_POST['uName'])){

        $uName = mysqli_real_escape_string($db, $_POST['uName']);
        $pass1 = mysqli_real_escape_string($db, $_POST['pass1']);

        $salted = "09696as0df678a4asd3af81hgf4".$pass1."9sa6fdt32gsda";

        $hashed = hash('sha512', $salted);

        $query = "INSERT INTO users (uName, pass) VALUES ('$uName', '$hashed')";

        $result = mysqli_query($db, $query) or die("Bad boy: $query");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Register</title>
</head>
<body>
    
    <form action="" method="post">
        <input type="text" name="uName" id="uName" placeholder="username">
        <input type="text" name="pass1" id="pass1" placeholder="password">
        <input type="submit" value="Verstuur">
    </form>

</body>
</html>