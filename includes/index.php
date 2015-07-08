<?php

namespace iMagine;

// Intentionally non-alphabetized.  In order of prerequisition.
require_once 'includes/error/index.php';
require_once 'includes/translations/index.php';
require_once 'includes/classes/index.php';
require_once 'includes/parse_contents/index.php';
if (defined('PAGE_INDEX')) // run modified die()
{
	require_once 'includes/page_render/index.php';
}
