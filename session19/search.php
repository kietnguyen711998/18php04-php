<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
    <form method = "post">
        search: 
        <input type = "text" name = "username">
        <input type="submit" name = "search">
    </form>
    <a href = "list_user.php">List Database</a>
    <?php
        include "connectbd.php";
        $username = $_POST['username'];
        $sql = "SELECT * FROM users WHERE username like '$username%'";
        $query = mysqli_query($connect, $sql);
        if(isset($_POST["search"]))
        {   
            echo $sql;
            echo "<br>";
            while ($row = $query->fetch_assoc()) 
            {
                $username = $row['username'];
                $password = $row['password'];
                echo $row['username'].' - '.$row['password'];
                echo "<br>";
            }   
        }
    ?>
</body>
</html>