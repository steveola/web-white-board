<?php
// UPLOAD.PHP
$img = $_POST ["img" ];
$time = time();

include "connect.php";

		mysqli_query($conn,"INSERT INTO content(image, time)VALUES('$img', '$time')");
//}


?>
