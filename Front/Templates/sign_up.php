<?php
include '../../server/pages/register.php';
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
        <input name="lastName" type="text" value="<?php echo isset($_POST['lastName']) ? $_POST['lastName'] : ''; ?>" /></br>
        <?php
        if (isset($_POST['submit']) && empty($lastName)) {
            echo "<h10>Champ vide</h10>";
        }
        ?>

        <label>Prénom :</label>
        <input name="firstName" type="text" value="<?php echo isset($_POST['firstName']) ? $_POST['firstName'] : ''; ?>" /></br>
        <?php
        if (isset($_POST['submit']) && empty($firstName)) {
            echo "<h10>Champ vide</h10>";
        }
        ?>

        <label>Mail :</label>
        <input name="email" type="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"/></br>
        <?php
        if (isset($_POST['submit']) && empty($email)) {
            echo "<h10>Champ vide</h10>";
        }
        ?>

        <label>Numéro de téléphone :</label>
        <input name="phone" type="number" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>"/></br>
        <?php
        if (isset($_POST['submit']) && empty($phone)) {
            echo "<h10>Champ vide</h10>";
        }
        ?>

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
        ?>

        <label>Confirmation du mot de passe :</label>
        <input name="checkPassword" type="password" value="<?php echo isset($_POST['checkPassword']) ? $_POST['checkPassword'] : ''; ?>"/></br>
            <?php
            if (isset($_POST['submit']) && empty($checkPassword)) {
                echo "<h10>Champ vide</h10>";
            }
            ?><p></p>

        <button type="submit" name="submit">S'inscrire</button>
    </form>
    <a href="home.php">Retour Connexion</a>
</div>
</div>

</body>
</html>