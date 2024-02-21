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

function updateExperience($bdd, $id, $company, $dateStart, $dateEnd, $job, $descriptions)
{
    $updateExpe = $bdd->prepare("UPDATE experiences SET Company=?, Date_start=?, Date_end=?, Job=?, Descriptions=? WHERE Experience_id=?");
    $updateExpe->execute([$company, $dateStart, $dateEnd, $job, $descriptions, $id]);

}

function showUpdateExperience($experience)
{
    echo "<form style='background-color: #1e1e1e; padding: 10px; border-radius: 10px' action='' method='post'>";
    echo "<input type='text' name='company2' value='{$experience['Company']}'>";
    echo "<input style='margin-left: 0' type='date' name='dateStart2' value='{$experience['Date_start']}'>";
    echo "<input style='margin-left: 0' type='date' name='dateEnd2' value='{$experience['Date_end']}'>";
    echo "<input type='text' name='job2' value='{$experience['Job']}'>";
    echo "<input type='text' name='descriptions2' value='{$experience['Descriptions']}'>";
    echo "<input type='hidden' name='id2' value='{$experience['Experience_id']}'>";
    echo "<input style='width: 10vh; background-color: #b99d21; color: white; border-radius: 5px' type='submit' name='updateExperience' value='Modifier'>";
    echo "</form>";
}