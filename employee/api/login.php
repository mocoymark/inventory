<?php
include_once "dbconfig.php";

$errorEmpty = false;
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $errorEmpty = true;
        echo "Please fill the blank";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email";
    } else {
        $sql = "SELECT * FROM usertbl WHERE email='$email' AND password='$password' AND status='approved'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            echo "form-success";
        } else {
            echo "Your account is pending";
        }
    }
} else {
    echo "Invalid email";
}
?>
