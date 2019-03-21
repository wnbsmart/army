<?php

namespace App\Persons;

use App\AbstractWarrior;
use App\IPerson;

class Cavalryman extends AbstractWarrior implements IPerson{

	private $horseDead = false;

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
		if($this->horseDead === false)
			return $this->getRandomApplyingDamageValue($this->minDmg, $this->maxDmg);
		else return $this->minDmg;
	}

	public function takeDamage($dmg){

		if($this->isDead === false)
		{
			$this->currentHealth -= $dmg;

			if($this->currentHealth <= 35)
				$this->horseDead = true;

			if($this->currentHealth <= 0)
			{
				$this->setDeadTrue();
			}
		}
	}
}