<?php namespace eastoriented\php\test\recipient;

use eastoriented\php\{ test\recipient, block };

class variable
	implements
		recipient
{
	private
		$variable
	;

	function __construct(& $variable)
	{
		$this->variable = & $variable;
	}

	function booleanIs(bool $bool) :void
	{
		$this->variable = $bool;
	}
}
