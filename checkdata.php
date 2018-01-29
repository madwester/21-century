
<?php

include ("wp-content/themes/customizr-child/database.php");
session_start();

$query="SELECT * from so_school";
$result= $connection->query($query);


?>

<!DOCTYPE html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/> 
    <title>data</title>
</head>

<html>
   
    <body>
            <?php while($userdata= $result->fetch_assoc()) 
            {
                    echo $userdata["school_name"];
                }
            ?>
        </div>
    </body>
</html>