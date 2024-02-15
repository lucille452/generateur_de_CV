<?php
function addLiaisonExpe($bdd, $cvID)
{
    $experiences = $bdd->prepare("SELECT * FROM experiences WHERE User_id=?");
    $experiences->execute([getUserID()]);

    while ($row = $experiences->fetch(PDO::FETCH_ASSOC)) {
        if (!empty($_POST["experience{$row['Experience_id']}"])) {
            $id = intval($row['Experience_id']);
            $liaison = $bdd->prepare("INSERT INTO liaison_experience(Experience_id, Cv_id) VALUES (?,?)");
            $liaison->execute([$id, intval($cvID)]);
        }
    }
}

function getExperiencesForCV($bdd)
{
    $experiences = $bdd->prepare("SELECT * FROM experiences LEFT JOIN liaison_experience ON experiences.Experience_id = liaison_experience.Experience_id LEFT JOIN cv ON cv.Cv_id = liaison_experience.Cv_id WHERE experiences.User_id=? AND cv.Cv_id=?");
    $experiences->execute([getUserID(), getLastCvId($bdd)]);
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