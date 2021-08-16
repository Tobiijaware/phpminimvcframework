<?php
namespace App\Http;

/**
 * Class Request
 *
 * @package \\${NAMESPACE}
 */
class Request {

	public function mapParams(array $params) {

		foreach($params as $p) {

			$this->{$p['variable']} = $p['data'];
		}
	}
}
