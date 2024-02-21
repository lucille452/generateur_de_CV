<?php
include 'services.php';

function delExpe($bdd, $experiencesUser)
{
    while ($row = $experiencesUser->fetch(PDO::FETCH_ASSOC)) {
        if (isset($_POST["deleteExpe{$row['Experience_id']}"])) {
            deleteExperience($bdd, $row['Experience_id']);
        }
    }
}

function addLiaisonExpeMiddleware($bdd, $cvID, $experiences)
{
    while ($row = $experiences->fetch(PDO::FETCH_ASSOC)) {
        if (!empty($_POST["experience{$row['Experience_id']}"])) {
            $id = intval($row['Experience_id']);
            addLiaisonExpe($bdd, $id, $cvID);
        }
    }
}