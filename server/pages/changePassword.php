<?php
include 'C:/xampp/htdocs/generateur_de_CV/server/user/controllers.php';
$bdd = new PDO('mysql:host=localhost;dbname=database', 'root', '');

if(isset($_POST['submit'])) {
    @$username = $_POST['username'];
    @$email = $_POST['email'];
    @$password = $_POST['password'];
    @$checkPassword = $_POST['checkPassword'];

    updatePasswordController($bdd, $username, $email, $password, $checkPassword);
}