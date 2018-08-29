<?php
// UPLOAD.PHP
$img = $_POST ["img" ];
$time = time();

include "connect.php";

		mysqli_query($conn, "INSERT INTO coor(coor, time)VALUES('$img', '$time')");
//}


?>
