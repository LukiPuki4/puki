<?PHP
	class Controller
	{
		public function __construct()
		{
			echo 'kontroler';
		}
		
		public function run($view)
		{
			echo '<br>';
			echo 'run';
		}
	}