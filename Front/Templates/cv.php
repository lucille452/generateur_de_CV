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
        require '../../server/information.php';
        $bdd = new PDO('mysql:host=localhost;dbname=database', 'root', '');
        $user = $bdd->prepare('SELECT * FROM users WHERE Username=?');
        $user->execute([$_SESSION['username']]);

        while ($row = $user->fetch(PDO::FETCH_ASSOC)) {
            echo "<p>" . $row['Last_name']. "</p>";
            echo "<p>" . $row['First_name']. "</p>";
            echo "<p>" . $row['Email']. "</p>";
            echo "<p>" . $row['Phone_tel']. "</p>";
            echo "<p>" . $row['Username']. "</p></div>";
        }
        ?>
    </div>
    <section>
        <?php
        $experiences = $bdd->prepare('SELECT * FROM experiences WHERE User_id=?');
        $experiences->execute([GetUserID()]);

        while ($row = $experiences->fetch(PDO::FETCH_ASSOC)) {
            echo "<div><div style='color: white; width: 20vh; margin: 30px; background-color: #2a2a2a; padding: 10px; border-radius: 10px; border: 2px solid #2ecc71; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); text-align: center;'><p style='color: #27ae60'>" . $row['Company']. "</p>";
            echo "<p>" . $row['Date_start']. "</p>";
            echo "<p>" . $row['Date_end']. "</p>";
            echo "<p>" . $row['Job']. "</p>";
            echo "<p>" . $row['Descriptions']. "</p></div>";
            echo "<input type='checkbox'></div>";
        }

        ?>
    </section>

    <section>
        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=database', 'root', '');

        $experiences = $bdd->prepare('SELECT * FROM academics WHERE User_id=?');
        $experiences->execute([GetUserID()]);

        while ($row = $experiences->fetch(PDO::FETCH_ASSOC)) {
            echo "<div><div style='color: white; width: 20vh; margin: 30px; background-color: #2a2a2a; padding: 10px; border-radius: 10px; border: 2px solid #2ecc71; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); text-align: center;'><p style='color: #27ae60'>" . $row['Diploma']. "</p>";
            echo "<p>" . $row['Date_start']. "</p>";
            echo "<p>" . $row['Date_end']. "</p>";
            echo "<p>" . $row['School']. "</p></div>";
            echo "<input type='checkbox'></div>";
        }

        ?>
    </section>
<!--hobbies-->
<!--photo-->
<!--models-->
<!--check to pdf-->

</body>
</html>