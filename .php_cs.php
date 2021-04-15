<?php

require_once __DIR__ . 'tools/prettier/PrettierPHPFixer.php';

return PhpCsFixer\Config::create()
    ->registerCustomFixers([new PrettierPHPFixer()])
    ->setRules([
        'Prettier/php' => true,
    ]);
