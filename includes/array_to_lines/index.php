<?php

function array_to_lines($array)
{
	foreach ($array as $value)
	{
		return "<p>$value</p>";
	}
}
