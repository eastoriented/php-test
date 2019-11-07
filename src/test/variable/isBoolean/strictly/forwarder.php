<?php namespace eastoriented\php\test\variable\isBoolean\strictly;

use eastoriented\php\block;
use eastoriented\php\test\{
	recipient,
	variable,
	variable\isBoolean
};

class forwarder
	implements
		variable
{
	private
		$variable
	;

	function __construct($variable)
	{
		$this->variable = $variable;
	}

	function recipientOfTestIs(recipient $recipient) :void
	{
		(
			new isBoolean\strictly($this->variable)
		)
			->blockForTrueTestIs(
				new block\functor(
					function() use ($recipient)
					{
						$recipient->booleanIs($this->variable);
					}
				)
			)
		;
	}

	function blockForTrueTestIs(block $block) :void
	{
	}
}
