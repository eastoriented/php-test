<?php namespace eastoriented\php\test\variable;

use eastoriented\php\test;

class defined extends any
{
	function __construct($variable)
	{
		parent::__construct($variable, new test\defined);
	}
}
