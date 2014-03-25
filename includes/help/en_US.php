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
    <p>Please note: This version of the program is in development.  The help page may not be completely up-to-date and commits may not even work properly.  If commits are not fixed within a day or two, please <a href="https://github.com/iggyvolz/Fightmon-the-Game--Reemon/issues">check current issues</a> or, if none exist, <a href="https://github.com/iggyvolz/Fightmon-the-Game--Reemon/issues/new">add a new one</a>.</p>
    <p>Please note that this goes through some major overhaul, including changing the main characters to Fightmon.  Any new features should go on that version, do not add new features here.</p>
    <p>Important dates:
    <ul>
        <li class="notpassed">May 1, 2014 - Feature Freeze/Begin Alpha</li>
        <li class="notpassed">May 20, 2014 (tentative) - End Alpha/Begin Beta</li>
        <li class="notpassed">June 1, 2014 (tentative) - End Beta/Begin RC's</li>
        <li class="notpassed">June 15, 2014 (tentative) - Final Release</li>
    </ul></p>
<h2>Setup</h2>
<p>You need to set up a PHP server to play on.  I highly recommend <a href="http://www.apachefriends.org/en/xampp.html">XAMPP</a>.  Download the FTG:R files to (XAMPP install directory)/xamppfiles/htdocs/ftgr.  Open the XAMPP manager and start the Apache module (you can start mySQL and proFTPD, but they are not required).  Then go to http://localhost/ftgr to play (you can rename the folder too, I personally name mine ftgr-dev).  Some applications, like Skype, Internet Information Services, and many game development softwares use localhost, so you will need to quit these programs completely. </p>
<p>Although this application is written in PHP, it is <em>not</em> recommended that you put this on a production server until a more stable release is out.  There may be server-breaking bugs, and the source code is not tested thoroughly before release to GitHub.  In addition, the documentation is likely to be out of date and functions may change dramatically between releases.  The debug function allows access to all $GLOBALS, and the site is only configured to work on a localhost server.</p>
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
Pluff is a placeholder Fightmon.  Pluff may or may not be included in the game, we're just using it in order to develop the fightmon-related features.
For more information about Pluff, see the <a href="http://fightmon.wikia.com/wiki/Pluff">Fightmon Wiki</a>.
<h3>Dragiri</h3>
Dragiri is a placeholder Fightmon.  Dragiri may or may not be included in the game, we're just using it in order to develop the fightmon-related features.
For more information about Dragiri, see the <a href="http://fightmon.wikia.com/wiki/Dragiri">Fightmon Wiki</a>.
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
p>Fightmon the Game: Reemon uses <a href="https://github.com/jquery/jquery">jQuery</a>, licensed under the MIT license.</p>
<p>This work is licensed under a <a href="http://creativecommons.org/licenses/by/3.0/deed.en_US">Creative Commons Attribution 3.0 Unported License</a>.</p>
<p>We offer no guarantee or warranty that this software will work as described, or even at all.  We reserve the right to discontinue this software at any time.  You use this software at your own risk, and the software is subject to change dramatically between versions.</p>
</BODY>