
<?php
$img = $_POST ["img" ];

//echo "lions";
//echo time();
include "connect.php";

$img = $_POST ["img" ];
$img2 = $img - 0;
$result = mysqli_query($conn,"SELECT * FROM coor where id>$img2");
$a = 1;
while($row = mysqli_fetch_array($result))
  {
$coor = "$row[coor]";
$id = "$row[id]";
//echo "<i>/*alert($id);*/ctx.beginPath();$coor</i>";
echo "<script>/*alert($id);*/ctx.beginPath();$coor</script>";
$a++;
  }
////////get maximum /////
$result2 = mysqli_query($conn, "SELECT * FROM coor order by id desc limit 1");  
$row = mysqli_fetch_array($result2);
$maxcoor = "$row[id]";
echo "<script>lastid = $maxcoor;
document.getElementById('maxnum').value = lastid;
</script>

";
  
  
  
  
mysqli_close($conn);

?>


