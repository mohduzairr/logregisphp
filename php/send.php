<?php
 if(@$_POST['name'] == ""){
    echo "<script>
    alert('Your name is Required');
    window.location.href='../index.php';
    </script>";
    return false;
}

if(@$_POST['email'] == ""){
    echo "<script>
    alert('Email is Required');
    window.location.href='../index.php';
    </script>";
    return false;
}

if(@$_POST['phone'] == ""){
    echo "<script>
    alert('Phone number is Required');
    window.location.href='../index.php';
    </script>";
    return false;
}

$name = addslashes(strip_tags($_POST['name'])); 
echo $name;
?>