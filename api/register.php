<?php
include ("connect.php");
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$Cpassword = $_POST['Cpassword'];
$address = $_POST['address'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role = $_POST['role'];

if ($password == $Cpassword) {
    move_uploaded_file($tmp_name,'../uploads/$image');
    $insert = mysqli_query($connect, "INSERT into user(name,mobile,address,password,photo,role,status,votes) VALUES ('$name','$mobile','$address','$password','$image','$role',0,0)");
    if ($insert) {
        echo '
        <script>
        alert("registration succefull !");
        window.location = "../";
        </script>
        ';
    }
    else {
        echo '
        <script>
        alert("some error occured !");
        window.location = "../routes/register.html";
        </script>
        ';
    }
} else {
    echo '
    <script>
    alert("Password and Confirm password does not match!");
    window.location = "../routes/register.html";
    </script>
    ';
}
?>