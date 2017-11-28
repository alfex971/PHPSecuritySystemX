<?php
$url = "http://securitysystemxweb.azurewebsites.net/Service1.svc/motions/";
//$client = new SoapClient("http://localhost:50877/Service1.svc?wsdl");
//$resultWrapped = $client->GetNoise();
$jsondata = file_get_contents($url);
$motion = json_decode($jsondata,true);
if (empty($motion)){
    $motionArray = null;
}
else{
    $motionArray = array($motion);
}
print_r($motionArray);
require_once '../vendor/autoload.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('../Views');
$twig = new Twig_Environment($loader, array(
    'auto_reload' => true
));
$template = $twig->loadTemplate('motion.html.twig');
echo $template->render(array('motions' => $motionArray));

/**
 * Created by PhpStorm.
 * User: Universe
 * Date: 28.11.2017
 * Time: 10:00
 */