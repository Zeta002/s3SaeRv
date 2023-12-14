<?php

namespace App\src\View;

class Layout {
    public function display(string $title, $content, array $styles = []): void { ?>
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

    public function displayRaw(string $title, $content, array $styles = []): void { ?>
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
        <?= $content ?>
        </body>
        </html>
        <?php
    }
    public function displayGame(string $title, array $styles = []): void { ?>
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
        <iframe
                src="/src/View/pages/Game/Game.php"
                title="Exemple d'iframe"
                width="1920"
                height="1080">
        </iframe>
        </body>
        </html>
        <?php
    }
}