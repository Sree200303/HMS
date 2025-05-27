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
    $doctor_id = $_POST['id'];
    $doctor_password = $_POST['password'];
    $sql = "SELECT * FROM `doctor_login` WHERE doctor_id = ? AND doctor_password = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("MySQL error: " . $conn->error); 
    }
    $stmt->bind_param("ss", $doctor_id, $doctor_password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        header("Location: doctor_add.php");
        exit(); 
    } else {
        echo "<div class='error'>Invalid credentials</div>";
    }
    $stmt->close();
}

$conn->close();
?>
