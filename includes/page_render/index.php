<?php

register_shutdown_function('page_render_' . FTGR_MODE);

function page_render_normal()
{
	if (defined('FTGR_REFRESH'))
	{
		echo '<HEAD><title>Resetting game, please refresh</title><script>window.onload=function() { location.reload(); };</script></HEAD><BODY>Please reload the page to reset the game.</BODY>';
		die;
	}
	global $debug, $reemon, $pluff, $dragiri, $ghostslicer, $nightwing, $reebee, $hartvile, $plantsy, $fireebee, $strab;
	ob_start();
	require_once __DIR__ . FTGR_SLASH . 'page.html';
	$page = ob_get_contents();
	ob_end_clean();
	$response = _("Welcome to Fightmon the Game: Reemon v") . FTGR_VERSION . _("!");
	$response.=PHP_EOL;
	$response.=_("For help and credits, type help then press enter.");
	if (!empty($_SESSION['ftgr']['returns']))
	{
		foreach ($_SESSION['ftgr']['returns'] as $value)
		{
			$response.=PHP_EOL;
			$response.=$value;
		}
	}
	$replacements = array(
		'<!-- RESPONSE -->' => $response,
		'<!-- ENERGY_DRAGIRI -->' => $dragiri->energy,
		'<!-- ENERGY_FIREEBEE -->' => $fireebee->energy,
		'<!-- ENERGY_GHOSTSLICER -->' => $ghostslicer->energy,
		'<!-- ENERGY_HARTVILE -->' => $hartvile->energy,
		'<!-- ENERGY_NIGHTWING -->' => $nightwing->energy,
		'<!-- ENERGY_PLANTSY -->' => $plantsy->energy,
		'<!-- ENERGY_PLUFF -->' => $pluff->energy,
		'<!-- ENERGY_REEBEE -->' => $reebee->energy,
		'<!-- ENERGY_REEMON -->' => $reemon->energy,
		'<!-- ENERGY_STRAB -->' => $strab->energy,
		'<!-- STARTING_ENERGY_DRAGIRI -->' => FTGR_DRAGIRI_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_FIREEBEE -->' => FTGR_FIREE_BEE_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_GHOSTSLICER -->' => FTGR_GHOST_SLICER_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_HARTVILE -->' => FTGR_HARTVILE_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_NIGHTWING -->' => FTGR_NIGHTWING_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_PLANTSY -->' => FTGR_PLANTSY_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_PLUFF -->' => FTGR_PLUFF_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_REEBEE -->' => FTGR_REE_BEE_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_REEMON -->' => FTGR_REEMON_STARTING_ENERGY,
		'<!-- STARTING_ENERGY_STRAB -->' => FTGR_STRAB_STARTING_ENERGY,
		'<!-- NAME_DRAGIRI -->' => _("Dragiri"),
		'<!-- NAME_FIREEBEE -->' => _("FireeBee"),
		'<!-- NAME_GHOSTSLICER -->' => _("GhostSlicer"),
		'<!-- NAME_HARTVILE -->' => _("Hartvile"),
		'<!-- NAME_NIGHTWING -->' => _("Nightwing"),
		'<!-- NAME_PLANTSY -->' => _("Plantsy"),
		'<!-- NAME_PLUFF -->' => _("Pluff"),
		'<!-- NAME_REEBEE -->' => _("ReeBee"),
		'<!-- NAME_REEMON -->' => _("Reemon"),
		'<!-- NAME_STRAB -->' => _("Strab"),
	);
	$page = str_replace(array_keys($replacements), array_values($replacements), $page);
	echo $page;
}

function page_render_api()
{
	global $debug, $errors, $reemon, $pluff, $dragiri, $ghostslicer, $nightwing, $reebee, $hartvile, $plantsy, $fireebee, $strab;
	if (defined('FTGR_HELP'))
	{
		echo 'help';
		return;
	}
	$response = _("Welcome to Fightmon the Game: Reemon v") . FTGR_VERSION . _("!");
	$response.=PHP_EOL;
	$response.=_("For help and credits, type help then press enter.");
	if (!empty($_SESSION['ftgr']['returns']))
	{
		foreach ($_SESSION['ftgr']['returns'] as $value)
		{
			$response.=PHP_EOL;
			$response.=$value;
		}
	}
	echo json_encode(array(
		'dump' => ($_SESSION['ftgr']['debug'] AND FTGR_DEBUG) ? print_r($GLOBALS, TRUE) : '',
		'dragiri_energy' => $dragiri->energy,
		'fireebee_energy' => $fireebee->energy,
		'ghostslicer_energy' => $ghostslicer->energy,
		'hartvile_energy' => $hartvile->energy,
		'nightwing_energy' => $nightwing->energy,
		'plantsy_energy' => $plantsy->energy,
		'pluff_energy' => $pluff->energy,
		'reebee_energy' => $reebee->energy,
		'reemon_energy' => $reemon->energy,
		'strab_energy' => $strab->energy,
		'response' => $response,
		'errors' => ($errors === array()) ? '' : _("Uh, oh!  There were errors!") . PHP_EOL . (FTGR_DEBUG ? array_to_lines($errors) : _("Errors have been hidden by an administrator, but they may have been logged."))
	));
}
