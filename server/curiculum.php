<?php

include 'information.php';

$bdd = new PDO('mysql:host=localhost;dbname=database', 'root', '');

$_SESSION['listAcademics'] = [];
$_SESSION['listExperiences'] = [];

if (isset($_POST['submit'])) {

    $job = $_POST['job'];
    $hobbies = $_POST['hobbies'];

    // Liste de toutes les id académies + liste de toutes les id expériences checkbox
    for ($i = 1; $i < 100; $i++) {
        if (!empty($_POST["academic$i"])){
            $_SESSION['listAcademics'] = $i;
        }
    }
    for ($j = 1; $j < 100; $j++) {
        if (!empty($_POST["experience$j"])){
            $_SESSION['listExperiences'] = $j;
        }
    }

//    for ($k = 0; $k < 1; $k++) {
//        echo $listExperiences[$k];
//    }

    if (!empty($job) && !empty($hobbies)) {
        $cv = $bdd->prepare("INSERT INTO cv (Job, Hobbies, User_id) VALUES (?, ?, ?)");
        $cv->execute([$job, $hobbies, GetUserID()]);
    }
}
?>
