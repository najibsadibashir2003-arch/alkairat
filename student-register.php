<?php
include "config/database.php";

if(isset($_POST['register'])){

$admission_no = $_POST['admission_no'];
$fullname = $_POST['fullname'];
$gender = $_POST['gender'];
$class = $_POST['class'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$photo = $_FILES['photo']['name'];
$temp = $_FILES['photo']['tmp_name'];

move_uploaded_file($temp, "uploads/".$photo);

$sql = "INSERT INTO students(admission_no, fullname, gender, class, phone, email, password, photo)
VALUES('$admission_no','$fullname','$gender','$class','$phone','$email','$password','$photo')";

if(mysqli_query($conn,$sql)){
   // echo "<script>alert('Student Registered Successfully');</script>";
}else{
    die(mysqli_error($conn));
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Registration</title>

<style>
body{
    font-family:Arial,sans-serif;
    background:#f4f8ff;
}
.container{
    width:400px;
    margin:40px auto;
    background:#fff;
    padding:20px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,.2);
}
h2{
    text-align:center;
    color:#0056b3;
}
input,select{
    width:100%;
    padding:10px;
    margin:8px 0;
}
button{
    width:100%;
    padding:12px;
    background:#0056b3;
    color:white;
    border:none;
    cursor:pointer;
}
button:hover{
    background:#003d80;
}
</style>

</head>
<body>

<div class="container">

<h2>Student Registration</h2>

<form action="" method="POST" enctype="multipart/form-data">

<input type="text" name="admission_no" placeholder="Admission Number" required>

<input type="text" name="fullname" placeholder="Full Name" required>

<select name="gender">
<option>Male</option>
<option>Female</option>
</select>

<input type="text" name="class" placeholder="Class" required>

<input type="text" name="phone" placeholder="Phone Number">

<input type="email" name="email" placeholder="Email">

<input type="password" name="password" placeholder="Password">

<input type="file" name="photo" required>

<button type="submit" name="register">Register Student</button>

</form>

</div>

</body>
</html>