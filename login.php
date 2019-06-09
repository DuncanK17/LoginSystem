<?php
    session_start();

    // link to the file with the connection to your database here
    require_once '../includes/connect.php';

    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
        header('Location: index.php');
    }

    $out = '';

    if(isset($_POST['username'])){
        $uName = mysqli_real_escape_string($db, $_POST['username']);
        $passW = mysqli_real_escape_string($db, $_POST['password']);

        $salted = "09696as0df678a4asd3af81hgf4".$passW."9sa6fdt32gsda";
        
        $hashed = hash('sha512', $salted);

        $query = "SELECT 1 FROM users WHERE uName = '$uName' AND pass = '$hashed'";
        $result = mysqli_query($db, $query);

        if(mysqli_num_rows($result) > 0){
            $_SESSION['logged_in'] = true;

            header('Location: index.php');
        } else {
            $out = "Try again";
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>

<div>
    <h1>Login</h1>
    <h2>Log in before you can use this website</h2>
</div>

<div>
    <form action="login.php" method="post">
        <label for="username"Username</label>
        <input type="text" id="username" name="username">

        <label for="password">Password</label>
        <input type="password" id="password" name="password">

        <input type="submit" name="submit">
    </form>
</div>

<?= $out ?>

</body>
</html>
