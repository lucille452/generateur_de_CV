<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Curriculum Vitae</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
        }

        h1, h2, h3 {
            color: #4285f4;
        }
        section {
            max-width: 800px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        li {
            margin-bottom: 10px;
        }

        .title {
            text-align: center;
            display: block;
            justify-content: center;
        }

    </style>
</head>
<body>

<div class="title">
    <?php
    require 'C:\xampp\htdocs\generateur_de_CV\server\pages\curiculum.php';
    require 'C:\xampp\htdocs\generateur_de_CV\server\user\services.php';

    $bdd = new PDO('mysql:host=localhost;dbname=database', 'root', '');
    $user = getInfoUserSession($bdd, getUserID());

    while ($row = $user->fetch(PDO::FETCH_ASSOC)) {
        echo "<img>";
        echo "<h1>" . strtoupper($row['Last_name']) . " " . $row['First_name'] . "</h1>";
    }

    $cv = $bdd->prepare("SELECT * FROM cv WHERE User_id=? ORDER BY Cv_id DESC LIMIT 1");
    $cv->execute([getUserID()]);

    while ($rowCV = $cv->fetch(PDO::FETCH_ASSOC)) {
        echo "<p>". ucfirst($rowCV['Job']) ."</p>";
    }
    ?>
</div>

<section>
    <div>
        <h2>Profil</h2>
        <ul>
            <?php
            $user = getInfoUserSession($bdd, getUserID());

            while ($row = $user->fetch(PDO::FETCH_ASSOC)) {
                echo "<li><strong>Téléphone: </strong>" . $row['Phone_tel'] ."</li>";
                echo "<li><strong>Email: </strong>" . $row['Email'] ."</li>";
            }
            ?>
        </ul>
    </div>
</section>

<section>
    <h2>Parcours Académique</h2>
    <?php
    $academics = getAcademicsForCV($bdd, getLastCvId($bdd));
    showDivAcademicsCV($academics);
    ?>
</section>

<section>
    <h2>Expérience Professionnelle</h2>
    <?php
    $experiences = getExperiencesForCV($bdd, getLastCvId($bdd));
    showDivExperiencesCV($experiences);
    ?>
</section>

<section>
    <h2>Loisir</h2>
    <?php
    $cv = $bdd->prepare("SELECT * FROM cv WHERE User_id=? ORDER BY Cv_id DESC LIMIT 1");
    $cv->execute([getUserID()]);
    while ($rowCV = $cv->fetch(PDO::FETCH_ASSOC)) {
        echo "<p>". $rowCV['Hobbies'] ."</p>";
    }
    ?>
</section>
</body>
</html>

