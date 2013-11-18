<?php

if (!isset($_SESSION['iMagine']['init']))
{
	init_session();
}

function init_session()
{
	$_SESSION['iMagine'] = array();
	$_SESSION['iMagine']['me'] = 'tony';
	$_SESSION['iMagine']['debug'] = FALSE;
	$_SESSION['iMagine']['init'] = TRUE;
	$_SESSION['iMagine']['returns'] = array();
	$_SESSION['iMagine']['tonyenergy'] = iMAGINE_STARTING_ENERGY;
	$_SESSION['iMagine']['stragenergy'] = iMAGINE_STARTING_ENERGY;
	$_SESSION['iMagine']['edynenergy'] = iMAGINE_STARTING_ENERGY;
}
