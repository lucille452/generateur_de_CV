<?php
include '../../server/pages/changePassword.php';
?>

    <!DOCTYPE html>
    <html lang="en">
<head>
    <link rel="stylesheet" href="../Css/sign_up.css">
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
<div class="block">
    <div class="container">
        <h1>Changer votre mot de passe</h1>

        <form action="" method="post">

            <label>Nom d'utilisateur :</label>
            <input name="username" type="text" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>"/></br>
            <?php
            if (isset($_POST['submit']) && empty($username)) {
                echo "<h10>Champ vide</h10>";
            }
            ?>


            <label>Votre adresse mail :</label>
            <input name="email" type="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"/></br>
            <?php
            if (isset($_POST['submit']) && empty($email)) {
                echo "<h10>Champ vide</h10>";
            }
            ?>

            <label>Nouveau mot de passe :</label>
            <input name="password" type="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>"/></br>
            <?php
            if (isset($_POST['submit']) && empty($password)) {
                echo "<h10>Champ vide</h10>";
            }
            ?>

            <label>Confirmation du nouveau mot de passe :</label>
            <input name="checkPassword" type="password" value="<?php echo isset($_POST['checkPassword']) ? $_POST['checkPassword'] : ''; ?>"/></br>
            <?php
            if (isset($_POST['submit']) && empty($checkPassword)) {
                echo "<h10>Champ vide</h10>";
            }
            ?><p></p>

            <button type="submit" name="submit">Enregistrer</button>
        </form></br>
        <a href="home.php">
            <button class="register">Retour</button>
        </a>
    </div>
</div>

</body>
</html>
