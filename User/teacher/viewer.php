

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>Viewer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel=stylesheet type="text/css" href="../css/my_css.css">
    <link rel=stylesheet type="text/css" href="viewer_css.css">
    <script type="text/javascript" src="viewer_js.js"></script>
</head>
<body id="viewer_body">
    <?php
        $mtid = $_GET['tid'];
        include("../../sql_connect/mysql_connect.inc.php");
        
        $sql = "SELECT * FROM `老師` WHERE `老師編號` = '$mtid'";
        $result = $conn->query($sql);
        
        $row = @mysqli_fetch_row($result);
        $conn->close();

        //以及MySQL資料庫裡是否有這個會員=
        if(!$row){
            echo "查無此人<br>";
            exit;
        }
    ?>
    <div id="header_div">
        <h1>教授課程系統首頁</h1>
    </div>
    <div id = "middle_section_div">
        <div id="ind_div">
            <img id="ind_pic" src=<?php 
                $ed = array('.jpeg', '.jpg', '.gif', '.png');
                $pic_path="";
                foreach($ed as $sed){
                    //echo "pictures/".$msid.$sed;
                    if(file_exists("pictures/".$msid.$sed)){
                        $pic_path="pictures/".$msid.$sed;
                        break;
                    }
                }
                if($pic_path != ""){
                    echo $pic_path;
                }else{
                    echo "resource/ind_pic_m.png";
                }
            ?> alt="face" width="250" height="250"> 

            <table>
                <tr>
                    <th class="ind_t_p">教授編號</th>
                    <th class="ind_t_v" id= "mtid"><?php echo $row[0]?></th>
                </tr>
                <tr>
                    <th class="ind_t_p">姓名</th>
                    <th class="ind_t_v"><?php
                        $TTName = $row[1];
                     echo $row[1]?></th>
                </tr>
                <tr>
                    <th class="ind_t_p">簡介</th>
                    <th class="ind_t_v"><?php echo  str_replace("\n","<br>",$row[3])?></th>
                </tr>
                <tr>
                    <th colspan="2">
                        <input id="ind_bu_1" class="ind_bu" type="button" value="修改" onclick="ind_bu_1()"/>
                        <input id="ind_bu_2" class="ind_bu" type="button" value="更換照片" onclick="ind_bu_2()"/>
                    </th>
                </tr>

            </table>
            <form action="viewer_pic_up.php" method="post" enctype="multipart/form-data">
                <!-- 限制上傳檔案的最大值 -->
                <input type="hidden" name="msid" value="<?php echo $row[0]?>">
                <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
            
                <!-- accept 限制上傳檔案類型 -->
                <input type="file" id="ind_up_1" class="ind_up_h" name="myFile" accept="image/jpeg,image/jpg,image/gif,image/png">
            
                <input type="submit" id="ind_up_2" class="ind_up_h" value="上傳檔案">
            </form>

        </div>

        <div id="func_div">
            <div id="func_div_u">
                <!-- 
                    作業區（左上）
                -->
                <div  id="hw_div">
                    <div  id="hw_header_div">
                        <h2>作業</h2>
                    </div>
                    <div id="hw_t_div"><?php
                        include("../../sql_connect/mysql_connect.inc.php");

                        /*$sql = "SELECT `作業`.*,`課程`.`課程名稱` FROM `作業` INNER JOIN `課程` 
                            ON `作業`.`課程編號`= `課程`.`課程編號` WHERE `作業`.`課程編號` IN 
                            (SELECT `課程編號` FROM `授課` WHERE `老師編號`='$mtid') 
                            ORDER BY `作業`.`繳交期限` ASC";
                        */
                        $sql=
                            "SELECT B.`課程名稱`,A.`作業名稱`,A.`繳交期限`,A.`作業編號` 
                            FROM (
                                SELECT `作業`.* 
                                FROM `作業` 
                                WHERE `作業`.`課程編號` IN (
                                    SELECT `courses`.`課程編號` 
                                    FROM `courses` 
                                    WHERE `courses`.`老師編號` = '$mtid')) 
                                AS A LEFT JOIN (
                                    SELECT `courses`.`課程編號`,`courses`.`課程名稱` 
                                    FROM `courses`)
                                AS B ON A.`課程編號` = B.`課程編號`";
                        $result = $conn->query($sql);
                        $row = @mysqli_fetch_row($result);
                        
                        ?><table id="hw_div_table1" class="table table-condensed">
                            <tr >
                                <th class="hw_div_table1_tr1_th">課程</th>
                                <th class="hw_div_table1_tr1_th">作業(編號)</th>
                                <th class="hw_div_table1_tr1_th">繳交期限
                                    <input id="hw_checkBox1" type="checkbox" onclick="hw_cb_1()" value="1"
                                    <?php
                                        if($_GET['overtime'])echo" checked";
                                    ?>>
                                    <label for="hw_checkBox1" id="hw_checkBox1_l">
                                        過期作業
                                    </label>
                                </th>
                                <th class="hw_div_table1_tr1_th">繳交狀況</th>
                                
                            </tr>
                        <?php
                            while($row){
                                ?><?php
                                $hw_n = $row[3];
                                $d = strtotime($row[2])>=strtotime(date("Y-m-d H:i:s"));
                                if(($d && !$_GET['overtime'])||$_GET['overtime']){
                                    ?><tr 
                                        <?php if(!$d){?>
                                            style="background-color: silver;"
                                        <?php;}?>
                                    ><th class="hw_div_table1_th"><?php
                                        echo $row[0];
                                    ?></th><th class="hw_div_table1_th"><?php
                                        echo $row[1].'('.$row[3].')';
                                    ?></th><th class="hw_div_table1_th"><?php
                                        $result2 = $conn->query("SELECT `繳交編號`,`時間`,`分數` FROM `繳交` WHERE `學號`='$msid' AND `作業編號`='$hw_n'");
                                        $row2 = @mysqli_fetch_row($result2);
                                        $finish = TRUE;
                                        if(!$row2 && !$d)echo '<span style="color: red">'.$row[2]."<apan>";
                                        else echo $row[2];
                                    ?></th><th class="hw_div_table1_th"><?php
                                        $result3 = $conn->query("SELECT COUNT(`繳交`.`繳交編號`) FROM `繳交` WHERE `繳交`.`作業編號`='$hw_n'");
                                        $row3 = @mysqli_fetch_row($result3);
                                        $result4 = $conn->query("SELECT COUNT(`授教`.`授教編號`) FROM `授教` 
                                                    WHERE `授教`.`課程編號`=( SELECT `作業`.`課程編號` FROM `作業` 
                                                    WHERE `作業`.`作業編號` = '$hw_n')");
                                        $row4 = @mysqli_fetch_row($result4);
                                        if($row3 && $row4){
                                            echo $row3[0].'/'.$row4[0] ;
                                        }
                                    ?></th>
                                    <th>
                                            <a href=<?php
                                                echo "../../homework/score/score_viewer.php?hw_n=".$hw_n;
                                            ?>><input type="button" value="✍"></a>
                                    </th>
                                    </tr><?php
                                }
                                $row = @mysqli_fetch_row($result);
                            }
                        ?></table><?php
                        $conn->close();
                    ?></div>
                </div>
                <!-- 
                    課程區（右上）
                -->            
                <div id="co_div">
                    <div  id="co_header_div">
                        <a href=<?php 
                            echo "../../lab2018/coursesSetting.php?username=".$mtid;
                        ?>><h2>課程</h2></a>
                    </div>
                    <div id="co_t_div">
                        <?php
                            include("../../sql_connect/mysql_connect.inc.php");

                            $sql = "SELECT `courses`.`課程名稱`,`courses`.`課程編號` FROM `courses` WHERE `courses`.`老師編號`=".$mtid;
                            $result = $conn->query($sql);
                            $row = @mysqli_fetch_row($result);
                            $conn->close();
                            ?><table id="hw_div_table1" class="table table-condensed">

                            <?php
                                while($row){
                                    ?><tr><th><a href=<?php
                                        echo "../../lab2018/detailSetting.php?courseID=".$row[1]."&username=".$mtid;
                                    ?>><?php
                                        echo $row[0];                                  
                                    ?></a><a href=<?php
                                        echo "../../lab2018/course.php?courseID=".$row[1]."&username=".$TTName;
                                    ?>><?
                                        echo "Home"
                                    ?></a></th></tr><?php
                                    $row = @mysqli_fetch_row($result);
                                }
                            ?></table><?php?>
                    </div>
                </div>
            </div>
            <div id="func_div_l">
                <!-- 
                    留言觀看區（左下）
                -->
                <div id="maed_div">
                    <div  id="maed_header_div">
                        <h2>留言觀看區</h2>
                    </div>
                    <?php 
                        $mailid = $_GET['SelectedMail'];

                        include("../../sql_connect/mysql_connect.inc.php");

                        $sql = "SELECT `寄信`.`標題`,`寄信`.`內容`,`寄信`.`時間`,`學生`.`姓名`,`寄信`.`寄信編號`,`寄信`.`學號` 
                                FROM `寄信` INNER JOIN `學生` ON `寄信`.`學號` = `學生`.`學號` 
                                WHERE `寄信`.`寄信編號`='$mailid' AND `收件人身份` = 'T' ";

                        $result = $conn->query($sql);
                        $row = @mysqli_fetch_row($result);
                        $conn->close();
                        $msid = $row[5];
                    ?>
                    <div id="maed_header2_div">
                        <div id="maed_title_div">
                            <?php echo $row[0]?>
                        </div>
                        <div id="maed_time_div">
                            <?php echo $row[2]?>
                        </div>
                    </div>
                    <div id="maed_content_div" <?php
                            if(!$row) echo 'style="height: 0px;"'
                        ?>>
                        <?php echo str_replace("\n","<br>",$row[1]);?>
                    </div>
                    <div id="mead_bottom_div">
                        <div id="maed_name_div">
                            <?php echo $row[3]?>
                        </div>
                        <div id = "mead_sender_div">
                            <a href=<?php
                                echo "../teacher/mail/mail.php?msid=".$msid."&mtid=".$mtid;
                            ?>><input type="button" value="寄信"></a>
                        </div>
                    </div>
                </div>
                <!-- 
                    留言清單區（右下）
                -->               
                <div id="mail_div">
                    <div  id="mail_header_div">
                        <h2>留言清單</h2>
                    </div>
                    <div id="mail_t_div">
                        <?php
                            include("../../sql_connect/mysql_connect.inc.php");
                            
                            $sql = "SELECT `寄信`.`標題`,`學生`.`姓名`,`寄信`.`寄信編號` FROM
                                 `寄信` INNER JOIN `學生` ON `寄信`.`學號` = `學生`.`學號` 
                                 WHERE `寄信`.`老師編號`='$mtid' AND `收件人身份` = 'T' ORDER BY `寄信`.`時間` DESC";
                            $result = $conn->query($sql);
                            $row = @mysqli_fetch_row($result);
                            $conn->close();
                            ?><table id="co_div_table1" class="table table-condensed">
                                <tr>
                                    <th class="mail_div_table1_tr1_th">標題</th>
                                    <th class="mail_div_table1_tr1_th">寄信人</th>
                                </tr>
                                <?php
                                while($row){
                                    ?><tr <?php
                                        if($row[2] == $_GET['SelectedMail'])
                                            echo 'style="background-color: silver;"';
                                        ?>><th><a href="<?php
                                            echo preg_replace('/&SelectedMail=[0-9]*/', '&SelectedMail='.$row[2], $_SERVER['REQUEST_URI']);
                                        ?>"><?php
                                            echo $row[0];                                  
                                        ?></a></th><th><?php
                                            echo $row[1];       
                                    ?></th></tr><?php
                                    $row = @mysqli_fetch_row($result);
                                }
                            ?></table><?php?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="footer_div"></div>
</body>
<script>
    function hw_cb_1(){
        var s = document.location.href;
        if(document.getElementById("hw_checkBox1").checked){
            var re = /overtime=0/g;
            document.location.href = s.replace(re, "overtime=1");
        }else{
            var re = /overtime=1/g;
            document.location.href = s.replace(re, "overtime=0");
        }
        //document.location.href = '../student/set.php?sid='+id;
    }
</script>
</html>


