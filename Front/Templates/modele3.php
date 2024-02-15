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
        include '../../server/pages/curiculum.php';
        include '../../server/user/services.php';
        global $bdd;
        $user = getInfoUserSession($bdd, getUserID());

        //get job to table cv
        $jobQuery = $bdd->query("SELECT Job FROM cv ORDER BY Cv_id LIMIT 1");
        $job = $jobQuery->fetch(PDO::FETCH_ASSOC)['Job'];

        //show infos
        while ($row = $user->fetch(PDO::FETCH_ASSOC)) {
            echo '<img src="votre-photo.jpg" alt="" width="150" height="150" style="border-radius: 50%;">';
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
        $academics = getAcademicsForCV($bdd);
        showDivAcademicsCV($academics);
        ?>

        <h2>Expérience Professionnelle</h2>
        <?php
        $experiences = getExperiencesForCV($bdd);
        showDivExperiencesCV($experiences);
        ?>

        <h2>Loisir</h2>
        <?php
        //get other info to cv
        $cv = $bdd->prepare("SELECT * FROM cv WHERE User_id=? ORDER BY Cv_id DESC LIMIT 1");
        $cv->execute([getUserID()]);

        //show info
        while ($row = $cv->fetch(PDO::FETCH_ASSOC)) {
            echo "<p>". $row['Hobbies'] ."</p>";
        }
        ?>

    </div>
</div>
<form action="../../server/toPdf.php" method="post">
    <input type="submit" name="modele3" value="Télécharger en pdf">
</form>
</body>
</html>
