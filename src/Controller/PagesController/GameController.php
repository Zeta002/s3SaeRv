<?php namespace App\src\Controller\PagesController;

use App\src\Controller\Controller;

class GameController
{
    public function render(): void {
        Controller::renderIframe( "Game", ["main.css", "navbar.css"] );
    }
}
