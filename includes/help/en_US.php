<HEAD>
	<title>Fightmon the Game: Reemon - Help</title>
	<style>
		.italic
		{
			font-style:italic;
		}
		.passed
		{
			list-style-type:disc;
		}
		.notpassed
		{
			list-style-type: circle;
		}
	</style>
</HEAD>
<BODY>
    <a href="index.php"><- Back to FTG:R</a>
	<?php
	if (version_compare('5.4.0', PHP_VERSION, '>'))
	{
		?>
		<p>WARNING:  You need to use PHP 5.4+ in order to update to 1.x.  We will offer a backwards-compatible version 0.4, 0.5... until July 1st at which point there will be no new features support.</p>
	<?php } ?>
	<h2>Syntax</h2>
	<p>All commands are case-insensitive.  The syntax is: fightmon.action(parameter).  However, the fightmon and/or the parameter can be omitted for some functions.  For example, the function reset requires no name or parameters.  Any of these will do the same thing:<p>
	<ul>
		<li>i.reset()</li>
		<li>i.reset(foo)</li>
		<li>i.reset</li>
		<li>reset()</li>
		<li>reset(foo)</li>
		<li>reset</li>
	</ul>
	<p>As you noticed in the example above, you can use the placeholder i.  This is the fightmon you are currently playing as (you can switch using the switchto command).  You can also refer to anyone by name in the fightmon spot (for example, reemon.reset).</p>
	<h2>Fightmon</h2>
	<h3>Reemon</h3>
	Reemon is the main Fightmon in Fightmon the Game: Reemon.
	For more information about Reemon, see the <a href="http://fightmon.wikia.com/wiki/Reemon">Fightmon Wiki</a>.
	<h3>Pluff</h3>
	For more information about Pluff, see the <a href="http://fightmon.wikia.com/wiki/Pluff">Fightmon Wiki</a>.
	<h3>Dragiri</h3>
	For more information about Dragiri, see the <a href="http://fightmon.wikia.com/wiki/Dragiri">Fightmon Wiki</a>.
	<h3>Nightwing</h3>
	For more information about Nightwing, see the <a href="http://fightmon.wikia.com/wiki/Dragiri">Fightmon Wiki</a>.
	<h3>Ree bee</h3>
	For more information about Ree bee, see the <a href="http://fightmon.wikia.com/wiki/Dragiri">Fightmon Wiki</a>.
	<h3>Ghost slicer</h3>
	For more information about Ghost slicer, see the <a href="http://fightmon.wikia.com/wiki/Dragiri">Fightmon Wiki</a>.
	<h3>Hartvile</h3>
	For more information about Hartvile, see the <a href="http://fightmon.wikia.com/wiki/Dragiri">Fightmon Wiki</a>.
	<h3>Plantsy</h3>
	For more information about Plantsy, see the <a href="http://fightmon.wikia.com/wiki/Dragiri">Fightmon Wiki</a>.
	<h3>Firee bee</h3>
	For more information about Firee bee, see the <a href="http://fightmon.wikia.com/wiki/Dragiri">Fightmon Wiki</a>.
	<h3>Strab</h3>
	For more information about Strab, see the <a href="http://fightmon.wikia.com/wiki/Dragiri">Fightmon Wiki</a>.
	<h3>Krabulous</h3>
	For more information about Krabulous, see the <a href="http://fightmon.wikia.com/wiki/Dragiri">Fightmon Wiki</a>.
	<h3>Blazer</h3>
	For more information about Blazer, see the <a href="http://fightmon.wikia.com/wiki/Dragiri">Fightmon Wiki</a>.
	<h3>Flike</h3>
	For more information about Flike, see the <a href="http://fightmon.wikia.com/wiki/Dragiri">Fightmon Wiki</a>.
	<h3>Feniixis</h3>
	For more information about Feniixis, see the <a href="http://fightmon.wikia.com/wiki/Dragiri">Fightmon Wiki</a>.
	<h3>Curleaf</h3>
	For more information about Curleaf, see the <a href="http://fightmon.wikia.com/wiki/Dragiri">Fightmon Wiki</a>.
	<h3>Skelestorm</h3>
	For more information about Skelestorm, see the <a href="http://fightmon.wikia.com/wiki/Dragiri">Fightmon Wiki</a>.
	<h2>Functions</h2>
	<h3>Changeto</h3>
	<p class="italic">Note - Name is technically optional, but this function is pointless if the name is not included or "i" is used.  Name must be a valid fightmon if included.  Parameters are optional and will be ignored if included.</p>
	This changes the value of the placeholder i (the default if nothing is included) to the fightmon in the name.
	<h3>Debug</h3>
	<p class="italic">Note - Name is optional and will be ignored if included.  Parameter is optional, when excluded it will toggle on/off, when included must be either on or off.</p>
	<p>To debug the software, just type debug.  This will return a dump of all variables.  To turn off, call debug again.</p>
	<p>To specify whether you want debug on or off, call debug(on) (to turn on) or debug(off) (to turn off)</p>
	<h3>Help</h3>
	<p class="italic">Note - Name and parameter are optional and will be ignored if included.</p>
	Shows this help page.
	<h3>Reset</h3>
	<p class="italic">Note - Name and parameter are optional and will be ignored if included.</p>
	Resets the game without warning.
	<h3>Update</h3>
	<p class="italic">Note - Name is optional and will be ignored if included.  Parameter is required and must be a packaged version of Fightmon the Game: Reemon (see <a href="http://fightmon.eternityincurakai.com/fightmon/ftgr/">package list</a>).</p>
	<p class="italic">This feature is in development.  We recommend that you back up your game before using this command.  You can disable its use in /includes/constants.</p>
	<p>Attempts to update the game to the version specified in parameter.  Note that this will reset the game after the next command you enter, and immediately for all other users.</p>
	<p>The parameter is the version number in the form x-y-zextra.  Note that versions are usually in the form x.y.zextra, but the game will mistake the periods for a name.</p>
	<p>A full list of packages is avaliable above (take off the .zip).  Pre-release versions may be out-of-date if they are not updated on the site before you update.</p>
	<p>We reserve the right to take down packages after they go out of date, and we do not guarantee that the site will be up at any given time.</p>
	<h3>Version</h3>
	<p class="italic">Note - Name is optional and will be ignored if included.  Parameter is optional and defaults to local.  If included, it must be one of the following: local, remote, server, any, alpha, beta, dev, stable.</p>
	<p class="italic">Note that this function is under development and may not work properly until completed.</p>
	Gives the current version of the project.  Using "local" in parameter or not including it will return the current version, stored under (Fightmon the Game: Reemon root)/includes/constants/index.php as FTGR_VERSION.  Using "remote", "server", or "any" will return the latest GitHub release of any kind.  Using "alpha" returns the latest alpha release, "beta" the latest beta release, and so on with "dev" and "stable".
	<h2>Credit</h2>
	<p>To see all authors of this software, please see the <a href="https://github.com/iggyvolz/Fightmon-the-Game--Reemon">GitHub repository</a></p>
	<p>Fightmon and its respective characters, names, creatures, etc. are property of <a href="http://fightmon.eternityincurakai.com">Fightmon</a>, a division of <a href="https://eternityincurakai.com">Eternity Incurakai</a>.  Fightmon are licensed under the <a href="http://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA license</a>.</p>
	<p>Fightmon the Game: Reemon uses <a href="https://github.com/fryn/html5slider">html5slider</a> - a JS implementation of &lt;input type=range&gt; for Firefox 16 and up, Copyright (c) 2010-2013 Frank Yan, <a href="http://frankyan.com">frankyan.com</a> (only applicable in Firefox)</p>
	<p>Fightmon the Game: Reemon uses <a href="https://github.com/jquery/jquery">jQuery</a>, licensed under the MIT license.</p>
	<p>This work is licensed under a <a href="http://creativecommons.org/licenses/by/3.0/deed.en_US">Creative Commons Attribution 3.0 Unported License</a>.</p>
	<p>We offer no guarantee or warranty that this software will work as described, or even at all.  We reserve the right to discontinue this software at any time.  You use this software at your own risk, and the software is subject to change dramatically between versions.</p>
</BODY>
