<?php namespace App\src\Controller;

class AboutController
{
    public function render(): void {
        Controller::render("About", "About.php");
    }
}
