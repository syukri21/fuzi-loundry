
<?php
// In application/config/config.php (at the top)k:w
require_once FCPATH . 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(FCPATH);
$dotenv->load();
// how to check all env variables
//


if (!function_exists('env')) {

	function env($key, $default = null)
	{
		$value = $_ENV[$key];

		if ($value === false) {
			return $default;
		}

		return $value;
	}
}

