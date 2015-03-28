<?php namespace AngelKurten\LegionGame\Traits;


trait WeaponTrait {

    protected $damage;
    protected $defense;

    public function getDamage()
    {
        return $this->damage;
    }

    public function getDefense()
    {
        return $this->defense;
    }

    public function attack($off, $target)
    {
        if($target->getDefense() > $off->getAttack())
        {
            $damage = 10;

            $contra = $off->getLife() - 5;

            $off->setLife($contra);
        }
        else{

            $damage =  $off->getAttack() - $target->getDefense();
        }
        $life = $target->getLife() - $damage;

        $target->setLife($life);
    }

} 