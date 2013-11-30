<?php

require_once __DIR__ . FTGR_SLASH . 'person.php';
require_once __DIR__ . FTGR_SLASH . 'fightmon.php';
$nechka = new nechka;
$shade = new shade;
$apparition = new apparition;
$reemon = new reemon;
$pluff = new pluff;
$dragiri = new dragiri;
$me = isset($_SESSION['ftgr']['me']) ? $_SESSION['ftgr']['me'] : 'Nechka';

/*
 * Notes for developers:
 *
 * Any public function can be called by the user at the console.
 * If this is an undesirable behavior, add an _ to the beginning of the function name to exclude it from use.
 *
 * All callable functions should return an array.
 * Each item of the array will be echoed as a new line at the command prompt.
 * To echo nothing, just return array().
 * Keep your arrays under 3 items, we reccommend only 1.
 *
 * Make sure you allow for 1 input by putting function foo($args=NULL) for function foo.
 * Args will always be a string, if nothing is inputted it will be NULL.
 *
 * All input is in lowercase, regardless of original case.
 *
 * If you need $_SESSION storage, pick a shortcode under $_SESSION['ftgr'].
 * First, initialize it by calling if(!isset($_SESSION['ftgr']['myshortcode']) { (code to initialize) }
 * Then, you can read and write to $_SESSION['ftgr']['myshortcode'].
 * Be sure you don't conflict with anyone else's short code.
 */