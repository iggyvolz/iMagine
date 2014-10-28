<?php

namespace iMagine;

$initial_session = array(
	'me' => 'reemon',
	'debug' => FALSE,
	'init' => TRUE,
	'returns' => array(),
	'cutscene' => NULL,
	'blazerenergy' => IMAGINE_BLAZER_STARTING_ENERGY,
	'curleafenergy' => IMAGINE_CURLEAF_STARTING_ENERGY,
	'dragirienergy' => IMAGINE_DRAGIRI_STARTING_ENERGY,
	'feniixisenergy' => IMAGINE_FENIIXIS_STARTING_ENERGY,
	'fireebeeenergy' => IMAGINE_FIREE_BEE_STARTING_ENERGY,
	'flikeenergy' => IMAGINE_FLIKE_STARTING_ENERGY,
	'ghostslicerenergy' => IMAGINE_GHOST_SLICER_STARTING_ENERGY,
	'hartvileenergy' => IMAGINE_HARTVILE_STARTING_ENERGY,
	'krabulousenergy' => IMAGINE_KRABULOUS_STARTING_ENERGY,
	'nightwingenergy' => IMAGINE_NIGHTWING_STARTING_ENERGY,
	'plantsyenergy' => IMAGINE_PLANTSY_STARTING_ENERGY,
	'pluffenergy' => IMAGINE_PLUFF_STARTING_ENERGY,
	'reebeeenergy' => IMAGINE_REE_BEE_STARTING_ENERGY,
	'reemonenergy' => IMAGINE_REEMON_STARTING_ENERGY,
	'skelestormenergy' => IMAGINE_SKELESTORM_STARTING_ENERGY,
	'strabenergy' => IMAGINE_STRAB_STARTING_ENERGY,
	'version' => IMAGINE_VERSION,
	'valid_session' => IMAGINE_ALLOW_ANY_UPDATE,
);
if (!isset($_SESSION['ftgr']['init']))
{
	$_SESSION['ftgr'] = $initial_session;
}

if ($_SESSION['ftgr']['version'] !== IMAGINE_VERSION)
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
		$_SESSION['ftgr'] = $initial_session;
	}
}
