<?php
require 'auth.php';
require 'config.php';

// Total de cliques
$stmt = $pdo->query("SELECT COUNT(*) FROM whatsapp_clicks");
$total_cliques = $stmt->fetchColumn();

// Gráfico de cliques por dia (últimos 7 dias)
$stmt = $pdo->query("
    SELECT DATE(click_time) as dia, COUNT(*) as total 
    FROM whatsapp_clicks 
    GROUP BY dia 
    ORDER BY dia DESC 
    LIMIT 7
");

$cliques = array_reverse($stmt->fetchAll());
$labels = array_column($cliques, 'dia');
$valores = array_column($cliques, 'total');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <style>
        .grafico-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }
        canvas {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
        }
        .card {
            padding: 15px;
            background: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Painel Administrativo</h2>
            <a href="logout.php" class="btn btn-danger">Sair</a>
        </div>

        <div class="container mt-4">
            <h4>Aprenda a usar o seu Painel Administrativo</h4>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/XIOGMyLgJc8?si=14vY1DPftCIrpPpA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
        </div><br>

        <div class="mb-4">
            <h4>Confira os dados de acessos do seu site</h4>
        </div>

        <div class="grafico-container">
            <!-- Gráfico 1: WhatsApp -->
            <div class="card">
                <h6 class="text-center">Cliques WhatsApp (últimos 7 dias)</h6>
                <canvas id="graficoCliques" height="200"></canvas>
            </div>

            <!-- Espaço reservado para futuros gráficos -->
            <div class="card text-center">
                <h6>Gráfico 2</h6>
                <p style="margin-top: 60px;">(em breve)</p>
            </div>
            <div class="card text-center">
                <h6>Gráfico 3</h6>
                <p style="margin-top: 60px;">(em breve)</p>
            </div>
        </div>

        <div class="mb-4">
            <strong>Total de cliques no WhatsApp:</strong> <?= $total_cliques ?>
        </div>

        <hr class="mt-5">

        <ul>
            <div class="d-flex justify-content-between align-items-center mb-4 gap-2">
                <a href="editar-hero.php" class="btn btn-primary">Editar Seção Inicial</a>
                <a href="editar-servicos.php" class="btn btn-primary">Editar Serviços</a>
                <a href="editar-sobre.php" class="btn btn-primary">Editar Sobre o Advogado</a>
                <a href="editar-passos.php" class="btn btn-primary">Editar Atendimento</a>
                <a href="editar-depoimentos.php" class="btn btn-primary">Gerenciar Depoimentos</a>
                <a href="editar-faq.php" class="btn btn-primary">Editar FAQ</a>
                <a href="editar-footer.php" class="btn btn-primary">Editar Rodapé</a>
            </div>

        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    const ctx = document.getElementById('graficoCliques');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($labels) ?>,
            datasets: [{
                label: 'Cliques por dia',
                data: <?= json_encode($valores) ?>,
                backgroundColor: 'rgba(40, 167, 69, 0.6)',
                borderColor: 'rgba(40, 167, 69, 1)',
                borderWidth: 1,
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.parsed.y + ' clique(s)';
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 }
                }
            }
        }
    });
    </script>
</body>
</html>
