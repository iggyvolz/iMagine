<?php

if (!isset($_SESSION['ftgr']['init']))
{
	init_session();
}

if ($_SESSION['ftgr']['version'] !== FTGR_VERSION)
{
	// We've updated since the user has last visited.  Reset!
	session_destroy();
	init_session();
	define('FTGR_REFRESH', TRUE);
}

function init_session()
{
	$_SESSION['ftgr'] = array();
	$_SESSION['ftgr']['me'] = 'reemon';
	$_SESSION['ftgr']['debug'] = FALSE;
	$_SESSION['ftgr']['init'] = TRUE;
	$_SESSION['ftgr']['returns'] = array();
	$_SESSION['ftgr']['reemonenergy'] = FTGR_REEMON_STARTING_ENERGY;
	$_SESSION['ftgr']['pluffenergy'] = FTGR_PLUFF_STARTING_ENERGY;
	$_SESSION['ftgr']['dragirienergy'] = FTGR_DRAGIRI_STARTING_ENERGY;
	$_SESSION['ftgr']['nightwingenergy'] = FTGR_NIGHTWING_STARTING_ENERGY;
	$_SESSION['ftgr']['reebeeenergy'] = FTGR_REE_BEE_STARTING_ENERGY;
	$_SESSION['ftgr']['ghostslicerenergy'] = FTGR_GHOST_SLICER_STARTING_ENERGY;
	$_SESSION['ftgr']['hartvileenergy'] = FTGR_HARTVILE_STARTING_ENERGY;
	$_SESSION['ftgr']['version'] = FTGR_VERSION;
	$_SESSION['ftgr']['valid_session'] = FTGR_ALLOW_ANY_UPDATE;
}
