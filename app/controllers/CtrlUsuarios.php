<?php

namespace app\controllers;

require_once dirname ( __DIR__, 1 ) . '/config.php';

use app\core\ControllerHandler;
use app\models\Usuarios;

class CtrlUsuarios extends ControllerHandler {
	private $usuarios = null;
	public function __construct() {
		// em caso de estar logado e ser admin
		// if (isset ( $_SESSION ['user'] ) && ($_SESSION ['user'] ['perfil'] == 'admin')) {
		$this->usuarios = new Usuarios ();
		parent::__construct (); // chama o get, post, put e delete e faz os tratamentos
		/*
		 * } else {
		 * $this->jsonResponse ( array (
		 * 'error' => 'Acesso Negado'
		 * ), 401 );
		 * }
		 */
	}
	public function get() {
		$idUsuario = $this->getParameter ( 'idUsuario' );
		if ($idUsuario) {
			$data = $this->usuarios->listByFieldKey ( $idUsuario );
			$this->jsonResponse ( $data );
		} else {
			$data = $this->usuarios->listAll ();
			$this->jsonResponse ( $data );
		}
	}
	public function post() {
		$idUsuario = $this->getParameter ( 'idUsuario' );
		$email = $this->getParameter ( 'email' );
		$senha = $this->getParameter ( 'senha' );
		$nome = $this->getParameter ( 'nome' );
		$ativo = $this->getParameter ( 'ativo' );
		$perfil = $this->getParameter ( 'perfil' );
		$dataCriacao = $this->getParameter ( 'dataCriacao' );
		$dataAtualizacao = $this->getParameter ( 'dataAtualizacao' );
		$foto = $this->getParameter ( 'foto' );
		$this->usuarios->populate ( $idUsuario, $email, $senha, $nome, $ativo, $perfil, $dataCriacao, $dataAtualizacao, $foto );
		$result = $this->usuarios->save ();
		$json = json_encode ( $result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
		echo ($json);
	}
	public function put() {
		$idUsuario = $this->getParameter ( 'idUsuario' );
		$email = $this->getParameter ( 'email' );
		$senha = $this->getParameter ( 'senha' );
		$nome = $this->getParameter ( 'nome' );
		$ativo = $this->getParameter ( 'ativo' );
		$perfil = $this->getParameter ( 'perfil' );
		$dataCriacao = $this->getParameter ( 'dataCriacao' );
		$dataAtualizacao = $this->getParameter ( 'dataAtualizacao' );
		$foto = $this->getParameter ( 'foto' );
		$this->usuarios->populate ( $idUsuario, $email, $senha, $nome, $ativo, $perfil, $dataCriacao, $dataAtualizacao, $foto );
		$result = $this->usuarios->save ();
		$json = json_encode ( $result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
		echo ($json);
	}
	public function delete() {
		$idUsuario = $this->getParameter ( 'idUsuario' );
		$email = $this->getParameter ( 'email' );
		$senha = $this->getParameter ( 'senha' );
		$nome = $this->getParameter ( 'nome' );
		$ativo = $this->getParameter ( 'ativo' );
		$perfil = $this->getParameter ( 'perfil' );
		$dataCriacao = $this->getParameter ( 'dataCriacao' );
		$dataAtualizacao = $this->getParameter ( 'dataAtualizacao' );
		$foto = $this->getParameter ( 'foto' );
		$this->usuarios->populate ( $idUsuario, $email, $senha, $nome, $ativo, $perfil, $dataCriacao, $dataAtualizacao, $foto );
		$result = $this->usuarios->delete ();
		$json = json_encode ( $result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
		echo ($json);
	}
	public function file() {
	}
}

new CtrlUsuarios ();
?>