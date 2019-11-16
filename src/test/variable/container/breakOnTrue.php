<?php namespace eastoriented\php\test\variable\container;

use eastoriented\php\{ test, container\iterator };

class breakOnTrue extends any
{
	function recipientOfTestIs(test\recipient $recipient) :void
	{
		$this
			->iteratorBlockForTestIs(
				new iterator\block\test\ifTrue\iterator\breaker(
					$recipient
				)
			)
		;
	}
}
