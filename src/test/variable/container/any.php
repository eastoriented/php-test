<?php namespace eastoriented\php\test\variable\container;

use eastoriented\php\{ test, container\iterator, block };

class any
	implements
		test\variable\container
{
	private
		$iterator,
		$tests
	;

	function __construct(iterator $iterator, test\variable... $tests)
	{
		$this->iterator = $iterator;
		$this->tests = $tests;
	}

	function recipientOfTestIs(test\recipient $recipient) :void
	{
		$this
			->iteratorBlockIs(
				new iterator\block\functor(
					function($iterator, $test) use ($recipient)
					{
						$test->recipientOfTestIs($recipient);
					}
				)
			)
		;
	}

	function blockForTrueTestIs(block $block) :void
	{
		$this
			->iteratorBlockIs(
				new iterator\block\functor(
					function($iterator, $test) use ($block)
					{
						$test->blockForTrueTestIs($block);
					}
				)
			)
		;
	}

	function iteratorBlockIs(iterator\block $block) :void
	{
		$this->iterator
			->variablesForIteratorBlockAre(
				$block,
				... $this->tests
			)
		;
	}
}
