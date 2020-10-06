<?php
include("jpgraph-4.2.1/src/jpgraph.php");
include("jpgraph-4.2.1/src/jpgraph_bar.php");
include("jpgraph-4.2.1/src/jpgraph_line.php");
include("jpgraph-4.2.1/src/jpgraph_pie.php");
include("jpgraph-4.2.1/src/jpgraph_pie3d.php");


$datay1  = $_GET['data'];
$datax = array("0~9","10~19","20~29","30~39","40~49","50~59","60~69","70~79","80~89","90~99","100");


$graph = new Graph(1000,500);  //創建新的Graph對象
$graph->SetScale("textlin");  //刻度樣式
$graph->SetShadow();          //設置陰影
$graph->img->SetMargin(80,30,40,50); //設置邊距

$graph->graph_theme = null; //設置主題為null，否則value->Show(); 無效

$barplot = new BarPlot($datay1);  //創建BarPlot對象
$barplot->SetFillColor('blue'); //設置顏色
$barplot->value->Show(); //設置顯示數字
$graph->Add($barplot);  //將柱形圖添加到圖像中

$graph->xaxis->SetTickLabels($datax);


$graph->Stroke();
?>