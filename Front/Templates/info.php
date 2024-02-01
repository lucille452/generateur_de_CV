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
    <h2>Ajouter une formation :</h2>
    <form action="file.php" method="post">

        <label>Diplôme :</label>
        <input name="qualification" type="text" />

        <label>Date :</label>
        <div class="date">
            <p>Du</p>
            <input name="dateStart" type="date">
            <p>au</p>
            <input name="dateEnd" type="date" />
        </div>

        <label>Etablissement :</label>
        <input name="school" type="text" /></p>

        <button type="submit">Ajouter</button>
    </form>
</div>
<div class="container">
    <h1>Expériences Professionnelle</h1>
    <!--        list de tous le parcours académique-->
    <h2>Ajouter une expérience :</h2>
    <form action="file.php" method="post">

        <label>Nom de l'entreprise :</label>
        <input name="company" type="text" />

        <label>Durée :</label>
        <div class="date">
            <p>Du</p>
            <input name="dateStart" type="date">
            <p>au</p>
            <input name="dateEnd" type="date" />
        </div>
        <label>Poste :</label>
        <input name="post" type="text" />

        <label>Description :</label>
        <input name="descriptions" type="text" /></p>

        <button type="submit">Ajouter</button>
    </form>
</div>
<a href="home.php">Retour page d'Accueil</a>
</body>
</html>