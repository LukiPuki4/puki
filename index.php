<?PHP	
	define("DEBUG", true);
	define("DEBUG_OFF", false);

	if (DEBUG) {
		include(__DIR__ . '/system/debug.php');
	}
	
	require_once(__DIR__ . '/system/autoloadClass.php');
	
	$data = 'gfgf';
	
	// Router
	$router = new AltoRouter();
	$view = new View();
	
	$controller = new Controller($router, $data);
	$controller->run($view);
	