<<?php
session_start();
include "../config/database.php";

if(isset($_POST['login'])){

    $admission_no = $_POST['admission_no'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM students
            WHERE admission_no='$admission_no'
            AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

        $student = mysqli_fetch_assoc($result);

        $_SESSION['student_id'] = $student['id'];
        $_SESSION['fullname'] = $student['fullname'];

        header("Location: dashboard.php");
        exit();

    }else{
        echo "<script>alert('Invalid Admission Number or Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Login | Alkairat Model Secondary School</title>

<link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>

<div class="login-container">

<div class="login-box">

<img src="../logo.png" alt="School Logo" class="login-logo">

<h2>Student Login</h2>
<p>Sign in to access your student portal.</p>

<form method="POST">

<input type="text" name="admission_no" placeholder="Admission Number" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="login" class="btn">Login</button>

</form>

<p><a href="../index.html">← Back to Home</a></p>

</div>

</div>

</body>
</html>