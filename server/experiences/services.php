<?php
function addLiaisonExpe($bdd, $cvID)
{
    $experiences = $bdd->prepare("SELECT * FROM experiences WHERE User_id=?");
    $experiences->execute([GetUserID()]);

    while ($row = $experiences->fetch(PDO::FETCH_ASSOC)) {
        if (!empty($_POST["experience{$row['Experience_id']}"])) {
            $id = intval($row['Experience_id']);
            $liaison = $bdd->prepare("INSERT INTO liaison_experience(Experience_id, Cv_id) VALUES (?,?)");
            $liaison->execute([$id, intval($cvID)]);
        }
    }

}

