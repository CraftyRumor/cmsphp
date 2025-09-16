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
    <title>Criação de Landing Page para Advogados | Carlos Rocha Dev</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/cms/landing/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>

    <script src="scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

<!-- ATENÇÃO -->
        <section class="atencao">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <h2 class="textos-gerais text-light">Entregamos sua Landing Page em até 3 dias úteis. <strong>Pague só depois de pronto!</strong></h2>
                    </div>
                </div>
            </div>
        </section>
<!-- FINAL ATENÇÃO -->


    <!-- INÍCIO SEÇÃO 1 -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="logo">
                    <img src="css/img/logo.png" alt="logo">
                </div>
                <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                    <h1 class="text-headline headline"><span class="texto-laranja">Landing Page para Advogados:</span> captação de clientes com segurança jurídica</h1>
                    <p class="text-headline-sub description">Criação de páginas profissionais otimizadas para atrair clientes, respeitando as regras da OAB.</p>
                    <p class="text-headline-sub description2">Integração com WhatsApp, SEO, painel de controle e <strong> pagamento só após aprovação.</strong></p>

                    <div class="d-flex justify-content-md-start justify-content-center">
                        <a href="#btn-whatsapp" class="btn-custom-whatsapp btn btn-success btn-lg mt-4"> <i class="fa-brands fa-whatsapp"></i> Quero fazer minha Landing Page</a> </br>
                    </div>

                </div>
            </div>
        </div>
    </section>
<!-- FINAL SEÇÃO 1 -->

<!-- DETALHE DO ATENDIMENTO -->
           <section class="detalhe py-4">
        <div class="container">
            <div class="row align-items-stretch"> 

                <div class="col-md-4 col-sm-12 mb-4 mb-md-0">
                    <div class="item-card">
                        <div class="icon">★</div> <div class="item-description">
                            <h2 class="subtitulos">Solução Completa</h2>
                            <p class="subtextos text-light">Landing Page pronta, com painel administrativo, integração com<br> Whatsapp e pagamento único</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 mb-4 mb-md-0">
                    <div class="item-card"> <div class="icon">💰</div> <div class="item-description">
                            <h2 class="subtitulos">Capte mais clientes</h2>
                            <p class="subtextos text-light">Conecte-se com clientes em potencial prontos para contratar um advogado</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12 mb-4 mb-md-0">
                    <div class="item-card">
                        <div class="icon">💎</div> <div class="item-description">
                            <h2 class="subtitulos">Maior Alcance</h2>
                            <p class="subtextos text-light">Atinja mais pessoas anunciando um site profissional que demonstra toda a sua expertise.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

        </section>
<!-- FIM DETALHE -->

<!-- INICIO SEÇÃO EXPLICATIVA -->
        <section class="explicar py-5 secao-animada">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="titulos-gerais">Marketing Jurídico é sobre <span class="texto-laranja">estratégia digital.</span></h2>
                    <p class="textos-gerais">
                        Muitos advogados sabem que <strong>não podem anunciar como empresas comuns.</strong><br><br> 
                        Por isso, a presença online estratégica é o caminho. Ter um site jurídico tradicional já não basta.<br>
                        <strong>Uma landing page bem feita permite captar clientes</strong> na advocacia de forma ética e direta, <br>
                        <strong><span class="texto-laranja">levando potenciais clientes até seu WhatsApp.</span></strong>
                    </p>
                </div>
            </div>
        </section>

<!-- FINAL SEÇÃO EXPLICATIVA-->

<!-- INÍCIO SEÇÃO 2 -->
    <section class="servicos py-5 secao-animada">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="titulos-gerais"><?= htmlspecialchars(get_content('servicos', 'titulo')) ?></h2>
                    <p class="textos-gerais"><?= nl2br(htmlspecialchars(get_content('servicos', 'subtitulo'))) ?></p>
                </div>
            

                <div class="row">
                    <?php foreach ($servicos as $s): ?>
                        <div class="col-md-4 mb-4">
                                <div class="card h-100 text-center">
                                    <div class="card-body">
                                        <i class="fa <?= htmlspecialchars($s['icon']) ?> fa-2x mb-3 icone-servico"></i>
                                        <h2 class="card-title"><strong><?= htmlspecialchars($s['title']) ?></strong></h2>
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

