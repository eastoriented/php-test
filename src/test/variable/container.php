<?php namespace eastoriented\php\test\variable;

use eastoriented\php\{ test, container\iterator, block };

interface container extends test\variable
{
	function iteratorBlockForTestIs(iterator\block\test $block) :void;
}
