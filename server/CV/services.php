<?php

function getLastCvId($bdd)
{
    $cvID = $bdd->prepare("SELECT * FROM cv ORDER BY Cv_id DESC LIMIT 1");
    $cvID->execute();
    $cvID = $cvID->fetch(PDO::FETCH_ASSOC);
    return $cvID['Cv_id'];
}