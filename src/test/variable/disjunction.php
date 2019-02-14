<?php namespace eastoriented\php\test\variable;

use eastoriented\php\test\{
	variable as test,
	recipient,
	variable\defined,
	variable\isTrue\strictly as isTrue,
	recipient\ifTrue\functor as ifTrue
};
use eastoriented\php\container\iterator\{
	fifo,
	block\functor as block
};

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
		(new fifo)
			->variablesForIteratorBlockAre(
				new block(
					function($iterator, $test) use (& $boolean)
					{
						$test
							->recipientOfTestIs(
								new recipient\functor(
									function($aBoolean) use ($iterator, & $boolean)
									{
										(
											new isTrue($boolean = $aBoolean)
										)
											->recipientOfTestIs(
												new ifTrue(
													function() use ($iterator)
													{
														$iterator->nextIterationAreUseless();
													}
												)
											)
										;
									}
								)
							)
						;
					}
				),
				... $this->tests
			)
		;

		(
			new defined($boolean)
		)
			->recipientOfTestIs(
				new ifTrue(
					function() use ($boolean, $recipient)
					{
						$recipient->booleanIs($boolean);
					}
				)
			)
		;
	}
}
