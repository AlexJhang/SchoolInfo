




<?php
include("../../sql_connect/mysql_connect.inc.php");

//$sql = "INSERT INTO `學生` (`學號`, `姓名`, `密碼`, `生日`, `性別`, `學生資訊`) VALUES ('B03040045', '嗚嗚嗚', '123', '2018-05-09', 'M', '1241414234')";
//$result = $conn->query($sql);


$id = $_POST['id'];//學號
$name = $_POST['name'];//姓名
$pw = $_POST['pw'];//密碼
$pw2 = $_POST['pw2'];
$birth = $_POST['birth'];//生日
$sex = $_POST['sex'];//性別
$other = $_POST['other'];//學生資訊
//判斷帳號密碼是否為空值
//確認密碼輸入的正確性

if($pw == null){
        $sql = "UPDATE `學生` SET `姓名` = '$name', `生日` = '$birth',
        `性別` = '$sex', `學生資訊` = '$other' WHERE `學生`.`學號` = '$id'";
       if($conn->query($sql))
       {
               echo '修改成功!';
               //echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
       }
       else
       {
               echo '資料庫修改失敗!';
               //echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
       }
}else{
        $sps=md5($pw);

        //新增資料進資料庫語法
        //
        //$sql = "INSERT INTO `學生` (`學號`, `姓名`, `密碼`, `生日`, `性別`, `學生資訊`) 
        //VALUES ('$id', '$name', '$sps', '$birth', '$sex', '$other')";
        $sql = "UPDATE `學生` SET `姓名` = '$name', `密碼` = '$sps', `生日` = '$birth',
         `性別` = '$sex', `學生資訊` = '$other' WHERE `學生`.`學號` = '$id'";
        if($conn->query($sql))
        {
                echo '修改成功!';
                //echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
        else
        {
                echo '資料庫修改失敗!';
                //echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
}
$conn->close();

?>