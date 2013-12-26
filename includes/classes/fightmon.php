<?php

class fightmon
{

// public $moves=array(); // Defined in extended class
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
		return array(ucfirst(get_class($this)) . ' ' . _('is now selected!'));
	}

	public function debug($args = NULL)
	{
		if (!FTGR_DEBUG)
		{
			return array(_('Sorry, debug mode has been disabled by an administrator.'));
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
		return array(_('Debug mode is now on.'));
	}

	private function debug_off($args = NULL)
	{
		$_SESSION['ftgr']['debug'] = FALSE;
		return array(_('Debug mode is now off.'));
	}

	public function help($args = NULL)
	{
		define('FTGR_HELP', TRUE);
		return array(_('Opened help.'));
	}

	public function mock_battle($args = NULL)
	{
		global $battle, $avaliable_battles;
		if (isset($args[0]) && in_array($args[0], $avaliable_battles))
		{
			$_SESSION['ftgr']['battle'] = $args[0];
			return array(_('Battle') . ' ' . $args[0] . ' ' . _('now loaded') . _('!'));
		}
		return array(_('Error: Invalid battle'));
	}

	public function _move($name, $power, $accuracy, $target = NULL)
	{
		if ($target === NULL)
		{
			if (rand(1, 100) <= $accuracy)
			{
				return array(ucfirst(get_class($this)) . ' ' . _('used') . ' ' . $name . _('!'));
			}
			else
			{
				return array(ucfirst(get_class($this)) . ' ' . _('used') . ' ' . $name . ' ' . _('and it missed!'));
			}
		}
		if (rand(1, 100) <= $accuracy)
		{
			return array(ucfirst(get_class($this)) . ' ' . _('used') . ' ' . $name . ' ' . _('and caused') . ' ' . $power . ' ' . _('damage on') . ' ' . ucfirst($target));
		}
		else
		{
			return array(ucfirst(get_class($this)) . ' ' . _('used') . ' ' . $name . ' ' . _('on') . ' ' . ucfirst($target) . ' ' . _('and it missed!'));
		}
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

	public function update($args = NULL)
	{
		if (!$_SESSION['ftgr']['valid_session'])
		{
			return array(_('You cannot update.  Please enter the update code with update_code()'));
		}
		if ($args === 'NULL')
		{
			return array(_('This function requires a parameter.  Please see the documentation.'));
		}
		$url = trim('http://fightmon.eternityincurakai.com/ftgr/' . $args[0] . '.zip');
		$err = isset($php_errormsg) ? $php_errormsg : NULL;
		$contents = @file_get_contents($url);
		$latesterr = isset($php_errormsg) ? $php_errormsg : NULL;
		if ($err !== $latesterr)
		{
			return array(_('Either you are not connected to wi-fi, the Fightmon site is down, or you specified an incorrect version.'));
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
		$scan = $this->update_recursive_scandir($folder);
		$return = array();
		foreach ($scan as $value)
		{
			$worked = copy($value, str_replace(FTGR_SLASH . 'includes' . FTGR_SLASH . 'classes' . FTGR_SLASH . 'ftgr' . FTGR_SLASH . 'Fightmon-the-Game--Reemon-dev' . FTGR_SLASH, FTGR_SLASH, $value));
//$return[] = 'Copying ' . $value . ' to ' . str_replace(FTGR_SLASH .'includes'.FTGR_SLASH .'classes'.FTGR_SLASH .'ftgr'.FTGR_SLASH .'Fightmon-the-Game--Reemon-dev'.FTGR_SLASH, FTGR_SLASH, $value) . ' and it ' . ($worked ? 'worked' : 'did not work'); // For debug purposes
		}
		unlink(__DIR__ . FTGR_SLASH . 'ftgr.zip');
		$this->update_remove_folder(__DIR__ . FTGR_SLASH . 'ftgr');
//return $return; // For debug purposes
		return _('Successfully upgraded to version') . ' ' . str_replace('-', '.', $args[0]);
	}

	public function update_code($args = NULL)
	{
		if ($args === NULL)
		{
			return array(_('This function requires a parameter.  Please see the documentation.'));
		}
		if ($args[0] === strtolower(FTGR_UPDATE_CODE))
		{
			return array(_('Your update code has been accepted.  Please proceed with update.'));
			$_SESSION['ftgr']['valid_session'] = TRUE;
		}
		return array(_('Your update code has been denied.  Please ensure you typed it correctly.'));
	}

	private function update_recursive_scandir($dir)
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
			foreach ($this->update_recursive_scandir("$dir" . FTGR_SLASH . "$value") as $value)
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

	public function version($args = NULL)
	{
		$location = $args[0];
		if ($location === NULL || $location == 'local')
		{
			return array(_('Current version is') . ' ' . FTGR_VERSION);
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
