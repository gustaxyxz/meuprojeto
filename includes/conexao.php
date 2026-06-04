<?php

$servidor = "192.168.56.20";
$banco = "metalurgica_oliveira";
$usuario = "admin";
$senha = "12345";

try {
    $pdo = new PDO(
        "mysql:host=$servidor;dbname=$banco;charset=utf8mb4",
        $usuario,
        $senha
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $erro) {
    die("Erro ao conectar com o banco de dados: " . $erro->getMessage());
}

?>