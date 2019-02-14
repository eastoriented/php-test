<?php namespace eastoriented\php\test\isFalse;

use eastoriented\php\{ test, test\recipient };

class strictly
	implements
		test
{
	function recipientOfTestOnVariableIs($variable, recipient $recipient) :void
	{
		$recipient->booleanIs($variable === false);
	}
}
