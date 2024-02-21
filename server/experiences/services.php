<?php
function addLiaisonExpe($bdd, $experienceID, $cvID)
{
    $liaison = $bdd->prepare("INSERT INTO liaison_experience(Experience_id, Cv_id) VALUES (?,?)");
    $liaison->execute([$experienceID, intval($cvID)]);
}

function getExperiencesForCV($bdd, $id)
{
    $experiences = $bdd->prepare("SELECT * FROM experiences LEFT JOIN liaison_experience ON experiences.Experience_id = liaison_experience.Experience_id LEFT JOIN cv ON cv.Cv_id = liaison_experience.Cv_id WHERE experiences.User_id=? AND cv.Cv_id=?");
    $experiences->execute([getUserID(), $id]);
    return $experiences;
}

function showDivExperiencesCV($experiences)
{
    while ($rowExpe = $experiences->fetch(PDO::FETCH_ASSOC)) {
        echo "<h3>" . ucfirst($rowExpe['Job']) . "</h3>";
        echo "<p><strong>Entreprise : </strong>" . $rowExpe['Company'] . "</p>";
        echo "<p><strong>Date : </strong>" . $rowExpe['Date_start'] . $rowExpe['Date_end'] . "</p>";
        echo "<p><strong>Description : </strong>" . $rowExpe['Descriptions'] . "</p>";
    }
}

function deleteExperience($bdd, $id)
{
    $deleteExpe = $bdd->prepare("DELETE FROM experiences WHERE Experience_id=?");
    $deleteExpe->execute([$id]);
    $deleteLiaison = $bdd->prepare("DELETE FROM liaison_experience WHERE Experience_id=?");
    $deleteLiaison->execute([$id]);
}