<?php

namespace app\models;

require_once dirname ( __DIR__, 1 ) . '/config.php';

use app\core\DBQuery;
use app\core\Where;

class Produtos {
	private $id;
	private $nome;
	private $descricao;
	private $preco;
	private $quantidade;
	private $tipo;
	private $ativo;
	private $img01;
	private $img02;
	private $tableName = "hostdeprojetos_FestBum.produtos";
	private $fieldsName = "id, nome, descricao, preco, quantidade, tipo, ativo, img01, img02";
	private $fieldKey = "id";
	private $dbquery = null;
	function __construct() {
		$this->dbquery = new DBQuery ( $this->tableName, $this->fieldsName, $this->fieldKey );
	}
	function populate($id, $nome, $descricao, $preco, $quantidade, $tipo, $ativo, $img01, $img02) {
		$this->setId ( $id );
		$this->setNome ( $nome );
		$this->setDescricao ( $descricao );
		$this->setPreco ( $preco );
		$this->setQuantidade ( $quantidade );
		$this->setTipo ( $tipo );
		$this->setAtivo ( $ativo );
		$this->setImg01 ( $img01 );
		$this->setImg02 ( $img02 );
	}
	public function toArray() {
		return array (
				'id' => $this->getId () ?? 0,
				'nome' => $this->getNome () ?? '',
				'descricao' => $this->getDescricao () ?? '',
				'preco' => $this->getPreco () ?? 0,
				'quantidade' => $this->getQuantidade () ?? 0,
				'tipo' => $this->getTipo () ?? '',
				'ativo' => $this->getAtivo () ?? '',
				'img01' => $this->getImg01 () ?? '',
				'img02' => $this->getImg02 () ?? ''
		);
	}
	public function toJson() {
		return (json_encode ( $this->toArray () ));
	}
	public function toString() {
		return ("\n\t\t\t" . implode ( ", ", $this->toArray () ));
	}
	public function save() {
		if ($this->getId () == 0) {
			return ($this->dbquery->insert ( $this->toArray () ));
		} else {
			return ($this->dbquery->update ( $this->toArray () ));
		}
	}
	public function listAll() {
		$rSet = $this->dbquery->select ();
		return ($rSet);
	}
	public function listByFieldKey($value) {
		$where = (new Where ())->addCondition ( 'AND', $this->fieldKey, '=', $value );
		$rSet = $this->dbquery->selectWhere ( $where );
		return ($rSet);
	}
	public function delete() {
		if ($this->getId () != 0) {
			return ($this->dbquery->delete ( $this->toArray () ));
		}
	}
	public function setId($id) {
		$this->id = $id;
	}
	public function getId() {
		return ($this->id);
	}
	public function setNome($nome) {
		$this->nome = $nome;
	}
	public function getNome() {
		return ($this->nome);
	}
	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}
	public function getDescricao() {
		return ($this->descricao);
	}
	public function setPreco($preco) {
		$this->preco = $preco;
	}
	public function getPreco() {
		return ($this->preco);
	}
	public function setQuantidade($quantidade) {
		$this->quantidade = $quantidade;
	}
	public function getQuantidade() {
		return ($this->quantidade);
	}
	public function setTipo($tipo) {
		$this->tipo = $tipo;
	}
	public function getTipo() {
		return ($this->tipo);
	}
	public function setAtivo($ativo) {
		$this->ativo = $ativo;
	}
	public function getAtivo() {
		return ($this->ativo);
	}
	public function setImg01($img01) {
		$this->img01 = $img01;
	}
	public function getImg01() {
		return ($this->img01);
	}
	public function setImg02($img02) {
		$this->img02 = $img02;
	}
	public function getImg02() {
		return ($this->img02);
	}
}

?>