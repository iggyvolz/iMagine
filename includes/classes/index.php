<?php

namespace iMagine;

require_once realpath(__DIR__ . '/fightmon.php');
require_once realpath(__DIR__ . '/fightmon/index.php');
if (isset($_SESSION['iMagine']['battle']))
{
	$battle = new $_SESSION['iMagine']['battle'];
}
else
{
	$battle = NULL;
}
$fightmon = array('blazer', 'curleaf', 'dragiri', 'feniixis', 'fireebee', 'flike', 'ghostslicer', 'hartvile', 'krabulous', 'nightwing', 'plantsy', 'pluff', 'reemon', 'reebee', 'skelestorm', 'strab');
$blazer = new blazer;
$curleaf = new curleaf;
$dragiri = new dragiri;
$feniixis = new feniixis;
$fireebee = new fireebee;
$flike = new flike;
$ghostslicer = new ghostslicer;
$hartvile = new hartvile;
$krabulous = new krabulous;
$nightwing = new nightwing;
$plantsy = new plantsy;
$pluff = new pluff;
$reemon = new reemon;
$reebee = new reebee;
$skelestorm = new skelestorm;
$strab = new strab;
$me = isset($_SESSION['iMagine']['me']) ? $_SESSION['iMagine']['me'] : _('Reemon');

/*
 * Notes for developers:
 *
 * Any public function can be called by the user at the console.
 * If this is an undesirable behavior, add an _ to the beginning of the function name to exclude it from use.
 *
 * All callable functions should return an array.
 * Each item of the array will be echoed as a new line at the command prompt.
 * To echo nothing, just return array() (not recommended).
 * Keep your arrays under 3 items, we reccommend only 1.
 *
 * Make sure you allow for 1 input by putting function foo($args=NULL) for function foo.
 * Args will always be an array, if nothing is inputted it will be NULL.
 *
 * All input is in lowercase, regardless of original case.
 *
 * If you need $_SESSION storage, pick a shortcode under $_SESSION['iMagine'].
 * First, initialize it by calling if(!isset($_SESSION['iMagine']['myshortcode']) { (code to initialize) }
 * Then, you can read and write to $_SESSION['iMagine']['myshortcode'].
 * Be sure you don't conflict with anyone else's short code.
 *
 * Naming conventions:
 * Alphabetic order always.  If you have a sub-function that applies to one function, append the function name.
 * Like: recursive_scandir is a sub-function of update, so it is named update_recursive_scandir.
 */