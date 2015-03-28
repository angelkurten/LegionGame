<?php namespace AngelKurten\LegionGame\Interfaces;


interface CharacterInterface {

    public function attack($target);

    public function live();

    public function dead();
} 