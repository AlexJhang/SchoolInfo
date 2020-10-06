<!--功能: 處理使用者發送之留言訊息(必須跟course.php合用)
    引數(POST): courseID(課程編號), author(使用者名稱), context(留言內容)-->
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

        if(!empty($_POST["context"])){
            $author = test_input($_POST["author"]);
            $courseID = test_input($_POST["courseID"]);
            $context = test_input($_POST["context"]);
            date_default_timezone_set('Asia/Taipei');
            $dateTime = date("Y-m-d H:i"); 

            $sql = 'INSERT INTO messages (課程編號, 作者, 時間, 內容) 
                    VALUES (\'' . $courseID . '\', \'' . $author . '\', \'' . $dateTime . '\', \'' . $context . '\')';

            if ($conn->query($sql) === TRUE) {
                //重導頁面到課程主頁
                echo "<script language='javascript'>
                        window.location.replace('course.php?courseID=" . $courseID . "&username=" . $author . "');
                    </script>";
                //echo "New record created successfully";
            } 
            else
                echo "Error: " . $sql . "<br>" . $conn->error;
        }
        else{
            echo "<script language='javascript'>
                    alert('留言不得有空欄位');
                    window.location.replace('course.php?courseID=" . $courseID . "&username=" . $author . "');
                </script>";
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