<?php
$root = scandir('./includes');
foreach($root as $value)
{
	if(strpos($value,'.')!==false) // $value is a file
	{
		continue;
	}
	include './includes/'.$value.'/index.php';
	continue;
}