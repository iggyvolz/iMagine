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
	$_SESSION['ftgr']['me'] = 'nechka';
	$_SESSION['ftgr']['debug'] = FALSE;
	$_SESSION['ftgr']['init'] = TRUE;
	$_SESSION['ftgr']['returns'] = array();
	$_SESSION['ftgr']['nechkaenergy'] = FTGR_STARTING_ENERGY;
	$_SESSION['ftgr']['shadeenergy'] = FTGR_STARTING_ENERGY;
	$_SESSION['ftgr']['apparitionenergy'] = FTGR_STARTING_ENERGY;
	$_SESSION['ftgr']['version'] = FTGR_VERSION;
}
