<?php namespace AngelKurten\LegionGame\Traits;


use AngelKurten\LegionGame\Interfaces\WeaponsInterface;

trait CharacterTrait {

    protected $weapon;


    protected $life = 100;
    protected $defense;
    protected $attack;

    public function setWeapon(WeaponsInterface $weapon)
    {
        $this->weapon = $weapon;
    }

    public function setLife($value)
    {
        $this->life = $value;
    }

    public function getLife()
    {
        return $this->life;
    }

    public function getDefense()
    {
        return $this->defense;
    }

    public function getWeapon()
    {
        return $this->weapon;
    }

    public function getAttack()
    {
        return $this->attack;
    }

    public function attack($target)
    {
        return $this->weapon->attack($this, $target);
    }

    public function live()
    {
        if($this->life > 0)
            return true;

        return false;
    }

    public function dead()
    {
        if($this->life < 0)
            return true;

        return false;
    }
} 