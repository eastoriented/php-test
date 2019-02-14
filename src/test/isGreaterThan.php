<?php namespace eastoriented\php\test;

use eastoriented\php\test;

class isGreaterThan
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
		$recipient->booleanIs($variable > $this->reference);
	}
}
