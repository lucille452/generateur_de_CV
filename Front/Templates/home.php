<?php
include '../../server/pages/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Css/sign_up.css">
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
<h1>Générateur de Cv</h1>
<div class="block">
<div class="container">
    <h1>Connexion</h1>

    <form action="" method="post">

        <label>Nom d'utilisateur :</label>
        <input name="username" type="text" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>"/></br>
        <?php
        if (isset($_POST['submit']) && empty($username)) {
            echo "<h10>Champ vide</h10>";
        }
        ?>

        <label>Mot de passe :</label>
        <input name="password" type="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>"/></br>
        <?php
        if (isset($_POST['submit']) && empty($password)) {
            echo "<h10>Champ vide</h10>";
        }
        ?><p></p>

<!--        <a>Mot de passe oublié</a></p>-->

        <button type="submit" name="submit">Connexion</button>
    </form></br>
    <a href="sign_up.php">
        <button class="register">S'inscrire</button>
    </a>
</div>
</div>

</body>
</html>