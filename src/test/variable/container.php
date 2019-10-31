<?php namespace eastoriented\php\test\variable;

use eastoriented\php\{ test, container\iterator, block };

interface container extends test\variable
{
	function iteratorBlockIs(iterator\block $block) :void;
}
