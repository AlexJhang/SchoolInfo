<?php
    $msid = $_GET['msid'];
    $mtid = $_GET['mtid'];
    /*
    echo "msid: ".$msid."<br>";
    echo "mtid: ".$mtid."<br>";
    */
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mail Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel=stylesheet type="text/css" href="mail_css.css">
</head>
<body>
    <h2>教授信件編輯器</h2>
    <div id="mform_div"><form name="mform" method="post" action="mail_finish.php">
        <div class="form-group">
            <label>寄件人(老師編號)：</label> <?php echo $mtid?>
            <input type="hidden" value="<?php echo $mtid?>" name="mtid" >
        </div>
        <div class="form-group">
            <label for="form_reciver">收件人：</label>
            <select id="form_reciver"  name="reciver">
                <?php 
                    include("../../../sql_connect/mysql_connect.inc.php");

                    $result = $conn->query("SELECT * FROM `學生`");
                    $conn->close();
                    $row = @mysqli_fetch_row($result);
                    while($row){
                        $csid = $row[0];
                        $csname = $row[1];
                        echo "<option value=".$csid.">".$csid.'-'.$csname."</option>";
                        if($msid === $csid){
                            echo '<option value='.$csid.' selected="selected">'.$csid.'-'.$csname.'</option>';
                        }
                        $row = @mysqli_fetch_row($result);
                    }             
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="form_name">標題</label>
            <input type="text" class="form-control" id="form_name"  name="title" >
        </div>
        <div class="form-group" >
            <label for="form_content">內容</label>
            <textarea id="form_content"  class="form-control" name="content"></textarea>
            
        </div>

        <input type="submit" name="button1" value="送出" />


    </form></div>

</body>
</html>
