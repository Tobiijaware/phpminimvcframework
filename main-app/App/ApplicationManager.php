<?php
namespace App;

use App\Http\Request;
use App\Http\Response;

/**
 * Class ApplicationManager
 *
 * @package \\${NAMESPACE}
 */
class ApplicationManager {

	private static $instance;

	private  $routes;

	private $currentPath;

	private const  METHOD_POST = 'POST';
	private const  METHOD_GET = 'GET';
	private const METHOD_PATCH = 'PATCH';
	private const METHOD_PUT = 'PUT';
	private const METHOD_DELETE = 'DELETE';

	private $allowedMethods = [
		self::METHOD_POST,
		self::METHOD_GET,
		self::METHOD_PATCH,
		self::METHOD_PUT,
		self::METHOD_DELETE
	];

	private function __construct() {
	}

	public static function getInstance() : ApplicationManager {
		if(!static::$instance) static::$instance = new self();
		return static::$instance;
	}

	private function addRoute($path, $method, $callback) {
		if(!isset($this->routes[$method])) {
			$this->routes[$method] = [];
		}

		if(!isset($this->routes[$method][$path])) {
			$this->routes[$method][$path] = ['path' => $path, 'method' => $method, 'callback' => $callback];
		}

	}


	public function __call( $name, $arguments ) {
		$methodName = strtoupper($name);
		if(in_array($methodName, $this->allowedMethods) && count($arguments) >= 2) {
			$this->addRoute($arguments[0], $methodName, $arguments[1]);
		}
	}


	public function mount() {

		$this->currentPath = isset($_SERVER['PATH_INFO']) ?  rtrim($_SERVER['PATH_INFO']) : '/';

		if($this->currentPath !== '/' && $this->currentPath[strlen($this->currentPath)-1] === '/') {
			$this->currentPath = substr($this->currentPath, 0, strlen($this->currentPath) - 1);
		}


		$routes = $this->routes[$_SERVER['REQUEST_METHOD']];
		$route = isset($routes[$this->currentPath]) ? $routes[$this->currentPath] : null;

		if(!$route) throw new \Exception('404 Not found');
		$callback = $route['callback'];

		if($this->isClosure($callback)) {

			call_user_func($callback, new Request(), new Response());
		}



	}

	function isClosure($t) {
		return $t instanceof \Closure;
	}

	public function dumpRoutes() {
		echo "<pre>";
		print_r($this->routes);
		echo "</pre>";
	}
}
