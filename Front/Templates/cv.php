<?php
include '../../server/pages/curiculum.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Css/cv.css">
    <meta charset="UTF-8">
    <title>Cv</title>
</head>
<body>

    <div class="div">
        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=database', 'root', '');
        $user = $bdd->prepare('SELECT * FROM users WHERE Username=?');
        $user->execute([$_SESSION['username']]);

        while ($row = $user->fetch(PDO::FETCH_ASSOC)) {
            echo "<p>" . $row['Last_name']. "</p>";
            echo "<p>" . $row['First_name']. "</p>";
            echo "<p>" . $row['Email']. "</p>";
            echo "<p>" . $row['Phone_tel']. "</p></div>";
        }
        ?>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
    <section>
        <div>
        <h1>Epxériences Professionnelle</h1>
        </div>
        <div class="info">
        <?php
        $experiences = $bdd->prepare('SELECT * FROM experiences WHERE User_id=?');
        $experiences->execute([getUserID()]);

        while ($row = $experiences->fetch(PDO::FETCH_ASSOC)) {
            echo "<div><div style='color: white; width: 20vh; margin: 30px; background-color: #2a2a2a; padding: 10px; border-radius: 10px; border: 2px solid #2ecc71; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); text-align: center;'><p style='color: #27ae60'>" . $row['Company']. "</p>";
            echo "<p>" . $row['Date_start']. "</p>";
            echo "<p>" . $row['Date_end']. "</p>";
            echo "<p>" . $row['Job']. "</p>";
            echo "<p>" . $row['Descriptions']. "</p></div>";
            $id = $row['Experience_id'];
            echo "<input type='checkbox' name='experience$id'></div>";
        }

        ?>
        </div>
    </section>

    <section>
        <div>
        <h1>Parcours Académique</h1>
        </div>
        <div class="info">
        <?php
        $academics = $bdd->prepare('SELECT * FROM academics WHERE User_id=?');
        $academics->execute([getUserID()]);

        while ($row = $academics->fetch(PDO::FETCH_ASSOC)) {
            echo "<div><div style='color: white; width: 20vh; margin: 30px; background-color: #2a2a2a; padding: 10px; border-radius: 10px; border: 2px solid #2ecc71; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); text-align: center;'><p style='color: #27ae60'>" . $row['Diploma']. "</p>";
            echo "<p>" . $row['Date_start']. "</p>";
            echo "<p>" . $row['Date_end']. "</p>";
            echo "<p>" . $row['School']. "</p></div>";
            $id = $row['Academic_id'];
            echo "<input type='checkbox' name='academic$id'></div>";
        }

        ?>
        </div>
    </section>
    <section class="hobbies info">
        <label>Hobbies</label>
        <input name="hobbies" type="text" value="<?php echo isset($_POST['hobbies']) ? $_POST['hobbies'] : ''; ?>"/>
        <?php
        if (isset($_POST['hobbies']) && empty($hobbies)) {
            echo "<h10>Champ vide</h10>";
        }
        ?>
    </section>
    <section class="hobbies info">
        <label>Job</label>
        <input name="job" type="text" value="<?php echo isset($_POST['job']) ? $_POST['job'] : ''; ?>"/>
        <?php
        if (isset($_POST['job']) && empty($job)) {
            echo "<h10>Champ vide</h10>";
        }
        ?>
    </section>
        <section>
            <div>
                <h1>Modèle CV</h1>
            </div>
            <div class="info">
            <div class="divImage">
                <div>
                    <img src="../image/model1.png">
                </div>
                <input type="radio" value="1" name="model">
            </div>
            <div class="divImage">
                <div>
                    <img src="../image/model2.png">
                </div>
                <input type="radio" value="2" name="model">
            </div>
            <div class="divImage">
                <div>
                    <img src="../image/model3.png">
                </div>
                <input type="radio" value="3" name="model">
            </div>
            </div>
        </section>
        <section class="info">
            <label for="img" class="photo">Selectionner votre photo :  </label>
            <input type="file" id="img" name="img" accept="image/*">
            <input type="submit" name="upload" value="Upload">
        </section>
        <!--check to pdf-->
        <button type="submit" name="submit">Créer le Cv</button>
    </form></br>
    <a href="home1.php">Retour page d'Accueil</a>

</body>
</html>