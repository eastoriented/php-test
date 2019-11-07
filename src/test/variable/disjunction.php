<?php namespace eastoriented\php\test\variable;

use eastoriented\php\block;
use eastoriented\php\test\{
	variable as test,
	recipient,
	variable\isBoolean\strictly as isBoolean,
	recipient\ifTrue\functor as ifTrue
};
use eastoriented\php\container\{ iterator, php, iterator\block\test\ifTrue\iterator\breaker };

class disjunction
	implements
		test
{
	private
		$tests
	;

	function __construct(test... $tests)
	{
		$this->tests = $tests;
	}

	function recipientOfTestIs(recipient $recipient) :void
	{
		(
			new test\container\fifo(
				... $this->tests
			)
		)
			->iteratorBlockForTestIs(
				new breaker(
					new recipient\variable($boolean)
				)
			)
		;

		(
			new isBoolean\forwarder($boolean)
		)
			->recipientOfTestIs(
				$recipient
			)
		;
	}

	function blockForTrueTestIs(block $block) :void
	{
		(new iterator\fifo)
			->variablesForIteratorBlockAre(
				new iterator\block\functor(
					function($iterator, $test) use ($block)
					{
						$test
							->blockForTrueTestIs(
								new php\block\container\fifo(
									new block\iterator\breaker($iterator),
									$block
								)
							)
						;
					}
				),
				... $this->tests
			)
		;
	}
}
