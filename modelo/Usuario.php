<?php
class Usuario {
    private ?int $id; 
    private string $primeironome;
    private string $sobrenome;
    private string $cidade;
    private string $estado;
    private string $cep;
    private string $email;
    private string $senha;

    public function __construct(?int $id, string $primeironome, string $sobrenome, string $cidade, string $estado, string $cep, string $email, string $senha) {
        $this->id = $id;
        $this->primeironome = $primeironome;
        $this->sobrenome = $sobrenome;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->cep = $cep;
        $this->email = $email;
        $this->senha = $senha;
    }

    // Métodos getters e setters
    public function getId(): ?int {
        return $this->id;
    }

    public function getPrimeironome(): string {
        return $this->primeironome;
    }

    public function getSobrenome(): string {
        return $this->sobrenome;
    }

    public function getCidade(): string {
        return $this->cidade;
    }

    public function getEstado(): string {
        return $this->estado;
    }

    public function getCep(): string {
        return $this->cep;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getSenha(): string {
        return $this->senha;
    }
}
?>
