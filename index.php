<?php

require_once('vendor\autoload.php');

use AngelKurten\LegionGame\Characters\Clown;
use AngelKurten\LegionGame\Container;
use AngelKurten\LegionGame\Interfaces\WeaponsInterface;
use AngelKurten\LegionGame\Characters\Magus;
use AngelKurten\LegionGame\Weapons\Wand;
use AngelKurten\LegionGame\Weapons\Sword;

$app = new Container();

$app->bind('magus', function(Container $app, WeaponsInterface $weapon) {
    return new Magus($weapon);
});

$app->bind('clown', function(Container $app, WeaponsInterface $weapon) {
    return new Clown($weapon);
});

$angel = $app->make('magus', new Wand());
$sebas = $app->make('clown', new Sword());

while(($angel->live()) and ($sebas->live()))
{

    $angel->attack($sebas);
    echo "Angel(".$angel->getLife().") ataca a Sebas(".$sebas->getLife().")";
    echo "<br>";

    $sebas->attack($angel);
    echo "Sebas(".$sebas->getLife().") ataca a Angel(".$angel->getLife().")";
    echo "<br>";
}

