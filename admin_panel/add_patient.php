<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hms";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO add_patient (patient_id, patient_name, patient_address, patient_contact) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
        die("SQL error: " . $conn->error);
    }
    $stmt->bind_param("isss", $_POST['patient_id'], $_POST['patient_name'], $_POST['patient_address'], $_POST['patient_contact']);
    if ($stmt->execute()) {
        echo "New patient added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
