<!--功能: 新增課程. 簡單課程設定, 查詢課程並作詳細設定(老師身分才可使用)
    引數(GET): username(使用者名稱)-->
<?php
    //此檔案所在位置(根目錄)
    $link = "../lab2018/";
    //URL引數
    $username = $_GET['username'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>學生作業繳交與成績登錄系統</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="<?=$link;?>js/jquery.js"></script>
        <script src="<?=$link;?>js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link href="<?=$link;?>css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="<?=$link;?>css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h1>課程設定</h1>
            <form method="post" action="result.php">
                <input type="hidden" name="username" value="<?=$username;?>">
                <div class="form-group">
                    <label>課程編號: </label>
                    <input type="text" class="form-control" name="id">
                </div>
                <div class="form-group">
                    <label>課程名稱: </label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label>老師編號: </label>
                    <input type="text" class="form-control" name="teacherID">
                </div>
                <div class="form-group">
                    <label>課程資訊: </label>
                    <textarea wrap="Virtual" name="info" class="form-control" rows="5"></textarea>
                </div>
                <button type="submit" name="insert" class="btn btn-default">新增</button>
                <button type="submit" name="delete" class="btn btn-default">刪除</button>
                <button type="submit" name="query" class="btn btn-warning">進階設定</button>
            </form>
        </div>
    </body>
</html>