<?php
    $hw_n = $_POST['hw_n'];

    include("../../sql_connect/mysql_connect.inc.php");
    $result = $conn->query("SELECT `繳交`.`繳交編號` FROM `繳交` WHERE `繳交`.`作業編號` = ".$hw_n);
    $row = @mysqli_fetch_row($result);

    while ($row) {
        $hid = $row[0];
        $nscore = $_POST[$hid];
        echo $hid."<br>";
        $conn->query("UPDATE `繳交` SET `分數` = '$nscore' WHERE `繳交`.`繳交編號` = '$hid'");
        $row = @mysqli_fetch_row($result);
    }

    $conn->close();

?>