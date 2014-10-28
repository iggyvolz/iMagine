<HEAD>
    <title>iMagine - Help</title>
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
    <a href="index.php"><- Back to iMagine</a>
    <p>Please note: This version of the program is in development.  The help page may not be completely up-to-date and commits may not even work properly.  If commits are not fixed within a day or two, please <a href="https://github.com/iggyvolz/iMagine-php/issues">check current issues</a> or, if none exist, <a href="https://github.com/iggyvolz/iMagine-php/issues/new">add a new one</a>.</p>
    <p>Please note that this goes through some major overhaul, including changing the main characters back to people.</p>
    <p>Important dates (schedule not yet set)</p>
<h2>Setup</h2>
<p>You need to set up a PHP server to play on.  I highly recommend <a href="http://www.apachefriends.org/en/xampp.html">XAMPP</a> if you do not have the ability to install httpd and php on your own.  For example, you may with to download the iMagine files to (XAMPP install directory)/xamppfiles/htdocs/imagine.  Open the XAMPP manager and start the Apache module (you can start mySQL and proFTPD, but they are not required).  Then go to http://localhost/iMagine to play (you can rename the folder too). </p>
<p>Although this application is written in PHP, it is <em>not</em> recommended that you put this on a production server until a more stable release is out.  There may be server-breaking bugs, and the source code is not tested thoroughly before release to GitHub.  In addition, the documentation is likely to be out of date and functions may change dramatically between releases.  The debug function allows access to all $GLOBALS, and the site is only tested on a local server.</p>
<p>This software requires PHP 5.4+.  Support for PHP 5.3.x was completely discontinued by the PHP organization last July.  PHP 5.2 was never supported, even in the original parser writing.</p>
<h2>Syntax</h2>
Please see the official iMagine standards (TODO: write and link) for the syntax.  While the standards are being written, you may wish to play the Actionscript implimentation (<a href="http://iggyvolz.github.io/iMagine/0.1.2.html">via Github Pages</a>) or consult its documentation (<a href="http://iggyvolz.github.io/iMagine/documentation.html">via Github Pages</a>) to use the commands.
<h2>Credit</h2>
<p>To see all authors of this software, please see the <a href="https://github.com/iggyvolz/iMagine-PHP">GitHub repository</a>.  This parser was originally carried under the name of iMagine, after which it was converted to iMagine.</p>
<p>Magi-Nation and its respective characters, names, spells, etc. are copyrighted by Interactive Imagination Corporation, 2i, and Cookie Jar Entertainment. This game was created in the fan base and claims no affiliation with the copyright holders.</p>
<p>All information for the game is taken from the <a href="http://magination.wikia.com/">Magi Nation Wiki</a></p>
<p>This work attempts to be compliant with the official iMagine standards (TODO: write and link).  However, as these have not yet been published, we will use the Actionscript implimentation as a baseline, as the standards will be based off of that.</p>
<p>iMagine-PHP uses <a href="https://github.com/jquery/jquery">jQuery</a>, licensed under the MIT license.</p>
<p>This work is licensed under a <a href="http://creativecommons.org/licenses/by/3.0/deed.en_US">Creative Commons Attribution 3.0 Unported License</a>.</p>
<p>We offer no guarantee or warranty that this software will work as described, or even at all.  We reserve the right to discontinue this software at any time.  You use this software at your own risk, and the software is subject to change dramatically between versions.</p>
</BODY>