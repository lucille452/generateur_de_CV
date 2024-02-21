<?php
include 'services.php';
function deleteExpeMiddleware($bdd, $experiencesUser)
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

function showUpdateExpeMiddleware($experiencesUser)
{
    while ($row = $experiencesUser->fetch(PDO::FETCH_ASSOC)) {
        if (isset($_POST["updateExpe{$row['Experience_id']}"])) {
            showUpdateExperience($row);
        }
    }
}

function updateExpeMiddleware($bdd)
{
    if (isset($_POST["updateExperience"])) {
        @$company = $_POST['company2'];
        @$dateStart = $_POST['dateStart2'];
        @$dateEnd = $_POST['dateEnd2'];
        @$job = $_POST['job2'];
        @$descriptions = $_POST['descriptions2'];
        @$id = $_POST['id2'];

        updateExperience($bdd, $id, $company, $dateStart, $dateEnd, $job, $descriptions);
    }
}