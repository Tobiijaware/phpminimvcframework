<?php

namespace App\Http;

/**
 * Class Response
 *
 * @package \App\Http
 */
class Response {

	public function send($content) {
		echo $content;
	}

	public function sendJson(array $content) {
		header('Content-Type: application/json');
		echo json_encode($content);
		exit;
	}
}
