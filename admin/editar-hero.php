<?php
require 'auth.php';
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $campos = ['headline', 'subtitle', 'botao'];
    foreach ($campos as $campo) {
        $stmt = $pdo->prepare("REPLACE INTO site_content (section, field_name, content) VALUES ('hero', ?, ?)");
        $stmt->execute([$campo, $_POST[$campo]]);
    }
    $mensagem = "Seção inicial atualizada com sucesso!";
}

function get_value($campo) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT content FROM site_content WHERE section = 'hero' AND field_name = ?");
    $stmt->execute([$campo]);
    return $stmt->fetchColumn() ?? '';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Seção Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/cms/landing/css/style.css">
</head>
<body>
<div class="container mt-5">
    <h2>Editar Seção Inicial (Hero)</h2>

    <?php if (isset($mensagem)): ?>
        <div class="alert alert-success"><?= $mensagem ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label>Headline:</label>
            <input type="text" name="headline" value="<?= htmlspecialchars(get_value('headline')) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Subtítulo:</label>
            <textarea name="subtitle" class="form-control" required><?= htmlspecialchars(get_value('subtitle')) ?></textarea>
        </div>
        <div class="mb-3">
            <label>Texto do botão WhatsApp:</label>
            <input type="text" name="botao" value="<?= htmlspecialchars(get_value('botao')) ?>" class="form-control" required>
        </div>
        <button class="btn btn-primary">Salvar Alterações</button>
    </form>

    <p class="mt-3"><a href="dashboard.php">← Voltar para o painel</a></p>
</div>
</body>
</html>
