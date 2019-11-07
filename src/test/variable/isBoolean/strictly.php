<?php namespace eastoriented\php\test\variable\isBoolean;

use eastoriented\php\test\{
	variable\any as anyTest,
	isBoolean
};

class strictly extends anyTest
{
	function __construct($variable)
	{
		parent::__construct($variable, new isBoolean\strictly);
	}
}
