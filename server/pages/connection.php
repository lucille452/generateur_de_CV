<?php

session_start();

$bdd = new PDO('mysql:host=localhost;dbname=database', 'root', '');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $users = $bdd->prepare("SELECT * FROM users WHERE Username=? AND Password=?");
    $users->execute([$username, $password]);

    if ($users->rowCount() > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header('Location: ../Templates/home1.php');
    }

}
