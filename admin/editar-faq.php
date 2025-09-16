<?php
require 'config.php';

// Inserir novo FAQ
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pergunta'], $_POST['resposta'])) {
    $pergunta = trim($_POST['pergunta']);
    $resposta = trim($_POST['resposta']);

    if ($pergunta && $resposta) {
        $stmt = $pdo->prepare("INSERT INTO faq (question, answer) VALUES (?, ?)");
        $stmt->execute([$pergunta, $resposta]);
        header("Location: editar-faq.php");
        exit;
    }
}

// Excluir
if (isset($_GET['excluir'])) {
    $id = (int)$_GET['excluir'];
    $pdo->prepare("DELETE FROM faq WHERE id = ?")->execute([$id]);
    header("Location: editar-faq.php");
    exit;
}

// Listar todos
$faqs = $pdo->query("SELECT * FROM faq ORDER BY id DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar FAQ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/cms/landing/css/style.css">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-4">Perguntas Frequentes (FAQ)</h1>

        <!-- Formulário -->
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Pergunta</label>
                        <input type="text" name="pergunta" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Resposta</label>
                        <textarea name="resposta" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Adicionar Pergunta</button>
                </form>
            </div>
        </div>

        <!-- Lista de FAQs -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Perguntas cadastradas</h5>
                <ul class="list-group">
                    <?php foreach ($faqs as $faq): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div>
                                <strong><?= htmlspecialchars($faq['question']) ?></strong><br>
                                <small><?= nl2br(htmlspecialchars($faq['answer'])) ?></small>
                            </div>
                            <a href="?excluir=<?= $faq['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Excluir esta pergunta?')">
                                Excluir
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

    </div>
</body>
</html>
