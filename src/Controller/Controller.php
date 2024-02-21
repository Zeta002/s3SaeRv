<?php

namespace App\src\Controller;

require 'Constant.php';

use App\src\View\Layout;

/**
 * Class Controller
 *
 * This class is used for managing the rendering of views.
 */
class Controller
{
    /**
     * Renders a view with a navigation bar.
     *
     * @param string $title The title of the page.
     * @param string $file The file name of the view.
     * @param array $styles The stylesheets to include.
     */
    public static function render(string $title, string $file, array $styles = []): void {
        $content = Controller::getView($file);
        (new Layout())->display($title, $content, $styles);
    }

    /**
     * Renders a raw view without a navigation bar.
     *
     * @param array $styles The stylesheets to include.
     */
    public static function renderRaw(array $styles = []): void {
        $content = Controller::getView("Error404.php");
        (new Layout())->displayRaw("Error 404", $content, $styles);
    }

    /**
     * Renders a game view with a navigation bar.
     *
     * @param string $title The title of the page.
     * @param array $styles The stylesheets to include.
     */
    public static function renderIframe(string $title, array $styles = []): void {
        (new Layout())->displayGame($title, $styles);
    }

    /**
     * Gets the content of a view.
     *
     * @param string $fileName The file name of the view.
     * @param string $otherDir The directory of the view if not in the default directory.
     * @return string The content of the view.
     */
    public static function getView(string $fileName, string $otherDir = ""): string {
        ob_start();
        require SRC . "/View/pages/" . $otherDir . $fileName;
        return ob_get_clean();
    }
}