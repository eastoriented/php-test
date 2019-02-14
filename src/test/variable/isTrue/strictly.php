<?php namespace eastoriented\php\test\variable\isTrue;

use eastoriented\php\test\{
	variable\any as anyTest,
	isTrue
};

class strictly extends anyTest
{
	function __construct($variable)
	{
		parent::__construct($variable, new isTrue\strictly);
	}
}
