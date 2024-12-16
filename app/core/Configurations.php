<?php

namespace app\core;
require_once  dirname( __DIR__ , 1).'/config.php';
/**
 * Configurations.php
 * @package ZaitTinyFrameworkPHP
 * @version 0.0.4
 * @see     https://cleberoliveira.info
 *
 * Classe para gerenciar configurações da aplicação com getters, setters e inicialização modular.
 * As configurações são automaticamente armazenadas na sessão ao serem definidas.
 */
class Configurations {
	private $database = [];
	private $smtp = [];
	private $path = [];
	private $url = [];
	private $rootPath;
	private $protocol;
	private $domain;
	private $rootUrl;
	
	// Construtor para inicializar as configurações principais
	public function __construct( $projectFolder = null ) {
			$this->protocol = (!empty($_SERVER['HTTPS'])) ? 'https://' : 'http://';
			$this->domain = $_SERVER['HTTP_HOST'];
			$this->rootUrl = $this->protocol . $this->domain .'/'.(($projectFolder!=null)?$projectFolder.'/':'');
			$this->rootPath = realpath( __DIR__ . "/../../" ).'/';
	}
	
	public function getRootPath(){
		return $this->rootPath;
	}
	
	public function setPath(array $paths) {
		$this->path['rootPath'] = $this->rootPath ;
		foreach ($paths as $key => $value) {
			$this->path[$key] = $this->rootPath . $value;
		}
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$_SESSION['path'] = $this->path;
	}
	
	public function setUrl(array $urls) {
		$this->url['rootUrl'] = $this->rootUrl ;
		foreach ($urls as $key => $value) {
			$this->url[$key] = $this->rootUrl . $value;
		}
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$_SESSION['url'] = $this->url;
	}
	
	// Define as configurações do banco de dados
	public function setDatabase(array $databaseConfig) {
		$this->database = $databaseConfig;
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$_SESSION['database'] = $this->database;
	}
	
	// Define as configurações do SMTP
	public function setSmtp(array $smtpConfig) {
		$this->smtp = $smtpConfig;
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$_SESSION['smtp'] = $this->smtp;
	}
	
	// Getters para acessar as configurações
	public function getDatabase() {
		return $this->database;
	}
	
	public function getSmtp() {
		return $this->smtp;
	}
	
	public function getPath($key) {
		return $this->path[$key] ?? null;
	}
	
	public function getUrl($key) {
		return $this->url[$key] ?? null;
	}
	
	public function displayAll() {
		echo "=== Database Configurations ===\n<br>";
		foreach ($this->getDatabase() as $key => $value) {
			echo ($key) . " : " . $value . "\n<br>";
		}
		
		echo "\n<br>=== SMTP Configurations ===\n<br>";
		foreach ($this->getSmtp() as $key => $value) {
			echo ($key) . " : " . $value . "\n<br>";
		}
		echo "\n<br>=== URLs Configured ===\n<br>";
		foreach ($this->url as $key => $value) {
			echo ($key) . " : " . $value . "\n<br>";
		}
		
		echo "\n<br>=== Paths Configured ===\n<br>";
		foreach ($this->path as $key => $value) {
			echo ($key) . " : " . $value . "\n<br>";
		}
	}
}

?>
