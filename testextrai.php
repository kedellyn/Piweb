<?php
try {
    include 'criardiscente.php';
    // Configurações do banco de dados
    $dsn = 'mysql:host=localhost;dbname=login';
    $usuario = 'root';
    $senha = '';

    // Cria uma instância do PDO
    $pdo = new PDO($dsn, $usuario, $senha);

    // Define o modo de erro do PDO para exceção
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query SQL para extrair informações da tabela discente
    $query = "SELECT nome, email, curso FROM discente WHERE matricula = '$matricula' ";

    // Prepara e executa a consulta
    $stmt = $pdo->query($query);

    // Obtém os resultados
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Atribui os valores a variáveis
    foreach ($resultados as $row) {
        $nome = $row['nome'];
        $email = $row['email'];
        $curso = $row['curso'];

        // Faça o que quiser com as variáveis, por exemplo, exibindo na tela
        echo "Nome: $nome, Email: $email, Curso: $curso<br>";
    }
} catch (PDOException $e) {
    // Em caso de erro, exibe a mensagem de erro
    echo 'Erro: ' . $e->getMessage();
}

// Fecha a conexão
$pdo = null;
?>