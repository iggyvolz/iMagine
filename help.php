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
	Please note: This program is in development.  The help page may not be completely up-to-date, please <a href="https://github.com/iggyvolz/iMagine/issues">check current issues</a> or, if none exist, <a href="https://github.com/iggyvolz/iMagine/issues/new">add a new one</a>.
	<h2>Setup</h2>
	<p>You need to set up a PHP server (5.4+) to play on.  I highly recommend <a href="http://www.apachefriends.org/en/xampp.html">XAMPP</a>.  Download the iMagine files to (XAMPP install directory)/xamppfiles/htdocs/iMagine.  Open the XAMPP manager and start the Apache module (you can start mySQL and proFTPD, but they are not required).  Then go to http://localhost/iMagine to play.  Some applications, like Skype, Internet Information Services, and many game development softwares use localhost, so you will need to quit these programs completely. On Mac, click and hold the dock icon and press Quit, you may need to confirm.  On Windows, right-click the dock icon and press Quit, you may need to confirm.</p>
	<p>Although this application is written in PHP, it is <em>not</em> recommended that you put this on a production server until a more stable release is out.  There may be server-breaking bugs, and the source code is not tested thoroughly before release to GitHub.  In addition, the documentation is likely to be out of date and functions may change dramatically between releases.  The debug function allows access to all $GLOBALS, and the site is only configured to work on a localhost server.</p>
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
	<h3>Version</h3>
	<p class="italic">Note - Name is optional and will be ignored if included.  Parameter is optional and defaults to local.  If included, it must be one of the following: local, remote, server, any, alpha, beta, dev, stable.</p>
	<p class="italic">Note that this function is under development and may not work properly until completed.</p>
	<p class="italic">Note that this function currently requires the openssl plugin to be installed.  You can do this by configuring PHP with --with-openssl on the end.</p>
	Gives the current version of the project.  Using "local" in parameter or not including it will return the current version, stored under (Fightmon the Game: Reemon root)/includes/constants/index.php as FTGR_VERSION.  Using "remote", "server", or "any" will return the latest GitHub release of any kind.  Using "alpha" returns the latest alpha release, "beta" the latest beta release, and so on with "dev" and "stable".
	<h2>Credit</h2>
	<p>To see all authors of this software, please see the <a href="https://github.com/iggyvolz/Fightmon-the-Game--Reemon">GitHub repository</a></p>
	<p>Fightmon and its respective characters, names, creatures, etc. are property of <a href="http://fightmon.eternityincurakai.com">Fightmon</a>, a division of <a href="https://eternityincurakai.com">Eternity Incurakai</a>.  Fightmon are licensed under the <a href="http://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA license</a>.</p>
	<p>Fightmon the Game: Reemon uses <a href="https://github.com/fryn/html5slider">html5slider</a> - a JS implementation of &lt;input type=range&gt; for Firefox 16 and up, Copyright (c) 2010-2013 Frank Yan, <a href="http://frankyan.com">frankyan.com</a> (only applicable in Firefox)</p>
	<p>This work is licensed under a <a href="http://creativecommons.org/licenses/by/3.0/deed.en_US">Creative Commons Attribution 3.0 Unported License</a>.</p>
	<p>We offer no guarantee or warranty that this software will work as described, or even at all.  We reserve the right to discontinue this software at any time.  You use this software at your own risk, and the software is subject to change dramatically between versions.</p>
</BODY>
