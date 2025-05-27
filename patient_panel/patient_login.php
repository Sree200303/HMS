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
    $patient_id= $_POST['id'];
    $patient_name = $_POST['name'];
    $patient_password = $_POST['password'];
    $sql = "SELECT * FROM `patient_login` WHERE patient_id=? AND patient_name=? AND patient_password=?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("MySQL error: " . $conn->error); 
    }
    $stmt->bind_param("sss",$patient_id, $patient_name, $patient_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: patient.html");
        exit(); 
    } else {
        echo "<div class='error'>Invalid credentials</div>";
    }

    $stmt->close();
}

$conn->close();
?>
