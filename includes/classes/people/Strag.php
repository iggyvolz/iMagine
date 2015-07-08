<?php

namespace iMagine;

class Strag extends Person
{
	public function __construct()
	{
		$this->energy=IMAGINE_STRAG_STARTING_ENERGY;
		$this->dreamcreatures=["freep"=>new Freep()];
	}
}
