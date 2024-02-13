<?php
function addLiaisonAca($bdd, $cvID)
{
    $academics = $bdd->prepare("SELECT * FROM academics WHERE User_id=?");
    $academics->execute([GetUserID()]);

    while ($row = $academics->fetch(PDO::FETCH_ASSOC)) {
        if (!empty($_POST["academic{$row['Academic_id']}"])) {
            $id = intval($row['Academic_id']);
            $liaison = $bdd->prepare("INSERT INTO liaison_academic(Academic_id, Cv_id) VALUES (?,?)");
            $liaison->execute([$id, intval($cvID)]);
        }
    }
}

