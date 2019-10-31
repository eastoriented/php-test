<?php namespace eastoriented\php\test\variable;

use eastoriented\php\block;
use eastoriented\php\test\{
	variable as test,
	recipient,
	variable\defined,
	variable\isTrue\strictly as isTrue,
	recipient\ifTrue\functor as ifTrue
};
use eastoriented\php\container\{ iterator, php };

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
			new test\container\any(
				new iterator\fifo,
				... $this->tests
			)
		)
			->iteratorBlockIs(
				new iterator\block\functor(
					function($iterator, $test) use (& $boolean)
					{
						$test
							->recipientOfTestIs(
								new recipient\container\fifo(
									new recipient\variable($boolean),
									new recipient\ifTrue\iterator\breaker($iterator)
								)
							)
						;
					}
				)
			)
		;

		(
			new defined($boolean)
		)
			->blockForTrueTestIs(
				new block\functor(
					function() use ($boolean, $recipient)
					{
						$recipient->booleanIs($boolean);
					}
				)
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
