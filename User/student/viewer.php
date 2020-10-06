

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
        $msid = $_GET['sid'];
        include("../../sql_connect/mysql_connect.inc.php");

        $sql = "SELECT * FROM `學生` WHERE `學號` = '$msid'";
        $result = $conn->query($sql);
        
        $row = @mysqli_fetch_row($result);
        $conn->close();

        //判斷帳號與密碼是否為空白
        //以及MySQL資料庫裡是否有這個會員=
        if(!$row){
            echo "查無此人<br>";
            exit;
        }
    ?>
    <div id="header_div">
        <h1>學生課程系統首頁</h1>
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
                $msname = $row[1];
                if($pic_path != ""){
                    echo $pic_path;
                }else{
                    if($row[4] != 'F'){
                        echo "resource/ind_pic_m.png";
                    }else{
                        echo "resource/ind_pic_f.png";
                    } 
                }
            ?> alt="Smiley face" width="250" height="250"> 

            <table>
                <tr>
                    <th class="ind_t_p">學號</th>
                    <th class="ind_t_v" id= "msid"><?php echo $row[0]?></th>
                </tr>
                <tr>
                    <th class="ind_t_p">姓名</th>
                    <th class="ind_t_v"><?php echo $row[1]?></th>
                </tr>
                <tr>
                    <th class="ind_t_p">性別</th>
                    <th class="ind_t_v">
                        <?php 
                            if($row[4] == 'M')echo "男";
                            elseif($row[4] == 'F')echo "女";
                            else echo "其他";
                        ?>
                    </th>
                </tr>
                <tr>
                    <th class="ind_t_p">生日</th>
                    <th class="ind_t_v"><?php echo $row[3]?></th>
                </tr>
                <tr>
                    <th class="ind_t_p">簡介</th>
                    <th class="ind_t_v"><?php echo  str_replace("\n","<br>",$row[5])?></th>
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

                        $sql = "SELECT `作業`.*,`courses`.`課程名稱` FROM `作業` INNER JOIN `courses` 
                            ON `作業`.`課程編號`= `courses`.`課程編號` WHERE `作業`.`課程編號` IN 
                            (SELECT `課程編號` FROM `授教` WHERE `學號`='$msid') 
                            ORDER BY `作業`.`繳交期限` ASC";
                        $result = $conn->query($sql);
                        $row = @mysqli_fetch_row($result);
                        
                        ?><table id="hw_div_table1" class="table table-condensed">
                            <tr >
                                <th class="hw_div_table1_tr1_th">課程</th>
                                <th class="hw_div_table1_tr1_th">作業</th>
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
                                <th class="hw_div_table1_tr1_th">分數</th>
                                
                            </tr>
                        <?php
                            while($row){
                                ?><?php
                                $hw_n = $row[0];
                                $d = strtotime($row[2])>=strtotime(date("Y-m-d H:i:s"));
                                if(($d && !$_GET['overtime'])||$_GET['overtime']){
                                    ?><tr 
                                        <?php if(!$d){?>
                                            style="background-color: silver;"
                                        <?php;}?>
                                    ><th class="hw_div_table1_th"><?php
                                        echo $row[5];
                                    ?></th><th  class="hw_div_table1_th"><?php
                                        echo $row[1];
                                    ?></th><th  class="hw_div_table1_th"><?php
                                            $result2 = $conn->query("SELECT `繳交編號`,`時間`,`分數` FROM `繳交` WHERE `學號`='$msid' AND `作業編號`='$hw_n'");
                                            $row2 = @mysqli_fetch_row($result2);
                                            $finish = TRUE;
                                            if(!$row2 && !$d)echo '<span style="color: red">'.$row[2]."<apan>";
                                            else echo $row[2];
                                    ?></th><th  class="hw_div_table1_th"><?php
                                        ?>
                                            <a href="../../homework/HW_upload.php?hw_n=<?php echo $hw_n?>&msid=<?php echo $msid?>">
                                            <img src="resource/HW_finish.png" alt="HW_finish" 
                                            <?php

                                                if(!$row2){?>
                                                    style="-webkit-filter: grayscale(100%);filter: grayscale(100%);"
                                                <?php;$finish = FALSE;}
                                            ?>></a><?php
                                                if($finish){
                                                    echo $row2[1];
                                                }else{
                                                    echo "未完成";
                                                }
                                    ?></th><th>
                                        <?php
                                        $score = $row2[2];
                                        if($score != -1){
                                            ?><a href="<?php
                                                echo "../../homework/score/chart_set.php?hw_n=".$hw_n;
                                            ?>"><?php
                                                echo $score;
                                            ?></a><?php
                                            
                                        }else{
                                            echo "未評分";
                                        }
                                    ?></th>
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
                        <h2>課程</h2>
                    </div>
                    <div id="co_t_div">
                        <?php
                            include("../../sql_connect/mysql_connect.inc.php");

                            $sql = "SELECT `課程名稱`, `課程編號` FROM `courses` WHERE `課程編號` 
                                IN(SELECT `課程編號` FROM `授教` WHERE 
                                `學號`='$msid')";
                            $result = $conn->query($sql);
                            $row = @mysqli_fetch_row($result);
                            $conn->close();
                            ?><table id="hw_div_table1" class="table table-condensed">

                            <?php
                                while($row){
                                    ?><tr><th>
                                        <a href=<?php echo "../../lab2018/course.php?courseID=".$row[1]."&username=".$msname;?>><?php echo $row[0];?></a>
                                        </th></tr><?php
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

                        $sql = "SELECT `寄信`.`標題`,`寄信`.`內容`,`寄信`.`時間`,`老師`.`姓名`,`寄信`.`寄信編號`,`寄信`.`老師編號` 
                                FROM `寄信` INNER JOIN `老師` ON `寄信`.`老師編號` = `老師`.`老師編號` 
                                WHERE `寄信`.`寄信編號`='$mailid' AND `收件人身份` = 'S' ";
                        $result = $conn->query($sql);
                        $row = @mysqli_fetch_row($result);
                        $conn->close();
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
                                echo "../student/mail/mail.php?msid=".$msid."&mtid=".$row[5];
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
                            
                            $sql = "SELECT `寄信`.`標題`,`老師`.`姓名`,`寄信`.`寄信編號` 
                                    FROM `寄信` INNER JOIN `老師` ON `寄信`.`老師編號` = `老師`.`老師編號` 
                                    WHERE `寄信`.`學號`='$msid' AND `收件人身份` = 'S' 
                                    ORDER BY `寄信`.`時間` DESC";
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


