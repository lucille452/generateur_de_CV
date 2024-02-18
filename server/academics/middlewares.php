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