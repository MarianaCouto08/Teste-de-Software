<?php
session_start();
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $_SESSION['error'] = 'Email e senha são obrigatórios';
        header('Location: login.php');
        exit;
    }

    try {
        $pdo = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
            DB_USER,
            DB_PASS
        );

        $stmt = $pdo->prepare('SELECT id, username, password FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: index.php');
            exit;
        } else {
            $_SESSION['error'] = 'Email ou senha incorretos';
            header('Location: login.php');
            exit;
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Erro ao conectar ao banco de dados';
        header('Location: login.php');
        exit;
    }
}
