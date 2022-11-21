<?php
require_once '../vendor/autoload.php';
require_once '../framework/autoload.php';
require_once "../controllers/MainController.php";
require_once "../controllers/ObjectImageController.php";
require_once "../controllers/ObjectInfoController.php";
require_once "../controllers/ObjectController.php";
require_once "../controllers/Controller404.php";

$loader = new \Twig\Loader\FilesystemLoader('../views');
// $url = $_SERVER["REQUEST_URI"];
$twig = new \Twig\Environment($loader, [
    "debug" => true
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());
$title = "";
$template = "";
$context = [];

$pdo = new PDO("mysql:host=localhost;dbname=drill_rapper;charset=utf8", "root", "");

$router = new Router($twig, $pdo);
$router->add("/", MainController::class);
$router->add("/rappers/(\d+)/image", ObjectImageController::class);
$router->add("/rappers/(\d+)/info", ObjectInfoController::class);
$router->add("/rappers/(\d+)", ObjectController::class); 

$router->get_or_default(Controller404::class);

// $controller = null; // создаем переменную под контроллер


// if ($url == "/") {
//     $controller = new MainController($twig); // создаем экземпляр контроллера для главной страницы
// } 
// elseif (preg_match("#^/asaprocky/image#", $url)) {
//     $controller = new AsapRockyImageController($twig);
// } elseif (preg_match("#^/asaprocky/info#", $url)) {
//     $controller = new AsapRockyInfoController($twig);
// } elseif (preg_match("#^/asaprocky#", $url)) {
//     $controller = new AsapRockyController($twig);
// } elseif (preg_match("#^/playboicarti/image#", $url)) {
//     $controller = new PlayboiCartiImageController($twig);
// } elseif (preg_match("#^/playboicarti/info#", $url)) {
//     $controller = new PlayboiCartiInfoController($twig);
// } elseif (preg_match("#^/playboicarti#", $url)) {
//     $controller = new PlayboiCartiController($twig);
// } elseif (preg_match("#^/travisscott/image#", $url)) {
//     $controller = new TravisScottImageController($twig);
// } elseif (preg_match("#^/travisscott/info#", $url)) {
//     $controller = new TravisScottInfoController($twig);
// } elseif (preg_match("#^/travisscott#", $url)) {
//     $controller = new TravisScottController($twig);
// }




// if ($url == "/") {
//     $title = "Главная";
//     $template = "home.twig";
// } 
// elseif (preg_match("#/asaprocky#", $url)) {
//     $title = "asaprocky";
//     $template = "__object.twig";

//     $context['image'] = "/images/asaprocky.jpg";

//     if(preg_match("#^/asaprocky/image#", $url)) {
//         $template = "base_image.twig";
//     }
//     elseif(preg_match("#^/asaprocky/info#", $url)){
//         $template = "asaprocky_info.twig";
//     }
// } 
// elseif (preg_match("#/travisscott#", $url)) {
//     $title = "travisscott";
//     $template = "__object.twig";

//     $context['image'] = "/images/travisscott.jpg";

//     if(preg_match("#^/travisscott/image#", $url)) {
//         $template = "base_image.twig";
//     }
//     elseif(preg_match("#^/travisscott/info#", $url)){
//         $template = "travisscott_info.twig";
//     }
// } 
// elseif (preg_match("#/playboicarti#", $url)) {
//     $title = "playboicarti";
//     $template = "__object.twig";

//     $context['image'] = "/images/playboicarti.jpg";

//     if(preg_match("#^/playboicarti/image#", $url)) {
//         $template = "base_image.twig";
//     }
//     elseif(preg_match("#^/playboicarti/info#", $url)){
//         $template = "playboicarti_info.twig";
//     }
// }

// $context['menu'] = $menu;
// $context['title'] = $title;

// if ($controller) {
//     $controller->setPDO($pdo);
//     $controller->get();
// }
