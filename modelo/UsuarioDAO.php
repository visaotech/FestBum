<?php
class UsuarioDAO {

    // Método para criar um novo usuário
    public function create(Connection $con, Usuario $usuario) {
        $query = 'INSERT INTO `usuarios` (primeironome, sobrenome, senha, email) 
                  VALUES (:nome, :sobrenome, :senha, :email)';
        $stmt = $con->getConnection()->prepare($query);  // Usando o método getConnection()

        // Sanitizando e validando os dados do usuário
        $nome = htmlspecialchars(trim($usuario->getNome()));
        $sobrenome = htmlspecialchars(trim($usuario->getSobrenome()));
        $email = filter_var(trim($usuario->getEmail()), FILTER_VALIDATE_EMAIL);
        $senha = $usuario->getSenha();

        // Bind dos parâmetros
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);

        return $stmt->execute();  // Executa a query
    }

    // Método para ler os dados de um usuário
    public function read(Connection $con, Usuario $usuario) {
        $query = 'SELECT * FROM `usuarios` WHERE `email` = :email AND `senha` = :senha';
        $stmt = $con->getConnection()->prepare($query);  // Usando o método getConnection()

        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();

        // Bind dos parâmetros
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);

        $stmt->execute();  // Executa a query
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Retorna todos os resultados
    }

    // Método para atualizar os dados do usuário
    public function update(Connection $con, Usuario $usuario) {
        session_start();
        if (!isset($_SESSION['id'])) {
            throw new Exception('Usuário não está logado!');
        }
        
        $id = $_SESSION['id'];  // Obtém o ID do usuário da sessão
        $query = 'UPDATE usuarios 
                  SET primeironome = :nome, 
                      sobrenome = :sobrenome, 
                      email = :email 
                  WHERE id = :id';
        $stmt = $con->getConnection()->prepare($query);  // Usando o método getConnection()

        // Bind dos parâmetros
        $nome = $usuario->getNome();
        $sobrenome = $usuario->getSobrenome();
        $email = $usuario->getEmail();
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();  // Executa a query
    }

    // Método para deletar o usuário
    public function delete(Connection $con) {
        session_start();
        if (!isset($_SESSION['id'])) {
            throw new Exception('Usuário não está logado!');
        }
        
        $id = $_SESSION['id'];  // Obtém o ID do usuário da sessão
        $query = 'DELETE FROM `usuarios` WHERE `id` = :id';
        $stmt = $con->getConnection()->prepare($query);  // Usando o método getConnection()
        $stmt->bindParam(':id', $id);

        return $stmt->execute();  // Executa a query
    }

    // Método para verificar se o e-mail já existe
    public function verificaEmail(Connection $con, Usuario $usuario) {
        $query = 'SELECT * FROM `usuarios` WHERE `email` = :email';
        $stmt = $con->getConnection()->prepare($query);  // Usando o método getConnection()
        $email = $usuario->getEmail();
        $stmt->bindParam(':email', $email);
        $stmt->execute();  // Executa a query
        return $stmt->fetch(PDO::FETCH_ASSOC);  // Retorna o primeiro resultado
    }

    // Método para atualizar o campo de login (como o último login, por exemplo)
    public function atualizaLogin(Connection $con) {
        session_start();
        if (!isset($_SESSION['id'])) {
            throw new Exception('Usuário não está logado!');
        }

        $query = 'UPDATE usuarios SET login = "1" WHERE id = :id';
        $stmt = $con->getConnection()->prepare($query);  // Usando o método getConnection()

        $id = $_SESSION['id'];  // Obtém o ID do usuário da sessão
        $stmt->bindParam(':id', $id);

        return $stmt->execute();  // Executa a query
    }

    // Método para alterar a senha do usuário
    public function mudaSenha(Connection $con, Usuario $usuario) {
        session_start();
        if (!isset($_SESSION['id'])) {
            throw new Exception('Usuário não está logado!');
        }

        $query = 'UPDATE usuarios
                  SET senha = :senha
                  WHERE id = :id';
        $stmt = $con->getConnection()->prepare($query);  // Usando o método getConnection()

        $senha = $usuario->getSenha();
        $id = $_SESSION['id'];  // Obtém o ID do usuário da sessão

        $stmt->bindParam(':senha', $senha);  // Bind para a senha
        $stmt->bindParam(':id', $id);  // Bind para o ID do usuário

        return $stmt->execute();  // Executa a query
    }
}
?>
