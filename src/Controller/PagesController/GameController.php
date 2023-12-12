<?php namespace App\src\Controller\PagesController;

use App\src\Controller\Controller;

class GameController
{
    public function render(): void {
        Controller::render("Game", "Game.php");
    }
}