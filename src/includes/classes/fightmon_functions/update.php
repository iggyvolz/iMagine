<?php

namespace ftgr_functions;

trait update
{
	public function update($args = NULL)
	{
		return array(\ftgr\_("WARNING - The Update function has been removed until further notice due to changes in FTG:R's structure.  Please check the dev-update branch for development of this feature."));
		if (!$_SESSION['ftgr']['valid_session'])
		{
			return array(\ftgr\_('You cannot update.  Please enter the update code with update_code()'));
		}
		if ($args === 'NULL')
		{
			return array(\ftgr\_('This function requires a parameter.  Please see the documentation.'));
		}
		$url = trim('http://fightmon.eternityincurakai.com/ftgr/' . $args[0] . '.zip');
		$err = isset($php_errormsg) ? $php_errormsg : NULL;
		$contents = @file_get_contents($url);
		$latesterr = isset($php_errormsg) ? $php_errormsg : NULL;
		if ($err !== $latesterr)
		{
			return array(\ftgr\_('Either you are not connected to wi-fi, the Fightmon site is down, or you specified an incorrect version.'));
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
		return array(sprintf(\ftgr\_("Successfully upgraded to version %s."), str_replace('-', '.', $args[0])));
	}
}