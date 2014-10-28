<?php

namespace iMagine;

class Edyn extends Person{

// Allows Edyn-specific functions to be implimented in later versions
	public $energy = IMAGINE_EDYN_STARTING_ENERGY;
	public $moves = array();
}
