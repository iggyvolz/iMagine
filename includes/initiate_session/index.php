<?php

namespace iMagine;

$initial_session = array(
	'me' => 'tony',
	'debug' => FALSE,
	'init' => TRUE,
	'returns' => array(),
	'cutscene' => NULL,
	'tonyenergy' => IMAGINE_TONY_STARTING_ENERGY,
	'edynenergy' => IMAGINE_EDYN_STARTING_ENERGY,
	'stragenergy' => IMAGINE_STRAG_STARTING_ENERGY,
	'version' => IMAGINE_VERSION,
	'valid_session' => IMAGINE_ALLOW_ANY_UPDATE,
);
if (!isset($_SESSION['iMagine']['init']))
{
	$_SESSION['iMagine'] = $initial_session;
}

if ($_SESSION['iMagine']['version'] !== IMAGINE_VERSION)
{
	// We've updated since the user has last visited.  Reset!
	if (IMAGINE_MODE === 'api')
	{
		if (!defined('IMAGINE_NO_OUTPUT'))
		{
			echo 'refresh';
		}
		define('IMAGINE_DIE', true);
	}
	else
	{
		session_destroy();
		session_start();
		$_SESSION['iMagine'] = $initial_session;
	}
}
