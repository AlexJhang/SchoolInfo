




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


if($id != null && $pw != null && $pw2 != null && $pw == $pw2)
{
        $sps=md5($pw);

        //新增資料進資料庫語法
        $sql = "INSERT INTO `學生` (`學號`, `姓名`, `密碼`, `生日`, `性別`, `學生資訊`) 
        VALUES ('$id', '$name', '$sps', '$birth', '$sex', '$other')";
        if($conn->query($sql))
        {
                echo '新增成功!';
                //echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
        else
        {
                echo '新增失敗!';
                //echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
}
else
{
        echo '您無權限觀看此頁面!';
        //echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}


$conn->close();

?>