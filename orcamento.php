<?php include "includes/header.php"; ?>

<?php

$materiais = [
    [
        "codigo" => 1,
        "nome" => "Tubo metalon 30x30",
        "categoria" => "Tubo",
        "unidade" => "barra",
        "preco" => 45.00
    ],
    [
        "codigo" => 2,
        "nome" => "Tubo metalon 40x40",
        "categoria" => "Tubo",
        "unidade" => "barra",
        "preco" => 65.00
    ],
    [
        "codigo" => 3,
        "nome" => "Cantoneira 1/8",
        "categoria" => "Cantoneira",
        "unidade" => "barra",
        "preco" => 38.50
    ],
    [
        "codigo" => 4,
        "nome" => "Chapa galvanizada",
        "categoria" => "Chapa",
        "unidade" => "metro quadrado",
        "preco" => 120.00
    ],
    [
        "codigo" => 5,
        "nome" => "Viga U enrijecida",
        "categoria" => "Viga",
        "unidade" => "barra",
        "preco" => 180.00
    ]
];

function buscarMaterialPorCodigo($materiais, $codigo)
{
    foreach ($materiais as $material) {
        if ($material["codigo"] == $codigo) {
            return $material;
        }
    }

    return null;
}

function filtrarMateriaisPorCategoria($materiais, $categoria)
{
    if ($categoria == "Todas") {
        return $materiais;
    }

    $materiaisFiltrados = [];

    foreach ($materiais as $material) {
        if ($material["categoria"] == $categoria) {
            $materiaisFiltrados[] = $material;
        }
    }

    return $materiaisFiltrados;
}

function calcularTotal($preco, $quantidade)
{
    return $preco * $quantidade;
}

function aplicarDesconto($total)
{
    if ($total >= 1000) {
        return $total * 0.95;
    }

    return $total;
}

function formatarDinheiro($valor)
{
    return "R$ " . number_format($valor, 2, ",", ".");
}

$categorias = ["Todas", "Tubo", "Cantoneira", "Chapa", "Viga"];

$categoriaSelecionada = $_GET["categoria"] ?? "Todas";

$materiaisFiltrados = filtrarMateriaisPorCategoria($materiais, $categoriaSelecionada);

$mensagemErro = "";
$resultadoOrcamento = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigoMaterial = $_POST["material"] ?? "";
    $quantidade = $_POST["quantidade"] ?? 0;

    $materialSelecionado = buscarMaterialPorCodigo($materiais, $codigoMaterial);

    if ($materialSelecionado == null) {
        $mensagemErro = "Selecione um material válido.";
    } elseif ($quantidade <= 0) {
        $mensagemErro = "A quantidade precisa ser maior que zero.";
    } elseif ($materialSelecionado["preco"] < 0) {
        $mensagemErro = "O preço do material está inválido.";
    } else {
        $totalBruto = calcularTotal($materialSelecionado["preco"], $quantidade);
        $totalFinal = aplicarDesconto($totalBruto);
        $desconto = $totalBruto - $totalFinal;

        $resultadoOrcamento = [
            "material" => $materialSelecionado,
            "quantidade" => $quantidade,
            "total_bruto" => $totalBruto,
            "desconto" => $desconto,
            "total_final" => $totalFinal
        ];
    }
}

?>

<main class="container mt-5">
    <h1 class="mb-3">Simulador de Orçamento</h1>

    <p class="lead">
        Simule um orçamento simples com base nos materiais utilizados pela Metalúrgica Oliveira.
    </p>

    <section class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="card-title">Filtrar materiais por categoria</h5>

            <form method="GET" action="orcamento.php" class="row g-3">
                <div class="col-md-8">
                    <select name="categoria" class="form-select">
                        <?php foreach ($categorias as $categoria) { ?>
                            <option value="<?php echo $categoria; ?>" <?php if ($categoriaSelecionada == $categoria) echo "selected"; ?>>
                                <?php echo $categoria; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-4">
                    <button type="submit" class="btn btn-secondary w-100">
                        Filtrar
                    </button>
                </div>
            </form>
        </div>
    </section>

    <section class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="card-title">Calcular orçamento</h5>

            <?php if ($mensagemErro != "") { ?>
                <div class="alert alert-danger">
                    <?php echo $mensagemErro; ?>
                </div>
            <?php } ?>

            <form method="POST" action="orcamento.php?categoria=<?php echo $categoriaSelecionada; ?>" class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Material</label>

                    <select name="material" class="form-select">
                        <option value="">Selecione um material</option>

                        <?php foreach ($materiaisFiltrados as $material) { ?>
                            <option value="<?php echo $material["codigo"]; ?>">
                                <?php echo $material["nome"]; ?> -
                                <?php echo formatarDinheiro($material["preco"]); ?>
                                por <?php echo $material["unidade"]; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Quantidade</label>
                    <input type="number" name="quantidade" class="form-control" step="0.01" min="0">
                </div>

                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-warning w-100">
                        Calcular
                    </button>
                </div>
            </form>
        </div>
    </section>

    <?php if ($resultadoOrcamento != null) { ?>
        <section class="alert alert-success">
            <h5>Resultado do orçamento</h5>

            <p>
                <strong>Material:</strong>
                <?php echo $resultadoOrcamento["material"]["nome"]; ?>
            </p>

            <p>
                <strong>Quantidade:</strong>
                <?php echo $resultadoOrcamento["quantidade"]; ?>
                <?php echo $resultadoOrcamento["material"]["unidade"]; ?>
            </p>

            <p>
                <strong>Total bruto:</strong>
                <?php echo formatarDinheiro($resultadoOrcamento["total_bruto"]); ?>
            </p>

            <p>
                <strong>Desconto:</strong>
                <?php echo formatarDinheiro($resultadoOrcamento["desconto"]); ?>
            </p>

            <p class="fw-bold">
                <strong>Total final:</strong>
                <?php echo formatarDinheiro($resultadoOrcamento["total_final"]); ?>
            </p>
        </section>
    <?php } ?>

    <section class="mt-5">
        <h3>Materiais disponíveis no filtro atual</h3>

        <table class="table table-bordered table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Unidade</th>
                    <th>Preço</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($materiaisFiltrados as $material) { ?>
                    <tr>
                        <td><?php echo $material["nome"]; ?></td>
                        <td><?php echo $material["categoria"]; ?></td>
                        <td><?php echo $material["unidade"]; ?></td>
                        <td><?php echo formatarDinheiro($material["preco"]); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</main>

<?php include "includes/footer.php"; ?>