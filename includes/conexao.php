<?php

// Tenta conectar ao MySQL local do Laragon (127.0.0.1)
// Antes apontava para VM da faculdade (192.168.56.20) que está offline fora da aula
$configs = [
    ['host' => '127.0.0.1', 'banco' => 'metalurgica_oliveira', 'usuario' => 'root', 'senha' => ''],
    ['host' => 'localhost',  'banco' => 'metalurgica_oliveira', 'usuario' => 'root', 'senha' => ''],
    ['host' => '192.168.56.20', 'banco' => 'metalurgica_oliveira', 'usuario' => 'admin', 'senha' => '12345'],
];

$pdo = null;
foreach ($configs as $cfg) {
    try {
        $pdo = new PDO(
            "mysql:host={$cfg['host']};dbname={$cfg['banco']};charset=utf8mb4",
            $cfg['usuario'],
            $cfg['senha'],
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_TIMEOUT => 2]
        );
        break; // conectou, sai do loop
    } catch (PDOException $e) {
        $pdo = null;
    }
}

if ($pdo === null) {
    die("Erro ao conectar com o banco de dados. Verifique se o MySQL está rodando no Laragon.");
}

?>