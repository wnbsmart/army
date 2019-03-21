<?php

namespace App;

interface IPerson{

	/*
	 * Receive damage.
	 */
	public function takeDamage($dmg);

	// Unused method
	// public function surrender();
}