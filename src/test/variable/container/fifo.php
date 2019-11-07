<?php namespace eastoriented\php\test\variable\container;

use eastoriented\php\{ test, container\iterator };

class fifo extends any
{
	function __construct(test\variable... $tests)
	{
		parent::__construct(new iterator\fifo, ... $tests);
	}
}
