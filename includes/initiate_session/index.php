<?php

if (!isset($_SESSION['ftgr']['init']))
{
	init_session();
}

if ($_SESSION['ftgr']['version'] !== FTGR_VERSION)
{
	// We've updated since the user has last visited.  Reset! 
	if (FTGR_MODE === 'api')
	{
		die('refresh');
	}
	else
	{
		session_destroy();
		init_session();
	}
}

function init_session()
{
	$_SESSION['ftgr'] = array();
	$_SESSION['ftgr']['me'] = 'nechka';
	$_SESSION['ftgr']['debug'] = FALSE;
	$_SESSION['ftgr']['init'] = TRUE;
	$_SESSION['ftgr']['returns'] = array();
	$_SESSION['ftgr']['nechkaenergy'] = FTGR_NECHKA_STARTING_ENERGY;
	$_SESSION['ftgr']['shadeenergy'] = FTGR_SHADE_STARTING_ENERGY;
	$_SESSION['ftgr']['apparitionenergy'] = FTGR_APPARITION_STARTING_ENERGY;
	$_SESSION['ftgr']['reemonenergy'] = FTGR_REEMON_STARTING_ENERGY;
	$_SESSION['ftgr']['pluffenergy'] = FTGR_PLUFF_STARTING_ENERGY;
	$_SESSION['ftgr']['dragirienergy'] = FTGR_DRAGIRI_STARTING_ENERGY;
	$_SESSION['ftgr']['version'] = FTGR_VERSION;
	$_SESSION['ftgr']['valid_session'] = FTGR_ALLOW_ANY_UPDATE;
}
