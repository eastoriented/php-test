<?php namespace eastoriented\php\test\recipient\container;

use eastoriented\php\{ test\recipient, container\iterator };

class fifo extends recipient\container
{
	function __construct(recipient... $recipients)
	{
		parent::__construct(new iterator\fifo, ... $recipients);
	}
}
