<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel=stylesheet type="text/css" href="../css/my_css.css">
</head>
<body>

        
    
    <h2>學生帳號申請</h2>
    <div id="mform_div"><form name="mform" method="post" action="register_finish.php">
        <div class="form-group">
            <label for="form_name">姓名</label>
            <input type="text" class="form-control" id="form_name" placeholder="ex:張ＸＸ" name="name">
        </div>
        <div class="form-group">
            <label for="form_id">學號(不能再修改)</label>
            <input type="text" class="form-control" id="form_id" placeholder="ex:B032040009" 
            name="id" value="<?php echo  $_COOKIE['id']; ?>">
        </div>
        <div class="form-group">
            <label for="form_pw">密碼</label>
            <input type="password" class="form-control" id="form_pw" placeholder="ex:12345" 
            name="pw" value="<?php echo  $_COOKIE['pw']; ?>">
        </div>
        <div class="form-group">
            <label for="form_pw2">再一次輸入密碼</label>
            <input type="password" class="form-control" id="form_pw2" placeholder="ex:12345" name="pw2">
        </div>
        <div class="form-group">
            <label for="form_birth">生日</label>
            <input type="date" class="form-control" id="form_birth" placeholder="ex.1999/12/31" name="birth">
        </div>
        <div class="form-group">
            <label for="form_sex1">性別</label>
            <input type="radio"  id="form_sex1" name="sex" value ="M">
            <label for="form_sex1">男</label>
            <input type="radio"  id="form_sex2" name="sex" value ="F">
            <label for="form_sex2">女</label>
            <input type="radio"  id="form_sexˇ" name="sex" value ="E">
            <label for="form_sex3">其他</label>
        </div>
        <div class="form-group" >
            <label for="form_other">自介</label>
            <textarea id="form_other"  class="form-control" style="height: 60px;" name="other" ></textarea>
            
        </div>

        <input type="submit" name="button1" value="確定" />


    </form></div>

</body>
</html>

<!-- 
    INSERT INTO `學生` (`學號`, `姓名`, `密碼`, `生日`, `性別`, `學生資訊`) VALUES ('B03040045', '嗚嗚嗚', '123', '2018-05-09', 'M', '1241414234')
-->