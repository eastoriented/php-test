<?php namespace eastoriented\php\block\test\recipient\forwarder;

use eastoriented\php\{ block, test\recipient };

class boolean
	implements
		block
{
	private
		$recipient,
		$boolean
	;

	function __construct(recipient $recipient, bool $boolean)
	{
		$this->recipient = $recipient;
		$this->boolean = $boolean;
	}

	function blockArgumentsAre(... $arguments) :void
	{
		$this->recipient->booleanIs($this->boolean);
	}
}
