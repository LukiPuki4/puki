<?PHP
	function autoloadClass($className) {
		$filename = "class/" . $className . ".php";
		if (is_readable($filename)) {
			require $filename;
		}
	}
	
	spl_autoload_register("autoloadClass");