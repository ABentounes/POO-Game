<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alley Jousters PHP</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form method="post" action="fight.php">
        <h2>Character 1</h2>
        <input type="text" placeholder="Nom du premier Joueur" name="player1name" value="Oui"><br>
        <input type="radio" id="adventurer1" name="class1" value="Adventurer" checked>
        <label for="adventurer1">Adventurer</label>
        <input type="radio" id="assassin1" name="class1" value="Assassin">
        <label for="assassin1">Assassin</label>
        <input type="radio" id="warrior1" name="class1" value="Warrior">
        <label for="warrior1">Warrior</label>
        <br>
        <h2>Character 2</h2>
        <input type="text" placeholder="Nom du second Joueur" name="player2name" value="Non"><br>
        <input type="radio" id="adventurer" name="class2" value="Adventurer" checked>
        <label for="adventurer">Adventurer</label>
        <input type="radio" id="assassin" name="class2" value="Assassin">
        <label for="assassin">Assassin</label>
        <input type="radio" id="warrior" name="class2" value="Warrior">
        <label for="warrior">Warrior</label>
        <br>
        <h2>Fight</h2>
        <input type="submit">
    </form>
</body>

</html>

<?php

var_dump($_SESSION);
?>