<?php namespace App\src\Controller\PagesController;

use App\src\Controller\Controller;

class HomepageController
{
    public function render(): void {
        Controller::render("Homepage", "Homepage.php");
    }
}
