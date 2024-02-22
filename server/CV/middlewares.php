<?php
include 'services.php';
function showCvMiddleware($cvs, $bdd, $userID)
{
    foreach ($cvs as $cv) {
        showCV($cv, $bdd);
        showUpdateCvController($bdd, $userID);
        updateCvController($bdd);
    }
}

function deleteCVMiddleware($bdd, $CvUser)
{
    while ($row = $CvUser->fetch(PDO::FETCH_ASSOC)) {
        if (isset($_POST["deleteCv{$row['Cv_id']}"])) {
            deleteCV($bdd, $row['Cv_id']);
            header('../../Front/Templates/home1.php');
        }
    }
}

function showUpdateCvMiddleware($cvUser)
{
    while ($row = $cvUser->fetch(PDO::FETCH_ASSOC)) {
        if (isset($_POST["updateCv{$row['Cv_id']}"])) {
            showUpdateCV($row);
        }
    }
}

function updateCvMiddleware($bdd)
{
    if (isset($_POST['updateCv'])) {
        @$job = $_POST['job2'];
        @$hobbies = $_POST['hobbies2'];
        @$model = $_POST['model2'];
        @$id = $_POST['id2'];
        //add info
        updateCV($bdd, $id, $job, $hobbies, $model);
        header('../../Front/Templates/home1.php');
    }
}