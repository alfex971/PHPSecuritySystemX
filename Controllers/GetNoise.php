<?php
$url = "http://securitysystemxweb.azurewebsites.net/Service1.svc/noises/";
//$client = new SoapClient("http://localhost:50877/Service1.svc?wsdl");
//$resultWrapped = $client->GetNoise();
$jsondata = file_get_contents($url);
$noise = json_decode($jsondata,true);
if (empty($noise)){
    $noiseArray = null;
}
else{
    $noiseArray = array($noise);
}
print_r($noiseArray);
require_once '../vendor/autoload.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('../Views');
$twig = new Twig_Environment($loader, array(
    'auto_reload' => true
));
$template = $twig->loadTemplate('noise.html.twig');
echo $template->render(array('noises' => $noiseArray));
/**
 * Created by PhpStorm.
 * User: Universe
 * Date: 24.11.2017
 * Time: 12:59
 */