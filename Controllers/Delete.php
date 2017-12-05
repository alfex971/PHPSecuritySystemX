<?php
$id = $_POST['id'];
$url = "http://securitysystemxrestservice.azurewebsites.net/Service1.svc/noises/";
$full_url = $url . $id;
$ch = curl_init($full_url);
curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$jsondata = curl_exec($ch);
$theDeleteCostumer = json_decode($jsondata,true);

$urlget = "http://securitysystemxrestservice.azurewebsites.net/Service1.svc/noises/";
$jsondatadata = file_get_contents($urlget);
$noiseArray = json_decode($jsondatadata,true);





require_once '../vendor/autoload.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../views');
$twig = new Twig_Environment($loader, array(
    // 'cache' => '/path/to/compilation_cache',
    'auto_reload' => true
));
$template = $twig->loadTemplate('allnoises.html.twig');
$parametersToTwig = array('noises' => $noiseArray);
echo $template->render($parametersToTwig);
/**
 * Created by PhpStorm.
 * User: Universe
 * Date: 05.12.2017
 * Time: 12:39
 */