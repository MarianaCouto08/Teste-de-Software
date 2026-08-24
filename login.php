<?php
session_start();

// Se já está logado, redireciona
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ACME Digital</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="form-box">
            <h2>Login</h2>
            
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-error">
                    <span><?php echo htmlspecialchars($_SESSION['error']); ?></span>
                    <button class="alert-close" onclick="this.parentElement.style.display='none';">×</button>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
            
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <span><?php echo htmlspecialchars($_SESSION['success']); ?></span>
                    <button class="alert-close" onclick="this.parentElement.style.display='none';">×</button>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>
            
            <form method="POST" action="process_login.php">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn">Entrar</button>
            </form>
            <p>Não tem conta? <a href="cadastro.php">Cadastre-se aqui</a></p>
        </div>
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>
