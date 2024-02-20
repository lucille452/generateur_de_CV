<?php

function getLastCvId($bdd)
{
    $cvID = $bdd->prepare("SELECT * FROM cv ORDER BY Cv_id DESC LIMIT 1");
    $cvID->execute();
    $cvID = $cvID->fetch(PDO::FETCH_ASSOC);
    return $cvID['Cv_id'];
}

function showCV($cv)
{
    echo "<form action='' method='post'><div style='margin-left: 15vh;
    margin-right: 15vh;
    margin-bottom: 7vh;
    background-color: #2a2a2a;
    padding: 20px;
    border-radius: 10px;
    border: 2px solid #2ecc71;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);'><p style='color: white'><strong>Job : </strong>" . $cv['Job'] . "</p>";
    //add academics/expe by id cv

    echo "<p style='color: white'><strong>Hobbies : </strong>" . $cv['Hobbies'] . "</p>";
    echo "<p style='color: white'><strong>Modele de CV : </strong><img src='../../Front/image/model". $cv['Model'] .".png' style='width: 15%; height: auto'></p>";
    echo "<style>
        .delete {
            width: 4vh;
            height: 4vh;
            background-image: url(../../Front/image/corbeille.png);
            background-size: cover;
            background-color: #2a2a2a;
            border: none;
        }

        .delete:hover {
            cursor: pointer;
        }
    </style>
    <input type='submit' class='delete' value='' name='deleteCv{$cv['Cv_id']}'></div></form>";

}

function deleteCV($bdd, $id)
{
    //delete Cv
    $deleteCV = $bdd->prepare("DELETE FROM cv WHERE Cv_id=?");
    $deleteCV->execute([$id]);
    //delete experiences of cv
    $deleteLiaisonExpe = $bdd->prepare("DELETE FROM liaison_experience WHERE Cv_id=?");
    $deleteLiaisonExpe->execute([$id]);
    //delete academics of cv
    $deleteLiaisonAca = $bdd->prepare("DELETE FROM liaison_academic WHERE Cv_id=?");
    $deleteLiaisonAca->execute([$id]);

}