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

$config = new Configurations ( "hostdeprojetos_FestBum" );

$config->setDatabase ( [ 
		'sgbd' => 'mysql',
		'host' => '144.217.39.54',
		'user' => 'hostdeprojetos',
		'pass' => 'ifspgru@2022',
		'schema' => 'hostdeprojetos_FestBum',
		'port' => '3306'
] );

$config->setSmtp ( [ 
		'host' => '144.217.39.54',
		'port' => 3306,
		'username' => 'hostdeprojetos',
		'password' => 'ifspgru@2022'
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
		
