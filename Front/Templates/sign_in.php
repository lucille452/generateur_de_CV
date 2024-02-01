<?php
include '../../server/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Css/sign_up.css">
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
<div class="container">
    <h1>Connexion</h1>

    <form action="" method="post">

        <label>Nom d'utilisateur :</label>
        <input name="username" type="text" />

        <label>Mot de passe :</label>
        <input name="password" type="password" /></br>

        <a>Mot de passe oublié</a></p>

        <button type="submit" name="submit">Connexion</button>
    </form></br>
    <a href="sign_up.php">
        <button>S'inscrire</button>
    </a>
</div>

</body>
</html>