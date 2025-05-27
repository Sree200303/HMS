<?php
require __DIR__ . '/../vendor/autoload.php';
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $doctor_name = trim($_POST['doctor_name']);
    $status = 'pending';
    if (!empty($name) && !empty($email) && !empty($date) && !empty($time) && !empty($doctor_name)) {
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "hms"; 
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die('Connection Error: ' . $conn->connect_error);
        } else {
            $doctor_email = '';
            $query = "SELECT email FROM doctors WHERE name = ?";
            $stmt = $conn->prepare($query);
            if ($stmt) {
                $stmt->bind_param("s", $doctor_name);
                $stmt->execute();
                $stmt->bind_result($doctor_email);  
                $stmt->fetch();  
                $stmt->close();
            }
            $INSERT = "INSERT INTO virtualcon (name, email, date, time, doctor_name, status) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($INSERT);
            if ($stmt === false) {
                die('Prepare Error: ' . $conn->error);
            }
            $stmt->bind_param("ssssss", $name, $email, $date, $time, $doctor_name, $status);
            if ($stmt->execute()) {
                $message = "Your virtual consultation request has been successfully submitted and you are notified through the email you have provided!";
            } else {
                $message = "Error in submitting the request. Please try again.";
            }
            $stmt->close();
            $conn->close();
        }
    } else {
        $message = "Please fill out all required fields!";
    }
    if (!empty($message)) {
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
?>
