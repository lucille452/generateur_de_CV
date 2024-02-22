<?php
include 'middlewares.php';
function showCvByUser($userId, $bdd)
{
    $cv = $bdd->prepare("SELECT * FROM cv WHERE User_id=? ORDER BY Cv_id DESC");
    $cv->execute([$userId]);
    showCvMiddleware($cv, $bdd, $userId);
}

function delCv($bdd, $userID)
{
    $cvUser = $bdd->prepare("SELECT * FROM cv WHERE User_id=?");
    $cvUser->execute([$userID]);

    deleteCVMiddleware($bdd, $cvUser);
}

function showUpdateCvController($bdd, $userID)
{
    $cvUser = $bdd->prepare("SELECT * FROM cv WHERE User_id=?");
    $cvUser->execute([$userID]);

    showUpdateCvMiddleware($cvUser);
}

function updateCvController($bdd)
{
    updateCvMiddleware($bdd);
}