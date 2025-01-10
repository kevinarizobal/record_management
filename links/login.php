<?php
// Start the session
session_start();

// Database connection configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'file_management';

// Create a new MySQLi connection
$conn = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Login processing
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);  // MD5 hashing for the password

    // Query to check credentials
    $sql = "SELECT `username`, `password`, `status` FROM `account` WHERE `username` = ? AND `password` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found, start session and store user data
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user;
        $_SESSION['status'] = $result->fetch_assoc()['status']; // Storing user status

        // Redirect to admin page or dashboard
        header("Location: ../dashboard.php");
        exit();
    } else {
        // Invalid credentials
        echo "<script>alert('Invalid username or password');</script>";
        header('location: ../index.php');
    }

    $stmt->close();
    $conn->close();
}
?>
