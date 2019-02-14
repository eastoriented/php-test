<?php namespace eastoriented\php\test\variable\isFalse;

use eastoriented\php\test\{
	variable\any as anyTest,
	isFalse
};

class strictly extends anyTest
{
	function __construct($variable)
	{
		parent::__construct($variable, new isFalse\strictly);
	}
}
