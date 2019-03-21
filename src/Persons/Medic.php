<?php

namespace App\Persons;

use App\IPerson;

class Medic implements IPerson{

	/*
	 * Medic's maximal health.
	 */
	private $maxHealth = 40;
	
	private $isWarrior = false;
	private $isDead = false;
	private $minHealValue = 10;
	private $maxHealValue = 20;
	private $person;

	public $currentHealth;

	public function __construct(){
		$this->currentHealth = $this->maxHealth;
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

	public function takeDamage($dmg){
		
		if($this->isDead === false)
		{
			$this->currentHealth -= $dmg;

			if($this->currentHealth <= 0)
			{
				$this->setDeadTrue();
			}
		}
	}

	public function healWounded(IPerson $person){
		$person->currentHealth += 5;
	}

	private function setDeadTrue(){
		$this->isDead = true;
	}

	// public function surrender(){

	// }

}