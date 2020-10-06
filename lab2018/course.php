<!--功能: 各課程主頁
    引數(GET): courseID(課程編號), username(使用者名稱)-->
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
    //0: 顯示課程基本資料, 1: 顯示布告欄各項資料, 2: 顯示各項留言(課程討論區)
    $sql[0] = 'SELECT * FROM courses WHERE courses.課程編號 = \'' . $courseID . '\'';
    $sql[1] = 'SELECT * FROM resources WHERE resources.課程編號 = \'' . $courseID . '\'';
    $sql[2] = 'SELECT * FROM messages';
    //result: 對應之資料庫搜尋結果
    $result[0] = $conn->query($sql[0]);
    $result[1] = $conn->query($sql[1]);
    $result[2] = $conn->query($sql[2]);
    //檢查搜尋結果是否有誤
    if (!$result[0] || !$result[1] || !$result[2])
        trigger_error('Invalid query: ' . $conn->error);
    //如果搜尋結果不為0, row: 為陣列, 每一項儲存各列欄位
    if($result[0]->num_rows > 0){
        $row = $result[0]->fetch_assoc();
        //查詢老師姓名
        //echo '老師編號'.$row['老師編號']."<br>";
        $sql[3] = 'SELECT 姓名 FROM 老師 WHERE 老師編號 ='.$row['老師編號'];
        $result[3] = $conn->query($sql[3]);
        $teacher = $result[3]->fetch_assoc();
    }
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
        <header>
            <div class="jumbotron" style="background-color:orange;">
                <h1 style="color:white;"><?=$row["課程名稱"];?></h1>
                <p style="color:white;">課程編號:<?=$row["課程編號"];?>&nbsp;&nbsp;&nbsp;&nbsp;授課教師:<?=$teacher["姓名"];?></p>
            </div>
        </header>

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">課程資訊</a></li>
            <li><a data-toggle="tab" href="#menu1">布告欄</a></li>
            <li><a data-toggle="tab" href="#menu2">課程討論區</a></li>
        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3>課程資訊</h3>
                <?php echo "<p>" . str_replace("\n","<br>", $row['課程資訊']) . "</p>"?>
            </div>
            <div id="menu1" class="tab-pane fade">
                <p></p>
                <div class="list-group">
                    <?php
                        //布告欄: 顯示各項消息主旨, 作者和時間, 點開後會跳到newsInfo.php看詳細內容並可有附件檔案
                        if($result[1]->num_rows > 0){
                            while($row = $result[1]->fetch_assoc()){
                                $newsInfo = $link . 'newsInfo.php?courseID=' . $courseID . '&username=' . $username .  '&resourceID=' . $row['教材編號']; 
                                echo '<a href="' . $newsInfo . '" class="list-group-item"><span class="span4" align="left">' . $row['主旨'] . '</span><span class="span6" align="right">張貼者:&nbsp;' . $row['作者'] . '&nbsp;&nbsp;時間:&nbsp;' . $row['時間'] . '</span></a>';
                            }
                         }
                    ?>
                </div>
            </div>
            <div id="menu2" class="tab-pane fade">
                <p></p>
                <!--填寫留言處:填寫完會跳到sendMessage.php處理 參數: context(留言內容), author(使用者名稱), courseID(課程編號)-->
                <div class="media">
                    <div class="media-left">
                        <img class="media-object" style="width:60px" src="<?=$link;?>/img/head.jpg">
                    </div>
                    <div class="media-body">
                        <form method="post" action="<?=$link;?>sendMessage.php">
                            <div class="form-group">
                                <label for="comment"><?=$username;?>:</label>
                                <textarea wrap="Virtual" name="context" class="form-control" rows="2" placeholder="在想些什麼?"></textarea>
                                <input type="hidden" name="author" value="<?=$username;?>">
                                <input type="hidden" name="courseID" value="<?=$courseID;?>">
                                <button type="submit" class="btn btn-default">送出</button>
                            </div>
                        </form>
                    </div>
                </div>

                <?php
                    //別人留言內容
                    if($result[2]->num_rows > 0){
                        while($row = $result[2]->fetch_assoc()){
                            $imgLink = $link . "img/head.jpg";
                            $messageLink1 = $link . "sendMessage.php?flag=1";
                            $messageLink2 = $link . "sendMessage.php?flag=2";
                            echo '<div class="media">';
                            echo '<div class="media-left">';
                            echo '<img class="media-object" style="width:60px" src=\'' . $imgLink . '\'>';
                            echo '</div>';
                            echo '<div class="media-body">';
                            echo '<h4 class="media-heading">' . $row['作者'] . '<small><i> Posted on ' . $row['時間'] . '</i></small></h4>';
                            echo '<p>' . str_replace("\n","<br>", $row['內容']) . '</p>';
                            echo '<!--a href="#">讚 <span class="glyphicons glyphicons-thumbs-up"></span> <span class="badge"></span></a-->';
                            echo '<!--a href="#"> 回覆 <span class="badge"></span></a-->';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                ?>
            </div>
        </div>
    </body>
</html>
<?php
    $conn->close();
    function test_input($data) {
        if(empty($data))
            $data = NULL;
        else{
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
        }
        return $data;
     }
?>