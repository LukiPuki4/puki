<?PHP
	class View
    {
        public function render(array $data = [])
        {
            extract($data);

            if (is_readable('view/panel/templates/header.php')) {
                require_once 'view/panel/templates/header.php';
            } else {
                die('Header not found.');
            }

            if (is_readable("view/panel/{$page}.php")) {
                require_once "view/panel/{$page}.php";
            } else {
                die("{$page}.php not found.");
            }

            if (is_readable('view/panel/templates/footer.php')) {
                require_once 'view/panel/templates/footer.php';
            } else {
                die('Footer not found.');
            }
        }
    }