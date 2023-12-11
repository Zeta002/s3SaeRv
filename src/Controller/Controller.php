<?php

    namespace App\src\Controller;

    use App\src\View\Layout;


    class Controller
    {
        public static function render(string $title, string $file, array $styles = []): void {
            $content = Controller::getView($file);
            (new Layout())->show($title, $content, $styles);
        }

        public static function getView(string $fileName, string $otherDir = ""): string {
            ob_start();
            require "src/View/Pages/" . $otherDir . $fileName;
            return ob_get_clean();
        }
    }