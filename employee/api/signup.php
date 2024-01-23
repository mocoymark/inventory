<?php 
include_once "dbconfig.php";
$errorEmpty = false;
$emailError = false;

if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $phone = $_POST['number']; 

    if (empty($firstname) || empty($lastname)) {
        echo "<span class='form-message'>Please fill the empty fields</span>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = true;
        echo '<span class="form-message">Invalid email format! Please check again.</span>';
    } else {
        $sql = "INSERT INTO `usertbl`(`firstname`, `lastname`, `email`, `password`, `number`,`status`) VALUES ('$firstname','$lastname','$email','$password','$phone','penging')";
        if($conn->query($sql) === true){
            echo '<span class="form-message form-success">Signup Successful.</span>';
        } else {
            echo "<span class='form-message'>Error: " . $sql . "<br>" . $conn->error . "</span>";
        }
    }
    $conn->close();
}else{
  echo '<span class="form-message form-success">Please filll the fields</span>';
}
?>
