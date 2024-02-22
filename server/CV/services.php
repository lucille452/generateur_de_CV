<?php

function getLastCvId($bdd)
{
    $cvID = $bdd->prepare("SELECT * FROM cv ORDER BY Cv_id DESC LIMIT 1");
    $cvID->execute();
    $cvID = $cvID->fetch(PDO::FETCH_ASSOC);
    return $cvID['Cv_id'];
}

function showCV($cv, $bdd)
{
    echo "<form action='' method='post'><div style='margin-left: 15vh;
    margin-right: 15vh;
    margin-bottom: 7vh;
    background-color: #2a2a2a;
    padding: 20px;
    border-radius: 10px;
    border: 2px solid #2ecc71;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);'><p style='color: #9c9c9c'><strong style='color: white'>Job : </strong>" . ucfirst($cv['Job']) . "</p>";

    //add academics/expe by id cv
    $academics = getAcademicsForCV($bdd, $cv['Cv_id']);
    echo "<section><strong style='color: white'>Parcours Académique : </strong>";
    showDivAcademicsCV($academics);
    echo "</section>";

    echo "<section><strong style='color: white'>Expériences Professionnelles : </strong>";
    $experiences = getExperiencesForCV($bdd, $cv['Cv_id']);
    showDivExperiencesCV($experiences);
    echo "</section>";

    echo "<p style='color: #9c9c9c'><strong style='color: white'>Hobbies : </strong>" . ucfirst($cv['Hobbies']) . "</p>";
    echo "<p style='color: #9c9c9c'><strong style='color: white'>Modele de CV : </strong><img src='../../Front/image/model". $cv['Model'] .".png' style='width: 15%; height: auto'></p>";
    echo "<style>
        .update {
            width: 4vh;
            height: 4vh;
            background-image: url(../../Front/image/crayon.png);
            background-size: cover;
            background-color: #2a2a2a;
            border: none;
        }

        .update:hover {
            cursor: pointer;
        }
    </style>
    <input type='submit' class='update' value='' name='updateCv{$cv['Cv_id']}'>";
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

function updateCV($bdd, $id, $job, $hobbies, $model)
{
    $updateCv = $bdd->prepare("UPDATE cv SET Job=?, Hobbies=?, Model=? WHERE Cv_id=?");
    $updateCv->execute([$job, $hobbies, $model, $id]);
    //update info (checkbox)
}

function showUpdateCV($cv)
{
    //add show info
    echo "<script>
        function verifierSaisie(inputId) {
            const input = document.getElementById(inputId);
            const valeur = input.value;

            if (valeur < 1 || valeur > 3 || isNaN(valeur)) {
                alert('Veuillez entrer un nombre valide entre 1 et 3.');
                input.value = '';
            }
        }</script>";
    echo "<form style='background-color: #1e1e1e; padding: 10px; border-radius: 10px' action='' method='post'>";
    echo "<input type='text' name='job2' value='{$cv['Job']}'>";
    echo "<input type='text' name='hobbies2' value='{$cv['Hobbies']}'>";
    echo "<input type='number' id='model' onchange=\"verifierSaisie('model')\" name='model2' value='{$cv['Model']}'>";
    echo "<input type='hidden' name='id2' value='{$cv['Cv_id']}'>";
    echo "<input style='width: 10vh; background-color: #b99d21; color: white; border-radius: 5px' type='submit' name='updateCv' value='Modifier'>";
    echo "</form>";
}