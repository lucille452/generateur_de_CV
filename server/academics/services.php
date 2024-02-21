<?php

function addLiaisonAca($bdd, $academicID, $cvID)
{
    $liaison = $bdd->prepare("INSERT INTO liaison_academic(Academic_id, Cv_id) VALUES (?,?)");
    $liaison->execute([$academicID, intval($cvID)]);
}

function getAcademicsForCV($bdd, $cvId)
{
    $academics = $bdd->prepare("SELECT * FROM academics LEFT JOIN liaison_academic ON academics.Academic_id = liaison_academic.Academic_id LEFT JOIN cv ON cv.Cv_id = liaison_academic.Cv_id WHERE academics.User_id=? AND cv.Cv_id=?");
    $academics->execute([getUserID(), $cvId]);
    return $academics;
}

function showDivAcademicsCV($academics)
{
    while ($row = $academics->fetch(PDO::FETCH_ASSOC)) {
        echo "<h3>" . ucfirst($row['Diploma']) . "</h3>";
        echo "<p><strong>Établissement: </strong>" . $row['School'] . "</p>";
        echo "<p><strong>Date: </strong>" . $row['Date_start'] . " à " . $row['Date_end'] . "</p>";
    }
}

function deleteAcademic($bdd, $id)
{
    $deleteAca = $bdd->prepare("DELETE FROM academics WHERE Academic_id=?");
    $deleteAca->execute([$id]);
    $deleteLiaison = $bdd->prepare("DELETE FROM liaison_academic WHERE Academic_id=?");
    $deleteLiaison->execute([$id]);
}

function updateAcademic($bdd, $id, $diploma, $dateStart, $dateEnd, $school)
{
    $updateAca = $bdd->prepare("UPDATE academics SET Diploma=?, Date_start=?, Date_end=?, School=? WHERE Academic_id=?");
    $updateAca->execute([$diploma, $dateStart, $dateEnd, $school, $id]);
}

function showUpdateAcademic($academic)
{
    echo "<form style='background-color: #1e1e1e; padding: 10px; border-radius: 10px' action='' method='post'>";
    echo "<input type='text' name='diploma2' value='{$academic['Diploma']}'>";
    echo "<input style='margin-left: 0' type='date' name='dateStart2' value='{$academic['Date_start']}'>";
    echo "<input style='margin-left: 0' type='date' name='dateEnd2' value='{$academic['Date_end']}'>";
    echo "<input type='text' name='school2' value='{$academic['School']}'>";
    echo "<input type='hidden' name='id2' value='{$academic['Academic_id']}'>";
    echo "<input style='width: 10vh; background-color: #b99d21; color: white; border-radius: 5px' type='submit' name='updateAcademic' value='Modifier'>";
    echo "</form>";
}

