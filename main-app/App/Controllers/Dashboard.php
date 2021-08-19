<?php

namespace App\Controllers;

/**
 * Class Dashboard
 *
 * @package \App\Controllers
 */
class Dashboard  extends BaseController{

	public function index($req, $res) {
		$res->render('dashboard/index');
	}

}
