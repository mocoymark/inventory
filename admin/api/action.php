<?php
include_once 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['id'];
    $action = $_POST['action'];

    // $status = ($action === 'approve') ? 'approved' : 'rejected';
     
    if ($action === 'approve') {
    $status = 'approved';
     }elseif($action == 'delete'){
       $sql = "DELETE FROM `usertbl` WHERE `id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $stmt->close();
     } else {
    $status = 'rejected';
      }
    $conn->query("UPDATE `usertbl` SET `status` = '$status' WHERE `id` = $userId");
}
?>