<?php
include 'services.php';
function showUpdateUserMiddleware($user)
{
    if (isset($_POST["updateUser"])) {
        showUpdateUser($user);
    }
}

function updateUserMiddleware($bdd)
{
    if (isset($_POST["updateUser2"])) {
        @$lastName = $_POST['lastName2'];
        @$firstName = $_POST['firstName2'];
        @$email = $_POST['email2'];
        @$phoneTel = $_POST['phoneTel2'];
        @$username = $_POST['username2'];
        @$id = $_POST['id2'];

        updateUser($bdd, $id, $lastName, $firstName, $email, $phoneTel, $username);
    }
}