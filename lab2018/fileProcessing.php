<?php
        // $_GET['file'] 即為傳入要下載檔名的引數
        header('Content-Description: File Transfer');
        header("Content-type: text/".$_GET['ext']."; charset=utf8");
        //header('Content-Type: application/octet-stream');
        header("Content-disposition: attachment; filename=".$_GET['fileName']);
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');   
        
        readfile('../lab2018/'.$_GET['filePath']);



    //
   //"fileProcessing.php?filePath=uploads/CSE497/2018 JAVA Homework 12.zip&fileName=2018 JAVA Homework 12.zip">2018 JAVA Homework 12.zip</a></div>

?>



