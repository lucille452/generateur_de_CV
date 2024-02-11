<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Css/model1.css">
    <meta charset="UTF-8">
    <title>Curriculum Vitae</title>
</head>
<body>

<div class="title">
    <?php
    include '../../server/curiculum.php';

    global $bdd;
    $user = $bdd->prepare("SELECT * FROM users WHERE User_id=?");
    $user->execute([GetUserID()]);

    while ($row = $user->fetch(PDO::FETCH_ASSOC)) {
        echo "<img>";
        echo "<h1>" . strtoupper($row['Last_name']) . " " . $row['First_name'] . "</h1>";
    }

    $cv = $bdd->prepare("SELECT * FROM cv WHERE User_id=? ORDER BY Cv_id DESC LIMIT 1");
    $cv->execute([GetUserID()]);

    while ($row = $cv->fetch(PDO::FETCH_ASSOC)) {
        echo "<p>". ucfirst($row['Job']) ."</p>";
    }
    ?>
</div>

<section>
    <div>
        <h2>Profil</h2>
        <ul>
            <?php
            global $bdd;
            $user = $bdd->prepare("SELECT * FROM users WHERE User_id=?");
            $user->execute([GetUserID()]);
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
    foreach ($_SESSION['listAcademics'] as $academicID) {
        $academics = $bdd->prepare("SELECT * FROM academics WHERE Academic_id=?");
        $academics->execute([$academicID]);
        while ($row = $academics->fetch(PDO::FETCH_ASSOC)) {
            echo "<h3>" . $row['Diploma'] . "</h3>";
            echo "<p><strong>Établissement: </strong>" . $row['School'] . "</p>";
            echo "<p><strong>Date: </strong>" . $row['Date_start'] . " à " . $row['Date_end'] . "</p>";
        }
    }
    ?>
</section>

<section>
    <h2>Expérience Professionnelle</h2>
    <?php
    foreach ($_SESSION['listExperiences'] as $experienceID) {
        $experiences = $bdd->prepare("SELECT * FROM experiences WHERE Experience_id=?");
        $experiences->execute([$experienceID]);
        while ($row = $experiences->fetch(PDO::FETCH_ASSOC)) {
            echo "<h3>" . $row['Job'] . "</h3>";
            echo "<p><strong>Entreprise: </strong>" . $row['Company'] . "</p>";
            echo "<p><strong>Date: </strong>" . $row['Date_start'] . " à " . $row['Date_end'] . "</p>";
            echo "<p><strong>Description: </strong>" . $row['Descriptions'] . "</p>";
        }
    }
    ?>
</section>

<section>
    <h2>Loisir</h2>
    <?php
    global $bdd;
    $cv = $bdd->prepare("SELECT * FROM cv WHERE User_id=? ORDER BY Cv_id DESC LIMIT 1");
    $cv->execute([GetUserID()]);

    while ($row = $cv->fetch(PDO::FETCH_ASSOC)) {
        echo "<p>". $row['Hobbies'] ."</p>";
    }
    ?>
</section>

</body>
</html>

