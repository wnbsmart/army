<?php

require "vendor/autoload.php";

use App\ArmyFiller;
use App\BattleController;
use App\PersonCreator;
use App\Persons\Artilleryman;
use App\Persons\Cavalryman;
use App\Persons\Infantryman;
use App\Persons\Medic;

	if(isset($_GET['army1']) && isset($_GET['army2'])){

		$army1 = ArmyFiller::fillArmy($_GET['army1']);
		$army2 = ArmyFiller::fillArmy($_GET['army2']);

		$battle = new BattleController($army1, $army2);

		$battle->fight();
	} else {
		echo "Postavi army1 i army2 :)";
		
		echo '<form method="GET" action="'.$_SERVER["PHP_SELF"].'">
				<input type="hidden" name="army1" value="3">
				<input type="hidden" name="army2" value="4"><br><br>
				<input type="submit" value="Ili klikni na mene...">
			</form>';
	}
