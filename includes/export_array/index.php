<?php
function export_array($array)
{
	foreach($array as $key=>$value)
	{
		$GLOBALS[$key]=$value;
	}
}