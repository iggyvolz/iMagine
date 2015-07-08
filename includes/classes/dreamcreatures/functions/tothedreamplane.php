<?php

namespace dream_creature_functions;

trait tothedreamplane
{
	public function tothedreamplane(...$excess)
	{
		if($this->indreamplane)
		{
			return [sprintf(\iMagine\_("%s: %s is already in the dream plane!"),\iMagine\_(ucfirst($this->owner)),\iMagine\_(ucfirst(explode("\\",get_class($this))[1])))];
		}
		$this->indreamplane=true;
		return [sprintf(\iMagine\_("%s: %s, to the dream plane!"),\iMagine\_(ucfirst($this->owner)),\iMagine\_(ucfirst(explode("\\",get_class($this))[1])))];
	}
}
