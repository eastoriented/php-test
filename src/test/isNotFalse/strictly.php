<?php namespace eastoriented\php\test\isNotFalse;

use eastoriented\php\test;

class strictly
	implements test
{
	function recipientOfTestOnVariableIs($variable, test\recipient $recipient) :void
	{
		$recipient->booleanIs($variable !== false);
	}
}
