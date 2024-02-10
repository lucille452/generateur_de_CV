<?php
include '../../server/register.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Css/sign_up.css">
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
<div class="block">
<div class="container">
    <h1>Inscription</h1>

    <form style="margin-bottom: 2vh;" action="" method="post">
        <label>Nom :</label>
        <input name="lastName" type="text" />

        <label>Prénom :</label>
        <input name="firstName" type="text" />

        <label>Mail :</label>
        <input name="email" type="email" />

        <label>Numéro de téléphone :</label>
        <input name="phone" type="number" />

        <label>Nom d'utilisateur :</label>
        <input name="username" type="text" />

        <label>Mot de passe :</label>
        <input name="password" type="password" />

        <label>Confirmation du mot de passe :</label>
        <input name="checkPassword" type="password" /></p>

        <button type="submit" name="submit">S'inscrire</button>
    </form>
    <a href="home.php">Retour Connexion</a>
</div>
</div>

</body>
</html>