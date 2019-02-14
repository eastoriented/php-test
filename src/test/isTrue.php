<?php namespace eastoriented\php\test;

use eastoriented\php\test;

class isTrue
	implements
		test
{
	function recipientOfTestOnVariableIs($variable, recipient $recipient) :void
	{
		$recipient->booleanIs($variable == true);
	}
}
