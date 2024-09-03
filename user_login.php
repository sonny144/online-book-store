<?php
include "db_conn.php";


$errors = [];

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Hash the password (please use password_hash() for better security)

    $select = $conn->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    $select->bindParam(':email', $email);
    $select->bindParam(':password', $password);
    $select->execute();

    if ($select->rowCount() > 0) {
        // User found, redirect to the index page or any other page after login
        header('location: user_page.php');
        exit;
    } else {
        $errors[] = 'Invalid email or password';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
          <style>
        .register-link {
            color: white; /* Set the color of the Register Now link to white */
            margin-right: 20px; /* Add space between Register Now and Store */
        }
    </style>
</head>
<body style="background:url(photo.jpg); background-repeat:no-repeat;background-size:100% 100%">
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="p-5 rounded shadow" style="max-width: 30rem; width: 100%; color:white;">
        <form action="" method="post">
            <h1 class="text-center display-4 pb-5">LOGIN</h1>
            <?php
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                }
            }
            ?>
            <div class="mb-3">
                <input type="email" class="form-control" name="email" required placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" required placeholder="Enter your password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Login</button>
            <p class="mt-3">Don't have an account? <a class="register-link" href="register.php">Register Now</a> <a href="index.php">Store</a></p>

        </form>
    </div>
</div>
</body>
</html>
