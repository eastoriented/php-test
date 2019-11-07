<?php namespace eastoriented\php\container\iterator\block\test;

use eastoriented\php\{ block, test\variable as test };
use eastoriented\php\container\iterator;

class functor extends block\functor
	implements
		iterator\block\test
{
	function iteratorHasTest(iterator $iterator, test $test) :void
	{
		$this->blockArgumentsAre($iterator, $test);
	}
}
