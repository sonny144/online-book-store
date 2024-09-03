<?php
include "db_conn.php";

$errors = [];

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Hash the password (please use password_hash() for better security)
    $cpassword = md5($_POST['cpassword']);

    // Check if user already exists
    $select = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $select->bindParam(':email', $email);
    $select->execute();

    if($select->rowCount() > 0){
        $errors[] = 'User already exists!';
    } else {
        if($password != $cpassword){
            $errors[] = 'Passwords do not match!';
        } else {
            $insert = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
            $insert->bindParam(':name', $name);
            $insert->bindParam(':email', $email);
            $insert->bindParam(':password', $password);

            if($insert->execute()){
                header('location: user_login.php');
                exit;
            } else {
                $errors[] = 'Registration failed! Please try again later.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background:url(photo.jpg); background-repeat:no-repeat;background-size:100% 100%">
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="p-5 rounded shadow" style="max-width: 30rem; width: 100%; color:white;">
        <form action="" method="post">
            <h1 class="text-center display-4 pb-5">REGISTER</h1>
            <?php
        if(!empty($errors)){
            foreach($errors as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            }
        }
        ?>
            <div class="mb-3">
                <input type="text" class="form-control" name="name" required placeholder="Enter your name">
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" name="email" required placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" required placeholder="Enter your password">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="cpassword" required placeholder="Confirm your password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Register Now</button>
            <p class="mt-3">Already have an account? <a href="user_login.php">Login Now</a></p>
        </form>
    </div>
</div>
</body>
</html>
