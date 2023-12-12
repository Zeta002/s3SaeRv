<?php namespace App\src\Controller\PagesController;

use App\src\Controller\Controller;

class CreditController
{
    public function render(): void {
        Controller::render("Credit", "Credit.php", ["main.css", "navbar.css"]);
    }
}
