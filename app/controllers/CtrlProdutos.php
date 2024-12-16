<?php

namespace app\controllers;

require_once dirname ( __DIR__, 1 ) . '/config.php';

use app\core\ControllerHandler;
use app\models\Produtos;

class CtrlProdutos extends ControllerHandler {
	private $produtos = null;
	public function __construct() {
		$this->produtos = new Produtos ();
		parent::__construct ();
	}
	public function get() {
		$id = $this->getParameter ( 'id' );
		if ($id) {
			$data = $this->produtos->listByFieldKey ( $id );
			$this->jsonResponse ( $data );
		} else {
			$data = $this->produtos->listAll ();
			$this->jsonResponse ( $data );
		}
	}
	public function post() {
		// if (isset ( $_SESSION ['user'] ) && ($_SESSION ['user'] ['perfil'] == 'admin')) {
		$id = $this->getParameter ( 'id' );
		$nome = $this->getParameter ( 'nome' );
		$descricao = $this->getParameter ( 'descricao' );
		$preco = $this->getParameter ( 'preco' );
		$quantidade = $this->getParameter ( 'quantidade' );
		$tipo = $this->getParameter ( 'tipo' );
		$ativo = $this->getParameter ( 'ativo' );
		$img01 = $this->getParameter ( 'img01' );
		$img02 = $this->getParameter ( 'img02' );
		$this->produtos->populate ( $id, $nome, $descricao, $preco, $quantidade, $tipo, $ativo, $img01, $img02 );
		$result = $this->produtos->save ();
		$this->jsonResponse ( [ 
				"result" => $result
		] );
		/*
		 * } else {
		 * $this->jsonResponse ( [
		 * "error" => "Acesso negado"
		 * ], 403 );
		 * }
		 */
	}
	public function put() {
		$id = $this->getParameter ( 'id' );
		$nome = $this->getParameter ( 'nome' );
		$descricao = $this->getParameter ( 'descricao' );
		$preco = $this->getParameter ( 'preco' );
		$quantidade = $this->getParameter ( 'quantidade' );
		$tipo = $this->getParameter ( 'tipo' );
		$ativo = $this->getParameter ( 'ativo' );
		$img01 = $this->getParameter ( 'img01' );
		$img02 = $this->getParameter ( 'img02' );
		$this->produtos->populate ( $id, $nome, $descricao, $preco, $quantidade, $tipo, $ativo, $img01, $img02 );
		$result = $this->produtos->save ();
		$this->jsonResponse ( [ 
				"result" => $result
		] );
	}
	public function delete() {
		$id = $this->getParameter ( 'id' ) ?? 0;
		$nome = $this->getParameter ( 'nome' ) ?? '';
		$descricao = $this->getParameter ( 'descricao' ) ?? '';
		$preco = $this->getParameter ( 'preco' ) ?? 0;
		$quantidade = $this->getParameter ( 'quantidade' ) ?? 0;
		$tipo = $this->getParameter ( 'tipo' ) ?? '';
		$ativo = $this->getParameter ( 'ativo' ) ?? '';
		$img01 = $this->getParameter ( 'img01' ) ?? '';
		$img02 = $this->getParameter ( 'img02' ) ?? '';
		$this->produtos->populate ( $id, $nome, $descricao, $preco, $quantidade, $tipo, $ativo, $img01, $img02 );
		$result = $this->produtos->delete ();
		$this->jsonResponse ( [ 
				"result" => $result
		] );
	}
	public function file() {
		// Implementação futura para upload/download de arquivos relacionados aos produtos, se necessário.
	}
}

new CtrlProdutos ();
?>
