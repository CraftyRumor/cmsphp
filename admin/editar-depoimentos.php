<?php
require 'auth.php';
require 'config.php';

// Adicionar novo depoimento
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['novo'])) {
    $stmt = $pdo->prepare("INSERT INTO testimonials (author, message) VALUES (?, ?)");
    $stmt->execute([$_POST['author'], $_POST['message']]);
    $mensagem = "Depoimento adicionado com sucesso!";
}

// Remover depoimento
if (isset($_GET['remover'])) {
    $stmt = $pdo->prepare("DELETE FROM testimonials WHERE id = ?");
    $stmt->execute([$_GET['remover']]);
    $mensagem = "Depoimento removido.";
}

// Buscar depoimentos existentes
$depoimentos = $pdo->query("SELECT * FROM testimonials ORDER BY id DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Depoimentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/cms/landing/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Depoimentos de Clientes</h2>

        <?php if (isset($mensagem)): ?>
            <div class="alert alert-info"><?= $mensagem ?></div>
        <?php endif; ?>

        <form method="POST" class="mb-4">
            <input type="hidden" name="novo" value="1">
            <div class="mb-3">
                <label>Nome do cliente:</label>
                <input type="text" name="author" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Mensagem:</label>
                <textarea name="message" class="form-control" required></textarea>
            </div>
            <button class="btn btn-primary">Adicionar Depoimento</button>
        </form>

        <h4>Depoimentos cadastrados</h4>
        <ul class="list-group">
            <?php foreach ($depoimentos as $d): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong><?= htmlspecialchars($d['author']) ?>:</strong>
                        <?= htmlspecialchars($d['message']) ?>
                    </div>
                    <a href="?remover=<?= $d['id'] ?>" class="btn btn-sm btn-danger">Remover</a>
                </li>
            <?php endforeach; ?>
        </ul>

        <p class="mt-3"><a href="dashboard.php">← Voltar para o painel</a></p>
    </div>
</body>
</html>
