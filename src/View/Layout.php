<?php

namespace App\src\View;

class Layout {
    public function show(string $title, $content, array $styles = []): void { ?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <?php foreach ($styles as $style): ?>
                <link rel="stylesheet" href="/assets/css/stylesheet/<?= $style ?>">
            <?php endforeach; ?>
            <title><?= $title ?></title>
        </head>
        <body>
            <?php require "src/View/Navbar.php"; ?>
            <?= $content ?>
        </body>
    </html>
<?php
    }
}