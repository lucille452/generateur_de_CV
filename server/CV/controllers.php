<?php
include 'middlewares.php';
function showCvByUser($userId, $bdd)
{
    $cv = $bdd->prepare("SELECT * FROM cv WHERE User_id=? ORDER BY Cv_id DESC");
    $cv->execute([$userId]);
    showCvMiddleware($cv);
}
