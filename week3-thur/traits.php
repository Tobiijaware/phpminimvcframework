<?php

trait Animal {
	public function getName() : string  {
		return  __CLASS__;
	}
}

trait Dog {
	public function bark() {
		return "Woof";
	}
}

class Monster {
	use  Animal, Dog;
}


$monster = new Monster();

$monster->bark();
$monster->getName();


