<?php namespace App\src\Controller;

class GameController
{
    public function render(): void {
        Controller::render("Game", "Game.php");
    }
}