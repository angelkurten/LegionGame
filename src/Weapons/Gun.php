<?php namespace AngelKurten\LegionGame\Weapons;


use AngelKurten\LegionGame\Interfaces\WeaponsInterface;
use AngelKurten\LegionGame\Traits\WeaponTrait;

class Gun implements WeaponsInterface{

    use WeaponTrait;

    public function __construct()
    {
        $this->damage = 20;
        $this->defense = 30;
    }


} 