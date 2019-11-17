<?php namespace eastoriented\php\test\aString;

use eastoriented\php\{
	test,
	block
};

class contains extends test\isNotFalse\strictly
	implements
		test\aString
{
	private
		$needle
	;

	function __construct(string $needle)
	{
		$this->needle = $needle;
	}

	function recipientOfTestOnStringIs(string $string, test\recipient $recipient) :void
	{
		$this
			->recipientOfTestOnVariableIs(
				strpos($string, $this->needle),
				$recipient
			)
		;
	}

	function blockForTrueTestOnStringIs(string $string, block $block) :void
	{
		$this
			->recipientOfTestOnStringIs(
				$string,
				new test\recipient\ifTrue($block)
			)
		;
	}
}
