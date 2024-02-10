<?php

//require_once 'information.php';

$bdd = new PDO('mysql:host=localhost;dbname=database', 'root', '');


if (isset($_POST['submit'])) {

    $job = $_POST['job'];
    $hobbies = $_POST['hobbies'];

    //    list de tout les academics + list de tous les experiences checkbox
    $academics = [];
    $experiences = [];

    for ($i = 1; $i < 40; $i++) {
        if (!empty($_POST[$i])){
            $academics[] = $i;
        }
    }
    for ($i = 1; $i < 40; $i++) {
        if (!empty($_POST[$i])){
            $experiences[] = $i;
        }
    }

    if (!empty($job) && !empty($hobbies)) {
        $cv = $bdd->prepare("INSERT INTO cv (Job, Hobbies, User_id, Academics, Experiences) VALUES (?, ?, ?, ?, ?)");
        $cv->execute([$job, $hobbies, GetUserID(), $academics, $experiences]);
    }
}
?>