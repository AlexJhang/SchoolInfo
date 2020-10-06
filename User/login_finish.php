<?php
    $id = $_POST['id'];//學號
    $pw = $_POST['pw'];//密碼
    $occ = $_POST['occ'];
    $bu = $_POST['button'];



    if($bu == '登入'){
        if($occ  == 'S'){
            //get password from database
            include("../sql_connect/mysql_connect.inc.php");
            $sql = "SELECT `密碼` FROM `學生` WHERE `學號` = '$id'";
            $result = $conn->query($sql);
            $row = @mysqli_fetch_row($result);
            $conn->close();

            //judge if the 學號 exits or not
            if($row){   
                //check password
                $dpw = $row[0];
                if($dpw == md5($pw)){
                    echo "登入成功"."<br>";
                    echo '<script>document.location.href="../User/student/viewer.php?sid='.$id.'&overtime=0'.'&SelectedMail=0";</script>';
                }else{
                    echo "密碼錯誤"."<br>";
                }
            }else{
                echo '無此學號'."<br>";
            }

        }
        if($occ  == 'T'){
            //get password from database
            include("../sql_connect/mysql_connect.inc.php");
            $sql = "SELECT `密碼` FROM `老師` WHERE `老師編號` = '$id'";
            $result = $conn->query($sql);
            $row = @mysqli_fetch_row($result);
            $conn->close();

            //judge if the 學號 exits or not
            if($row){   
                //check password
                $dpw = $row[0];
                if($dpw == md5($pw)){
                    echo "登入成功"."<br>";
                    echo '<script>document.location.href="../User/teacher/viewer.php?tid='.$id.'&overtime=0'.'&SelectedMail=0";</script>';
                }else{
                    echo "密碼錯誤"."<br>";
                }
            }else{
                echo '無此學號'."<br>";
            }

        }
    }elseif($bu == '註冊'){
        if($occ  == 'S'){
            setcookie('id', $id);
            setcookie('pw', $pw);
            echo '<script>document.location.href="../User/student/register.php";</script>';
            exit;
        }
    }



?>