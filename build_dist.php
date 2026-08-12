<?php
$distDir = __DIR__ . '/dist';
if (!file_exists($distDir)) {
    mkdir($distDir, 0777, true);
}

$pages = [
    'index.php' => 'index.html',
    'calculadora.php' => 'calculadora.html',
    'servicos.php' => 'servicos.html',
    'contato.php' => 'contato.html',
    'orcamento.php' => 'orcamento.html'
];

// Arquivos HTML puros (copia direto, sem processamento PHP)
$staticPages = [
    'orcamento-pdf.html'
];

$ctx = stream_context_create([
    'http' => ['timeout' => 10]
]);

foreach ($pages as $src => $dest) {
    $url = "http://localhost/meuprojeto/" . $src;
    $content = @file_get_contents($url, false, $ctx);
    if ($content !== false) {
        // Ajusta links .php para .html para funcionar no Cloudflare Pages
        $content = str_replace(
            ['href="index.php"', 'href="calculadora.php"', 'href="servicos.php"', 'href="contato.php"', 'href="orcamento.php"'],
            ['href="index.html"', 'href="calculadora.html"', 'href="servicos.html"', 'href="contato.html"', 'href="orcamento.html"'],
            $content
        );
        file_put_contents($distDir . '/' . $dest, $content);
        echo "Gerado: $dest (" . strlen($content) . " bytes)\n";
    } else {
        echo "Erro ao ler: $url\n";
    }
}

// Copia arquivos HTML puros diretamente
foreach ($staticPages as $file) {
    $src = __DIR__ . '/' . $file;
    $dest = $distDir . '/' . $file;
    if (file_exists($src)) {
        copy($src, $dest);
        echo "Copiado: $file (" . filesize($dest) . " bytes)\n";
    } else {
        echo "Nao encontrado: $file\n";
    }
}
?>
