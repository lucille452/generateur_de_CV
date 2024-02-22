<?php
include 'middlewares.php';
function showUpdateUserController($bdd, $userID)
{
    $user = $bdd->prepare("SELECT * FROM users WHERE User_id=?");
    $user->execute([$userID]);

    showUpdateUserMiddleware($user->fetch(PDO::FETCH_ASSOC));
}

function updateUserController($bdd)
{
    updateUserMiddleware($bdd);
    header('../../Front/Templates/home1.php');
}

function updatePasswordController($bdd, $username, $email, $password, $checkPassword)
{
    updatePasswordMiddleware($bdd, $username, $email, $password, $checkPassword);
    header('../../Front/Templates/home.php');
}