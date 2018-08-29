<?php

include "connect.php";



$sql = "DELETE FROM coor WHERE id>0;";

if (mysqli_query($conn, $sql)) {
    echo "Cleared";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


