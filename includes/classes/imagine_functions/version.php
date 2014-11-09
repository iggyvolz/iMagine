<?php

namespace iMagine_functions;

trait version
{

	public function version($location=NULL,...$excess)
	{
		if ($location === NULL || $location == 'local')
		{
			return array(sprintf(\iMagine\_('Current version is %s.'), IMAGINE_VERSION));
		}
		$opts = array(
			'http' => array(
				'method' => "GET",
				'header' => "User-Agent: iMagine-PHP-version-" . IMAGINE_VERSION
			)
		);
		$context = stream_context_create($opts);
		$version = json_decode(file_get_contents('https://api.github.com/repos/iggyvolz/iMagine-PHP/releases', false, $context), TRUE);
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
					if ((strpos($value["tag_name"], 'alpha') === FALSE) AND ( strpos($value["tag_name"], 'beta') === FALSE) AND ( strpos($value["tag_name"], 'dev') === FALSE))
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
