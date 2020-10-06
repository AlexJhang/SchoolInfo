<!--功能: 處理來自coursesSetting.php和detailSetting.php的設定
    引數(POST): id(課程編號), teacherID(老師編號), info(課程資訊), news(公告內容), gist(公告主旨),
                hwID(作業編號), hwName(作業名稱),  hwInfo(作業資訊), deadline(繳交期限)-->
<?php
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

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = "";
        $courseName = "";
        $courseID = "";
        $courseInfo = "";
        
        if(isset($_POST['query'])){
            //導向detailSetting.php作詳細設定
            //參數: courseID(課程編號), username(使用者名稱)
            if(!empty($_POST['id'])){
                $username = test_input($_POST["username"]);
                $courseID = test_input($_POST['id']);
                echo "<script language='javascript'>
                          window.location.replace('detailSetting.php?courseID=" . $courseID . "&username=" . $username . "');
                      </script>";
            }
        }
        else if(isset($_POST['insert'])){
            $sql = "";
            //新增課程
            if(!empty($_POST["id"]) && !empty($_POST["teacherID"]) && !empty($_POST["name"]) && !empty($_POST["info"])){
                $courseID = test_input($_POST["id"]);
                $courseName = test_input($_POST["name"]);
                $courseInfo = test_input($_POST["info"]);
                $teacherID = test_input($_POST["teacherID"]);
                
                $sql = 'INSERT INTO courses (課程編號, 課程名稱, 老師編號, 課程資訊) VALUES (\'' . $courseID . '\', \'' . $courseName . '\', \'' . $teacherID . '\', \'' . $courseInfo . '\')';
            }
            //發布新消息(含上傳檔案)
            if(!empty($_POST["username"]) && !empty($_POST["id"]) && !empty($_POST["news"]) && !empty($_POST['gist'])){
                $username = test_input($_POST["username"]);
                $courseID = test_input($_POST["id"]);
                $news = test_input($_POST["news"]);
                $gist = test_input($_POST['gist']);
                $uploadPath = "uploads/" . $courseID;
                $fileName = "";
                $filePath = "";
                date_default_timezone_set("Asia/Taipei");
                $dateTime = date("Y-m-d H:i"); 
                //若有含檔案
                if(!empty($_FILES["file"]["name"])){
                    //防止亂碼
                    header('content-type:text/html;charset=utf-8');
                    if($_FILES["file"]["error"] > 0){
                        echo "Error: " . $_FILES["file"]["error"];
                    }
                    else{
                        $fileName = $_FILES["file"]["name"];
                        $filePath = $uploadPath . "/" . $_FILES["file"]["name"];
                        // 檢查指定目錄是否存在，不存在就建立目錄
                        if (!file_exists($uploadPath))
                            mkdir($uploadPath, 0777, true);  // 建立目錄

                        if(file_exists($filePath)){
                            echo "<script language='javascript'>
                                    alert('檔案已經存在 , 請勿重複上傳');
                                    window.location.replace('detailSetting.php?courseID=" . $courseID . "&username=" . $username . "');
                                </script>";
                        }
                        else{
                            move_uploaded_file($_FILES["file"]["tmp_name"] , $filePath);
                            echo $_FILES["file"]["name"] . "上傳成功 <br>";
                        }
                    }
                }
                echo "<p>news</p>";
                $sql = 'INSERT INTO resources (課程編號, 檔案, 檔案路徑, 作者, 時間, 主旨, 公告) 
                        VALUES (\'' . $courseID . '\', \'' . $fileName . '\', \'' . $filePath . '\', \'' . $username . '\', \'' . $dateTime . '\', \'' . $gist . '\', \'' . $news . '\')';
            }
            //新增作業
            if(!empty($_POST["id"]) && !empty($_POST["hwID"]) && !empty($_POST["hwName"]) && !empty($_POST["hwInfo"]) && !empty($_POST["deadline"])){
                $sql = 'INSERT INTO 作業 (作業編號, 作業名稱, 繳交期限, 課程編號, 作業資訊) 
                        VALUES (\'' . $_POST["hwID"] . '\', \'' . $_POST["hwName"] . '\', \'' . $_POST["deadline"] . '\', \'' . $_POST["id"] . '\', \'' . $_POST["hwInfo"] . '\')'; 
            }

            if ($conn->query($sql) === TRUE) {
                echo "<script language='javascript'>
                            alert('新增成功');
                            window.location.replace('coursesSetting.php?username=" . $username . "');
                      </script>";
                //echo "New record created successfully";
            } 
            else {
                echo "Error updating record: " . $conn->error;
                echo "<script language='javascript'>
                        alert(''Error updating record: " . $conn->error . "');
                        window.location.replace('coursesSetting.php?username=" . $username . "');
                      </script>";
            }
        }
        else if(isset($_POST['delete'])){
            $sql="";
            //刪除課程
            if(!empty($_POST["name"]) || !empty($_POST["id"])){
                $courseID = test_input($_POST["id"]);
                $courseName = test_input($_POST["name"]);
                $sql = 'DELETE FROM courses WHERE 課程編號 = \'' . $courseID . '\'';
            }
            //刪除作業
            if(!empty($_POST["hwID"])){
                $sql = 'DELETE FROM 作業 WHERE 作業編號 = \'' . $_POST["hwID"] . '\'';
            }

            if ($conn->query($sql) === TRUE) {
                echo "<script language='javascript'>
                        alert('刪除成功');
                        window.location.replace('detailSetting.php?courseID=" . $courseID . "&username=" . $username . "');
                    </script>";
            } 
            else {
                echo "Error updating record: " . $conn->error;
            }
        }
        else if(isset($_POST['update'])){
            // sql to update a record
            if(!empty($_POST["id"]) || !empty($_POST["hwID"])){
                $sql = "";
                $courseID = test_input($_POST["id"]);
                //修改課程資訊
                if(!empty($_POST["info"])){
                    $courseInfo = test_input($_POST["info"]);
                    $sql = 'UPDATE courses SET 課程資訊 = \'' . $courseInfo . '\'  WHERE 課程編號 = \'' . $courseID . '\'';
                }
                //修改課程名稱
                if(!empty($_POST["name"])){
                    $courseName = test_input($_POST["name"]);
                    $sql = 'UPDATE courses SET 課程名稱 = \'' . $courseName . '\'  WHERE 課程編號 = \'' . $courseID . '\'';
                }
                //修改授課教師
                if(!empty($_POST["teacherID"])){
                    $teacherID = test_input($_POST["teacherID"]);
                    $sql = 'UPDATE courses SET 老師編號 = \'' . $teacherID . '\'  WHERE 課程編號 = \'' . $courseID . '\'';
                }
                //修改作業繳交期限
                if(!empty($_POST["hwID"]) && !empty($_POST["deadline"])){
                    $sql = 'UPDATE 作業 SET 繳交期限 = \'' . $_POST['deadline'] . '\'  WHERE 作業編號 = \'' . $_POST["hwID"] . '\'';
                }
                //修改課名, 課程資訊, 老師編號
                if(!empty($_POST["name"]) && !empty($_POST["info"]) && !empty($_POST["teacherID"])){
                    $courseName = test_input($_POST["name"]);
                    $courseInfo = test_input($_POST["info"]);
                    $teacherID = test_input($_POST["teacherID"]);
                    $sql = 'UPDATE courses SET 課程名稱 = \'' . $courseName . '\' , 課程資訊 = \'' . $courseInfo . '\' , 老師編號 = \'' . $teacherID . '\'  WHERE 課程編號 = \'' . $courseID . '\'';
                }
                
                if ($conn->query($sql) === TRUE && !empty($sql)) {
                    echo "<script language='javascript'>
                            alert('修改成功');
                            window.location.replace('coursesSetting.php?username=" . $username . "');
                        </script>";
                } 
                else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        }
    }
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