<?php

namespace App\Persons;

use App\AbstractWarrior;
use App\IPerson;

class Infantryman extends AbstractWarrior implements IPerson{

	public function __construct(){

		$this->minDmg = 10;
		$this->maxDmg = 30;
		$this->maxHealth = 50;
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

	// Unused method
	// public function surrender(){
	// 	if(!(mt_rand(0, 10)))
	// 		return "I pooped my pants, I surrender!";

	// 	return "I'm a brave infantry boy";
	// }
}