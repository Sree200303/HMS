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
    $blood_group = $_POST['blood_group'];
    $quantity = $_POST['quantity'];
    $sql = "INSERT INTO add_blood (blood_group, quantity) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("si", $blood_group, $quantity); 
        if ($stmt->execute()) {
            echo "<p>Blood availability is added successfully.</p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }
        $stmt->close();
    } else {
        echo "<p>SQL error: " . $conn->error . "</p>";
    }
}
$sql = "SELECT blood_group, quantity FROM add_blood";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Availability</title>
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
            background: linear-gradient(135deg, #ff6b6b, #ff9a9a);
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            width: 220px;
            height: 150px; /* Adjust height based on content */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            transition: transform 0.3s ease;
            text-align: center; /* Center text in the card */
        }
        .card:hover {
            transform: translateY(-5px); /* Lift effect on hover */
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
    echo "<h2>Blood Availability</h2>";
    echo "<div class='card-container'>";

    while($row = $result->fetch_assoc()) {
        echo "<div class='card'>
                <h3>" . $row["blood_group"] . "</h3>
                <p>Quantity: " . $row["quantity"] . " Units</p>
              </div>";
    }

    echo "</div>";
} else {
    echo "<p>No blood data available.</p>";
}

$conn->close();
?>

</body>
</html>
