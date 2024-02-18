<?php
include 'C:\xampp\htdocs\generateur_de_CV\server\CV\services.php';

function addLiaisonAca($bdd, $cvID)
{
    $academics = $bdd->prepare("SELECT * FROM academics WHERE User_id=?");
    $academics->execute([getUserID()]);

    while ($row = $academics->fetch(PDO::FETCH_ASSOC)) {
        if (!empty($_POST["academic{$row['Academic_id']}"])) {
            $id = intval($row['Academic_id']);
            $liaison = $bdd->prepare("INSERT INTO liaison_academic(Academic_id, Cv_id) VALUES (?,?)");
            $liaison->execute([$id, intval($cvID)]);
        }
    }
}

function getAcademicsForCV($bdd)
{
    $academics = $bdd->prepare("SELECT * FROM academics LEFT JOIN liaison_academic ON academics.Academic_id = liaison_academic.Academic_id LEFT JOIN cv ON cv.Cv_id = liaison_academic.Cv_id WHERE academics.User_id=? AND cv.Cv_id=?");
    $academics->execute([getUserID(), getLastCvId($bdd)]);
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

function deleteAcademics($bdd, $id)
{
    $deleteAca = $bdd->prepare("DELETE FROM academics WHERE Academic_id=?");
    $deleteAca->execute([$id]);
    $deleteLiaison = $bdd->prepare("DELETE FROM liaison_academic WHERE Academic_id=?");
    $deleteLiaison->execute([$id]);
}