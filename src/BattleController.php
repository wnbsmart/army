<?php

namespace App;

class BattleController{

	public $army1 = [];
	public $army2 = [];

	// private $size1;
	// private $size2;

	public function __construct($army1, $army2){
		$this->army1 = $army1;
		$this->army2 = $army2;
		// $this->size1 = sizeof($army1);
		// $this->size2 = sizeof($army2);
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

	public function fight(){

		do{
			echo "<br>Army1 size:" . sizeof($this->army1);
			echo "<br>Army2 size:" . sizeof($this->army2);

			if(sizeof($this->army1) === 0 || sizeof($this->army2) === 0)
				break; 

			$randomArmy1Elem = $this->getRandomArmyElement(sizeof($this->army1));
			$randomArmy2Elem = $this->getRandomArmyElement(sizeof($this->army2));
			$army1Person = $this->army1[$randomArmy1Elem]->getPerson();
			$army2Person = $this->army2[$randomArmy2Elem]->getPerson();
			// $army2Person = $this->getArmyPerson($this->army2);
			// $army2Person = $this->army2[$this->getRandomArmyElement(sizeof($this->army2))]->getPerson();
			if($army1Person->isDead === false){
				if($army1Person->isWarrior)
				{
					$army2Person->takeDamage($this->army1[$randomArmy1Elem]->getPerson()->applyDamage());
				} else{
					if(sizeof($this->army1) === 1) // if medic is the only one alive, heal himself
						$army1Person->healWounded($this->army1[$randomArmy1Elem]->getPerson());
					elseif($randomArmy1Elem === 0) // heal closest person to medic, if medic is 0, go to the next element
						$army1Person->healWounded($this->army1[$randomArmy1Elem+1]->getPerson());
					else // medic is not 0, go to the first previous element
						$army1Person->healWounded($this->army1[$randomArmy1Elem-1]->getPerson());
				}
			} else {
				//person is dead, remove from army
				array_splice($this->army1, $randomArmy1Elem);
				// $this->removePersonFromArmy($this->army1, $randomArmy1Elem);
			}

			if($army2Person->isDead === false){
				if($army2Person->isWarrior)
				{
					$army1Person->takeDamage($this->army2[$randomArmy2Elem]->getPerson()->applyDamage());
				} else{
					if(sizeof($this->army2) === 1) // if medic is the only one alive, heal himself
						$army2Person->healWounded($this->army2[$randomArmy2Elem]->getPerson());
					elseif($randomArmy2Elem === 0) // heal closest person to medic, if medic is 0, go to the next element
						$army2Person->healWounded($this->army2[$randomArmy2Elem+1]->getPerson());
					else // medic is not 0, go to the first previous element
						$army2Person->healWounded($this->army2[$randomArmy2Elem-1]->getPerson());
				}
			} else {
				//person is dead, remove from army
				array_splice($this->army2, $randomArmy2Elem);
			}
		}while(true);

		echo "<br><br>Army1 is: " . $this->winLoseStatus($this->army1);
		echo "<br>Army2 is: " . $this->winLoseStatus($this->army2);
	}

	private function getArmyPerson($army = null){
		return $army[$this->getRandomArmyElement(sizeof($army))]->getPerson();
	}

	private function getRandomArmyElement($size){
		// echo
		return mt_rand(0, ($size-1));
	}

	private function removePersonFromArmy($army, $element){
		array_splice($army, $element);
	}

	private function winLoseStatus($army){
		if(sizeof($army) === 0)
			return "LOSER";
		else return "WINNER!";
	}
}