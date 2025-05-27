<?php
session_start();
$patient_email = $_SESSION['patient_email'];
$conn = new mysqli("localhost", "root", "", "hms");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM virtualcon WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $patient_email);
$stmt->execute();
$result = $stmt->get_result();
echo "<h3>Your Appointments:</h3>";
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Doctor Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['doctor_name'] . "</td>
                <td>" . $row['date'] . "</td>
                <td>" . $row['time'] . "</td>
                <td>" . $row['status'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No appointments found.";
}
$stmt->close();
$conn->close();
?>
