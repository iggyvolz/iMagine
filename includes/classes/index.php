<?php

require_once 'person.php';
require_once 'dreamplane.php';
require_once 'dreamcreature.php';
$dreamplane = new dreamplane;
$tony = new tony;
$edyn = new edyn;
$strag = new strag;
$furok = new furok;
$ugger = new ugger;
$freep = new freep;
$me = isset($_SESSION['iMagine']['me']) ? $_SESSION['iMagine']['me'] : 'tony';
