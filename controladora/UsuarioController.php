<?php

require_once('../class/Usuario.php');
require_once('../modelo/UsuarioDAO.php');
require_once('./conexao.php');

class UsuarioController {

    // Método para registrar um usuário
    public function cadastrar($nome, $sobrenome, $email, $senha, $cidade, $estado, $cep, $sexo, $data_nascimento) {
        session_start(); // Inicia a sessão
        $conexao = new Connection();
        
        // Cria um objeto Usuario com os campos adicionais
        $usuario = new Usuario($nome, $sobrenome, $email, $senha, $cidade, $estado, $cep, $sexo, $data_nascimento);
        $usuarioDAO = new UsuarioDAO();
        
        // Verifica se o e-mail já está registrado
        $resultado = $usuarioDAO->verificaEmail($conexao, $usuario);
        
        if ($resultado && $resultado->num_rows == 0) {
            // Se o e-mail não estiver registrado, cria o usuário
            $usuarioDAO->create($conexao, $usuario);
            $_SESSION['email'] = $usuario->getEmail(); // Inicia a sessão com o e-mail
            $_SESSION['user_id'] = $usuario->getId();  // Define o ID do usuário na sessão
            header('Location: ../visao/dashboard.php'); // Redireciona para o dashboard
        } else {
            echo "<script>alert('Esse email já está cadastrado!')</script>";
        }
    }

    // Método para realizar o login do usuário
    public function login($email, $senha) {
        session_start(); // Inicia a sessão
        $conexao = new Connection();
        $usuario = new Usuario();
        $usuarioDAO = new UsuarioDAO();
        
        $usuario->setEmail($email);
        $usuario->setSenha($senha);

        // Verifica o e-mail
        $resultado = $usuarioDAO->verificaEmail($conexao, $usuario);
        
        if ($resultado && $resultado->num_rows > 0) {
            // Se o e-mail existir, busca os dados do usuário
            $user = $resultado->fetch_assoc();
            $senha_hash = $user['senha'];
            
            // Verifica a senha
            if (password_verify($senha, $senha_hash)) {
                // Inicia a sessão e define as variáveis de sessão
                $_SESSION['email'] = $email;
                $_SESSION['user_id'] = $user['id']; // Supondo que você tenha um campo ID no seu banco de dados
                header('Location: ../visao/dashboard.php'); // Redireciona para o dashboard do usuário após login
            } else {
                echo "<script>alert('Senha incorreta!')</script>";
            }
        } else {
            echo "<script>alert('Usuário não encontrado!')</script>";
        }
    }

    // Método para atualizar o campo de login (exemplo: atualizar o último horário de login)
    public function atualizaCampoLogin() {
        session_start(); // Inicia a sessão
        $conexao = new Connection();
        $usuarioDAO = new UsuarioDAO();
        $usuarioDAO->atualizaLogin($conexao);
    }

    // Método para obter as informações do usuário a partir da sessão
    public function info() {
        session_start(); // Inicia a sessão
        $conexao = new Connection();
        $usuario = new Usuario();
        $usuarioDAO = new UsuarioDAO();

        // Verifica se o usuário está logado (via sessão)
        if (isset($_SESSION['email'])) {
            $usuario->setEmail($_SESSION['email']);
            $resultado = $usuarioDAO->verificaEmail($conexao, $usuario);

            if ($resultado && $resultado->num_rows > 0) {
                $dado = $resultado->fetch_assoc();
                // Define os dados do usuário
                $usuario->setNome($dado['nome']);
                $usuario->setSobrenome($dado['sobrenome']);
                $usuario->setCidade($dado['cidade']);  
                $usuario->setEstado($dado['estado']);
                $usuario->setCep($dado['cep']);
                $usuario->setSexo($dado['sexo']);
                $usuario->setDataNascimento($dado['data_nascimento']);
                
                return $usuario;
            } else {
                header('Location: ../visao/login.php');
            }
        } else {
            header('Location: ../visao/login.php');
        }
    }

    // Método para atualizar o perfil do usuário
    public function atualizaCadastro($nome, $sobrenome, $email, $cidade, $estado, $cep, $sexo, $data_nascimento) {
        session_start(); // Inicia a sessão
        $conexao = new Connection();
        $usuario = new Usuario($nome, $sobrenome, $email, null, $cidade, $estado, $cep, $sexo, $data_nascimento);
        $usuarioDAO = new UsuarioDAO();
        $resultado = $usuarioDAO->update($conexao, $usuario);

        if($resultado) {
            header('Location: ../visao/profile.php');
        } else {
            header('Location: ../visao/profile.php?msg=falha');
        }
    }

    // Método para atualizar a senha do usuário
    public function atualizaSenha($email, $senha_atual, $senha) {
        session_start(); // Inicia a sessão
        $conexao = new Connection();
        $usuario = new Usuario();
        $usuarioDAO = new UsuarioDAO();
        
        $usuario->setEmail($email);
        $usuario->setSenha($senha);

        $resultado = $usuarioDAO->verificaEmail($conexao, $usuario);

        if($resultado && $resultado->num_rows == 0) {
            header('Location: ../visao/profile.php?msg=Usuário Incorreto!');
        } else {
            $user = $resultado->fetch_assoc();
        }
    }
}
