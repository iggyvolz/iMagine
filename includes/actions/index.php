<?php

// Note - This directory is depreciated in favor of /classes.  This directory will be removed in version 0.3
$root = scandir('./includes/actions');
foreach ($root as $value)
{
	if (strpos($value, '.') !== false) // $value is a file
	{
		continue;
	}
	include './includes/actions/' . $value . '/index.php';
	continue;
}