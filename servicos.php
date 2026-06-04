<?php include "includes/header.php"; ?>
<?php include "includes/conexao.php"; ?>

<?php

$sql = "SELECT * FROM servicos";
$resultado = $pdo->query($sql);

?>

<main class="container mt-5">
    <h1 class="mb-3">Serviços</h1>

    <p class="lead">
        Conheça alguns dos serviços oferecidos pela Metalúrgica Oliveira.
    </p>

    <div class="row mt-4">

        <?php while ($servico = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>

            <div class="col-md-4 mb-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $servico["nome"]; ?>
                        </h5>

                        <p class="card-text">
                            <?php echo $servico["descricao"]; ?>
                        </p>

                        <p class="fw-bold">
                            A partir de R$ <?php echo number_format($servico["preco_base"], 2, ",", "."); ?>
                        </p>
                    </div>
                </div>
            </div>

        <?php } ?>

    </div>
</main>

<?php include "includes/footer.php"; ?>