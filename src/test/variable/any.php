<?php namespace eastoriented\php\test\variable;

use eastoriented\php\{ test, block };

class any
	implements
		test\variable
{
	private
		$variable,
		$test
	;

	function __construct($variable, test $test)
	{
		$this->variable = $variable;
		$this->test = $test;
	}

	function recipientOfTestIs(test\recipient $recipient) :void
	{
		$this->test
			->recipientOfTestOnVariableIs(
				$this->variable,
				$recipient
			)
		;
	}

	function blockForTrueTestIs(block $block) :void
	{
		$this->recipientOfTestIs(
			new test\recipient\ifTrue($block)
		);
	}
}
