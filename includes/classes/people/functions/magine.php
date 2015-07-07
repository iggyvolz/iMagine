<?php

namespace people_functions;

trait magine
{
	public function magine($person=NULL,$dreamcreature=NULL,...$excess)
	{
		global $iMagine;
		$iMagine->people[$person]->energy-=100;
		return [sprintf(\iMagine\_("%s: With this animite, I magine %s!"),ucfirst($person),ucfirst($dreamcreature)),ucfirst($dreamcreature).": ".["furok"=>\iMagine\_("Let the fur fly!")][$dreamcreature]];
	}
}
