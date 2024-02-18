<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Curriculum Vitae</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            background-color: #d3d3d3;
            color: #000000;
            margin: 0;
        }
        .container {
            position: absolute;
            display: flex;
            max-width: 800px;
            background-color: #d3d3d3;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        .sidebar {
            position: absolute;
            background-color: #388e3c; /* Couleur verte foncée */
            color: #ffffff;
            padding: 20px;
            width: 30%;
            height: 100%;
            box-sizing: border-box;
        }
        .content {
            margin-left: 240px;
            padding: 20px;
            width: 70%;
            box-sizing: border-box;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        li {
            margin-bottom: 10px;
        }
        h1, h2, h3 {
            color: #388e3c; /* Correspond à la couleur de la barre latérale */
        }
        h2 {
            border-bottom: 2px solid #388e3c; /* Correspond à la couleur de la barre latérale */
            padding-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <?php
        include 'C:\xampp\htdocs\generateur_de_CV\server\pages\curiculum.php';
        include 'C:\xampp\htdocs\generateur_de_CV\server\user\services.php';
        $bdd = new PDO('mysql:host=localhost;dbname=database', 'root', '');
        $user = getInfoUserSession($bdd, getUserID());

        $cv = $bdd->prepare("SELECT * FROM cv WHERE User_id=? ORDER BY Cv_id DESC LIMIT 1");
        $cv->execute([getUserID()]);
        $job = $cv->fetch(PDO::FETCH_ASSOC)['Job'];

        while ($row = $user->fetch(PDO::FETCH_ASSOC)) {
//            echo '<img src="votre-photo.jpg" alt="" width="150" height="150" style="border-radius: 50%;">';
            echo "<h1 style='color: white'>". strtoupper($row['Last_name'])." ". $row['First_name'] ."</h1>";
            echo "<h3 style='color: white'>". ucfirst($job) . "</h3>";
            echo "<h2 style='color: white'>Profil</h2>";
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
        $cv = $bdd->prepare("SELECT * FROM cv WHERE User_id=? ORDER BY Cv_id DESC LIMIT 1");
        $cv->execute([getUserID()]);

        while ($row = $cv->fetch(PDO::FETCH_ASSOC)) {
            echo "<p>". $row['Hobbies'] ."</p>";
        }
        ?>

    </div>
</div>
</body>
</html>

