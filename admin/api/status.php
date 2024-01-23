<?php
include_once 'dbconfig.php';

$sql = "SELECT * FROM `usertbl`";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result) == 1){
 echo "Fetch success";
}

?>