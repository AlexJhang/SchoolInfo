<!--功能: 課程詳細設定(老師身分才可使用)
    引數(GET): username(使用者名稱), courseID(課程編號)-->
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
    $courseID = $_GET['courseID'];
    $username = $_GET['username'];
    //0: 顯示課程基本資料, 1: 顯示布告欄各項資料
    $sql[0] = 'SELECT * FROM courses WHERE courses.課程編號 = \'' . $courseID . '\'';
    $sql[1] = 'SELECT * FROM resources WHERE resources.課程編號 = \'' . $courseID . '\'';

    $result[0] = $conn->query($sql[0]);
    $result[1] = $conn->query($sql[1]);

    if (!$result[0] || !$result[1])
        trigger_error('Invalid query: ' . $conn->error);

    //如果搜尋結果不為0, row: 為陣列, 每一項儲存各列欄位
    if($result[0]->num_rows > 0){
        $row = $result[0]->fetch_assoc();
    }
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
            <h1>詳細設定</h1>
            <p></p>
            <label>課程編號:&nbsp;<?=$courseID;?></label>

            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">基本資訊</a></li>
                <li><a data-toggle="tab" href="#menu1">刪除消息</a></li>
                <li><a data-toggle="tab" href="#menu2">新增消息</a></li>
                <li><a data-toggle="tab" href="#menu3">作業設定</a></li>
            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <form method="post" action="result.php">
                        <div class="form-group">
                            <label>課程名稱: </label>
                            <input type="text" class="form-control" name="name" value="<?=$row["課程名稱"];?>">
                        </div>
                        <div class="form-group">
                            <label>老師編號: </label>
                            <input type="text" class="form-control" name="teacher" value="<?=$row["老師編號"];?>">
                        </div>
                        <div class="form-group">
                            <label>課程資訊: </label>
                            <textarea wrap="Virtual" name="info" class="form-control" rows="5"><?=$row['課程資訊'];?></textarea>
                        </div>
                        <input type="hidden" name="id" value="<?=$courseID;?>">
                        <button type="submit" name="update" class="btn btn-default">確定修改</button>
                    </form>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <p></p>
                    <?php
                        if($result[1]->num_rows > 0){
                            while($row = $result[1]->fetch_assoc()){
                                //若要刪除消息, 則導向fileProcessing.php 參數: filePath(檔案路徑), resourceID(教材編號)
                                $deleteLink = $link . "fileProcessing.php?filePath=" . $row['檔案路徑'] . "&resourceID=" . $row['教材編號'];
                                echo '<p></p>';
                                echo '<div class="row">';
                                echo '<div class="col-sm-6">';
                                echo '<h5>' . $row['主旨'] . '</h5>';
                                echo '</div>';
                                echo '<div class="col-sm-4">';
                                echo '<h5>' . '&nbsp;&nbsp;張貼者:&nbsp;' . $row['作者'] . '&nbsp;&nbsp;時間:&nbsp;' . $row['時間'] . '</h5>';
                                echo '</div>';
                                echo '<div class="col-sm-2">';
                                echo '<a href="' . $deleteLink . '" class="btn btn-default" role="button">刪除消息</a>';
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                    ?>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <p></p>
                    <form method="post" action="result.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>主旨: </label>
                            <input type="text" class="form-control" name="gist">
                            <label>內容: </label>
                            <textarea wrap="Virtual" name="news" class="form-control" rows="5"></textarea>
                            <label>附件檔案: </label>
                            <input type="file" class="form-control" name="file">
                            <p></p>
                            <input type="hidden" name="username" value="<?=$username;?>">
                            <input type="hidden" name="id" value="<?=$courseID;?>">
                            <button type="submit" name="insert" class="btn btn-default">上傳</button>
                        </div>
                    </form>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <p></p>
                    <form method="post" action="result.php">
                        <div class="form-group">
                            <!--

                            -->
                            <label>作業編號: </label>
                            <input type="text" class="form-control" name="hwID" value=>
                            <label>作業名稱: </label>
                            <input type="text" class="form-control" name="hwName">
                            <label>作業期限: </label>
                            <input type="text" class="form-control" name="deadline">
                            <label>作業資訊: </label>
                            <textarea wrap="Virtual" name="hwInfo" class="form-control" rows="5"></textarea>
                            <p></p>
                            <input type="hidden" name="id" value="<?=$courseID;?>">
                            <input type="hidden" name="username" value="<?=$username;?>">
                            <button type="submit" name="insert" class="btn btn-default">新增</button>
                            <button type="submit" name="update" class="btn btn-default">修改</button>
                            <button type="submit" name="delete" class="btn btn-default">刪除</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php $conn->close();?>