<?php

$bdd = new PDO('mysql:host=localhost;dbname=database', 'root', '');

if (isset($_POST['formation'])) {
    $diploma = $_POST['qualification'];
    $dateStart = $_POST['dateStart'];
    $dateEnd = $_POST['dateEnd'];
    $school = $_POST['school'];

    $academics = $bdd->prepare("INSERT INTO academics (Diploma, Date_start, Date_end, School) VALUES (?, ?, ?, ?)");
    $academics->execute([$diploma, $dateStart, $dateEnd, $school]);
}

if (isset($_POST['pro'])) {
    $company = $_POST['company'];
    $dateStart = $_POST['dateStart'];
    $dateEnd = $_POST['dateEnd'];
    $job = $_POST['job'];
    $descriptions = $_POST['descriptions'];

    $experiences = $bdd->prepare("INSERT INTO experiences (Company, Date_start, Date_end, Job, Descriptions) VALUES (?, ?, ?, ?, ?)");
    $experiences->execute([$company, $dateStart, $dateEnd, $job, $descriptions]);
}