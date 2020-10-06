<?php

header('content-type:text/html;charset=utf-8');
// 封裝好的單一 PHP 檔案上傳 function
include_once '../upload/upload.func.php';
include("../sql_connect/mysql_connect.inc.php");

$msid = $_POST["msid"];
$hw_n = $_POST["hw_n"];
$now_datetime = date("Y-m-d H:i:s");

$fileInfo = $_FILES['myFile'];
$newName = uploadFile($fileInfo,"files",$hw_n.'|'.$msid);//來自'../upload/upload.func.php'
/*
    $newName = $hw_n|$msid.副檔名
*/
$ext = pathinfo($fileInfo['name'], PATHINFO_EXTENSION);//副檔名
//echo $fileInfo['name']."<br>";

$bname = basename($fileInfo['name']);//檔名
//echo $bname."<br>";
//echo"<script>alert('$newName');history.go(-1);</script>";


//檢查是否上傳過
$result = $conn->query("SELECT `繳交編號` FROM `繳交` WHERE `學號`='$msid' AND `作業編號`='$hw_n'");
$row = @mysqli_fetch_row($result);
if($row){//已上傳

    $cn = $row[0];
    $result = $conn->query("UPDATE `繳交` SET `檔案名稱` = '$bname',
        `時間`='$now_datetime' WHERE `繳交`.`繳交編號` = '1'");
    echo "作業更新"."<br>";
    exit;
}else{//未上傳

    /*
        $cn為繳交編號，是繳交資料表中的繳交編號最大值＋1
    */        
    $result = $conn->query("SELECT COUNT(`繳交編號`) FROM `繳交`");
    $row = @mysqli_fetch_row($result);
    if(!$row){
        $cn = 1;
    }else{
        echo $row[0]."<br>";
        $cn = (int)$row[0]+1;
    }

    
    $result = $conn->query("INSERT INTO `繳交` (`繳交編號`, `時間`, `學號`, `作業編號`, `檔案名稱`, `分數`) 
        VALUES ('$cn', '$now_datetime', '$msid ', '$hw_n', '$bname', '-1')");

}

$conn->close();
?>

