<?php

namespace ftgr;

class fightmon
{

// public $moves=array(); // Defined in extended class
	public function __construct()
	{
		if (isset($_SESSION['ftgr'][explode('\\', get_class($this))[1] . 'energy']))
		{
			$this->energy = $_SESSION['ftgr'][explode('\\', get_class($this))[1] . 'energy'];
		}
		$_SESSION['ftgr'][explode('\\', get_class($this))[1] . 'energy'];
	}

	public function __destruct()
	{
		$_SESSION['ftgr'][explode('\\', get_class($this))[1] . 'energy'] = $this->energy;
	}

	public function changeto($args = NULL)
	{
		$_SESSION['ftgr']['me'] = explode('\\', get_class($this))[1];
		$GLOBALS['me'] = explode('\\', get_class($this))[1];
		return array(ucfirst(explode('\\', get_class($this))[1]) . ' ' . _('is now selected!'));
	}

	public function cutscene($args = NULL) // Public wrapper for _cutscene, delete before production
	{
		call_user_func(array($this, '_cutscene'), $args);
		return array(str_replace(array('%1'), array(htmlentities($args[0], ENT_QUOTES)), _('Calling cutscene "%1"')));
	}

	public function _cutscene($args = NULL)
	{
		$_SESSION['ftgr']['cutscene'] = $args[0];
		define('FTGR_SHOW_CUTSCENE', TRUE);
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
				return array(str_replace(array('%1', '%2'), array(ucfirst(explode('\\', get_class($this))[1]), $name), _('%1 used %2!')));
			}
			else
			{
				return array(str_replace(array('%1', '%2'), array(ucfirst(explode('\\', get_class($this))[1]), $name), _('%1 used %2 and it missed!')));
			}
		}
		if (rand(1, 100) <= $accuracy)
		{
			return array(str_replace(array('%1', '%2', '%3', '%4'), array(ucfirst(explode('\\', get_class($this))[1]), $name, $power, ucfirst($target)), _('%1 used %2 and caused %3 damage on %4')));
		}
		else
		{
			return array(str_replace(array('%1', '%2', '%3'), array(ucfirst(explode('\\', get_class($this))[1]), $name, ucfirst($target)), _('%1 used %2 on %3 and it missed!')));
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

	public function reset_battle($args = NULL)
	{
		$GLOBALS['battle'] = NULL;
		$_SESSION['ftgr']['battle'] = NULL;
		return array(_('Successfully reset battle!'));
	}

	public function update($args = NULL)
	{
		return array(_("WARNING - The Update function has been removed until further notice due to changes in FTG:R's structure.  Please check the dev-update branch for development of this feature."));
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
		file_put_contents(realpath(__DIR__ . '/ftgr.zip'), $contents);
		$zip = new ZipArchive;
		$res = $zip->open(__DIR__ . realpath('/ftgr.zip'));
		if ($res === TRUE)
		{
			$zip->extractTo(__DIR__ . realpath('/ftgr'));
			$zip->close();
		}
		else
		{
			return array(FTGR_UNZIP_FAIL . $res);
		}
		$folder = realpath(__DIR__ . '/ftgr/') . scandir(realpath(__DIR__ . '/ftgr'))[2];
		$scan = $this->update_recursive_scandir($folder);
		$return = array();
		foreach ($scan as $value)
		{
			$worked = copy($value, str_replace(realpath(__DIR__ . '/includes/classes/ftgr/Fightmon-the-Game--Reemon-dev/'), realpath(__DIR__ . '/' . $value)));
		}
		unlink(realpath(__DIR__ . '/ftgr.zip'));
		$this->update_remove_folder(realpath(__DIR__ . '/ftgr'));
		return array(str_replace(array('%1'), array(str_replace('-', '.', $args[0])), _('Successfully upgraded to version %1.')));
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
			if (is_file(realpath("$dir/$value")))
			{
				$result[] = realpath($dir / $value);
				continue;
			}
			foreach ($this->update_recursive_scandir(realpath("$dir/$value")) as $value)
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
			(is_dir(realpath("$dir/$file"))) ? $this->update_remove_folder(realpath("$dir/$file")) : unlink(realpath("$dir/$file"));
		}
		return rmdir($dir);
	}

	public function version($args = NULL)
	{
		$location = $args[0];
		if ($location === NULL || $location == 'local')
		{
			return array(str_replace(array('%1'), array(FTGR_VERSION), _('Current version is %1.')));
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
