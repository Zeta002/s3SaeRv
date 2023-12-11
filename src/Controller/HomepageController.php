<?php namespace App\src\Controller;

class HomepageController
{
    public function render(): void {
        Controller::render("Homepage", "Homepage.php");
    }
}
