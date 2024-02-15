<?php

$bdd = new PDO('mysql:host=localhost;dbname=database', 'root', '');

if (isset($_POST['submit'])) {
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $checkPassword = $_POST['checkPassword'];

    if (!empty($lastName) && !empty($firstName) && !empty($email) && !empty($phone) && !empty($username) && !empty($password) && !empty($checkPassword) && $password == $checkPassword) {
        $user = $bdd->prepare("INSERT INTO users (Last_name, First_name, Email, Phone_tel, Username, Password) VALUES (?, ?, ?, ?, ?, ?)");
        $user->execute([$lastName, $firstName, $email, $phone, $username, $password]);
        header('Location: ../Templates/home.php');
    }
}
