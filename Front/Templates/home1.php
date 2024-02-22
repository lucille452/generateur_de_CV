<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Css/home.css">
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>

<body>
<header>
    <!--possibilité de update user-->
    <a href="#profile">
        Profil
    </a>
    <div id="profile" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <header class="clo">
                    <h10>Profil</h10>
                    <a href="#" class="closebtn">×</a>
                </header>
                <div class="container">
                    <?php
                    include '../../server/pages/information.php';
                    include '../../server/user/controllers.php';
                    $bdd = new PDO('mysql:host=localhost;dbname=database', 'root', '');
                    $user = $bdd->prepare('SELECT * FROM users WHERE Username=?');
                    $user->execute([$_SESSION['username']]);

                    while ($row = $user->fetch(PDO::FETCH_ASSOC)) {
                        echo "<p>" . $row['Last_name']. "</p>";
                        echo "<p>" . $row['First_name']. "</p>";
                        echo "<p>" . $row['Email']. "</p>";
                        echo "<p>" . $row['Phone_tel']. "</p>";
                        echo "<p>" . $row['Username']. "</p>";
                        echo "<form action='' method='post'>";
                        echo "<style>
                                .update {
                                    width: 4vh;
                                    height: 4vh;
                                    background-image: url(../../Front/image/crayon.png);
                                    background-size: cover;
                                    background-color: #2a2a2a;
                                    border: none;
                                }

                                .update:hover {
                                    cursor: pointer;
                                }
                        </style><input type='submit' value='' name='updateUser' class='update'></div></form>";

                        showUpdateUserController($bdd, getUserID());
                        updateUserController($bdd);
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
    <!--possibilité de deconnexion-->
    <a href="home.php">
        <img src="../image/deconnexion.png">
    </a>
</header>

<main>
    <section class="section">
        <div class="div">
            <a class="choice" href="info.php">
                <h2>Mes Informations</h2>
            </a>
        </div>
        <!--add cv-->
        <div class="div">
            <a class="choice" href="cv.php">
                <h2>+</h2>
                <h2>Créer CV</h2>
            </a>
        </div>
    </section>
    <!--tous les cv-->
    <h1>Mes CV</h1>
    <!--list/boucle pour afficher tous les cv-->
    <?php
    include '../../server/CV/controllers.php';
    showCvByUser(getUserID(), $bdd);
    delCv($bdd, getUserID());
    ?>
</main>

</body>
</html>
