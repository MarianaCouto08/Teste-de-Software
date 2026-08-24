<?php
require_once 'config/database.php';

echo "<h2>Testando Conexão com Banco de Dados</h2>";
echo "<hr>";

try {
    $pdo = new PDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
        DB_USER,
        DB_PASS
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<p style='color: green;'><strong>✅ Conexão bem-sucedida!</strong></p>";
    
    // Verificar se a tabela existe
    $stmt = $pdo->prepare("SHOW TABLES LIKE 'users'");
    $stmt->execute();
    
    if ($stmt->fetch()) {
        echo "<p style='color: green;'><strong>✅ Tabela 'users' encontrada!</strong></p>";
        
        // Contar usuários
        $stmt = $pdo->query("SELECT COUNT(*) as total FROM users");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<p>Total de usuários cadastrados: <strong>" . $result['total'] . "</strong></p>";
    } else {
        echo "<p style='color: red;'><strong>❌ Tabela 'users' não encontrada!</strong></p>";
        echo "<p>Execute o arquivo database.sql no seu banco de dados:</p>";
        echo "<pre>1. Acesse: http://localhost/phpmyadmin</pre>";
        echo "<pre>2. Crie um novo banco de dados chamado 'acme_digital'</pre>";
        echo "<pre>3. Importe o arquivo database.sql</pre>";
    }
    
} catch (PDOException $e) {
    echo "<p style='color: red;'><strong>❌ Erro na conexão:</strong></p>";
    echo "<p>" . $e->getMessage() . "</p>";
    echo "<hr>";
    echo "<p><strong>Verifique:</strong></p>";
    echo "<ul>";
    echo "<li>Se o MySQL/MariaDB está rodando</li>";
    echo "<li>Se o banco de dados 'acme_digital' foi criado</li>";
    echo "<li>Se as configurações em config/database.php estão corretas</li>";
    echo "</ul>";
}
?>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background: #f5f5f5;
    }
    h2 {
        color: #333;
    }
    pre {
        background: #333;
        color: #0f0;
        padding: 15px;
        border-radius: 5px;
        overflow-x: auto;
    }
</style>
