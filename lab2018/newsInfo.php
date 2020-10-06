<!--功能: 布告欄各消息詳細內容
    引數(GET): courseID(課程編號), username(使用者名稱), resourceID(教材編號)-->
<?php 
    //此檔案所在位置(根目錄)
    $link = "../lab2018/";
    //資料庫連線
    $serverName = "127.0.0.1";
    $user = "DB_proj1";
    $password = "AlexAlex";
    $dbName = "DB_proj1";
    $conn = new mysqli($serverName, $user, $password, $dbName);
    if($conn->connect_error){
       die("MySQL連線失敗: " . $conn->connect_error);
    }
    $conn->set_charset("utf8");
    //URL引數
    $username = $_GET['username'];
    $courseID = $_GET['courseID'];
    //雖然稱作教材, 但是應該稱作消息較洽當(可以公布消息, 亦可供檔案下載)
    $resourceID = $_GET['resourceID'];
    
    $sql = 'SELECT * FROM resources WHERE 教材編號 = \'' . $resourceID . '\'';

    $result = $conn->query($sql);

    if (!$result)
        trigger_error('Invalid query: ' . $conn->error);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();

        $author = $row['作者'];
        $time = $row['時間'];
        $gist = $row['主旨'];
        $info = $row['公告'];
        $fileName = $row['檔案'];
        $filePath = $row['檔案路徑'];
        $downloadLink = "fileProcessing.php?filePath=" . $filePath . "&fileName=" . $fileName;   
    }
    $conn->close();

    $ext = pathinfo($filename, PATHINFO_EXTENSION); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>學生作業繳交與成績登錄系統</title>
        <!--Booststrap套件包-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="<?=$link;?>js/jquery.js"></script>
        <script src="<?=$link;?>js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link href="<?=$link;?>css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="<?=$link;?>css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="stylesheets/course.css">
    </head>

    <body>
        <div class="container">
            <h1></h1>
            <div class="panel panel-default">
            <div class="panel-heading">
                <h3><?=$gist;?></h3>
                <p>張貼者:&nbsp;<?=$author?>&nbsp;&nbsp;時間:&nbsp;<?=$time?></p>
            </div>
            <div class="panel-body">
                <?php echo str_replace("\n","<br />", $info); ?>
            </div>
            <div class="panel-footer">附檔: <a href ="<?=$downloadLink."&ext=".$ext;?>"><?=$fileName;?></a></div>
            </div>
            <?php $homePage = "course.php?courseID=" . $courseID . "&username=" . $username; ?>
            <a href="<?=$homePage;?>" class="btn btn-info" role="button">回上一頁</a>
        </div>
    </body>
</html>