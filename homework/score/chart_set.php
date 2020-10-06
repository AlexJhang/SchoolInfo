<?php
$hw_n = $_GET['hw_n'];

include("../../sql_connect/mysql_connect.inc.php");
$result = $conn->query("SELECT `繳交`.`分數` FROM `繳交` WHERE `繳交`.`作業編號` = ".$hw_n);
$row = @mysqli_fetch_row($result);

$datay1  = array(0,0,0,0,0,0,0,0,0,0,0,);
$datax = array("0~9","`10~19","20~29","30~39","40~49","50~59","60~69","70~79","80~89","90~99","100");


while ($row) {
    $c = $row[0];
    if ($c>=0 and $c<=100) {
        $datay1[(int)$c/10]+=1;
    }
    $row = @mysqli_fetch_row($result);
}
$conn->close();

$istr = '<script>document.location.href="../score/chart.php?';

$k = 0;
foreach ($datay1 as $c) {
    $istr = $istr.'data['.$k.']='.$c.'&';
    $k +=1;
}

echo $istr.'";</script>';

?>