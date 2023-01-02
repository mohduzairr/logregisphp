<?php
session_start(); 
if(@$_POST['email'] == ""){
    echo "<script>
    alert('Email is Required');
    window.location.href='../register.php';
    </script>";
    return false;
}

if(@$_POST['password'] == ""){
    echo "<script>
    alert('password number is Required');
    window.location.href='../register.php';
    </script>";
    return false;
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "food";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$email = $_POST['email'];
$password = $_POST['password'];

$cryptedpassword = password_hash($password, PASSWORD_DEFAULT); 
$dcryptedpassword = password_verify($password, $cryptedpassword);

$sql = "SELECT * FROM users WHERE email='$email' AND password='$dcryptedpassword'";

$result = mysqli_query($conn, $sql);
if (isset($result)) {
    echo "<script>
    alert('login successfuly');
    window.location.href='../login.php';
    </script>";
}else{
    echo "<script>
    alert('your credential does not match');
    window.location.href='../login.php';
    </script>";
}
?>