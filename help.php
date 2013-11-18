<HEAD>
	<title>iMagine - Help</title>
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
	<p>You need to set up a PHP server to play on.  I highly recommend <a href="http://www.apachefriends.org/en/xampp.html">XAMPP</a>.  Download the iMagine files to (XAMPP install directory)/xamppfiles/htdocs/iMagine.  Open the XAMPP manager and start the Apache module (you can start mySQL and proFTPD, but they are not required).  Then go to http://localhost/iMagine to play.  Some applications, like Skype, Internet Information Services, and many game development softwares use localhost, so you will need to quit these programs completely. On Mac, click and hold the dock icon and press Quit, you may need to confirm.  On Windows, right-click the dock icon and press Quit, you may need to confirm.</p>
	<p>Although this application is written in PHP, it is <em>not</em> recommended that you put this on a production server until a more stable release is out.  There may be server-breaking bugs, and the source code is not tested thoroughly before release to GitHub.  In addition, the documentation is likely to be out of date and functions may change dramatically between releases.</p>
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
	<p>As you noticed in the example above, you can use the person i.  This is the person you are currently playing as (you can switch using the switchto command).  You can also refer to anyone by name in the person spot (for example, tony.reset).</p>
	<h2>People</h2>
	<h3>Tony</h3>
	Tony is selected by default.  For more info, see the <a href="http://magination.wikia.com/wiki/Tony_Jones_(TV_Series)">Magi Nation Wiki</a>.
	<h4>Furok</h4>
	Furok is Tony's main dream creature and the only one currently implemented in the game.
	<h3>Edyn</h3>
	For more info, see the <a href="http://magination.wikia.com/wiki/Edyn">Magi Nation Wiki</a>.
	<h4>Ugger</h4>
	Ugger is Edyn's main dream creature and the only one currently implemented in the game.
	<h3>Strag</h3>
	For more info, see the <a href="http://magination.wikia.com/wiki/Strag">Magi Nation Wiki</a>.
	<h4>Freep</h4>
	Freep is Strag's main dream creature and the only one currently implemented in the game.
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
	<h3>Magine</h3>
	<p class="italic">Note - Name is optional, defaulting to "i".  If included, it must be a valid person.  Parameter is required to be a valid dream creature that is owned by the person listed in name and be in the dream plane before being magined.  In addition, the person must have at least 100 energy to spend on magining the dream creature.</p>
	This "magines" a Dream Creature.  It costs 100 energy (subject to change).  It brings the Dream Creature in parameter from the Dream Plane (where they rest) to the real world, where they can fight (coming soon).  For more info, see the <a href="http://magination.wikia.com/wiki/Animite#In_the_TV_Series">Magi Nation Wiki</a>.  Person must be a valid person.  Parameter must be a Dream Creature that is in the Dream Plane.  Person must have Parameter's Animite (the stone used to magine dream creatures), that is, you cannot magine someone else's Dream Creature.
	<h3>Reset</h3>
	<p class="italic">Note - Name and parameter are optional and will be ignored if included.</p>
	Resets the game without warning.  Note that without Javascript enabled you will be forced to refresh the page.
	<h3>ToTheDreamPlane</h3>
	<p class="italic">Note - Name is required to be a valid dream creature that is in battle before this action is called.  Parameter is optional and will be ignored if included.</p>
	This returns a Dream Creature to the Dream Plane.  For more info, see the <a href="http://magination.wikia.com/wiki/Animite#In_the_TV_Series">Magi Nation Wiki</a>.  Person must be a Dream Creature that is active (not in the Dream Plane).  Parameter is ignored.
	<h2>Credit</h2>
	<p>To see all authors of this software, please see the <a href="http://github.com/iggyvolz/iMagine">GitHub repository</a></p>
	<p>Magi-Nation and its respective characters, names, spells, etc. are copyrighted by Interactive Imagination Corporation, 2i, and Cookie Jar Entertainment. This game was created in the fan base and claims no affiliation with the copyright holders.</p>
	<p>A considerable amount of information for the game is taken from the <a href="http://magination.wikia.com/">Magi Nation Wiki</a>, including names of characters, statistics, plot line summaries, etc.  These are copyright of Interactive Imagination Corporation, 2i, and Cookie Jar Entertainment (see above).</p>
	<p>iMagine uses <a href="https://github.com/fryn/html5slider">html5slider</a> - a JS implementation of &lt;input type=range&gt; for Firefox 16 and up, Copyright (c) 2010-2013 Frank Yan, <a href="http://frankyan.com">frankyan.com</a> (only applicable in Firefox)</p>
	<p>This work is licensed under a <a href="http://creativecommons.org/licenses/by/3.0/deed.en_US">Creative Commons Attribution 3.0 Unported License</a>.</p>
	<p>We offer no guarantee or warranty that this software will work as described, or even at all.  We reserve the right to discontinue this software at any time.  You use this software at your own risk, and the software is subject to change dramatically between versions.</p>
</BODY>
