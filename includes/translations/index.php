<?php

// Set language to user language
putenv('LC_ALL=' . FTGR_LANG);
setlocale(LC_ALL, FTGR_LANG);

// Specify location of translation tables
bindtextdomain("ftgr", __DIR__);

// Choose domain
textdomain("ftgr");

// Translation is looking for in ./[FTGR_LANG]/LC_MESSAGES/ftgr.mo now