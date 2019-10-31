<?php namespace eastoriented\php\test\variable\isTrue\string;

use eastoriented\php\block;
use eastoriented\php\test\{
	variable,
	recipient,
	variable\isNotFalse\strictly as isNotFalse
};
use eastoriented\php\container\iterator\{
	fifo,
	block\functor
};

class contains
	implements
		variable
{
	private
		$boolean = false
	;

	function __construct(string $haystack, string... $needles)
	{
		(new fifo)
			->variablesForIteratorBlockAre(
				new functor(
					function($iterator, $needle) use ($haystack)
					{
						(
							new isNotFalse(strpos($haystack, $needle))
						)
							->blockForTrueTestIs(
								new block\functor(
									function() use ($iterator)
									{
										$iterator->nextIterationAreUseless();

										$this->boolean = true;
									}
								)
							)
						;
					}
				),
				... $needles
			)
		;
	}

	function recipientOfTestIs(recipient $recipient) :void
	{
		$recipient->booleanIs($this->boolean);
	}

	function blockForTrueTestIs(block $block) :void
	{
		(
			new isNotFalse($this->boolean)
		)
			->blockForTrueTestIs(
				$block
			)
		;
	}
}
