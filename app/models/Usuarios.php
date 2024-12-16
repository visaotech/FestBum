<?php

namespace app\models;

require_once dirname ( __DIR__, 1 ) . '/config.php';

use app\core\DBQuery;
use app\core\Where;

class Usuarios {
	private $idUsuario;
	private $email;
	private $senha;
	private $nome;
	private $ativo;
	private $perfil;
	private $dataCriacao;
	private $dataAtualizacao;
	private $foto;
	private $tableName = "hostdeprojetos_FestBum.usuarios";
	private $fieldsName = "idUsuario, email, senha, nome, ativo, perfil, dataCriacao, dataAtualizacao, foto";
	private $fieldKey = "idUsuario";
	private $dbquery = null;
	function __construct() {
		$this->dbquery = new DBQuery ( $this->tableName, $this->fieldsName, $this->fieldKey );
	}
	function populate($idUsuario, $email, $senha, $nome, $ativo, $perfil, $dataCriacao, $dataAtualizacao, $foto) {
		// $senhaHash = password_hash ( $senha, PASSWORD_BCRYPT );
		$this->setIdUsuario ( $idUsuario );
		$this->setEmail ( $email );
		$this->setSenha ( $senha );
		$this->setNome ( $nome );
		$this->setAtivo ( $ativo );
		$this->setPerfil ( $perfil );
		$this->setDataCriacao ( $dataCriacao );
		$this->setDataAtualizacao ( $dataAtualizacao );
		$this->setFoto ( $foto );
	}
	public function toArray() {
		return array (
				'idUsuario' => $this->getIdUsuario (),
				'email' => $this->getEmail (),
				'senha' => $this->getSenha (),
				'nome' => $this->getNome (),
				'ativo' => $this->getAtivo (),
				'perfil' => $this->getPerfil (),
				'dataCriacao' => $this->getDataCriacao (),
				'dataAtualizacao' => $this->getDataAtualizacao (),
				'foto' => $this->getFoto ()
		);
	}
	public function toJson() {
		return (json_encode ( $this->toArray () ));
	}
	public function toString() {
		return ("\n\t\t\t" . implode ( ", ", $this->toArray () ));
	}
	public function save() {
		if ($this->getIdUsuario () == 0) {
			return ($this->dbquery->insert ( $this->toArray () ));
		} else {
			return ($this->dbquery->update ( $this->toArray () ));
		}
	}
	public function listAll() {
		$rSet = $this->dbquery->select ();
		$rSetSaida = array ();
		foreach ( $rSet as $linha ) {
			$linha ['senha'] = null;
			$rSetSaida [] = $linha;
		}
		return ($rSetSaida);
	}
	public function listByFieldKey($value) {
		$where = (new Where ())->addCondition ( 'AND', $this->fieldKey, '=', $value );
		$rSet = $this->dbquery->selectWhere ( $where );
		return ($rSet);
	}
	public function findLogin($email, $senha) {
		$where = new Where ();
		$where->addCondition ( 'AND', 'email', '=', \addslashes ( $email ) );
		$where->addCondition ( 'AND', 'senha', '=', \addslashes ( $senha ) );
		$rSet = $this->dbquery->selectWhere ( $where );
		return ($rSet);
	}
	public function delete() {
		if ($this->getIdUsuario () != 0) {
			return ($this->dbquery->delete ( $this->toArray () ));
		}
	}
	public function setIdUsuario($idUsuario) {
		$this->idUsuario = $idUsuario;
	}
	public function getIdUsuario() {
		return ($this->idUsuario);
	}
	public function setEmail($email) {
		$this->email = $email;
	}
	public function getEmail() {
		return ($this->email);
	}
	public function setSenha($senha) {
		$this->senha = $senha;
	}
	public function getSenha() {
		return ($this->senha);
	}
	public function setNome($nome) {
		$this->nome = $nome;
	}
	public function getNome() {
		return ($this->nome);
	}
	public function setAtivo($ativo) {
		$this->ativo = $ativo;
	}
	public function getAtivo() {
		return ($this->ativo);
	}
	public function setPerfil($perfil) {
		$this->perfil = $perfil;
	}
	public function getPerfil() {
		return ($this->perfil);
	}
	public function setDataCriacao($dataCriacao) {
		$this->dataCriacao = $dataCriacao;
	}
	public function getDataCriacao() {
		return ($this->dataCriacao);
	}
	public function setDataAtualizacao($dataAtualizacao) {
		$this->dataAtualizacao = $dataAtualizacao;
	}
	public function getDataAtualizacao() {
		return ($this->dataAtualizacao);
	}
	public function setFoto($foto) {
		$this->foto = $foto;
	}
	public function getFoto() {
		return ($this->foto);
	}
}

?>