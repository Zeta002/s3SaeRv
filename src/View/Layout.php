<?php

namespace App\src\View;

/**
 * Layout class to manage the display of pages.
 */
class Layout {
    /**
     * Displays a page with a navigation bar.
     *
     * @param string $title The title of the page.
     * @param mixed $content The content of the page.
     * @param array $styles The stylesheets to include.
     */
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

    /**
     * Displays a page without a navigation bar.
     *
     * @param string $title The title of the page.
     * @param mixed $content The content of the page.
     * @param array $styles The stylesheets to include.
     */
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

    /**
     * Displays a game page with a navigation bar.
     *
     * @param string $title The title of the page.
     * @param array $styles The stylesheets to include.
     */
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
        <iframe id="iframe"
                src="../../src/View/pages/Build2/Game.php"
                title="Game"
                width="100%"
                height="850px"
                style="border: none">
        </iframe>
        </body>
        </html>
        <?php
    }
}