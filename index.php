<?php include "includes/header.php"; ?>
<?php include "includes/conexao.php"; ?>

<?php
$sqlServicos = "SELECT * FROM produtos ORDER BY id_produto LIMIT 3";
$resultadoServicos = $pdo->query($sqlServicos);
?>

<main>
    <section class="banner position-relative overflow-hidden text-white mb-5">
        <div class="sobrecapa-banner"></div>
        <div class="container py-6">
            <div class="row align-items-center">
                <div class="col-lg-7 text-center text-lg-start mt-5">
                    <span class="badge bg-warning text-dark mt-4 mb-3">Fabricação de estruturas metálicas</span>
                    <h1 class="display-5 fw-bold">Estruturas metálicas para galpões, coberturas entre outros.</h1>
                    <p class="lead mt-4">Projetos sob medida, fabricação com qualidade e montagem especializada para sua obra.</p>
                    <div class="mt-4">
                        <a href="servicos.php" class="btn btn-warning btn-lg me-2">Ver produtos</a>
                        <a href="orcamento.php" class="btn btn-outline-light btn-lg botao-orcamento">Simular orçamento</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Soluções completas para sua construção</h2>
            <p class="text-muted">Atendimento especializado, materiais certificados e entrega no prazo.</p>
        </div>

        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="caixa-destaque p-4 h-100 shadow-sm rounded">
        <h5>Projeto Sob Medida</h5>
                    <p>Fabricamos sua estrutura com base no seu projeto, garantindo tipo de uso e normas de segurança.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="caixa-destaque p-4 h-100 shadow-sm rounded">
        <h5>Fabricação precisa</h5>
                    <p>Produção de peças com acabamento e tolerância adequada para montagem eficiente.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="caixa-destaque p-4 h-100 shadow-sm rounded">
        <h5>Montagem especializada</h5>
                    <p>Equipe qualificada para montagem com segurança e agilidade.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="container mt-5 mb-5">
        <div class="row align-items-center gy-4">
            <div class="col-lg-6">
                <div class="p-4 shadow-sm rounded bg-white">
                    <h3 class="fw-bold ms-3" style="width: auto;">Nosso processo</h3>
                    <ul class="list-group list-group-flush mt-4">
                        <li class="list-group-item">Análise técnica do projeto e definição de materiais.</li>
                        <li class="list-group-item">Fabricação das peças com qualidade.</li>
                        <li class="list-group-item">Montagem do produto com segurança.</li>
                        <li class="list-group-item">Pós-venda e suporte técnico.</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ratio ratio-16x9 rounded overflow-hidden border" style="box-shadow: 0 10px 25px 3px rgba(0, 0, 0, 0.4), 0 8px 10px -6px rgba(0, 0, 0, 0.3);">
                    <img src="assets\imagens\Firefly_Gemini Flash_Crie uma imagem realista e profissional de uma estrutura metálica de galpão em proces 452220.png" alt="Estrutura metálica" class="object-fit-cover w-100 h-100 rounded">
                </div>
            </div>
        </div>
    </section>
</main>

<?php include "includes/footer.php"; ?>
