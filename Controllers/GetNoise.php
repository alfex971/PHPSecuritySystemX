<?php
$client = new SoapClient("http://localhost:50877/Service1.svc?wsdl");
$resultWrapped = $client->GetNoise();

$result = $resultWrapped->GetNoiseResult;
print_r($result);

require_once '../vendor/autoload.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('../Views');
$twig = new Twig_Environment($loader, array(
    'auto_reload' => true
));
$template = $twig->loadTemplate('noise.html.twig');
echo $template->render(array('result' => $result));
/**
 * Created by PhpStorm.
 * User: Universe
 * Date: 24.11.2017
 * Time: 12:59
 */