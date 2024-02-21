<?php
include 'middlewares.php';

function addLiaisonAcademic($bdd, $cvID)
{
    $academics = $bdd->prepare("SELECT * FROM academics WHERE User_id=?");
    $academics->execute([getUserID()]);

    addLiaisonAcademicMiddleware($bdd, $academics, $cvID);
}

function deleteAca($bdd, $userID)
{
    $academicsUser = $bdd->prepare("SELECT * FROM academics WHERE User_id=?");
    $academicsUser->execute([$userID]);

    deleteAcaMiddleware($bdd, $academicsUser);
    header('../../Front/Templates/info.php');
}

function showUpdateAca($bdd, $userID)
{
    $academicsUser = $bdd->prepare("SELECT * FROM academics WHERE User_id=?");
    $academicsUser->execute([$userID]);

    showUpdateAcaMiddleware($academicsUser);
}

function updateAca($bdd)
{
    updateAcaMiddleware($bdd);
    header('../../Front/Templates/info.php');
}