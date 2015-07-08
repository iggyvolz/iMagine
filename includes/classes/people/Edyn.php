<?php

namespace iMagine;

class Edyn extends Person
{
	public function __construct()
	{
		$this->energy=IMAGINE_EDYN_STARTING_ENERGY;
		$this->dreamcreatures=["ugger"=>new Ugger("Edyn")];
	}
}
