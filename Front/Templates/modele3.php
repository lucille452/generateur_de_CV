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
        $user = $bdd->prepare("SELECT * FROM users WHERE User_id=?");
        $user->execute([GetUserID()]);

        $jobQuery = $bdd->query("SELECT Job FROM cv ORDER BY Cv_id LIMIT 1");
        $job = $jobQuery->fetch(PDO::FETCH_ASSOC)['Job'];

        while ($row = $user->fetch(PDO::FETCH_ASSOC)) {
            echo '<img src="votre-photo.jpg" alt="Votre Photo" width="150" height="150" style="border-radius: 50%;">';
            echo "<h1 style='color: white'>". strtoupper($row['Last_name'])." ". $row['First_name'] ."</h1>";
            echo "<h3>". $job . "</h3>";
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
        while ($row = $academics->fetch(PDO::FETCH_ASSOC)) {
            echo "<h3>".$row['Diploma']."</h3>";
            echo "<p><strong>Établissement: </strong>". $row['School'] ."</p>";
            echo "<p><strong>Date: </strong>". $row['Date_start']. $row['Date_end'] ."</p>";
        }
        ?>

        <h2>Expérience Professionnelle</h2>
        <?php
        while ($row = $experiences->fetch(PDO::FETCH_ASSOC)) {
            echo "<h3>". $row['Job'] ."</h3>";
            echo "<p><strong>Entreprise : </strong>". $row['Company'] ."</p>";
            echo "<p><strong>Date : </strong>". $row['Date_start']. $row['Date_end'] ."</p>";
            echo "<p><strong>Description : </strong>". $row['Descriptions'] ."</p>";
        }
        ?>

        <h2>Loisir</h2>
        <?php
        global $bdd;
        $cv = $bdd->prepare("SELECT * FROM cv WHERE User_id=?");   //TODO id du cv
        $cv->execute([GetUserID()]);

        while ($row = $cv->fetch(PDO::FETCH_ASSOC)) {
            echo "<p>". $row['Hobbies'] ."</p>";
        }
        ?>

    </div>
</div>

</body>
</html>
