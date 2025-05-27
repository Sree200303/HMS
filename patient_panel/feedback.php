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
    $patient_name = $_POST['patient_name'];
    $service_quality = $_POST['service_quality'];
    $feedback_text = $_POST['feedback'];
    $sql = "INSERT INTO feedback (patient_name, service_quality, feedback) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sis", $patient_name, $service_quality, $feedback_text);  // "sis" -> string, int, string

        if ($stmt->execute()) {
            echo "<div style='color: green;'>Feedback submitted successfully!</div>";
        } else {
            echo "<div style='color: red;'>Error: " . $stmt->error . "</div>";
        }
        $stmt->close();
    } else {
        echo "<div style='color: red;'>Error preparing the statement: " . $conn->error . "</div>";
    }
}

// Fetch feedback
$sql = "SELECT patient_name, service_quality, feedback FROM feedback";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .form-container {
            width: 50%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container input, .form-container select, .form-container textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 4px;
        }
        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .feedback-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }
        .feedback-card {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            margin: 10px;
            width: 300px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .feedback-card:hover {
            transform: scale(1.05);
        }
        .feedback-card h3 {
            margin: 0;
            font-size: 1.2em;
            color: #333;
        }
        .feedback-card p {
            margin: 5px 0;
            color: #555;
        }
        .service-quality {
            font-weight: bold;
            color: #4CAF50;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Patient Feedback Form</h2>
    <form action="" method="post">
        <label for="patient_name">Patient Name:</label>
        <input type="text" name="patient_name" required>

        <label for="service_quality">Service Quality (1-10):</label>
        <input type="number" name="service_quality" min="1" max="10" required>

        <label for="feedback">Feedback:</label>
        <textarea name="feedback" rows="4" required></textarea>

        <input type="submit" value="Submit Feedback">
    </form>
</div>


</body>
</html>
