<?php

namespace App;

// use App\Persons\Infantryman;
// use App\Persons\Cavalryman;
// use App\Persons\Artilleryman;
// use App\Persons\Medic;

class PersonCreator{
	
	private $person;

	public function __construct(IPerson $person){
		$this->person = $person;
	}

	public function getPerson(){
		return $this->person;
	}
}