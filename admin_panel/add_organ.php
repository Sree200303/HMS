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
    $organ_name = $_POST['organ_name'];
    $quantity = $_POST['quantity'];  
    if (!empty($organ_name) && !empty($quantity)) { 
        $checkSql = "SELECT * FROM add_organ WHERE organ_name = ?";
        $checkStmt = $conn->prepare($checkSql);
        $checkStmt->bind_param("s", $organ_name);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            $updateSql = "UPDATE add_organ SET quantity = quantity + ? WHERE organ_name = ?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param("is", $quantity, $organ_name);
            if ($updateStmt->execute()) {
                echo "Organ availability updated successfully.<br>"; 
            } else {
                echo "Execution error: " . $updateStmt->error . "<br>"; 
            }
            $updateStmt->close();
        } else {
            $sql = "INSERT INTO add_organ(organ_name, quantity) VALUES (?, ?)";  
            $stmt = $conn->prepare($sql); 
            if ($stmt) { 
                $stmt->bind_param("si", $organ_name, $quantity);  
                if ($stmt->execute()) { 
                    echo "Organ availability added successfully.<br>"; 
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
