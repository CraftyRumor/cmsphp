<?php
require 'auth.php';
require 'config.php';

$mensagem = "";

// Inserir novo passo
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $icon = $_POST['icon'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("INSERT INTO steps (icon, title, description) VALUES (?, ?, ?)");
    $stmt->execute([$icon, $title, $description]);
    $mensagem = "Passo cadastrado com sucesso!";
}

// Excluir
if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    $pdo->prepare("DELETE FROM steps WHERE id = ?")->execute([$id]);
    header("Location: editar-passos.php");
    exit;
}

// Buscar todos os passos
$steps = $pdo->query("SELECT * FROM steps ORDER BY id ASC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Passo a Passo</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/cms/landing/css/style.css">
</head>
<body>
<div class="container mt-5">
    <h2>Como será o seu atendimento</h2>

    <?php if ($mensagem): ?>
        <div class="alert alert-success"><?= $mensagem ?></div>
    <?php endif; ?>

    <form method="POST" class="mb-4">
        <div class="mb-3">
            <label>Ícone (classe do Bootstrap ou FontAwesome):</label>
            <input type="text" name="icon" class="form-control" required>
            <small class="text-muted">Ex: bi-check-circle, fas fa-user, etc.</small>
        </div>
        <div class="mb-3">
            <label>Título:</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Descrição:</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
        </div>
        <button class="btn btn-primary">Adicionar passo</button>
    </form>

    <?php if ($steps): ?>
        <h4>Passos já cadastrados:</h4>
        <ul class="list-group">
            <?php foreach ($steps as $step): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong><?= htmlspecialchars($step['title']) ?></strong><br>
                        <small><?= htmlspecialchars($step['description']) ?></small>
                    </div>
                    <a href="?delete=<?= $step['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Excluir este passo?')">Excluir</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <p class="mt-3"><a href="dashboard.php">← Voltar para o painel</a></p>
</div>
</body>
</html>
