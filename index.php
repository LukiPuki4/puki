<?PHP
	error_reporting(E_ALL);
	ini_set('display_errors', true);
	
	function autoloadClass($class_name) {
		$filename = "class/" . $class_name . ".php";
		if (is_readable($filename)) {
			require $filename;
		}
	}
	
	spl_autoload_register("autoloadClass");
	
	// Załóżmy, że to jakaś funkcja i otrzymaliśmy wynik do zmiennej
	$pierwszaZmienna = 33;
	$drugaZmienna = 2;

	$data = [
		'pierwszaZmienna' => $pierwszaZmienna,
		'drugaZmienna' => $drugaZmienna
	];
	
	// Router
	$router = new AltoRouter();
	$view = new View();
	
	$router->map('GET', '/', function() use($view, $data){
		$view->render([
			'page' => 'test',
			'title' => 'Mój Panel',
			'zmienna' => 'uu',
			'servers' => [
				'normalCount' => $data['pierwszaZmienna'],
				'pendingCount' => $data['drugaZmienna']
			]
		]);
	});

	$router->map('GET', '/dashboard', function(){
		echo '2';
	});
	
	$router->map('GET', '/test', function(){
		echo '2323';
	});

	// map user details page
	//$router->map( 'GET', '/user/[i:id]/', function( $id ) {
	//	require __DIR__ . '/views/user-details.php';
	//});

	// match current request url
	$match = $router->match();

	// call closure or throw 404 status
	if( is_array($match) && is_callable( $match['target'] ) ) {
		call_user_func_array( $match['target'], $match['params'] ); 
	} else {
		// no route was matched
		header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
	}