<?php

include 'information.php';

$bdd = new PDO('mysql:host=localhost;dbname=database', 'root', '');

if (isset($_POST['submit'])) {

//    // Check if a file is selected
//    if (!empty($_FILES['img']['name'])) {
//        $targetDir = "uploads/"; // Specify the target directory where you want to store the uploaded files
//        $targetFile = $targetDir . basename($_FILES['img']['name']); // Get the full path to the uploaded file
//
//        // Check if the file is an actual image
//        $check = getimagesize($_FILES['img']['tmp_name']);
//        if ($check !== false) {
//            // Move the uploaded file to the specified directory
//            move_uploaded_file($_FILES['img']['tmp_name'], $targetFile);
//            echo "The file " . htmlspecialchars(basename($_FILES['img']['name'])) . " has been uploaded.";
//        }
//    }

    //----- Liste de toutes les id académies + liste de toutes les id expériences checkbox --------

    $job = $_POST['job'];
    $hobbies = $_POST['hobbies'];
    $model = $_POST['model'];

    if (!empty($job) && !empty($hobbies) && !empty($model)) {
        $cv = $bdd->prepare("INSERT INTO cv (Job, Hobbies, User_id, Model) VALUES (?, ?, ?, ?)");
        $cv->execute([$job, $hobbies, getUserID(), $model]);

        include '../CV/services.php';
        $cvID = getLastCvId($bdd);
        include '../academics/services.php';
        addLiaisonAca($bdd, $cvID);
        include '../experiences/services.php';
        addLiaisonExpe($bdd, $cvID);
        header('Location: ../Templates/modele' . $model . '.php');


    }
}

