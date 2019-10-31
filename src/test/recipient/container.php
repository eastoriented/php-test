<?php namespace eastoriented\php\test\recipient;

use eastoriented\php\{ test\recipient, container\iterator };

class container
	implements
		recipient
{
	private
		$iterator,
		$recipients
	;

	function __construct(iterator $iterator, recipient... $recipients)
	{
		$this->iterator = $iterator;
		$this->recipients = $recipients;
	}

	function booleanIs(bool $bool) :void
	{
		$this->iterator
			->variablesForIteratorBlockAre(
				new iterator\block\functor(
					function($iterator, $recipient) use ($bool)
					{
						$recipient->booleanIs($bool);
					}
				),
				... $this->recipients
			)
		;
	}
}
