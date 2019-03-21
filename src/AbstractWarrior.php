<?php

namespace App;

abstract class AbstractWarrior{

	/*
	 * Warrior's minimal damage to be applied.
	 */
	protected $minDmg;

	/*
	 * Warrior's maximal damage to be applied.
	 */
	protected $maxDmg;

	/*
	 * Warrior's maximal health.
	 */
	protected $maxHealth;

	public $currentHealth;
	protected $isWarrior = true;
	protected $isDead = false;

	abstract public function applyDamage();

	/*
	 * Random damage value to be applied to someone.
	 */
	protected function getRandomApplyingDamageValue($minDmg, $maxDmg){
		return mt_rand($minDmg, $maxDmg);
	}

	protected function setDeadTrue(){
		$this->isDead = true;
	}

	public function __get($property) {
            if (property_exists($this, $property)) {
                return $this->$property;
            }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
}