<?php

namespace ftgr;

$initial_session = array(
	'me' => 'reemon',
	'debug' => FALSE,
	'init' => TRUE,
	'returns' => array(),
	'cutscene' => NULL,
	'blazerenergy' => FTGR_BLAZER_STARTING_ENERGY,
	'curleafenergy' => FTGR_CURLEAF_STARTING_ENERGY,
	'dragirienergy' => FTGR_DRAGIRI_STARTING_ENERGY,
	'feniixisenergy' => FTGR_FENIIXIS_STARTING_ENERGY,
	'fireebeeenergy' => FTGR_FIREE_BEE_STARTING_ENERGY,
	'flikeenergy' => FTGR_FLIKE_STARTING_ENERGY,
	'ghostslicerenergy' => FTGR_GHOST_SLICER_STARTING_ENERGY,
	'hartvileenergy' => FTGR_HARTVILE_STARTING_ENERGY,
	'krabulousenergy' => FTGR_KRABULOUS_STARTING_ENERGY,
	'nightwingenergy' => FTGR_NIGHTWING_STARTING_ENERGY,
	'plantsyenergy' => FTGR_PLANTSY_STARTING_ENERGY,
	'pluffenergy' => FTGR_PLUFF_STARTING_ENERGY,
	'reebeeenergy' => FTGR_REE_BEE_STARTING_ENERGY,
	'reemonenergy' => FTGR_REEMON_STARTING_ENERGY,
	'skelestormenergy' => FTGR_SKELESTORM_STARTING_ENERGY,
	'strabenergy' => FTGR_STRAB_STARTING_ENERGY,
	'version' => FTGR_VERSION,
	'valid_session' => FTGR_ALLOW_ANY_UPDATE,
);
if (!isset($_SESSION['ftgr']['init']))
{
	$_SESSION['ftgr'] = $initial_session;
}

if ($_SESSION['ftgr']['version'] !== FTGR_VERSION)
{
	// We've updated since the user has last visited.  Reset!
	if (FTGR_MODE === 'api')
	{
		if (!defined('FTGR_NO_OUTPUT'))
		{
			echo 'refresh';
		}
		define('FTGR_DIE', true);
	}
	else
	{
		session_destroy();
		session_start();
		$_SESSION['ftgr'] = $initial_session;
	}
}
