<?php

class Connection {
    // Definição das credenciais de acesso
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'festbum';

    // Método para conectar ao banco de dados
    public function connection() {
        $con = new mysqli($this->host, $this->username, $this->password, $this->database);
        
        // Verificando se a conexão falhou
        if ($con->connect_error) {
            die("Falha na conexão: " . $con->connect_error);  // Exibe mensagem de erro caso a conexão falhe
        }
        
        // Definindo o charset para UTF-8
        mysqli_set_charset($con, 'utf8');
        return $con;
    }

    // Método para inserir um novo usuário no banco de dados
    public function createUsuario($primeironome, $sobrenome, $cidade, $estado, $cep, $email, $senha, $sexo, $data_nascimento) {
        // Obtendo a conexão
        $con = $this->connection();
        
        // Preparando a consulta SQL
        $stmt = $con->prepare("INSERT INTO usuarios (primeironome, sobrenome, cidade, estado, cep, email, senha, sexo, data_nascimento) 
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        // Verificando se a preparação da consulta falhou
        if ($stmt === false) {
            die("Erro ao preparar a consulta: " . $con->error);
        }

        // Vinculando os parâmetros aos valores
        $stmt->bind_param("sssssssss", $primeironome, $sobrenome, $cidade, $estado, $cep, $email, $senha, $sexo, $data_nascimento);  // 'sssssssss' para 9 parâmetros do tipo string

        // Executando a consulta
        if ($stmt->execute()) {
            echo "Usuário inserido com sucesso!";
        } else {
            echo "Erro ao inserir o usuário: " . $stmt->error;
        }

        // Fechando o statement e a conexão
        $stmt->close();
        $con->close();
    }

    // Método para inicializar o cURL, caso precise para outra parte do sistema
    public function initCURL() {
        $ch = curl_init();
        return $ch;
    }
}


?>
