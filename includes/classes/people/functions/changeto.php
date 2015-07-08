<?php

namespace people_functions;

trait changeto
{
	public function changeto(...$excess)
	{
		global $iMagine;
		$iMagine->me = strtolower(explode('\\', get_class($this))[1]);
		return array(sprintf(\iMagine\_('%s is now selected!'), ucfirst(explode('\\', get_class($this))[1])));
	}
}
