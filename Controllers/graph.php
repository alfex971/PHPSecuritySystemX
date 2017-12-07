<?php
require_once '../vendor/jpgraph-4.1.0/src/JpGraph.php';
require_once '../vendor/jpgraph-4.1.0/src/jpgraph_line.php';


$datay1 = array(5,10,15,10,6,1,19);
$datay2 = array(12,9,42,8,12,19,20);
//$datay3 = array(5,17,32,24);

// Setup the graph
$graph = new Graph(800,600);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Weekly Graph');
$graph->SetBox(false);

$graph->img->SetAntiAliasing();



// Create the first line
$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('Number of Noise Sensor Activations');

// Create the second line
$p2 = new LinePlot($datay2);
$graph->Add($p2);
$p2->SetColor("#B22222");
$p2->SetLegend('Number of Pictures Taken');
/*
// Create the third line
$p3 = new LinePlot($datay3);
$graph->Add($p3);
$p3->SetColor("#FF1493");
$p3->SetLegend('Line 3');
*/
$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();

?>
/**
 * Created by PhpStorm.
 * User: Universe
 * Date: 07.12.2017
 * Time: 10:55
 */