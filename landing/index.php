<?php
require '../admin/config.php';

// Função para puxar qualquer conteúdo do site_content
function get_content($section, $field_name) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT content FROM site_content WHERE section = ? AND field_name = ?");
    $stmt->execute([$section, $field_name]);
    return $stmt->fetchColumn() ?? '';
}

// Puxa os serviços cadastrados
$servicos = $pdo->query("SELECT * FROM services ORDER BY id ASC")->fetchAll();
?>

 <?php
// depoimentos codigo php

        function get_testimonials() {
            global $pdo;
            return $pdo->query("SELECT * FROM testimonials ORDER BY id DESC")->fetchAll();
        }
        ?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/cms/landing/css/style.css">
</head>
<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

<!-- INÍCIO SEÇÃO 1 -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                    <h1 class="text-headline headline"><?= htmlspecialchars(get_content('hero', 'headline')) ?></h1>
                    <p class="text-headline-sub description"><?= nl2br(htmlspecialchars(get_content('hero', 'subtitle'))) ?></p>
                    <div class="d-flex justify-content-md-start justify-content-center">
                        <a href="#btn-whatsapp" class="btn-custom-whatsapp btn btn-success btn-lg mt-4"> <i class="fa-brands fa-whatsapp"></i><?= htmlspecialchars(get_content('hero', 'botao')) ?></a> </br>
                    </div>

                </div>
            </div>
        </div>
    </section>
<!-- FINAL SEÇÃO 1 -->

<!-- DETALHE DO ATENDIMENTO -->
        <section class="detalhe py-4">
            <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center mb-4 mb-md-0">
                    <h3><i class="fa-solid fa-headphones"></i> Atendimento Online</h3>
                </div>
                <div class="col-md-6">
                    <h3>Mais de 200 mamães atendidas por mês</h3>
                </div>
            </div>
        </div>

        </section>
<!-- FIM DETALHE -->

<!-- INÍCIO SEÇÃO 2 -->
    <section class="servicos py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h1><?= htmlspecialchars(get_content('servicos', 'titulo')) ?></h1>
                    <p style="font-size: 18px;"><?= nl2br(htmlspecialchars(get_content('servicos', 'subtitulo'))) ?></p>
                </div>
            

                <div class="row">
                    <?php foreach ($servicos as $s): ?>
                        <div class="col-md-4 mb-4">
                                <div class="card h-100 text-center">
                                    <div class="card-body">
                                        <i class="fa <?= htmlspecialchars($s['icon']) ?> fa-2x mb-3 icone-servico"></i>
                                        <h5 class="card-title"><strong><?= htmlspecialchars($s['title']) ?></strong></h5>
                                        <p class="card-text"><?= htmlspecialchars($s['description']) ?></p>
                                    </div>
                                </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                    <!-- BOTAO WP -->
                    <div class="text-center mt-3">
                        <a href="https://wa.me/5547992916915" target="_blank" id="btn-whatsapp" class="btn-custom-whatsapp btn btn-success btn-lg mt-4"> <i class="fa-brands fa-whatsapp"></i>
                            <?= htmlspecialchars(get_content('servicos', 'botao')) ?>
                        </a>
                    </div>        

            </div>
    </section>
<!-- FINAL SEÇÃO 2 -->

<!-- SOBRE O ADVOGADO -->
    <section class="sobre py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center mb-4 mb-md-0">
                    <?php $img = get_content('sobre', 'imagem'); ?>
                    <?php if ($img): ?>
                        <img src="../uploads/<?= htmlspecialchars(get_content('sobre', 'imagem'))?>" alt="Foto do Advogado" class="img-fluid rounded">

                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <h3 class="nomeadv"><?= htmlspecialchars(get_content('sobre', 'nome')) ?></h3>
                    <p><?= nl2br(htmlspecialchars(get_content('sobre', 'bio'))) ?></p>
                    <a href="#btn-whatsapp" class="btn btn-success btn-lg mt-4">Fale com o advogado</a>
                </div>
            </div>
        </div>
    </section>
<!-- FINAL SOBRE ADV -->
 
<!-- PASSO A PASSO -->

        <?php
            $steps = $pdo->query("SELECT * FROM steps ORDER BY id ASC")->fetchAll();
            ?>

        <section class="py-5 atendimento">
            <div class="container">
                <h2 class="text-center mb-4">Como será o seu atendimento</h2>
                <div class="row">
                    <?php foreach ($steps as $step): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card text-center h-100 shadow-sm">
                                <div class="card-body">
                                    <i class="<?= htmlspecialchars($step['icon']) ?> fs-1 mb-3 icone-passos"></i>
                                    <h5 class="card-title"><?= htmlspecialchars($step['title']) ?></h5>
                                    <p class="card-text"><?= htmlspecialchars($step['description']) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>


<!--FINAL PASSO A PASSO -->
<!-- INICIO DEPOIMENTOS -->

<section class="py-5 bg-white" id="depoimentos">
            <div class="container">
                <h2 class="text-center mb-5">O que dizem nossos clientes</h2>
                <div class="row">
                    <?php foreach (get_testimonials() as $t): ?>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm border-0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-person-circle fs-2 text-secondary me-2"></i>
                                        <div>
                                            <h6 class="mb-0"><?= htmlspecialchars($t['author']) ?></h6>
                                            <small class="text-muted">
                                                <?= isset($t['created_at']) ? date('d/m/Y', strtotime($t['created_at'])) : '' ?>
                                            </small>
                                        </div>
                                    </div>

                                    <div class="mb-2 text-warning">
                                        <?php
                                        $stars = isset($t['rating']) ? (int)$t['rating'] : 5;
                                        for ($i = 1; $i <= 5; $i++) {
                                            echo $i <= $stars ? '<i class="bi bi-star-fill"></i>' : '<i class="bi bi-star"></i>';
                                        }
                                        ?>
                                    </div>

                                    <p class="card-text"><?= nl2br(htmlspecialchars($t['message'])) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
</section>

<!-- FINAL DEPOIMENTOS -->

<!-- FAQ -->
        <?php
            $faqs = $pdo->query("SELECT * FROM faq ORDER BY id ASC")->fetchAll();
        ?>

        <section class="py-5" id="faq">
            <div class="container">
                <h2 class="text-center mb-4">Perguntas Frequentes</h2>

                <div class="accordion" id="faqAccordion">
                    <?php foreach ($faqs as $index => $faq): ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading<?= $faq['id'] ?>">
                                <button class="accordion-button <?= $index !== 0 ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $faq['id'] ?>" aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>" aria-controls="collapse<?= $faq['id'] ?>">
                                    <?= htmlspecialchars($faq['question']) ?>
                                </button>
                            </h2>
                            <div id="collapse<?= $faq['id'] ?>" class="accordion-collapse collapse <?= $index === 0 ? 'show' : '' ?>" aria-labelledby="heading<?= $faq['id'] ?>" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <?= nl2br(htmlspecialchars($faq['answer'])) ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

<!-- FINAL FAQ -->

    <footer class="bg-footer text-white p-4 text-center">
        <p><?= get_content('footer', 'address') ?></p>
        <p><?= get_content('footer', 'phone') ?> | <?= get_content('footer', 'email') ?></p>
        <a class="btn btn-success" href="https://wa.me/<?= get_content('footer', 'whatsapp') ?>" target="_blank">WhatsApp</a>
    </footer>


    <!-- script clique contagem de clique WP -->

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const btn = document.getElementById("btn-whatsapp");
            if (btn) {
                btn.addEventListener("click", function () {
                    fetch("registrar-clique.php");
                });
            }
        });
    </script>  

</body>
</html>