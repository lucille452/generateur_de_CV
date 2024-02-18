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

