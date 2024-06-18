<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validate passwords match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match');</script>";
    } else {
        // Database connection parameters
        $host = 'localhost';
        $user = 'root';
        $pass = ''; // Define the variable for the database password
        $dbname = 'rishidatabase';

        // Create connection
        $conn = mysqli_connect($host, $user, $pass, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement to insert data using prepared statements
        $sql = "INSERT INTO users (username, fullname, email, password) VALUES (?, ?, ?, ?)";

        // Prepare and bind parameters
        $stmt = $conn->close($sql);
        $stmt->bind_param("ssss", $username, $fullname, $email, $password);

        // Execute SQL statement
        if ($stmt->execute()) {
            $message = "New record created successfully";
        } else {
            $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();

        echo $message; // Output the message
    }
}
?>
