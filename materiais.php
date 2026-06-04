<?php include "includes/header.php"; ?>
<?php include "includes/conexao.php"; ?>

<?php

$sql = "SELECT * FROM materiais WHERE ativo = 1";
$resultado = $pdo->query($sql);

?>

<main class="container mt-5">
    <h1 class="mb-3">Materiais</h1>

    <p class="lead">
        Lista de materiais cadastrados no banco de dados da Metalúrgica Oliveira.
    </p>

    <table class="table table-striped table-bordered mt-4">
        <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>Unidade</th>
                <th>Categoria</th>
                <th>Preço Unitário</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($material = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $material["nome"]; ?></td>
                    <td><?php echo $material["unidade"]; ?></td>
                    <td><?php echo $material["categoria"]; ?></td>
                    <td>R$ <?php echo number_format($material["preco_unitario"], 2, ",", "."); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>

<?php include "includes/footer.php"; ?>