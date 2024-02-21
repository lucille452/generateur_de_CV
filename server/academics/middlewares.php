<?php
include 'services.php';
function deleteAcaMiddleware($bdd, $academicsUser)
{
    while ($row = $academicsUser->fetch(PDO::FETCH_ASSOC)) {
        if (isset($_POST["deleteAca{$row['Academic_id']}"])) {
            deleteAcademic($bdd, $row['Academic_id']);
        }
    }
}

function addLiaisonAcademicMiddleware($bdd, $academics, $cvID)
{
    while ($row = $academics->fetch(PDO::FETCH_ASSOC)) {
        if (!empty($_POST["academic{$row['Academic_id']}"])) {
            $id = intval($row['Academic_id']);
            addLiaisonAca($bdd, $id, $cvID);
        }
    }
}

function showUpdateAcaMiddleware($academicUser)
{
    while ($row = $academicUser->fetch(PDO::FETCH_ASSOC)) {
        if (isset($_POST["updateExpe{$row['Academic_id']}"])) {
            showUpdateAcademic($row);
        }
    }
}

function updateAcaMiddleware($bdd)
{
    if (isset($_POST['updateAcademic'])) {
        @$diploma = $_POST['diploma2'];
        @$dateStart = $_POST['dateStart2'];
        @$dateEnd = $_POST['dateEnd2'];
        @$school = $_POST['school2'];
        @$id = $_POST['id2'];

        updateAcademic($bdd, $id, $diploma, $dateStart, $dateEnd, $school);
    }
}