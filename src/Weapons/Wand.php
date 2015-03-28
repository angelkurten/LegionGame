<?php namespace AngelKurten\LegionGame\Weapons;


use AngelKurten\LegionGame\Interfaces\WeaponsInterface;
use AngelKurten\LegionGame\Traits\WeaponTrait;

class Wand implements WeaponsInterface{

    use WeaponTrait;

    public function __construct()
    {
        $this->damage = 25;
        $this->defense = 40;
    }
} 