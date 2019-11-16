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
		$haystack,
		$needles
	;

	function __construct(string $haystack, string... $needles)
	{
		$this->needles = $needles;
		$this->haystack = $haystack;
	}

	function recipientOfTestIs(recipient $recipient) :void
	{
		$recipient->booleanIs($this->getBoolean());
	}

	function blockForTrueTestIs(block $block) :void
	{
		(
			new isNotFalse($this->getBoolean())
		)
			->blockForTrueTestIs(
				$block
			)
		;
	}

	private function getBoolean()
	{
		$boolean = false;

		(new fifo)
			->variablesForIteratorBlockAre(
				new functor(
					function($iterator, $needle) use (& $boolean)
					{
						(
							new isNotFalse(strpos($this->haystack, $needle))
						)
							->blockForTrueTestIs(
								new block\functor(
									function() use ($iterator, & $boolean)
									{
										$iterator->nextIterationAreUseless();

										$boolean = true;
									}
								)
							)
						;
					}
				),
				... $this->needles
			)
		;

		return $boolean;
	}
}
