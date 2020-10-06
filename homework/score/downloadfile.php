<?php
    if(isset($_GET['file']))
    {
        // $_GET['file'] 即為傳入要下載檔名的引數
        header('Content-Description: File Transfer');
        header("Content-type: text/".$_GET['ext']."; charset=utf8");
        //header('Content-Type: application/octet-stream');
        header("Content-disposition: attachment; filename=".$_GET['filename']);
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');   
        
        @readfile('../files/'.$_GET['file']);
    }
?>