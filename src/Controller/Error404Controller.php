<?php namespace App\src\Controller;

class Error404Controller
{
    public function render(): void {
        Controller::render("Error404", "Error404.php");
    }
}
