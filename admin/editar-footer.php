<?php
require 'auth.php';
require 'config.php';

// Salvar alterações
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $campos = ['address', 'phone', 'email', 'whatsapp'];
    foreach ($campos as $campo) {
        $stmt = $pdo->prepare("REPLACE INTO site_content (section, field_name, content) VALUES ('footer', ?, ?)");
        $stmt->execute([$campo, $_POST[$campo]]);
    }
    $mensagem = "Rodapé atualizado com sucesso!";
}

// Função para exibir valores atuais
function get_value($campo) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT content FROM site_content WHERE section = 'footer' AND field_name = ?");
    $stmt->execute([$campo]);
    return $stmt->fetchColumn() ?? '';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Rodapé</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/cms/landing/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Rodapé</h2>
        <?php if (isset($mensagem)): ?>
            <div class="alert alert-success"><?= $mensagem ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label>Endereço:</label>
                <input type="text" name="address" value="<?= htmlspecialchars(get_value('address')) ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Telefone:</label>
                <input type="text" name="phone" value="<?= htmlspecialchars(get_value('phone')) ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email:</label>
                <input type="email" name="email" value="<?= htmlspecialchars(get_value('email')) ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>WhatsApp (somente número com DDD):</label>
                <input type="text" name="whatsapp" value="<?= htmlspecialchars(get_value('whatsapp')) ?>" class="form-control" required>
            </div>
            <button class="btn btn-primary">Salvar Alterações</button>
        </form>

        <p class="mt-3"><a href="dashboard.php">← Voltar para o painel</a></p>
    </div>
</body>
</html>
