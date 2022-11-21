<?php
// require_once "TwigBaseController.php"; // импортим TwigBaseController

class MainController extends TwigBaseController {
    public $title = "Главная";
    public $template = "home.twig";

    public function getContext(): array
    {
        $context = parent::getContext();
        return $context;
    }
}