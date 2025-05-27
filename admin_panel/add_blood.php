<?php 
error_reporting(E_ALL); 
ini_set('display_errors', 1);  
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "hms";  
$conn = new mysqli($servername, $username, $password, $dbname);  
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $blood_group = $_POST['blood_group']; 
    $quantity = $_POST['quantity'];  
    if (!empty($blood_group) && !empty($quantity)) { 
        $checkSql = "SELECT * FROM add_blood WHERE blood_group = ?";
        $checkStmt = $conn->prepare($checkSql);
        $checkStmt->bind_param("s", $blood_group);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();
        if ($checkResult->num_rows > 0) {
            $updateSql = "UPDATE add_blood SET quantity = quantity + ? WHERE blood_group = ?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param("is", $quantity, $blood_group);
            if ($updateStmt->execute()) {
                echo "Blood availability updated successfully.<br>"; 
            } else {
                echo "Execution error: " . $updateStmt->error . "<br>"; 
            }
            $updateStmt->close();
        } else {
            $sql = "INSERT INTO add_blood(blood_group, quantity) VALUES (?, ?)";  
            $stmt = $conn->prepare($sql); 
            if ($stmt) { 
                $stmt->bind_param("si", $blood_group, $quantity);  
                if ($stmt->execute()) { 
                    echo "Blood availability added successfully.<br>"; 
                } else { 
                    echo "Execution error: " . $stmt->error . "<br>"; 
                } 
                $stmt->close(); 
            } else { 
                echo "SQL preparation error: " . $conn->error . "<br>"; 
            } 
        }
        $checkStmt->close();
    } else { 
        echo "Please fill out all fields.<br>"; 
    } 
} 

$conn->close(); 
?>
