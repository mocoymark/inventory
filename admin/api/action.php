<?php
include_once 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['id'];
    $action = $_POST['action'];

    // Update the user status based on the action
    $status = ($action === 'approve') ? 'approved' : 'rejected';
    $sql = "UPDATE `usertbl` SET `status` = ? WHERE `id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $status, $userId);
    $stmt->execute();
    $stmt->close();
}
?>
