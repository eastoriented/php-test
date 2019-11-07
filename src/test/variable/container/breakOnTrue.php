<?php namespace eastoriented\php\test\variable\container;

use eastoriented\php\{ test, container\iterator, block };

class breakOnTrue extends any
{
	function recipientOfTestIs(test\recipient $recipient) :void
	{
		$this
			->iteratorBlockForTestIs(
				new iterator\block\test\functor(
					function($iterator, $test) use ($recipient)
					{
						$test
							->recipientOfTestIs(
								new test\recipient\container\fifo\ifTrue\iterator\breaker(
									$iterator,
									$recipient
								)
							)
						;
					}
				)
			)
		;
	}
}
