<?php
include "../../server/information.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Css/info.css">
    <meta charset="UTF-8">
    <title>Info</title>
</head>
<body>
<div class="container">
    <h1>Parcours Académique</h1>
    <!--        list de tous le parcours académique-->
    <?php
    $bdd = new PDO('mysql:host=localhost;dbname=database', 'root', '');

    $experiences = $bdd->prepare('SELECT * FROM academics WHERE User_id=?');
    $experiences->execute([GetUserID()]);

    while ($row = $experiences->fetch(PDO::FETCH_ASSOC)) {
        echo "<div style='display: flex; justify-content: space-around; color: #c5c5c5'><p style='color: #27ae60'>" . $row['Diploma']. "</p>";
        echo "<p>" . $row['Date_start']. "</p>";
        echo "<p>" . $row['Date_end']. "</p>";
        echo "<p>" . $row['School']. "</p></div>";
    }

    ?>
    <h2>Ajouter une formation :</h2>
    <form action="" method="post">

        <label>Diplôme :</label>
        <input name="qualification" type="text" />

        <label>Date :</label>
        <div class="date">
            <p>Du</p>
            <input name="dateStart" type="date">
            <p>au</p>
            <input name="dateEnd" type="date" />
        </div>

        <label>Etablissement :</label>
        <input name="school" type="text" /></p>

        <button type="submit" name="formation">Ajouter</button>
    </form>
</div>
<div class="container">
    <h1>Expériences Professionnelle</h1>
    <!--        list de tous le parcours académique-->
    <?php
    $bdd = new PDO('mysql:host=localhost;dbname=database', 'root', '');

    $experiences = $bdd->prepare('SELECT * FROM experiences WHERE User_id=?');
    $experiences->execute([GetUserID()]);

    while ($row = $experiences->fetch(PDO::FETCH_ASSOC)) {
        echo "<div style='display: flex; justify-content: space-around; color: #c5c5c5'><p style='color: #27ae60'>" . $row['Company']. "</p>";
        echo "<p>" . $row['Date_start']. "</p>";
        echo "<p>" . $row['Date_end']. "</p>";
        echo "<p>" . $row['Job']. "</p>";
        echo "<p>" . $row['Descriptions']. "</p></div>";
    }

    ?>
    <h2>Ajouter une expérience :</h2>
    <form action="" method="post">

        <label>Nom de l'entreprise :</label>
        <input name="company" type="text" />

        <label>Durée :</label>
        <div class="date">
            <p>Du</p>
            <input name="dateStart" type="date">
            <p>au</p>
            <input name="dateEnd" type="date" />
        </div>
        <label>Poste :</label>
        <input name="job" type="text" />

        <label>Description :</label>
        <input name="descriptions" type="text" /></p>

        <button type="submit" name="pro">Ajouter</button>
    </form>
</div>
<a href="home1.php">Retour page d'Accueil</a>
</body>
</html>