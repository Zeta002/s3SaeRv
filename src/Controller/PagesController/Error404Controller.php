<?php namespace App\src\Controller\PagesController;

use App\src\Controller\Controller;

class Error404Controller
{
    public function render(): void {
        Controller::render("Error404", "Error404.php");
    }
}