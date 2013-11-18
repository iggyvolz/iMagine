<?php

class person
{

	private $creatures;
	public $energy = iMAGINE_STARTING_ENERGY;

	public function __construct()
	{
		if (isset($_SESSION['iMagine'][get_class($this) . 'energy']))
		{
			$this->energy = $_SESSION['iMagine'][get_class($this) . 'energy'];
		}
		$_SESSION['iMagine'][get_class($this) . 'energy'];
	}

	public function __destruct()
	{
		$_SESSION['iMagine'][get_class($this) . 'energy'] = $this->energy;
	}

	public function changeto($args = NULL)
	{
		$_SESSION['iMagine']['me'] = get_class($this);
		$GLOBALS['me'] = get_class($this);
		return array(ucfirst(get_class($this)) . ' is now selected!');
	}

	public function debug($args = NULL)
	{
		if (func_num_args() == 0 AND $_SESSION['iMagine']['debug'])
		{
			return $this->debug_off();
		}
		if (func_num_args() == 0 AND !$_SESSION['iMagine']['debug'])
		{
			return $this->debug_on();
		}
		if ($args[0] == 'on')
		{
			return $this->debug_on();
		}
		if ($args[0] == 'off')
		{
			return $this->debug_off();
		}
		if ($_SESSION['iMagine']['debug'])
		{
			return $this->debug_off();
		}
		if (!$_SESSION['iMagine']['debug'])
		{
			return $this->debug_on();
		}
	}

	private function debug_on($args = NULL)
	{
		$_SESSION['iMagine']['debug'] = TRUE;
		return array('Debug mode is now on.');
	}

	private function debug_off($args = NULL)
	{
		$_SESSION['iMagine']['debug'] = FALSE;
		return array('Debug mode is now off.');
	}

	public function help($args = NULL)
	{
		header('Location: help.php');
		return array('Opened help');
	}

	public function magine($args = NULL)
	{
		$creature = $args[0];
		global $dreamplane;
		if (!$dreamplane->evercontains($creature))
		{
			return array(ucfirst(get_class($this)) . ': What kind of creature is a' . (in_array($creature[0], array('a', 'e', 'i', 'o', 'u')) ? 'n' : '') . ' "' . ucfirst($creature) . '"?');
		}
		if (!in_array($creature, $this->creatures))
		{
			return array(ucfirst(get_class($this)) . ': I can\'t magine ' . ucfirst($creature) . '!');
		}
		if (!$dreamplane->contains($creature))
		{
			return array(ucfirst($creature) . ": Hey! I'm already in battle!");
		}
		if ($this->energy - 100 < 0)
		{
			return array(ucfirst(get_class($this)) . ': I\'m too weak to magine ' . ucfirst($creature) . '!');
		}
		$GLOBALS['dreamplanecontains'] = $dreamplane->contains($creature);
		$dreamplane->deregister($creature);
		$this->energy-=100;
		return array(ucfirst(get_class($this)) . ": With this animite, I magine " . ucfirst($creature) . '!');
	}

	public function register($creature)
	{
		$this->creatures[] = $creature;
	}

	public function reset($args = NULL)
	{
		$args = func_get_args();
		session_destroy();
		init_session();
		define('iMAGINE_REFRESH', TRUE);
		return array('');
	}

}

class tony extends person
{
	// Allows Tony-specific functions to be implimented in later versions
}

class edyn extends person
{
	// Allows Edyn-specific functions to be implimented in later versions
}

class strag extends person
{
	// Allows Strag-specific functions to be implimented in later versions
}
