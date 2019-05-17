<?php

namespace App;

class Game
{
	/**
	 * @var Console
	 */
	private $console;

	/**
	 * @var Map
	 */
	private $map;

	public function __construct()
	{
		$this->console = new Console;
		$this->map = new Map;
	}

	public function run()
	{
		$tank =	new Tank(1, 1);
		$this->map->put($tank);
		
		$other_objects = [
			new Swamp(10, 1),
			new Swamp(11, 2),
			new Swamp(12, 3),
			new Mountain(10, 5),
			new Mountain(10, 6),
			new Mountain(10, 7),
			new Object(3, 3),
			new Object(3, 4),
			new Object(3, 5),
		];

		foreach ($other_objects as $value) {
			$this->map->put($value);
		}
		$this->map->draw();
		
		while (true) {
			$input = $this->console->getInput();   
			if ($input) {
				$this->map->moveObject($tank, $input);
				$this->map->put($tank);
				$this->map->draw();
			}
		}
	}
}