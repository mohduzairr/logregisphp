<?php
 if(@$_POST['name'] == ""){
    echo "<script>
    alert('Your name is Required');
    window.location.href='../register.php';
    </script>";
    return false;
}

if(@$_POST['email'] == ""){
    echo "<script>
    alert('Email is Required');
    window.location.href='../register.php';
    </script>";
    return false;
}

if(@$_POST['phone'] == ""){
    echo "<script>
    alert('Phone number is Required');
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


$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$encryptPassword= password_hash($password,PASSWORD_DEFAULT);

$sql=  "INSERT INTO `user` ( `name`, `email`, `phone`,`password`) VALUES ( '$name', '$email', '$phone','$encryptPassword')";
//$sql= "INSERT INTO user ( name, email, phone) VALUES ('$name', '$email', '$phone')";
// $sql = "INSERT INTO user  VALUES ('$name','$email','$phone')";

if(mysqli_query($conn, $sql)){
    echo "<script>
    alert('successfuly registered');
    window.location.href='../login.php';
    </script>";
} else{
    echo "<script>
    alert('something wrong');
    window.location.href='../register.php';
    </script>";
       
}
 
// Close connection
mysqli_close($conn);

?>