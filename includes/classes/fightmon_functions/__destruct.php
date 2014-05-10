<?php

namespace ftgr_functions;

trait __destruct
{
	public function __destruct()
	{
		$_SESSION['ftgr'][explode('\\', get_class($this))[1] . 'energy'] = $this->energy;
	}
}