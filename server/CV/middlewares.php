<?php
include 'services.php';
function showCvMiddleware($cvs, $bdd)
{
    foreach ($cvs as $cv) {
        showCV($cv, $bdd);
    }
}

function deleteCVMiddleware($bdd, $CvUser)
{
    while ($row = $CvUser->fetch(PDO::FETCH_ASSOC)) {
        if (isset($_POST["deleteCv{$row['Cv_id']}"])) {
            deleteCV($bdd, $row['Cv_id']);
        }
    }
}
