
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="main.js"></script>
</head>
<body>

        <?php
        include("mysql_connect.inc.php");

        $sql = "SELECT * FROM `學生`";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
                echo "id: " . $row["學號"]. " - Name: " . $row["姓名"]."<br>";
        }
        } else {
                echo "0 results<br>";
        }
        $conn->close();


        ?>    
        <input type="text">123</input>
</body>
</html>
