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
		if (FTGR_MODE !== 'PY')
		{
			define('FTGR_HELP', TRUE);
			return array(FTGR_OPENED_HELP);
		}
		$contents = file_get_contents(dirname(dirname(__DIR__)) . FTGR_SLASH . 'help.php');
		$contents = itemOf(explode('<BODY>', $contents), 1);
		$contents = itemOf(explode('</BODY>', $contents), 0);
		$contents = strip_tags($contents);
		return array($contents);
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
			return array(FTGR_CURRENT_VERSION_IS . FTGR_VERSION . ', nicknamed "' . FTGR_VERSION_NICKNAME . '".');
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

	public function update($args = NULL)
	{
		global $folder;
		if (!$_SESSION['ftgr']['valid_session'])
		{
			return array(FTGR_UPDATE_REJECT);
		}
		if ($args === 'NULL')
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		$url = trim('http://fightmon.eternityincurakai.com/ftgr-download/' . $args[0] . '.zip');
		$err = isset($php_errormsg) ? $php_errormsg : NULL;
		$contents = @file_get_contents($url);
		$latesterr = isset($php_errormsg) ? $php_errormsg : NULL;
		if ($err !== $latesterr)
		{
			return array(FTGR_NOT_CONNECTED);
		}

		file_put_contents(__DIR__ . FTGR_SLASH . 'ftgr.zip', $contents);
		$zip = new ZipArchive;
		$res = $zip->open(__DIR__ . FTGR_SLASH . 'ftgr.zip');
		if ($res === TRUE)
		{
			$zip->extractTo(__DIR__ . FTGR_SLASH . 'ftgr');
			$zip->close();
		}
		else
		{
			return array(FTGR_UNZIP_FAIL . $res);
		}
		$folder = __DIR__ . FTGR_SLASH . 'ftgr' . FTGR_SLASH . itemOf(scandir(__DIR__ . '/ftgr'), 2);
		$scan = $this->recursive_scandir($folder);
		$return = array();
		foreach ($scan as $value)
		{
			$worked = copy($value, str_replace(FTGR_SLASH . 'includes' . FTGR_SLASH . 'classes' . FTGR_SLASH . 'ftgr' . FTGR_SLASH . 'Fightmon-the-Game--Reemon-dev' . FTGR_SLASH, FTGR_SLASH, $value));
			//$return[] = 'Copying ' . $value . ' to ' . str_replace(FTGR_SLASH .'includes'.FTGR_SLASH .'classes'.FTGR_SLASH .'ftgr'.FTGR_SLASH .'Fightmon-the-Game--Reemon-dev'.FTGR_SLASH, FTGR_SLASH, $value) . ' and it ' . ($worked ? 'worked' : 'did not work'); // For debug purposes
		}
		unlink(__DIR__ . FTGR_SLASH . 'ftgr.zip');
		$this->update_remove_folder(__DIR__ . FTGR_SLASH . 'ftgr');
		//return $return; // For debug purposes
		return FTGR_UPDATE_SUCCESS . str_replace('-', '.', $args[0]);
	}

	public function update_code($args = NULL)
	{
		if ($args === NULL)
		{
			return array(FTGR_REQUIRED_PARAM);
		}
		if ($args[0] === strtolower(FTGR_UPDATE_CODE))
		{
			return array(FTGR_UPDATE_CODE_ACCEPTED);
			$_SESSION['ftgr']['valid_session'] = TRUE;
		}
		return array(FTGR_UPDATE_CODE_DENIED);
	}

	private function recursive_scandir($dir)
	{
		$result = array();
		$root = scandir($dir);
		foreach ($root as $value)
		{
			if ($value === '.' || $value === '..')
			{
				continue;
			}
			if (is_file("$dir" . FTGR_SLASH . "$value"))
			{
				$result[] = "$dir" . FTGR_SLASH . "$value";
				continue;
			}
			foreach ($this->recursive_scandir("$dir" . FTGR_SLASH . "$value") as $value)
			{
				$result[] = $value;
			}
		}
		return $result;
	}

	private function update_remove_folder($dir)
	{
		$files = array_diff(scandir($dir), array('.', '..'));
		foreach ($files as $file)
		{
			(is_dir("$dir" . FTGR_SLASH . "$file")) ? $this->update_remove_folder("$dir" . FTGR_SLASH . "$file") : unlink("$dir" . FTGR_SLASH . "$file");
		}
		return rmdir($dir);
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
