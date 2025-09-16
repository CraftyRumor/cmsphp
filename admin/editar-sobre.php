<?php
require 'auth.php';
require 'config.php';

$mensagem = "";

// Atualizar dados
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $bio = $_POST['bio'];

    // Salva nome e bio
    $campos = ['nome' => $nome, 'bio' => $bio];
    foreach ($campos as $campo => $valor) {
        $stmt = $pdo->prepare("REPLACE INTO site_content (section, field_name, content) VALUES ('sobre', ?, ?)");
        $stmt->execute([$campo, $valor]);
    }

    // Upload da imagem, se enviada
    if (!empty($_FILES['imagem']['name'])) {
        $ext = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
        $nome_arquivo = 'sobre_' . time() . '.' . $ext;
        $destino = '../uploads/' . $nome_arquivo;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)) {
            // Salva o nome da imagem no banco (sem caminho)
            $stmt = $pdo->prepare("REPLACE INTO site_content (section, field_name, content) VALUES ('sobre', 'imagem', ?)");
            $stmt->execute([$nome_arquivo]);
            $mensagem = "Dados salvos com sucesso!";
        } else {
            $mensagem = "Erro ao fazer upload da imagem.";
        }
    } else {
        $mensagem = "Dados salvos com sucesso!";
    }
}

// Função para buscar valor
function get_valor($campo) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT content FROM site_content WHERE section = 'sobre' AND field_name = ?");
    $stmt->execute([$campo]);
    return $stmt->fetchColumn() ?? '';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Sobre o Advogado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/cms/landing/css/style.css">
</head>
<body>
<div class="container mt-5">
    <h2>Editar Sobre o Advogado</h2>

    <?php if (!empty($mensagem)): ?>
        <div class="alert alert-info"><?= $mensagem ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Nome:</label>
            <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars(get_valor('nome')) ?>" required>
        </div>
        <div class="mb-3">
            <label>Biografia:</label>
            <textarea name="bio" class="form-control" rows="5" required><?= htmlspecialchars(get_valor('bio')) ?></textarea>
        </div>
        <div class="mb-3">
            <label>Foto do Advogado (JPG ou PNG):</label>
            <input type="file" name="imagem" class="form-control">
            <?php if (get_valor('imagem')): ?>
                <div class="mt-2">
                    <img src="../uploads/<?= htmlspecialchars(get_valor('imagem')) ?>" alt="Foto atual" width="150">
                </div>
            <?php endif; ?>
        </div>
        <button class="btn btn-primary">Salvar Alterações</button>
    </form>

    <p class="mt-3"><a href="dashboard.php">← Voltar para o painel</a></p>
</div>
</body>
</html>
