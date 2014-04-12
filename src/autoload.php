<?php

ob_start();
define("FTGR_NO_OUTPUT", true);
require_once 'index.php';
ob_end_clean();
