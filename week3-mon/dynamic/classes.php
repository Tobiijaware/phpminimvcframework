<?php


class Controller {

	public function homePage() {
		echo "Homepage";
	}

	public function contactPage() {
		echo "Contact page";
	}

	public function logger(array $info, string $name) {
		foreach($info as $item) {
			var_dump($item);
		}

		echo $name;
	}
}


$controller = new Controller();

call_user_func_array([$controller, 'homePage'], []);
call_user_func_array([$controller, 'contactPage'], []);
call_user_func_array([$controller, 'logger'], [[1,2,3,4], 'Aj']);
