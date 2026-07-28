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
                    <span class="badge bg-warning text-dark mt-4 mb-3 fs-6 px-3 py-2"><i class="bi bi-geo-alt-fill me-1"></i> Atendemos Engenheiro Beltrão, Maringá, Campo Mourão e Região</span>
                    <h1 class="display-5 fw-bold">Estruturas metálicas para galpões agrícolas, comerciais e industriais.</h1>
                    <p class="lead mt-3">Projetos sob medida, fabricação com alta precisão e entregas em todo o Paraná.</p>
                    <div class="mt-4 d-flex flex-wrap gap-2 justify-content-center justify-content-lg-start">
                        <a href="calculadora.php" class="btn btn-warning btn-lg fw-bold shadow"><i class="bi bi-calculator-fill me-2"></i>Simular Orçamento Agora</a>
                        <a href="https://wa.me/5544998318534?text=Ol%C3%A1!%20Quero%20um%20or%C3%A7amento%20de%20galp%C3%A3o." target="_blank" class="btn btn-outline-light btn-lg botao-orcamento"><i class="bi bi-whatsapp me-2"></i>Falar com Vendedor</a>
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
    <section class="bg-dark text-white rounded p-4 p-md-5 my-5 shadow-lg position-relative overflow-hidden" style="background: linear-gradient(135deg, #111 0%, #222 100%);">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <span class="badge bg-warning text-dark mb-2 font-monospace">FERRAMENTA EXCLUSIVA</span>
                <h2 class="fw-bold display-6">Monte o orçamento do seu galpão em 2 minutos!</h2>
                <p class="lead text-secondary mb-0">Escolha as medidas, tipo de tesoura, perfil de coluna e cobertura. Veja o valor estimado na hora e envie direto para o nosso WhatsApp.</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="calculadora.php" class="btn btn-warning btn-lg fw-bold px-4 py-3 shadow"><i class="bi bi-calculator-fill me-2"></i>Acessar Calculadora</a>
            </div>
        </div>
    </section>
</main>

<?php include "includes/footer.php"; ?>
