<?php

namespace App\src\View;

require "src\View\Header.php";

class Layout {
    public function show(string $title, $content, array $styles = []): void { ?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="/assets/css/stylesheet/main.css">
            <title><?= $title ?></title>
        </head>
        <body>
            <?= $content ?>
        </body>
    </html>
<?php
    }
}