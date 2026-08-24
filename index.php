<?php
session_start();

// Redireciona para login se não estiver autenticado
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - ACME Digital</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body class="dashboard-body">
    <div class="dashboard-container">
        <div class="welcome-section">
            <div class="welcome-card-simple">
                <h1>Bom dia, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>!</h1>
                <a href="logout.php" class="btn btn-logout-main">Fazer Logout</a>
            </div>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>
