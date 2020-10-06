<?php
/**
 * 表單接收頁面
 */
 
// 網頁編碼宣告（防止產生亂碼）
header('content-type:text/html;charset=utf-8');
// 封裝好的單一 PHP 檔案上傳 function
include_once '../../upload/upload.func.php';
// 取得 HTTP 文件上傳變數
$fileInfo = $_FILES['myFile'];
// 呼叫封將好的 function
$newName = uploadFile($fileInfo,"pictures",$_POST["msid"],array('jpeg', 'jpg', 'gif', 'png'));


echo"<script>alert('$newName');history.go(-1);</script>";  


?>