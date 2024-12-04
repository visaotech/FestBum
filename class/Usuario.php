<?php

class Usuario {

    private $nome;
    private $sobrenome;
    private $email;
    private $senha;

    function __construct($nome = null, $sobrenome = null, $email = null, $senha = null) {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->email = $email;
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function getNome() {
        return $this->nome;
    }

    public function getSobrenome() {
        return $this->sobrenome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return  str_replace("\'",'', $this->senha);
    }

    public function setNome ($nome) {
        $this->nome = $nome;
    }

    public function setSobrenome ($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    public function setEmail ($email) {
        $this->email = $email;
    }

    public function setSenha ($senha) {
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

}