<?php

namespace iMagine_functions;

trait magine
{
	public function magine($person=NULL,$dreamcreature=NULL,...$excess)
	{
		$_SESSION["iMagine"][$person."energy"]-=100;
		$GLOBALS[$person]->energy-=100;
		return [sprintf(\_("%s: With this animite, I magine %s!"),ucfirst($person),ucfirst($dreamcreature)),ucfirst($dreamcreature).": ".["furok"=>_("Let the fur fly!")][$dreamcreature]];
	}
}
