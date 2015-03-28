<?php namespace AngelKurten\LegionGame\Characters;


use AngelKurten\LegionGame\Interfaces\CharacterInterface;
use AngelKurten\LegionGame\Interfaces\WeaponsInterface;
use AngelKurten\LegionGame\Traits\CharacterTrait;
use AngelKurten\LegionGame\Weapons\Gun;

class Soldier implements CharacterInterface{

    use CharacterTrait;

    public function __construct(WeaponsInterface $weapon = null)
    {
        if(is_null($weapon))
        {
            $this->weapon = new Gun();
        }
        else
        {
            $this->weapon = $weapon;
        }

        $this->attack = 25 + $this->weapon->getDamage();
        $this->defense = 40 + $this->weapon->getDamage();
    }
} 