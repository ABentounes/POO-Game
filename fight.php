<?php 
session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alley Jousters PHP</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="index.php">
        <button type="submit">Retour</button>
    </form>

</body>

</html>

<?php


if ($_POST['class1'] == 'Adventurer') {
    $player1 = createAdventurer($_POST['player1name']);
} elseif ($_POST['class1'] == 'Assassin') {
    $player1 = createAssassin($_POST['player1name']);
} elseif ($_POST['class1'] == 'Warrior') {
    $player1 = createWarrior($_POST['player1name']);
}

if ($_POST['class2'] == 'Adventurer') {
    $player2 = createAdventurer($_POST['player2name']);
} elseif ($_POST['class2'] == 'Assassin') {
    $player2 = createAssassin($_POST['player2name']);
} elseif ($_POST['class2'] == 'Warrior') {
    $player2 = createWarrior($_POST['player2name']);
}


// var_dump($player1);
// var_dump($player2);


$nbFight = 0;
$fightHistory = [];

if (isset($_SESSION['i']) == false) {
    $_SESSION['i'] = 0;
}   else{
    $j = $_SESSION['i'] + 1;
    $_SESSION['i'] = $j;
    
}
var_dump($_SESSION);

$history = [];


class Character
{
    function __construct($n)
    {
        $this->name = $n;
        $this->Cname = "Aventurer";
        $this->hp = random_int(10, 30);
        $this->damages = random_int(1, 3);
    }
}

class Assassin extends Character
{
    function __construct($n)
    {
        parent::__construct($n);

        $this->Cname = "Assassin";
        $this->damages = random_int(1, 7);
    }
}

class Warrior extends Character
{
    function __construct($n)
    {
        parent::__construct($n);

        $this->Cname = "Warrior";
        $this->hp = random_int(20, 50);
    }
}

function createAdventurer($name)
{
    return new Character($name);
}
function createAssassin($name)
{
    return new Assassin($name);
}
function createWarrior($name)
{
    return new Warrior($name);
}


class fight
{
    static function trigger($a, $b, $idFight, $fightList)
    {
        while ($a->hp > 0 && $b->hp > 0) {
            $initiativeA = random_int(0, 100);
            $initiativeB = random_int(0, 100);
            if ($initiativeA > $initiativeB) {
                $b->hp = $b->hp - $a->damages;
                echo "$a->name frappe $b->name<br>";
            } else {
                $a->hp = $a->hp - $b->damages;
                echo "$b->name frappe $a->name<br>";
            }
        }
        if ($a->hp <= 0) {
            echo "$a->name a perdu";
            $score = 0;
        }
        if ($b->hp <= 0) {
            echo "$b->name a perdu";
            $score = 1;
        }
        $fightList[$idFight] = new fight($a, $b, $score);
        $fightList[$idFight]->name = "$a->name vs $b->name";
        $fightList[$idFight]->Cname = "$a->Cname vs $b->Cname";
        $fightList[$idFight]->figther1 = $a;
        $fightList[$idFight]->figther2 = $b;
        $fightList[$idFight]->score = $score;
        $idFight++;

        return $fightList;
    }
}

$result = fight::trigger($player1, $player2, $nbFight, $fightHistory);

$history[$_SESSION['i']] = $result;

$_SESSION['history'] = $history;
var_dump($result);
?>