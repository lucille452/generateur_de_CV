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
    include '../../server/pages/curiculum.php';

    global $bdd;
    $user = $bdd->prepare("SELECT * FROM users WHERE User_id=?");
    $user->execute([getUserID()]);

    while ($row = $user->fetch(PDO::FETCH_ASSOC)) {
        echo "<img>";
        echo "<h1>" . strtoupper($row['Last_name']) . " " . $row['First_name'] . "</h1>";
    }

    $cv = $bdd->prepare("SELECT * FROM cv WHERE User_id=? ORDER BY Cv_id DESC LIMIT 1");
    $cv->execute([getUserID()]);

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
            $user = $bdd->prepare("SELECT * FROM users WHERE User_id=?");
            $user->execute([getUserID()]);
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
    include '../../server/academics/services.php';
    include '../../server/CV/services.php';
    $academics = getAcademicsForCV($bdd);
    showDivAcademicsCV($academics);
    ?>
</section>

<section>
    <h2>Expérience Professionnelle</h2>
    <?php
    include '../../server/experiences/services.php';
    $experiences = getExperiencesForCV($bdd);
    showDivExperiencesCV($experiences);
    ?>
</section>

<section>
    <h2>Loisir</h2>
    <?php
    $cv = $bdd->prepare("SELECT * FROM cv WHERE User_id=? ORDER BY Cv_id DESC LIMIT 1");
    $cv->execute([getUserID()]);

    while ($row = $cv->fetch(PDO::FETCH_ASSOC)) {
        echo "<p>". $row['Hobbies'] ."</p>";
    }
    ?>
</section>
<form action="../../server/toPdf.php" method="post">
<input type="submit" name="submit" value="Télécharger en pdf">
</form>
</body>
</html>

