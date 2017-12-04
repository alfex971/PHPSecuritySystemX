<?php
$url = "http://securitysystemxrestservice.azurewebsites.net/Service1.svc/motions/";
$jsondata = file_get_contents($url);
$motionsArray = json_decode($jsondata,true);
$numberOfOccurrences = 0;
foreach ($motionsArray as $motion){
    $numberOfOccurrences +=1;
}

require_once '../vendor/autoload.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('../Views');
$twig = new Twig_Environment($loader, array(
    'auto_reload' => true
));
$template = $twig->loadTemplate('allmotions.html.twig');
echo $template->render(array('motions' => $motionsArray,'numberOfOccurrences' => $numberOfOccurrences));
/**
 * Created by PhpStorm.
 * User: Universe
 * Date: 04.12.2017
 * Time: 11:29
 */