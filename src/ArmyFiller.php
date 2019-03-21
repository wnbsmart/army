<?php

namespace App;

use App\Persons\Infantryman;
use App\Persons\Cavalryman;
use App\Persons\Artilleryman;
use App\Persons\Medic;

class ArmyFiller{
	
	public static $army = [];

	/*
	 * Fill array with Persons.
	 */
	public static function fillArmy($size){
		for($i = 0; $i < $size; $i++)
		{
			self::$army[$i] = new PersonCreator(self::getRandomPerson());
		}

		return self::$army;
	}

	public static function getRandomPerson(){
		$warriorsArray  = [new Artilleryman, new Cavalryman, new Infantryman, new Medic];
		$randomWarrior = mt_rand(0, count($warriorsArray) - 1);
		return $warriorsArray[$randomWarrior];
	}
}