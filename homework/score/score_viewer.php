<?php
    //echo "hw_n: ".$_GET['hw_n']."<br>";
    $hw_n = $_GET['hw_n'];

    
    $mtid = $_GET['tid'];
    include("../../sql_connect/mysql_connect.inc.php");
    $result = $conn->query("SELECT `作業名稱`,`繳交期限` FROM `作業` WHERE `作業編號`=".$hw_n);
    $row = @mysqli_fetch_row($result);
    if(!$row){
        echo "無此作業"."<br>";
        $conn->close();
        exit;
    }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body{
            margin: 30px;
            font-family:標楷體, cursive, fantasy;
        }
    </style>
</head>
<body>
    <h2><?php echo $row[0]?></h2>
    <?php
        $sql = "SELECT `學生`.`姓名`,AB.*
                FROM `學生` 
                INNER JOIN( 
                    SELECT A.`學號`,B.`時間`,B.`檔案名稱`,B.`分數`,B.`繳交編號`
                    FROM( 
                        SELECT `授教`.`學號` 
                        FROM `授教` 
                        WHERE `授教`.`課程編號` = ( 
                            SELECT `作業`.`課程編號` 
                            FROM `作業` 
                            WHERE `作業`.`作業編號`=$hw_n) ) 
                            AS A 
                    LEFT JOIN( 
                        SELECT `繳交`.* 
                        FROM `繳交` 
                        WHERE `繳交`.`作業編號` = $hw_n) 
                    AS B 
                    ON A.`學號`=B.`學號` ) 
                AS AB ON AB.`學號` =`學生`.`學號`
                ORDER BY `學號` ASC
                ";
        $result = $conn->query($sql);
        
        $row = @mysqli_fetch_row($result);
        $conn->close();

        //以及MySQL資料庫裡是否有這個會員=
        if(!$row){
            echo "查無此人<br>";
            exit;
        }
    ?>
    <form action="score_set.php" method="post">
        <input type="hidden" name="hw_n" value="<?php echo $hw_n?>">
        <input type="submit" value="成績登錄"><br>

        
        <table class="table table-striped">
            <thead>
            <tr>
                <th>學號</th>
                <th>姓名</th>
                <th>繳交時間</th>
                <th>檔案名稱</th>
                <th>
                    分數(-1:未評分)
                    <a href="<?php echo "chart_set?hw_n=".$hw_n?>">
                        <input type="button" value="統計圖表">
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
                while($row){
                ?>
                <tr>
                    <th><?php echo $row[1]?></th>
                    <th><?php echo $row[0]?></th>
                    <th><?php echo $row[2]?></th>
                    <th><a href="<?php
                            $filename = $row[3];
                            $ext = pathinfo($filename, PATHINFO_EXTENSION); 
                            echo 'downloadfile.php?file='.$hw_n.'|'.$row[1].'.'.$ext.'&filename='.$filename.'&ext='.$ext;
                        ?>"><?php echo $row[3]?></a></th>
                    <th><?php
                        if($row[2]!=''){?>
                        <input type="number" name=<?php echo $row[5] ?> value=<?php echo $row[4]?>>
                        <?php ;} ?>
                    </th>
                </tr>
                <?php
                $row = @mysqli_fetch_row($result);
            }
            ?>
            </tbody>
        </table>
    </form>

</body>
</html>