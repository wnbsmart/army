<?php

namespace App\Persons;

use App\AbstractWarrior;
use App\IPerson;

class Artilleryman extends AbstractWarrior implements IPerson{

	public function __construct(){

		$this->minDmg = 15;
		$this->maxDmg = 35;
		$this->maxHealth = 70;
		$this->currentHealth = $this->maxHealth;
	}

	/*
	 * Apply damage to someone, with random value.
	 */
	public function applyDamage(){
		return $this->getRandomApplyingDamageValue($this->minDmg, $this->maxDmg);
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
}