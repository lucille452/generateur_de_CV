<?php
include 'middlewares.php';

function addLiaisonExperiences($bdd, $cvID)
{
    $experiences = $bdd->prepare("SELECT * FROM experiences WHERE User_id=?");
    $experiences->execute([getUserID()]);

    addLiaisonExpeMiddleware($bdd, $cvID, $experiences);
}

function deleteExpe($bdd, $userID)
{
    $experiencesUser = $bdd->prepare("SELECT * FROM experiences WHERE User_id=?");
    $experiencesUser->execute([$userID]);

    deleteExpeMiddleware($bdd, $experiencesUser);
    header('../../Front/Templates/info.php');
}

function showUpdateExpe($bdd, $userID)
{
    $experiencesUser = $bdd->prepare("SELECT * FROM experiences WHERE User_id=?");
    $experiencesUser->execute([$userID]);

    showUpdateExpeMiddleware($experiencesUser);
}

function updateExpe($bdd)
{
    updateExpeMiddleware($bdd);
    header('../../Front/Templates/info.php');
}