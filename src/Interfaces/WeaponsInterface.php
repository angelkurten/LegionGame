<?php namespace AngelKurten\LegionGame\Interfaces;


interface WeaponsInterface {

    public function attack($off, $target);

    public function getDamage();

} 