<?php
    session_start();

    // check if not logged in
    // if so, head to login first
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false){
        header("Location: login.php");
    }

    // link to the file with the connection to your database here
    require_once '../includes/connect.php';   

    // declare empty variables for username and password
    $uName = '';
    $passW = '';

    // check if form has been sent
    if(isset($_POST['uName'])){

        // take username and password from form and secure them
        $uName = mysqli_real_escape_string($db, $_POST['uName']);
        $passW = mysqli_real_escape_string($db, $_POST['passW']);

        // salt the password
        $salted = "09696as0df678a4asd3af81hgf4".$passW."9sa6fdt32gsda";

        // hash the password
        $hashed = hash('sha512', $salted);
        
        // insert the username and safe password into your database
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
    <title>Register</title>
</head>
<body>
    
    <form action="" method="post">
        <input type="text" name="uName" id="uName" placeholder="username">
        <input type="text" name="passW" id="passW" placeholder="password">
        <input type="submit" value="Send">
    </form>

</body>
</html>
