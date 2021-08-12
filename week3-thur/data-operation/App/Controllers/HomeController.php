<?php

namespace App\Controllers;

/**
 * Class HomeController
 * /home/about
 * @package \App\Controllers
 */
class HomeController extends BaseController {

	public function index() {

		$this->session->store('data', 'value');


	}

	public function about() {
		render('home/about', ['contactAddress' => 'ss']);
	}
}
