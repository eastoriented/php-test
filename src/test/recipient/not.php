<?php namespace eastoriented\php\test\recipient;

use eastoriented\php\test\recipient;

class not
	implements
		recipient
{
	private
		$recipient
	;

	function __construct(recipient $recipient)
	{
		$this->recipient = $recipient;
	}

	function booleanIs(bool $bool) :void
	{
		$this->recipient->booleanis(! $bool);
	}
}
