<?php
session_start();
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';

    if (empty($username) || empty($email) || empty($password) || empty($password_confirm)) {
        $_SESSION['error'] = 'Todos os campos são obrigatórios';
        header('Location: cadastro.php');
        exit;
    }

    if ($password !== $password_confirm) {
        $_SESSION['error'] = 'As senhas não coincidem';
        header('Location: cadastro.php');
        exit;
    }

    if (strlen($password) < 6) {
        $_SESSION['error'] = 'A senha deve ter no mínimo 6 caracteres';
        header('Location: cadastro.php');
        exit;
    }

    try {
        $pdo = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
            DB_USER,
            DB_PASS
        );

        $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ?');
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $_SESSION['error'] = 'Email já cadastrado';
            header('Location: cadastro.php');
            exit;
        }

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $pdo->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
        $stmt->execute([$username, $email, $hashed_password]);

        $_SESSION['success'] = 'Cadastro realizado com sucesso! Faça login.';
        header('Location: login.php');
        exit;
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Erro ao cadastrar usuário';
        header('Location: cadastro.php');
        exit;
    }
}
