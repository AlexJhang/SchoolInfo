<?php 
    //echo $_GET['tid']."<br>";
    $ctid = $_GET['tid'];



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Teacher Information</title>
</head>
<body>
    <?php 
        include("../../../sql_connect/mysql_connect.inc.php");

        $result = $conn->query("SELECT * FROM `老師` WHERE `老師`.`老師編號` ='$ctid'");
        $conn->close();
        $row = @mysqli_fetch_row($result);
        if($row){
            echo '<h2>'.$row[1].'</h2>';
            echo str_replace("\n","<br>",$row[3]);
        }else{
            echo '<h2>查無此人</h2>';
        }    
    ?>
</body>
</html>