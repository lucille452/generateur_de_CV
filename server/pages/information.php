<?php
include 'C:/xampp/htdocs/generateur_de_CV/server/experiences/services.php';
include 'C:/xampp/htdocs/generateur_de_CV/server/academics/services.php';

$bdd = new PDO('mysql:host=localhost;dbname=database', 'root', '');

function getUserID()
{
    $bdd = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $userIdQuery = $bdd->prepare("SELECT User_id FROM users WHERE username=?");
    $userIdQuery->execute([$_SESSION['username']]);
    $userId = $userIdQuery->fetchColumn();
    return $userId;
}

session_start();

if (isset($_POST['formation'])) {
    $diploma = $_POST['qualification'];
    $dateStart = $_POST['dateStart'];
    $dateEnd = $_POST['dateEnd'];
    $school = $_POST['school'];

    if (!empty($diploma) && !empty($dateStart) && !empty($dateEnd) && !empty($school) && $dateStart < $dateEnd) {
        $academics = $bdd->prepare("INSERT INTO academics (Diploma, Date_start, Date_end, School, User_id) VALUES (?, ?, ?, ?, ?)");
        $academics->execute([$diploma, $dateStart, $dateEnd, $school, getUserID()]);
    }
}

if (isset($_POST['pro'])) {
    $company = $_POST['company'];
    $dateStart = $_POST['dateStart'];
    $dateEnd = $_POST['dateEnd'];
    $job = $_POST['job'];
    $descriptions = $_POST['descriptions'];

    if (!empty($company) && !empty($dateStart) && !empty($dateEnd) && !empty($job) && !empty($descriptions) && $dateStart < $dateEnd) {
        $experiences = $bdd->prepare("INSERT INTO experiences (Company, Date_start, Date_end, Job, Descriptions, User_id) VALUES (?, ?, ?, ?, ?, ?)");
        $experiences->execute([$company, $dateStart, $dateEnd, $job, $descriptions, getUserID()]);
    }
}

$experiencesUser = $bdd->prepare("SELECT * FROM experiences WHERE User_id=?");
$experiencesUser->execute([getUserID()]);

while ($row = $experiencesUser->fetch(PDO::FETCH_ASSOC)) {
    if (isset($_POST["deleteExpe{$row['Experience_id']}"])) {
        echo 'test2';
        deleteExperience($bdd, $row['Experience_id']);
    }
}

$academicsUser = $bdd->prepare("SELECT * FROM academics WHERE User_id=?");
$academicsUser->execute([getUserID()]);

while ($row = $academicsUser->fetch(PDO::FETCH_ASSOC)) {
    if (isset($_POST["deleteAca{$row['Academic_id']}"])) {
        deleteAcademics($bdd, $row['Academic_id']);
    }
}