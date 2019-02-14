<?php namespace eastoriented\php\test;

use eastoriented\php\test;

class undefined
	implements
		test
{
	function recipientOfTestOnVariableIs($variable, test\recipient $recipient) :void
	{
		$recipient->booleanIs($variable === null);
	}
}
