<?php namespace eastoriented\php\test\recipient;

use eastoriented\php\{ test\recipient, block };

class functor extends block\functor
	implements
		recipient
{
	function booleanIs(bool $boolean) :void
	{
		parent::blockArgumentsAre($boolean);
	}
}
