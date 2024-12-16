<?php
use app\core\Configurations;

/**
 * config.php
 *
 * @package ZaitTinyFrameworkPHP
 * @version 0.0.4
 * @see https://cleberoliveira.info Arquivo de configuração principal para a aplicação.
 *      Carrega e inicializa todas as configurações usando a classe Configurations.
 */

if (session_status () == PHP_SESSION_NONE) {
	session_start ();
}

$mostrarErros = true;
if ($mostrarErros) {
	ini_set ( 'display_errors', 1 );
	error_reporting ( E_ALL );
} else {
	ini_set ( 'display_errors', 0 );
	error_reporting ( 0 );
}

require_once __DIR__ . '/autoload.php';

$config = new Configurations ( "ifhostgru_festbum" );

$config->setDatabase ( [ 
		'sgbd' => 'mysql',
		'host' => 'localhost',
		'user' => 'ifhostgru_festbum',
		'pass' => 'VisaoTech2024',
		'schema' => 'ifhostgru_festbum',
		'port' => '3306'
] );

$config->setSmtp ( [ 
		'host' => 'localhost',
		'port' => 3306,
		'username' => 'ifhostgru_festbum',
		'password' => 'VisaoTech2024'
] );

$config->setUrl ( [ 
		'css' => 'public/assets/css/',
		'js' => 'public/assets/js/',
		'vendor' => 'public/assets/vendor/',
		'img' => 'public/assets/img/'
] );

$config->setPath ( [ 
		'css' => 'public/assets/css/',
		'js' => 'public/assets/js/',
		'vendor' => 'public/assets/vendor/',
		'img' => 'public/assets/img/',
		'uploads' => 'app/uploads/',
		'controllers' => 'app/controllers',
		'views' => 'app/views',
		'models' => 'app/models',
		'pdoErrors' => 'app/core/pdoErrors.php'
] );

?>
		
