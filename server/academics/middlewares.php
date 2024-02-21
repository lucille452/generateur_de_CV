<?php
include 'services.php';
function delAca($bdd, $academicsUser)
{
    while ($row = $academicsUser->fetch(PDO::FETCH_ASSOC)) {
        if (isset($_POST["deleteAca{$row['Academic_id']}"])) {
            deleteAcademics($bdd, $row['Academic_id']);
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