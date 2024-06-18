<?php
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword']; // Corrected variable name

    // Database connection
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'rishidatabase';

    $conn = new mysqli($host, $user, $pass, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement with placeholders
    $sql = "INSERT INTO signup (username, fullname, email, password, confirmpassword) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters to prepared statement
    $stmt->bind_param("sssss", $username, $fullname, $email, $password, $confirmpassword);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Sign up successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Signup Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4; /* Background color for the entire page */
            background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTsgFGgXKW4lj_lkHynOV5iYCqf_nKdJuiXNQeARbubaQ&s'); /* Background image URL */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            padding: 20px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="submit"] {
            width: calc(100% - 22px); /* Adjusting width for input fields */
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"].button,
        a.button {
            width: 100%; /* Adjusted width for buttons */
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4caf50; /* Same background color for both buttons */
            color: #fff; /* Same text color for both buttons */
            text-align: center;
            display: inline-block;
            text-decoration: none;
        }
        input[type="submit"].button:hover,
        a.button:hover {
            background-color: #45a049; /* Hover background color */
        }
        .error-message {
            color: red;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="#" method="post" onsubmit="return validatePassword()">
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
            <div class="error-message" id="password-error"></div>
            <input type="submit" value="Sign Up" class="button">
            <a href="eventmanage.php" class="button">Login</a>
        </form>
    </div>

    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            var errorDiv = document.getElementById("password-error");
            if (password !== confirmPassword) {
                errorDiv.textContent = "Passwords do not match";
                return false;
            }
            return true;
        }
    </script>
</body>
</html>