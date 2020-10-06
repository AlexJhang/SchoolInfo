<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Set Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel=stylesheet type="text/css" href="../css/my_css.css">
</head>
<body>
    <?php
        $msid = $_GET['sid'];
        include("../../sql_connect/mysql_connect.inc.php");

        $sql = "SELECT * FROM `學生` WHERE `學號` = '$msid'";
        $result = $conn->query($sql);
        //echo $result[0]."<br>";
        
        $row = @mysqli_fetch_row($result);
        $conn->close();

        //判斷帳號與密碼是否為空白
        //以及MySQL資料庫裡是否有這個會員=
        if(!$row){
            echo "查無此人<br>";
            exit;
        }

        
    ?>
    <h2>學生資料修改</h2>
    <div id="mform_div"><form name="mform" method="post" action="set_finish.php">
        <div class="form-group">
            <label for="form_id">學號(不能修改)</label>
            <input type="text" class="form-control" id="form_id" value=<?php echo $row[0]?>  name="id" readonly="readonly" >
        </div>
        <div class="form-group">
            <label for="form_name">姓名</label>
            <input type="text" class="form-control" id="form_name" value="<?php echo $row[1] ?>" name="name" >
        </div>
        <div class="form-group">
            <label for="form_pw">密碼(不想修改不用填)</label>
            <input type="password" class="form-control" id="form_pw" placeholder="ex:12345" name="pw">
        </div>
        <div class="form-group">
            <label for="form_pw2">再一次輸入密碼(不想修改不用填)</label>
            <input type="password" class="form-control" id="form_pw2" placeholder="ex:12345" name="pw2">
        </div>
        <div class="form-group">
            <label for="form_birth">生日</label>
            <input type="date" class="form-control" id="form_birth" value="<?php echo $row[3] ?>" name="birth">
        </div>
        <div class="form-group">
            <label for="form_sex1">性別</label>
            <input type="radio"  id="form_sex1" name="sex" value ="M" <?php if($row[4] == 'M')echo "checked"?>>
            <label for="form_sex1">男</label>
            <input type="radio"  id="form_sex2" name="sex" value ="F" <?php if($row[4] == 'F')echo "checked"?>>
            <label for="form_sex2">女</label>
            <input type="radio"  id="form_sexˇ" name="sex" value ="E" <?php if($row[4] == 'E')echo "checked"?>>
            <label for="form_sex3">其他</label>
        </div>
        <div class="form-group" >
            <label for="form_other">自介</label>
            <textarea id="form_other"  class="form-control" style="height: 60px;" name="other"><?php echo $row[5] ?></textarea>
            
        </div>

        <input type="submit" name="button1" value="修改" />


    </form></div>

</body>
</html>
