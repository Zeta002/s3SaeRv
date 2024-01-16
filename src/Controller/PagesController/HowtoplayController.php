<?php namespace App\src\Controller\PagesController;

use App\src\Controller\Controller;

class HowtoplayController
{
    public function render(): void
    {
        Controller::render("Howtoplay", "Howtoplay.php", ["main.css" ,"navbar.css", "howtoplay.css"]);
    }
}
