<?php namespace eastoriented\php\test\equal;

use eastoriented\php\test;

class strictly
	implements
		test
{
	private
		$reference
	;

	function __construct($reference)
	{
		$this->reference = $reference;
	}

	function recipientOfTestOnVariableIs($variable, test\recipient $recipient) :void
	{
		$recipient->booleanIs($this->reference === $variable);
	}
}
