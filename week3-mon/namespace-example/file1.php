<?php
namespace Foo;

class Customer {

	public function __construct() {
		var_dump(__CLASS__);
	}
}


function Logger(string $message) {
	var_dump($message);
}


