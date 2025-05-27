<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "hms"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_name = $_POST['name'];
    $admin_password = $_POST['password'];
    $sql = "SELECT * FROM `admin_login` WHERE admin_name = ? AND admin_password = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("MySQL error: " . $conn->error);
    }
    $stmt->bind_param("ss", $admin_name, $admin_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: admin_add.html");
        exit();
    } else {
        echo "<div class='error'>Invalid credentials</div>";
    }
    $stmt->close();
}
$conn->close();
?>
