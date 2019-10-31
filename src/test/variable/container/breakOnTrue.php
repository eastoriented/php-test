<?php namespace eastoriented\php\test\variable\container;

use eastoriented\php\{ test, container\iterator, block };

class breakOnTrue extends any
{
	function recipientOfTestIs(test\recipient $recipient) :void
	{
		$this
			->iteratorBlockIs(
				new iterator\block\functor(
					function($iterator, $test) use ($recipient)
					{
						$test
							->recipientOfTestIs(
								new test\recipient\container\fifo(
									$recipient,
									new test\recipient\ifTrue\iterator\breaker($iterator)
								)
							)
						;
					}
				)
			)
		;
	}

	function blockForTrueTestIs(block $block) :void
	{
	}
}
