<?php


    $mtid = $_POST['mtid'];
    $reciver = $_POST['reciver'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    /*
    echo $msid;
    echo $reciver;
    echo $title;
    echo $content;
    */


    include("../../../sql_connect/mysql_connect.inc.php");

    $result = $conn->query("SELECT COUNT(`寄信`.`寄信編號` ) FROM `寄信`");
    $row = @mysqli_fetch_row($result);
    if(!$row){
        $cn = 1;
    }else{
        echo $row[0]."<br>";
        $cn = (int)$row[0]+1;
    }



    $sql = "INSERT INTO `寄信` (`標題`, `內容`, `時間`, `學號`, `老師編號`, `寄信編號`, `收件人身份`) VALUES 
        ('$title', '$content', CURRENT_TIMESTAMP, '$reciver', '$mtid', '$cn', 'S')";
    if($conn->query($sql))
    {
            echo '傳送成功!';
            //echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
    }
    else
    {
            echo '資料庫傳送失敗!';
            //echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
    }




?>