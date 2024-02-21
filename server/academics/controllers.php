<?php
include 'middlewares.php';

function addLiaisonAcademic($bdd, $cvID)
{
    $academics = $bdd->prepare("SELECT * FROM academics WHERE User_id=?");
    $academics->execute([getUserID()]);

    addLiaisonAcademicMiddleware($bdd, $academics, $cvID);
}