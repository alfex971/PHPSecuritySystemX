<?php
$url = "http://securitysystemxrestservice.azurewebsites.net/Service1.svc/noises/";
$jsondata = file_get_contents($url);
$noiseArray = json_decode($jsondata,true);


require_once '../vendor/autoload.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('../Views');
$twig = new Twig_Environment($loader, array(
    'auto_reload' => true
));
$template = $twig->loadTemplate('allnoises.html.twig');
echo $template->render(array('noises' => $noiseArray));
/**
 * Created by PhpStorm.
 * User: Universe
 * Date: 04.12.2017
 * Time: 10:44
 */