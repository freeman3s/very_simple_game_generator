<?php

namespace App;

class Tank extends Object
{
	public function __construct(int $x, int $y)
	{
		parent::__construct($x, $y);
		$this->setChar('T');
	}

	public function checkCollision($next)
	{
		if ($next instanceof Swamp) {
			die(get_class($this) . ' hit the swamp' . "\n");
		} elseif ($next instanceof Mountain) {
			die(get_class($this) . ' hit the mountain' . "\n");
		}
	}
}
