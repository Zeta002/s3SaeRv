<?php namespace App\src\Controller\PagesController;

use App\src\Controller\Controller;

class AboutController
{
    public function render(): void {
        Controller::render("About", "About.php");
    }
}
