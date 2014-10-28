<?php

namespace iMagine_functions;

trait __destruct
{
	public function __destruct()
	{
		$_SESSION['iMagine'][explode('\\', get_class($this))[1] . 'energy'] = $this->energy;
	}
}