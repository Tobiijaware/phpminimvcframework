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

		$routeInfo = $this->generateRouteRegex($path);

		if(!isset($this->routes[$method][$routeInfo['regex']])) {
			$this->routes[$method][$routeInfo['regex']] = ['path' => $routeInfo['regex'], 'method' => $method, 'callback' => $callback, 'variables' => $routeInfo['variables']];
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

		$routes = $this->routes[$_SERVER['REQUEST_METHOD']] ?? [];
		$route = null;
		$routeMatches = null;

		foreach($routes as $regex=>$r) {
			preg_match( '@' . $regex . '$@', $this->currentPath, $matches);
			if($matches) {
				$route = $r;
				$routeMatches = $matches;
			}
		}

		if(!$route) throw new \Exception('404 Not found');
		$callback = $route['callback'];

		if($this->isClosure($callback)) {

			for($i=0; $i < count($route['variables']); $i++) {
				$route['variables'][$i]['data'] = $routeMatches[$route['variables'][$i]['index']];
			}
			$req = new Request();
			$req->mapParams($route['variables']);

			call_user_func( $callback, $req, new Response() );
		}

	}

	public function isClosure($t) : bool{
		return $t instanceof \Closure;
	}

	public function dumpRoutes() {
		echo "<pre>";
		print_r($this->routes);
		echo "</pre>";
	}

	public function generateRouteRegex($str) {
		$url = ltrim(rtrim($str, '/'), '/');
		$urlParts = explode('/', $url);
		$routeRegx = [];
		$index  = 0;
		foreach($urlParts as $urlPart) {
			$placeholder = $this->getPlaceHolder($urlPart);
			if($placeholder) {
				$urlPart = ['regex' => '(\w+)', 'placeholder' => $placeholder, 'path' => null, 'index' => $index];
			} else {
				$urlPart = ['regex' => '(' . $urlPart . ')', 'path' => $urlPart, 'placeholder' => null, 'index' => $index];
			}

			$routeRegx[] = $urlPart;
			$index++;
		}

		$fullRegex = [];
		$variables  = [];
		foreach($routeRegx as $r) {
			$fullRegex[] = $r['regex'];
			if($r['placeholder']) {
				$variables[] = ['variable' => $r['placeholder'], 'index' => $r['index'] + 1];
			}

		}

		return  $str === '/' ? ['regex' => '(\/)', 'variables' => []] : ['regex' => implode('\/', $fullRegex), 'variables' => $variables];
	}

	protected function getPlaceHolder($str, $open ='{', $close='}'): string {

		if(strlen($str) > 0 && $str[0] === $open && $str[strlen($str) - 1] === $close) {
			$str = str_replace($open, '', $str);
			$str = str_replace($close, '', $str);
			return trim($str);
		}

		return false;
	}

	public function group(array $config, callable $callback) {

	}

}
