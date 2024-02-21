<?php
include 'middlewares.php';

function addLiaisonExperiences($bdd, $cvID)
{
    $experiences = $bdd->prepare("SELECT * FROM experiences WHERE User_id=?");
    $experiences->execute([getUserID()]);

    addLiaisonExpeMiddleware($bdd, $cvID, $experiences);
}