<!-- PORTOFOLIO -->
 <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="titulos-gerais">Veja alguns de nossos modelos criados recentemente</h2>
            </div>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="d-flex flex-column flex-lg-row">
                        <div class="p-4" style="flex-grow: 1;">
                            <img src="css/img/direito-da-família.png" class="img-fluid rounded" alt="Imagem do trabalho de Aposentadoria">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="d-flex flex-column flex-lg-row">
                        <div class="p-4" style="flex-grow: 1;">
                            <img src="css/img/divorcio.png" class="img-fluid rounded" alt="Imagem do trabalho de Plano de Saúde">
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="d-flex flex-column flex-lg-row">
                        <div class="p-4" style="flex-grow: 1;">
                            <img src="css/img/maternidade.png" class="img-fluid rounded" alt="Imagem do trabalho de Plano de Saúde">
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="d-flex flex-column flex-lg-row">
                        <div class="p-4" style="flex-grow: 1;">
                            <img src="css/img/trabalhista.png" class="img-fluid rounded" alt="Imagem do trabalho de Plano de Saúde">
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="d-flex flex-column flex-lg-row">
                        <div class="p-4" style="flex-grow: 1;">
                            <img src="css/img/advogado-direito-previdenciario.png" class="img-fluid rounded" alt="Imagem do trabalho de Plano de Saúde">
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="d-flex flex-column flex-lg-row">
                        <div class="p-4" style="flex-grow: 1;">
                            <img src="css/img/advogado-direito-criminal.png" class="img-fluid rounded" alt="Imagem do trabalho de Plano de Saúde">
                        </div>
                        
                    </div>
                </div>
            </div>
    </div>
<!-- FINAL PORTFOLIO -->
 
<!-- PASSO A PASSO -->

        <?php
            $steps = $pdo->query("SELECT * FROM steps ORDER BY id ASC")->fetchAll();
            ?>

        <section class="py-5 atendimento secao-animada">
            <div class="container">
                <h2 class="text-center mb-5">Esse é o processo de <strong>Criação da Landing Page do seu escritório</strong></h2>
                <div class="row">
                    <?php foreach ($steps as $step): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card text-center h-100">
                                <div class="card-body-unico">
                                    <i class="<?= htmlspecialchars($step['icon']) ?> fs-1 mb-3 icone-passos"></i>
                                    <h2 class="card-title"><strong><?= htmlspecialchars($step['title']) ?></strong></h2>
                                    <p class="card-text"><?= htmlspecialchars($step['description']) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
                <div class="d-flex justify-content-center">
                    <a href="#btn-whatsapp" class="btn-custom-whatsapp btn btn-success btn-lg mt-4"> <i class="fa-brands fa-whatsapp"></i> Quero fazer minha Landing Page</a> </br>
                </div>
        </section>


<!--FINAL PASSO A PASSO -->
<!-- INICIO DEPOIMENTOS -->

<section class="py-5 bg-white carousel-fixed-height" id="depoimentos">
<div class="container">
    <div class="row text-center mb-5">
        <div class="col-12">
            <h2 class="titulos-gerais">Veja o que dizem sobre nós</h2>
        </div>
    </div>

    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="card-testimonial">
                            <img src="css/img/depoimento1.jpg" class="img-fluid rounded" alt="Depoimento 1">
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="card-testimonial">
                            <img src="css/img/depoimento2.jpg" class="img-fluid rounded" alt="Depoimento 2">
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card-testimonial">
                            <img src="css/img/depoimento3.png" class="img-fluid rounded" alt="Depoimento 3">
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="card-testimonial">
                            <img src="css/img/depoimento4.png" class="img-fluid rounded" alt="Depoimento 4">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Próximo</span>
        </button>
    </div>
</div>
</section>

<!-- FINAL DEPOIMENTOS -->

<!-- INICIO SEÇÃO EXPLICATIVA 2 -->
        <section class="explicar py-5 secao-animada">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="titulos-gerais">Seu potecial cliente está procurando um Advogado.<br> A questão é: <span class="texto-laranja">Ele vai te encontrar?</span></h2>
                    <p class="textos-gerais">
                        Advogados que confiam apenas nas redes sociais ou esperam indicações estão 
                        ficando invisíveis na internet. Uma landing page bem estruturada permite 
                        que você seja encontrado, gere confiança e receba contatos direto no WhatsApp — tudo isso sem violar nenhuma norma ética.
                    </p>
                </div>
            </div>

            <!-- BOTAO WP -->
                    <div class="d-flex justify-content-center">
                        <a href="#btn-whatsapp" class="btn-custom-whatsapp btn btn-success btn-lg mt-4"> <i class="fa-brands fa-whatsapp"></i> Quero fazer minha Landing Page</a> </br>
                    </div>
        </section>

<!-- FINAL SEÇÃO EXPLICATIVA 2 -->                   


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
    <section>
        <footer class="bg-footer text-dark p-4 text-center">
            <p><?= get_content('footer', 'address') ?></p>
            <p><?= get_content('footer', 'phone') ?> | <?= get_content('footer', 'email') ?></p>
            <a class="btn btn-success" href="https://wa.me/<?= get_content('footer', 'whatsapp') ?>" target="_blank">WhatsApp</a>
        </footer>
    </section>

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