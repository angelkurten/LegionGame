<?php namespace AngelKurten\LegionGame\Weapons;


use AngelKurten\LegionGame\Interfaces\WeaponsInterface;
use AngelKurten\LegionGame\Traits\WeaponTrait;

class Sword implements WeaponsInterface{

    use WeaponTrait;

    public function __construct()
    {
        $this->damage = 5;
        $this->defense = 5;
    }
} 