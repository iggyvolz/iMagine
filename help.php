<HEAD>
	<title>Fightmon the Game: Reemon - Help</title>
	<style>
		.italic
		{
			font-style:italic;
		}
	</style>
</HEAD>
<BODY>
	<a href="index.php">&lt;- Back to FTG:R</a>
	<p>Please note that the next version (0.3) goes through some major overhaul, including changing the main characters to Fightmon.</p>
	<h2>Syntax</h2>
	<p>All commands are case-insensitive.  The syntax is: person.action(parameter).  However, the person and/or the parameter can be omitted for some functions.  For example, the function reset requires no name or parameters.  Any of these will do the same thing:<p>
	<ul>
		<li>i.reset()</li>
		<li>i.reset(foo)</li>
		<li>i.reset</li>
		<li>reset()</li>
		<li>reset(foo)</li>
		<li>reset</li>
	</ul>
	<p>As you noticed in the example above, you can use the person i.  This is the person you are currently playing as (you can switch using the switchto command).  You can also refer to anyone by name in the person spot (for example, nechka.reset).</p>
	<h2>People</h2>
	<h3>Nechka</h3>
	Nechka is selected by default.  For more information, see the <a href="http://fightmon.wikia.com/wiki/Nechka">Fightmon Wiki</a>.
	<h4>Reemon</h4>
	Reemon is a placeholder Fightmon for Nechka.  Nechka may or may not have a Reemon, we're just using it in order to develop the fightmon-related features.
	For more information about Reemon, see the <a href="http://fightmon.wikia.com/wiki/Reemon">Fightmon Wiki</a>.
	<h3>Shade</h3>
	For more information, see the <a href="http://fightmon.wikia.com/wiki/Shade">Fightmon Wiki</a>.
	<h4>Pluff</h4>
	Pluff is a placeholder Fightmon for Shade.  Shade may or may not have a Pluff, we're just using it in order to develop the fightmon-related features.
	For more information about Pluff, see the <a href="http://fightmon.wikia.com/wiki/Pluff">Fightmon Wiki</a>.
	<h3>Apparition</h3>
	For more information, see the <a href="http://fightmon.wikia.com/wiki/Apparition">Fightmon Wiki</a>.
	<h4>Dragiri</h4>
	Dragiri is a placeholder Fightmon for Apparition.  Apparition may or may not have a Dragiri, we're just using it in order to develop the fightmon-related features.
	For more information about Dragiri, see the <a href="http://fightmon.wikia.com/wiki/Dragiri">Fightmon Wiki</a>.
	<h2>Functions</h2>
	<h3>Changeto</h3>
	<p class="italic">Note - Name is technically optional, but this function is pointless if the name is not included or "i" is used.  Name must be a valid person.  Parameters are optional and will be ignored if included.</p>
	This changes the value of the person i (or no person) to the person in the name.
	<h3>Debug</h3>
	<p class="italic">Note - Name is optional and will be ignored if included.  Parameter is optional, when excluded it will toggle on/off, when included must be either on or off.</p>
	To debug the software, just type debug.  This will return a dump of all variables.  To turn off, call debug again.
	<h3>Help</h3>
	<p class="italic">Note - Name and parameter are optional and will be ignored if included.</p>
	Shows this help page.
	<h3>Reset</h3>
	<p class="italic">Note - Name and parameter are optional and will be ignored if included.</p>
	Resets the game without warning.  Note that without Javascript enabled you will be forced to refresh the page.
	<h3>Update</h3>
	<p class="italic">Note - Name is optional and will be ignored if included.  Parameter is required and must be a packaged version of Fightmon the Game: Reemon (see <a href="http://fightmon.eternityincurakai.com/ftgr-vers/">package list</a>).</p>
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
	<p>Fightmon the Game: Reemon uses <a href="https://github.com/douglascrockford/JSON-js">JSON-js</a>, an implementation of JSON, only used if not implemented by the browser.  Public domain software.</p>
	<p>This work is licensed under a <a href="http://creativecommons.org/licenses/by/3.0/deed.en_US">Creative Commons Attribution 3.0 Unported License</a>.</p>
	<p>We offer no guarantee or warranty that this software will work as described, or even at all.  We reserve the right to discontinue this software at any time.  You use this software at your own risk, and the software is subject to change dramatically between versions.</p>
	<h2>Put this on your own website</h2>
	<p>If you would like to put this game on your own website, feel free!  Download the source <a href="https://github.com/iggyvolz/Fightmon-the-Game--Reemon">here</a> and upload it to your PHP site.  Feel free to contact us with any questions, either by posting an issue at <a href='https://github.com/iggyvolz/Fightmon-the-Game--Reemon/issues'>GitHub</a> or at the <a href='http://fightmon.wikia.com/wiki/Special:Forum'>wiki</a>.</p>
	<h2>Reporting bugs</h2>
	<p>If you find a bug in the software, please post it on <a href='https://github.com/iggyvolz/Fightmon-the-Game--Reemon/issues'>GitHub</a>.  Please check existing issues to see if it has been fixed or it is pending fix in a new version if possible.</p>
</BODY>
