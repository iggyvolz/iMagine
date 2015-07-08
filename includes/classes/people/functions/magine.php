<?php

namespace people_functions;

trait magine
{
	public function magine($dreamcreature=NULL,...$excess)
	{
		global $iMagine;
		if(!isset($this->dreamcreatures[$dreamcreature]))
		{
			return [sprintf(\iMagine\_("%s: Who is %s?"),ucfirst(\iMagine\_(explode("\\",get_class($this))[1])),ucfirst($dreamcreature))];
		}
		if(!$this->dreamcreatures[$dreamcreature]->indreamplane)
		{
			return [sprintf(\iMagine\_("%s: %s is already in battle!"),ucfirst(\iMagine\_(explode("\\",get_class($this))[1])),ucfirst($dreamcreature))];
		}
		if($this->energy<100)
		{
			return [sprintf(\iMagine\_("%s: I don't have enough energy to magine %s!"),ucfirst(\iMagine\_(explode("\\",get_class($this))[1])),ucfirst($dreamcreature))];
		}
		$this->dreamcreatures[$dreamcreature]->indreamplane=false;
		$this->energy-=100;
		return [sprintf(\iMagine\_("%s: With this animite, I magine %s!"),ucfirst(\iMagine\_(explode("\\",get_class($this))[1])),ucfirst($dreamcreature)),ucfirst($dreamcreature).": ".["furok"=>\iMagine\_("Let the fur fly!")][$dreamcreature]];
	}
}
