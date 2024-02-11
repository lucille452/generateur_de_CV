<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Css/model3.css">
    <meta charset="UTF-8">
    <title>Curriculum Vitae</title>
    <style>

    </style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <?php
        include '../../server/information.php';

        global $bdd;

        //get info user to table user
        $user = $bdd->prepare("SELECT * FROM users WHERE User_id=?");
        $user->execute([GetUserID()]);

        //get job to table cv
        $jobQuery = $bdd->query("SELECT Job FROM cv ORDER BY Cv_id LIMIT 1");
        $job = $jobQuery->fetch(PDO::FETCH_ASSOC)['Job'];

        //show infos
        while ($row = $user->fetch(PDO::FETCH_ASSOC)) {
            echo '<img src="votre-photo.jpg" alt="Votre Photo" width="150" height="150" style="border-radius: 50%;">';
            echo "<h1 style='color: white'>". strtoupper($row['Last_name'])." ". $row['First_name'] ."</h1>";
            echo "<h3 style='color: white'>". ucfirst($job) . "</h3>";
            echo "<h2>Profil</h2>";
            echo "<ul>";
            echo "<li><strong>Téléphone: </strong>". $row['Phone_tel'] ."</li>";
            echo "<li><strong>Email: </strong>". $row['Email'] ."</li>";
            echo "</ul>";
        }
        ?>
    </div>

    <div class="content">
        <h2>Parcours Académique</h2>
        <?php
        foreach ($_SESSION['listAcademics'] as $academicID) {
            //get academics choice by user for this cv
            $academics = $bdd->prepare("SELECT * FROM academics WHERE Academic_id=?");
            $academics->execute([$academicID]);

            // show all academics
            while ($row = $academics->fetch(PDO::FETCH_ASSOC)) {
                echo "<h3>" . $row['Diploma'] . "</h3>";
                echo "<p><strong>Établissement: </strong>" . $row['School'] . "</p>";
                echo "<p><strong>Date: </strong>" . $row['Date_start'] . $row['Date_end'] . "</p>";
            }
        }
        ?>

        <h2>Expérience Professionnelle</h2>
        <?php
        foreach ($_SESSION['listExperiences'] as $experienceID) {
            //get experiences choice by user for this cv
            $experiences = $bdd->prepare("SELECT * FROM experiences WHERE Experience_id=?");
            $experiences->execute([$experienceID]);

            //show all experiences
            while ($row = $experiences->fetch(PDO::FETCH_ASSOC)) {
                echo "<h3>" . $row['Job'] . "</h3>";
                echo "<p><strong>Entreprise : </strong>" . $row['Company'] . "</p>";
                echo "<p><strong>Date : </strong>" . $row['Date_start'] . $row['Date_end'] . "</p>";
                echo "<p><strong>Description : </strong>" . $row['Descriptions'] . "</p>";
            }
        }
        ?>

        <h2>Loisir</h2>
        <?php
        global $bdd;

        //get other info to cv
        $cv = $bdd->prepare("SELECT * FROM cv WHERE User_id=? ORDER BY Cv_id DESC LIMIT 1");
        $cv->execute([GetUserID()]);

        //show info
        while ($row = $cv->fetch(PDO::FETCH_ASSOC)) {
            echo "<p>". $row['Hobbies'] ."</p>";
        }
        ?>

    </div>
</div>

</body>
</html>
