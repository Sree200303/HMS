<?php
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $reg = $_POST['reg'];              
    $dname = trim($_POST['doctor_name']);    
    $date = $_POST['date'];            
    $time = $_POST['time'];            
    if (!empty($name) && !empty($reg) && !empty($dname) && !empty($date) && !empty($time)) {
        
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "hms"; 
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die('Connection Error: ' . $conn->connect_error);
        } else {
            $INSERT = "INSERT INTO inperson (name, reg, doctor_name, date, time) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($INSERT);
            if ($stmt === false) {
                die('Prepare Error: ' . $conn->error); 
            }
            $stmt->bind_param("sssss", $name, $reg, $dname, $date, $time);

            if ($stmt->execute()) {
                $message = "Your in-person consultation request has been successfully submitted!";
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
