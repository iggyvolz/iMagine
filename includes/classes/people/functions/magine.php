<?php

namespace people_functions;

trait magine
{
	public function magine($dreamcreature=NULL,...$excess)
	{
		global $iMagine;
		$this->energy-=100;
		return [sprintf(\iMagine\_("%s: With this animite, I magine %s!"),ucfirst(explode("\\",get_class($this))[1]),ucfirst($dreamcreature)),ucfirst($dreamcreature).": ".["furok"=>\iMagine\_("Let the fur fly!")][$dreamcreature]];
	}
}
