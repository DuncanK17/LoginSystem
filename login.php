<?php
    session_start();

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
            $out = "Probeer opnieuw";
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
    <link rel="stylesheet" href="../css/admin.css">
    <title>Mii-fit Admin</title>
</head>
<body>

<div>
    <h1>Login</h1>
    <h2>Log eerst in voor u gebruikt kunt maken van deze website</h2>
</div>

<div>
    <form action="login.php" method="post">
        <label for="username">Gebruikersnaam</label>
        <input type="text" id="username" name="username">

        <label for="password">Wachtwoord</label>
        <input type="password" id="password" name="password">

        <input type="submit" name="submit">
    </form>
</div>

<?= $out ?>

</body>
</html>
