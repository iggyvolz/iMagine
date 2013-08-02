Please note: This program is in development.  The help page may not be completely up-to-date, please <a href="https://github.com/iggyvolz/iMagine/issues">check current issues</a> or, if none exist, <a href="https://github.com/iggyvolz/iMagine/issues/new">add a new one</a>.
<h2>Setup</h2>
You need to set up a PHP server to play on.  I highly reccomend <a href="http://www.apachefriends.org/en/xampp.html">XAMPP</a>.  Download the <a href="https://github.com/iggyvolz/iMagine/archive/master.zip">iMagine files</a> to (XAMPP install directory)/xamppfiles/htdocs/iMagine.  Open the XAMPP manager and start the Apache module (you can start mySQL and proFTPD, but they are not required).  Then go to http://localhost/iMagine to play.  Some applications, like Skype, Internet Information Services, and many game development softwares use localhost, so you will need to quit these programs completely. On Mac, click and hold the dock icon and press Quit, you may need to confirm.  On Windows, right-click the dock icon and press Quit, you may need to confirm.
<h2>Syntax</h2>
All commands are case-insensitive.  The syntax is: person.action(parameters).  However, the person and/or the parameters can be omitted for some functions.  For example, the function reset requires no name or parameters.  Any of these will do the same thing:
<ul>
<li>i.reset()</li>
<li>i.reset(foo)</li>
<li>i.reset</li>
<li>reset()</li>
<li>reset(foo)</li>
<li>reset</li>
</ul>
As you noticed in the example above, you can use the person i.  This is the person you are currently playing as (you can switch using the switchto command).  You can also refer to anyone by name in the person spot (for example, tony.reset).
<h2>People</h2>
<h3>Tony</h3>
Tony is selected by default.  For more info, see the <a href="http://magination.wikia.com/wiki/Tony_Jones_(TV_Series)">Magi Nation Wiki</a>.
<h4>Furok</h4>
Furok is Tony's main dream creature and the only one currently implimented in the game.  Catch phrase: "Let the fur fly!"  For more information, see the <a href="http://magination.wikia.com/wiki/Furok#In_the_TV_Series">Magi Nation Wiki</a>.
<h3>Edyn</h3>
For more info, see the <a href="http://magination.wikia.com/wiki/Edyn">Magi Nation Wiki</a>.
<h4>Ugger<h4>
Ugger is Edyn's main dream creature and the only one currently implimented in the game.  No catch phrase yet (see the <a href="https://github.com/iggyvolz/iMagine/issues/1">GitHub issue</a>).  For more information, see the <a href="http://magination.wikia.com/wiki/Ugger#In_the_TV_Series">Magi Nation Wiki</a>.
<h3>Strag</h3>
For more info, see the <a href="http://magination.wikia.com/wiki/Strag">Magi Nation Wiki</a>.
<h4>Freep</h4>
Freep is Strag's main dream creature and the only one currently implimented in the game.  Catch phrase: "Whose noggin' needs knockin'?"  For more information, see the <a href="http://magination.wikia.com/wiki/Freep#In_the_TV_Series">Magi Nation Wiki</a>.
<h2>Functions</h2>
Note:  I'll try to keep this as up-to-date as possible, but if I forget an action, they will all be listed under includes/actions
<h3>Changeto</h3>
This changes the value of the person i to the person in parameter.  Person is ignored, parameter must be a valid person in your party.
<h3>Debug</h3>
To debug the software, just type debug.  This will return a dump of all variables.  To turn off, call debug again.  Person and parameters are ignored.
<h3>Help</h3>
Shows this help page.  Person and parameters are ignored.
<h3>Magine</h3>
This "magines" a Dream Creature.  It costs 100 energy (subject to change).  It brings the Dream Creature in parameter from the Dream Plane (where they rest) to the real world, where they can fight (coming soon).  For more info, see the <a href="http://magination.wikia.com/wiki/Animite#In_the_TV_Series">Magi Nation Wiki</a>.  Person must be a valid person.  Parameter must be a Dream Creature that is in the Dream Plane.  Person must have Parameter's Animite (the stone used to magine dream creatures), that is, you cannot magine someone else's Dream Creature.
<h3>Reset</h3>
Resets the game.  This happens without warning.  Person and parameter are ignored.
<h3>ToTheDreamPlane</h3>
This returns a Dream Creature to the Dream Plane.  For more info, see the <a href="http://magination.wikia.com/wiki/Animite#In_the_TV_Series">Magi Nation Wiki</a>.  Person must be a Dream Creature that is active (not in the Dream Plane).  Parameter is ignored.
