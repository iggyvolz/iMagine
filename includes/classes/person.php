<?php

class person
{

	private $fightmon;

	public function __construct()
	{
		if (isset($_SESSION['ftgr'][get_class($this) . 'energy']))
		{
			$this->energy = $_SESSION['ftgr'][get_class($this) . 'energy'];
		}
		$_SESSION['ftgr'][get_class($this) . 'energy'];
	}

	public function __destruct()
	{
		$_SESSION['ftgr'][get_class($this) . 'energy'] = $this->energy;
	}

	public function changeto($args = NULL)
	{
		$_SESSION['ftgr']['me'] = get_class($this);
		$GLOBALS['me'] = get_class($this);
		return array(ucfirst(get_class($this)) . ' is now selected!');
	}

	public function debug($args = NULL)
	{
		if (!FTGR_DEBUG)
		{
			return array(FTGR_DISABLED);
		}
		if (func_num_args() == 0 AND $_SESSION['ftgr']['debug'])
		{
			return $this->debug_off();
		}
		if (func_num_args() == 0 AND !$_SESSION['ftgr']['debug'])
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
		if ($_SESSION['ftgr']['debug'])
		{
			return $this->debug_off();
		}
		if (!$_SESSION['ftgr']['debug'])
		{
			return $this->debug_on();
		}
	}

	private function debug_on($args = NULL)
	{
		$_SESSION['ftgr']['debug'] = TRUE;
		return array(FTGR_DEBUG_ON);
	}

	private function debug_off($args = NULL)
	{
		$_SESSION['ftgr']['debug'] = FALSE;
		return array(FTGR_DEBUG_OFF);
	}

	public function help($args = NULL)
	{
		header('Location: help.php');
		return array(FTGR_OPENED_HELP);
	}

	public function register($fightmon)
	{
		$this->fightmon[] = $fightmon;
	}

	public function reset($args = NULL)
	{
		session_destroy();
		init_session();
		define('FTGR_REFRESH', TRUE);
		return array('');
	}

	public function version($args = NULL)
	{
		$location = $args[0];
		if ($location === NULL || $location == 'local')
		{
			return array(FTGR_CURRENT_VERSION_IS . ' ' . FTGR_VERSION);
		}
		$opts = array(
			'http' => array(
				'method' => "GET",
				'header' => "User-Agent: Fightmon-The-Game-Reemon-" . FTGR_VERSION
			)
		);
		$context = stream_context_create($opts);
		$version = json_decode(file_get_contents('https://api.github.com/repos/iggyvolz/Fightmon-the-Game--Reemon/releases', false, $context), TRUE);
		$latest_of_version = "0.0.0";
		foreach ($version as $value)
		{
			if (version_compare($latest_of_version, $value["tag_name"], '<'))
			{
				if ($location === 'any' OR $location === 'server' OR $location === 'remote')
				{
					$latest_of_version = $value["tag_name"];
					continue;
				}
				if ($location === 'stable')
				{
					if ((strpos($value["tag_name"], 'alpha') === FALSE) AND (strpos($value["tag_name"], 'beta') === FALSE) AND (strpos($value["tag_name"], 'dev') === FALSE))
					{
						$latest_of_version = $value["tag_name"];
						continue;
					}
				}
				if ((strpos($value["tag_name"], $location) !== FALSE) AND in_array($location, array('alpha', 'beta', 'dev')))
				{
					$latest_of_version = $value["tag_name"];
					continue;
				}
			}
		}
		return array($latest_of_version);
	}

}

class nechka extends person
{

	public $energy = FTGR_NECHKA_STARTING_ENERGY;

	// Allows Nechka-specific functions to be implimented in later versions
}

class shade extends person
{

	public $energy = FTGR_SHADE_STARTING_ENERGY;

	// Allows Shade-specific functions to be implimented in later versions
}

class apparition extends person
{

	public $energy = FTGR_APPARITION_STARTING_ENERGY;

	// Allows Apparition-specific functions to be implimented in later versions
}
