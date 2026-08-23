<?php
// Build dist - usa include + ob para evitar problemas de encoding do HTTP
ini_set('default_charset', 'UTF-8');
mb_internal_encoding('UTF-8');

$rootDir = __DIR__;
$distDir = __DIR__ . '/dist';
if (!file_exists($distDir)) {
    mkdir($distDir, 0777, true);
}

$pages = [
    'index.php'      => 'index.html',
    'calculadora.php'=> 'calculadora.html',
    'servicos.php'   => 'servicos.html',
    'contato.php'    => 'contato.html',
    'orcamento.php'  => 'orcamento.html',
];

foreach ($pages as $src => $dest) {
    ob_start();
    // Simula $_SERVER para os includes funcionarem corretamente
    $_SERVER['PHP_SELF'] = '/' . $src;
    $_SERVER['REQUEST_METHOD'] = 'GET';
    $_GET = [];
    $_POST = [];
    
    // Inclui o arquivo PHP e captura saída
    include $rootDir . '/' . $src;
    
    $content = ob_get_clean();
    
    // Converte para UTF-8 se necessário
    if (!mb_check_encoding($content, 'UTF-8')) {
        $content = mb_convert_encoding($content, 'UTF-8', 'ISO-8859-1');
    }
    
    // Ajusta links .php -> .html para Cloudflare Pages
    $content = str_replace(
        ['href="index.php"', 'href="calculadora.php"', 'href="servicos.php"', 'href="contato.php"', 'href="orcamento.php"', 'action="orcamento.php"'],
        ['href="index.html"', 'href="calculadora.html"', 'href="servicos.html"', 'href="contato.html"', 'href="orcamento.html"', 'action="orcamento.html"'],
        $content
    );
    
    // Salva como UTF-8 sem BOM
    file_put_contents($distDir . '/' . $dest, $content);
    // Sincroniza também na raiz (para servicos via Apache direto)
    file_put_contents($rootDir . '/' . $dest, $content);
    echo "Gerado: $dest (" . strlen($content) . " bytes)\n";
}

// Copia arquivos estáticos
$staticFiles = [
    'orcamento-pdf.html',
    'manifest.json',
    'sw.js',
    'editor-icones.html'
];

foreach ($staticFiles as $file) {
    $src = $rootDir . '/' . $file;
    $dst = $distDir . '/' . $file;
    if (file_exists($src)) {
        copy($src, $dst);
        echo "Copiado: $file (" . filesize($dst) . " bytes)\n";
    }
}

// Sincroniza pasta assets inteira para dist/assets
function recurseCopy($src, $dst) {
    $dir = opendir($src);
    @mkdir($dst, 0777, true);
    while (false !== ($file = readdir($dir))) {
        if ($file !== '.' && $file !== '..') {
            if (is_dir($src . '/' . $file)) {
                recurseCopy($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

if (file_exists($rootDir . '/assets')) {
    recurseCopy($rootDir . '/assets', $distDir . '/assets');
    echo "Sincronizado: assets/ -> dist/assets/\n";
}
