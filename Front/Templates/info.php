<?php
include "../../server/pages/information.php";
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

    $academics = $bdd->prepare('SELECT * FROM academics WHERE User_id=?');
    $academics->execute([getUserID()]);

    while ($row = $academics->fetch(PDO::FETCH_ASSOC)) {
        echo "<div style='background-color: #1e1e1e; border-radius: 10px; margin-bottom: 10px; display: flex; justify-content: space-around; color: #c5c5c5'><p style='color: #27ae60'>" . $row['Diploma']. "</p>";
        echo "<p>" . $row['Date_start']. "</p>";
        echo "<p>" . $row['Date_end']. "</p>";
        echo "<p>" . $row['School']. "</p>";
        echo "<form action='' method='post'><input type='submit' value='' name='updateAca{$row['Academic_id']}' class='update'>";
        echo "<input type='submit' value='' name='deleteAca{$row['Academic_id']}' class='delete'></div></form>";
        showUpdateAca($bdd, getUserID());
        updateAca($bdd);
        deleteAca($bdd, getUserID());
    }

    ?>
    <h2>Ajouter une formation :</h2>
    <form action="" method="post">

        <label>Diplôme :</label>
        <input name="qualification" type="text" value="<?php echo isset($_POST['qualification']) ? $_POST['qualification'] : ''; ?>"/></br>
        <?php
        if (isset($_POST['formation']) && empty($diploma)) {
            echo "<h10>Champ vide</h10>";
        }
        ?>

        <label>Date :</label>
        <div class="date">
            <p>Du</p>
            <input name="dateStart" type="date" value="<?php echo isset($_POST['dateStart']) ? $_POST['dateStart'] : ''; ?>"/>
            <?php
            if (isset($_POST['formation']) && empty($dateStart)) {
                echo "<h10>Champ vide</h10>";
            }
            ?>
            <p>au</p>
            <input name="dateEnd" type="date" value="<?php echo isset($_POST['dateEnd']) ? $_POST['dateEnd'] : ''; ?>"/>
            <?php
            if (isset($_POST['formation']) && empty($dateEnd)) {
                echo "<h10>Champ vide</h10>";
            }
            ?>
        </div></br>
        <?php
        if (isset($_POST['formation']) && ($_POST['dateStart'] > $_POST['dateEnd']) ) {
            echo "<h10>Ordre des dates invalide</h10>";
        }
        ?>

        <label>Etablissement :</label>
        <input name="school" type="text" value="<?php echo isset($_POST['school']) ? $_POST['school'] : ''; ?>"/></br>
        <?php
        if (isset($_POST['formation']) && empty($school)) {
            echo "<h10>Champ vide</h10>";
        }
        ?><p></p>

        <button type="submit" name="formation">Ajouter</button>
    </form>
</div>
<div class="container">
    <h1>Expériences Professionnelle</h1>
    <!--        list de tous le parcours académique-->
    <?php
    $experiences = $bdd->prepare('SELECT * FROM experiences WHERE User_id=?');
    $experiences->execute([getUserID()]);

    while ($row = $experiences->fetch(PDO::FETCH_ASSOC)) {
        echo "<div style='background-color: #1e1e1e; border-radius: 10px; margin-bottom: 10px; display: flex; justify-content: space-around; color: #c5c5c5'><p style='color: #27ae60'>" . $row['Company']. "</p>";
        echo "<p>" . $row['Date_start']. "</p>";
        echo "<p>" . $row['Date_end']. "</p>";
        echo "<p>" . $row['Job']. "</p>";
        echo "<p>" . $row['Descriptions']. "</p>";
        echo "<form action='' method='post'><input type='submit' value='' name='updateExpe{$row['Experience_id']}' class='update'>";
        echo "<input type='submit' value='' name='deleteExpe{$row['Experience_id']}' class='delete'></div></form>";
        showUpdateExpe($bdd, getUserID());
        updateExpe($bdd);
        deleteExpe($bdd, getUserID());
    }
    ?>
    <h2>Ajouter une expérience :</h2>
    <form action="" method="post">

        <label>Nom de l'entreprise :</label>
        <input name="company" type="text" value="<?php echo isset($_POST['company']) ? $_POST['company'] : ''; ?>"/></br>
        <?php
        if (isset($_POST['pro']) && empty($company)) {
            echo "<h10>Champ vide</h10>";
        }
        ?>

        <label>Durée :</label>
        <div class="date">
            <p>Du</p>
            <input name="dateStart" type="date" value="<?php echo isset($_POST['dateStart']) ? $_POST['dateStart'] : ''; ?>"/>
            <?php
            if (isset($_POST['pro']) && empty($dateStart)) {
                echo "<h10>Champ vide</h10>";
            }
            ?>
            <p>au</p>
            <input name="dateEnd" type="date" value="<?php echo isset($_POST['dateEnd']) ? $_POST['dateEnd'] : ''; ?>"/>
            <?php
            if (isset($_POST['pro']) && empty($dateEnd)) {
                echo "<h10>Champ vide</h10>";
            }
            ?>
        </div></br>
        <?php
        if (isset($_POST['pro']) && ($_POST['dateStart'] > $_POST['dateEnd']) ) {
            echo "<h10>Ordre des dates invalide</h10>";
        }
        ?>

        <label>Poste :</label>
        <input name="job" type="text" value="<?php echo isset($_POST['job']) ? $_POST['job'] : ''; ?>"/></br>
        <?php
        if (isset($_POST['pro']) && empty($job)) {
            echo "<h10>Champ vide</h10>";
        }
        ?>

        <label>Description :</label>
        <input name="descriptions" type="text" value="<?php echo isset($_POST['descriptions']) ? $_POST['descriptions'] : ''; ?>"/></br>
        <?php
        if (isset($_POST['pro']) && empty($descriptions)) {
            echo "<h10>Champ vide</h10>";
        }
        ?><p></p>

        <button type="submit" name="pro">Ajouter</button>
    </form>
</div>
<a href="home1.php">Retour page d'Accueil</a>
</body>
</html>