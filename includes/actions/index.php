<?php
$root = scandir('./includes/actions');
foreach($root as $value)
{
	if(strpos($value,'.')!==false) // $value is a file
	{
		continue;
	}
	include './includes/actions/'.$value.'/index.php';
	continue;
}