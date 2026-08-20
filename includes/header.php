<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Metalúrgica Oliveira</title>
        


        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
    </head>
    <body>
    <?php $paginaAtual = basename($_SERVER['PHP_SELF']); ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container">
        
        <a class="navbar-brand d-flex align-items-center gap-2" href="index.php">
            <img src="assets/imagens/logo_mo.png" alt="Metalúrgica Oliveira" height="36" class="bg-white rounded px-2 py-1 shadow-sm" style="object-fit:contain">
            <span class="d-none d-sm-inline-block text-white fw-bold text-start" style="font-size:0.85rem;line-height:1.15;letter-spacing:0.02em;text-transform:uppercase">
                Metalúrgica<br><span style="color:#ffc107">Oliveira</span>
            </span>
        </a>

        <div class="navbar-nav mx-auto gap-3 fs-10">
            <a class="nav-link d-flex flex-column align-items-center<?php echo $paginaAtual === 'index.php' ? ' active' : ''; ?>" href="index.php">
                <i class="bi bi-house-door mb-1"></i>
                Início
            </a>
            <a class="nav-link d-flex flex-column align-items-center<?php echo $paginaAtual === 'servicos.php' ? ' active' : ''; ?>" href="servicos.php">
                <i class="bi bi-box-seam mb-1"></i>
                Produtos
            </a>
            <a class="nav-link d-flex flex-column align-items-center<?php echo $paginaAtual === 'orcamento.php' ? ' active' : ''; ?>" href="orcamento.php">
                <i class="bi bi-calculator mb-1"></i>
                Orçamento
            </a>
            <a class="nav-link d-flex flex-column align-items-center<?php echo $paginaAtual === 'contato.php' ? ' active' : ''; ?>" href="contato.php">
                <i class="bi bi-telephone mb-1"></i>
                Contato
            </a>
            <a class="nav-link d-flex flex-column align-items-center fw-bold<?php echo $paginaAtual === 'calculadora.php' ? ' active' : ''; ?>" href="calculadora.php" style="color:#ffc107!important">
                <i class="bi bi-calculator-fill mb-1" style="color:#ffc107"></i>
                Calcule seu Galpão
            </a>
        </div>
    </div>
</nav>