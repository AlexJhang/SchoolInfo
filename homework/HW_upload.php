<?php
    echo '作業編號：'.$_GET['hw_n'].'<br>';
    echo '學號：'.$_GET['msid'].'<br>';


    include("../sql_connect/mysql_connect.inc.php");

    $sql = "SELECT * FROM `作業` WHERE `作業編號`=".$_GET['hw_n'];
    $result = $conn->query($sql);
    $row = @mysqli_fetch_row($result);
    
    
    if(!$row){
        echo "無此作業"."<br>";
        exit;
    }
    
    /*
    foreach($row as $rc){
        echo $rc." ";
    }
    echo "<br>";
    */
    $co_n = $row[3];

    $result = $conn->query("SELECT `課程`.`課程名稱` FROM `課程` WHERE `課程`.`課程編號` =".$co_n);
    $row = @mysqli_fetch_row($result);

    if(!$row){
        echo "無此課程"."<br>";
        exit;
    }
    echo '課程名稱：'.$row[0]."<br>";
    $conn->close();


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <form action="HW_upload_finish.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
        <input type="hidden" name="hw_n" value="<?php echo $_GET['hw_n']?>">
        <input type="hidden" name="msid" value="<?php echo $_GET['msid']?>">
        <!-- accept 限制上傳檔案類型 -->
        <input type="file" id="ind_up_1" class="ind_up_h" name="myFile" >

        <input type="submit" id="ind_up_2" class="ind_up_h" value="上傳檔案">
    </form>
</body>
</html>