<?php

namespace app\controllers;

require_once dirname ( __DIR__, 1 ) . '/config.php';

use app\core\ControllerHandler;
use app\models\Usuarios;

class CtrlLogin extends ControllerHandler {
	private $usuarios = null;
	public function __construct() {
		$this->usuarios = new Usuarios ();
		parent::__construct ();
	}
	public function get() {
		$user = array (
				'idUsuario' => $_SESSION ['user'] ['idUsuario'] ?? '',
				'nome' => $_SESSION ['user'] ['nome'] ?? '',
				'email' => $_SESSION ['user'] ['email'] ?? '',
				'foto' => $_SESSION ['user'] ['foto'] ?? '',
				'perfil' => $_SESSION ['user'] ['perfil'] ?? ''
		);
		$this->jsonResponse ( $user );
	}
	public function post() {
		// Obtém os parâmetros do request
		$email = $this->getParameter ( 'email' );
		$senha = $this->getParameter ( 'senha' );

		// Se email ou senha estiverem vazios, trata como logout
		if (empty ( $email ) || empty ( $senha )) {
			// Limpa a sessão do usuário
			session_unset ();
			session_destroy ();

			$msg = array (
					"status" => "true",
					"msg" => "Logout efetuado com sucesso!"
			);
			$this->jsonResponse ( $msg );
			return;
		}

		// Lógica de login (autenticação)
		$result = $this->usuarios->findLogin ( $email, $senha );
		$linha = $result [0] ?? null; // Verifica se o resultado é válido

		if (isset ( $linha ['idUsuario'] ) && ($linha ['idUsuario'] > 0)) {
			// Autentica o usuário e configura a sessão
			$_SESSION ['user'] ['idUsuario'] = $linha ['idUsuario'];
			$_SESSION ['user'] ['nome'] = $linha ['nome'];
			$_SESSION ['user'] ['email'] = $linha ['email'];
			$_SESSION ['user'] ['foto'] = $linha ['foto'];
			$_SESSION ['user'] ['perfil'] = $linha ['perfil'];

			$msg = array (
					"status" => "true",
					"msg" => "Login efetuado com sucesso!"
			);
			$this->jsonResponse ( $msg );
		} else {
			// Usuário não encontrado, limpa a sessão como fallback
			$_SESSION ['user'] = array ();
			session_unset ();
			session_destroy ();

			$msg = array (
					"status" => "false",
					"msg" => "Usuário ou Senha Inválidos!"
			);
			$this->jsonResponse ( $msg );
		}
	}
	public function put() {
	}
	public function delete() {
	}
	public function file() {
	}
}

new CtrlLogin ();
?>