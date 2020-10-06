<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel=stylesheet type="text/css" href="css/my_css.css">
    <style>
        .form-group{
        }

        .login_div{
            width: 300px;
            padding:5px 20px;
            background-color:#CCCCCC;
            border: 4px solid #555555;
            border-radius: 10px;
            margin:0 auto;
            display: block;
        }
        .button{
            background-color:#FFFFFF;
            margin:0 auto;
            display: table-cell;
            
            align: middle;
        }
    </style>
</head>
<body>
    <div class="login_div">
        <form name="mform" method="post" action="login_finish.php">
            <div class="form-group">
                <label for="form_id" id="la_id">學號</label>
                <input type="text" class="form-control" id="form_id" placeholder="ex:B032040009" name="id">
            </div>
            <div class="form-group">
                <label for="form_pw">密碼</label>
                <input type="password" class="form-control" id="form_pw" placeholder="ex:12345" name="pw">
            </div>
            <div class="form-group">
                <input id="button1" class="button" type="submit" name="button" value="登入" />
                <input id="button2" class="button" type="submit" name="button" value="註冊" />
                <input type="radio"  id="form_sex1" name="occ" value ="S" checked onclick="rb_cl1()">
                <label for="form_sex1">學生</label>
                <input type="radio"  id="form_sex2" name="occ" value ="T" onclick="rb_cl2()">
                <label for="form_sex2" >老師</label>
            </div>
        </form>
    </div>
    <script>
        function rb_cl1() {
            document.getElementById("la_id").innerText="學號";
        }
        function rb_cl2() {
            document.getElementById("la_id").innerText="教師編號";
        }
    </script>
</body>
</html>