<?php

namespace iMagine;

if(isset($_SESSION["iMagine"]))
{
	$_SESSION["iMagine"]=serialize($iMagine);
}
