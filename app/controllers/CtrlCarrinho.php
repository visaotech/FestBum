<?php

namespace app\controllers;

require_once dirname ( __DIR__, 1 ) . '/config.php';

use app\core\ControllerHandler;
use app\models\Produtos;

class CtrlCarrinho extends ControllerHandler {
	private $produtos = null;
	public function __construct() {
		$this->produtos = new Produtos ();
		parent::__construct ();
	}
	public function get() {
		$cart = $_SESSION ['cart'] ?? array ();
		$response = array ();

		foreach ( $cart as $idProduto => $quantidade ) {
			$produto = $this->produtos->getProdutoById ( $idProduto );
			if ($produto) {
				$response [] = [ 
						'idProduto' => $idProduto,
						'Nome' => $produto ['Nome'],
						'imagem' => $produto ['imagem'],
						'quantidade' => $quantidade
				];
			}
		}
		$this->jsonResponse ( $response );
	}
	public function post() {
		$idProduto = $input ['idProduto'] ?? null;
		$quantidade = $input ['quantidade'] ?? 1;

		if (! $idProduto || $quantidade <= 0) {
			$this->jsonResponse ( [ 
					"error" => "Dados inválidos"
			], 400 );
		}

		if (! isset ( $_SESSION ['cart'] [$idProduto] )) {
			$_SESSION ['cart'] [$idProduto] = 0;
		}

		$_SESSION ['cart'] [$idProduto] += $quantidade;
		$this->jsonResponse ( [ 
				"message" => "Produto adicionado ao carrinho"
		], 201 );
	}
	public function put() {
		$input = json_decode ( file_get_contents ( 'php://input' ), true );
		$idProduto = $input ['idProduto'] ?? null;
		$quantidade = $input ['quantidade'] ?? null;

		if (! $idProduto || $quantidade === null || $quantidade < 0) {
			$this->jsonResponse ( [ 
					"error" => "Dados inválidos"
			], 400 );
		}

		if ($quantidade == 0) {
			unset ( $_SESSION ['cart'] [$idProduto] );
		} else {
			$_SESSION ['cart'] [$idProduto] = $quantidade;
		}

		$this->jsonResponse ( [ 
				"message" => "Quantidade atualizada"
		] );
	}
	public function delete() {
		parse_str ( file_get_contents ( 'php://input' ), $input );
		$idProduto = $input ['idProduto'] ?? null;

		if (! $idProduto || ! isset ( $_SESSION ['cart'] [$idProduto] )) {
			$this->jsonResponse ( [ 
					"error" => "Produto não encontrado no carrinho"
			], 400 );
		}
		unset ( $_SESSION ['cart'] [$idProduto] );
		$this->jsonResponse ( [ 
				"message" => "Produto removido do carrinho"
		] );
	}
}
?>