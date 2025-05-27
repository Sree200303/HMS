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
} else {
    
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $organ_name = $_POST['organ_name'];
    $quantity = $_POST['quantity'];
    if (!empty($organ_name) && !empty($quantity)) {
        $sql = "INSERT INTO add_organ (organ_name, quantity) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("si", $organ_name, $quantity);  

            if ($stmt->execute()) {
                echo "Organ availability added successfully.<br>";
            } else {
                echo "Error executing query: " . $stmt->error . "<br>";
            }
            $stmt->close();
        } else {
            echo "SQL preparation error: " . $conn->error . "<br>";
        }
    } else {
        echo "Please fill in all fields.<br>";
    }
}
$sql = "SELECT organ_name, quantity FROM add_organ";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organ Availability</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
            animation: fadeIn 1s ease-in-out;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 2.5rem;
            font-weight: bold;
            animation: fadeIn 1.5s ease;
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            animation: fadeIn 2s ease;
        }
        .card {
            background: linear-gradient(135deg, #6bbf6b, #a8e6a1);
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            width: 220px;
            height: 150px; 
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            transition: transform 0.3s ease;
            text-align: center; 
        }
        .card:hover {
            transform: translateY(-5px); 
        }
        h3 {
            margin: 10px 0;
            font-size: 1.5rem;
        }
        p {
            margin: 0;
        }

        /* Animations */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
    </style>
</head>
<body>

<?php
if ($result->num_rows > 0) {
    echo "<h2>Organ Availability</h2>";
    echo "<div class='card-container'>";

    while($row = $result->fetch_assoc()) {
        echo "<div class='card'>
                <h3>" . $row["organ_name"] . "</h3>
                <p>Quantity: " . $row["quantity"] . "</p>
              </div>";
    }

    echo "</div>";
} else {
    echo "<p>No organ data available.</p>";
}

$conn->close();
?>

</body>
</html>
