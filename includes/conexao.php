<?php

// Tenta conectar ao MySQL local do Laragon (127.0.0.1)
// Antes apontava para VM da faculdade (192.168.56.20) que está offline fora da aula
$configs = [
    ['host' => '127.0.0.1', 'banco' => 'metalurgica_oliveira', 'usuario' => 'root', 'senha' => ''],
    ['host' => 'localhost',  'banco' => 'metalurgica_oliveira', 'usuario' => 'root', 'senha' => ''],
    ['host' => '192.168.56.20', 'banco' => 'metalurgica_oliveira', 'usuario' => 'admin', 'senha' => '12345'],
];

// Conexao tolerante a falhas. Como o projeto agora utiliza Supabase no frontend,
// caso o MySQL nao esteja rodando, nao interrompe o carregamento da pagina com die().
$pdo = null;
foreach ($configs as $cfg) {
    try {
        $pdo = new PDO(
            "mysql:host={$cfg['host']};dbname={$cfg['banco']};charset=utf8mb4",
            $cfg['usuario'],
            $cfg['senha'],
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT, PDO::ATTR_TIMEOUT => 1]
        );
        break;
    } catch (Throwable $e) {
        $pdo = null;
    }
}
// Se pdo for null, o frontend carrega normalmente via Supabase.
?>