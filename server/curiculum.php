<?php

//require_once 'information.php';

if (isset($_POST['submit'])) {

    $job = $_POST['job'];
    $hobbies = $_POST['hobbies'];

    // Liste de toutes les académies + liste de toutes les expériences checkbox
    $listAcademics = [];
    $listExperiences = [];

    for ($i = 1; $i < 50; $i++) {
        if (!empty($_POST["academic$i"])){
            $listAcademics[] = $i;
        }
    }
    for ($j = 1; $j < 50; $j++) {
        if (!empty($_POST["experience$j"])){
            $listExperiences[] = $j;
        }
    }
//
//    for ($k = 0; $k < 3; $k++) {
//        echo $listExperiences[$k];
//    }


//    if (!empty($job) && !empty($hobbies)) {
//        global $bdd;
//        $cv = $bdd->prepare("INSERT INTO cv (Job, Hobbies, User_id) VALUES (?, ?, ?)");
//        $cv->execute([$job, $hobbies, GetUserID()]);
//    }
}
?>
