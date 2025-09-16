<?php
require 'auth.php';
require 'config.php';

// Atualizar título, subtítulo e botão
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['salvar_textos'])) {
    $campos = ['titulo', 'subtitulo', 'botao'];
    foreach ($campos as $campo) {
        $stmt = $pdo->prepare("REPLACE INTO site_content (section, field_name, content) VALUES ('servicos', ?, ?)");
        $stmt->execute([$campo, $_POST[$campo]]);
    }
    $mensagem = "Textos atualizados com sucesso!";
}

// Adicionar novo serviço
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['add_servico'])) {
    $stmt = $pdo->prepare("INSERT INTO services (icon, title, description) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['icon'], $_POST['title'], $_POST['description']]);
}

// Excluir serviço
if (isset($_GET['excluir'])) {
    $stmt = $pdo->prepare("DELETE FROM services WHERE id = ?");
    $stmt->execute([$_GET['excluir']]);
    header("Location: editar-servicos.php");
    exit;
}

// Buscar textos
function get_valor($campo) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT content FROM site_content WHERE section = 'servicos' AND field_name = ?");
    $stmt->execute([$campo]);
    return $stmt->fetchColumn() ?? '';
}

// Buscar serviços
$servicos = $pdo->query("SELECT * FROM services ORDER BY id DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Serviços</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/cms/landing/css/style.css">
</head>
<body>
<div class="container mt-5">
    <h2>Editar Seção de Serviços</h2>

    <?php if (isset($mensagem)): ?>
        <div class="alert alert-success"><?= $mensagem ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="hidden" name="salvar_textos" value="1">
        <div class="mb-3">
            <label>Título da Seção:</label>
            <input type="text" name="titulo" value="<?= htmlspecialchars(get_valor('titulo')) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Subtítulo da Seção:</label>
            <input type="text" name="subtitulo" value="<?= htmlspecialchars(get_valor('subtitulo')) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Texto do botão WhatsApp:</label>
            <input type="text" name="botao" value="<?= htmlspecialchars(get_valor('botao')) ?>" class="form-control" required>
        </div>
        <button class="btn btn-primary">Salvar Textos</button>
    </form>

    <hr>

    <h4>Serviços</h4>
    <form method="POST" class="mb-4">
        <input type="hidden" name="add_servico" value="1">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Ícone (FontAwesome, ex: fa-gavel):</label>
                <input type="text" name="icon" class="form-control" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Título:</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Descrição:</label>
                <input type="text" name="description" class="form-control" required>
            </div>
        </div>
        <button class="btn btn-success">Adicionar Serviço</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Ícone</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($servicos as $servico): ?>
            <tr>
                <td><i class="fa <?= htmlspecialchars($servico['icon']) ?>"></i> <?= $servico['icon'] ?></td>
                <td><?= htmlspecialchars($servico['title']) ?></td>
                <td><?= htmlspecialchars($servico['description']) ?></td>
                <td>
                    <a href="?excluir=<?= $servico['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Excluir este serviço?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <p><a href="dashboard.php">← Voltar para o painel</a></p>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</body>
</html>
