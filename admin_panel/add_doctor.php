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
    $name = $_POST['name'];
    $specialist = $_POST['specialist'];
    $experience = $_POST['experience'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $upload_dir = __DIR__ . "/" . $target_file; 
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check !== false) {
        if (file_exists($upload_dir)) {
            echo "Sorry, file already exists.";
        }
        elseif ($_FILES["photo"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
        }
        elseif (!in_array($check['mime'], ['image/jpeg', 'image/png', 'image/gif'])) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        } else {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $upload_dir)) {
                $sql = "INSERT INTO add_doctor (name, specialist, experience, photo) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                
                if ($stmt === false) {
                    die("Error preparing SQL statement: " . $conn->error);
                }
                $stmt->bind_param("ssis", $name, $specialist, $experience, $target_file);

                if ($stmt->execute()) {
                    echo "<h2>Doctor added successfully</h2>";
                } else {
                    echo "Error executing SQL statement: " . $stmt->error; 
                }
                $stmt->close();
            } else {
                echo "Sorry, there was an error uploading the photo.";
            }
        }
    } else {
        echo "File is not an image.";
    }
}
$res = $conn->query("SELECT name, specialist, experience, photo FROM add_doctor");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .form-container, .doctor-container {
            width: 50%;
            margin: auto;
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .form-container input[type="text"], .form-container input[type="number"], .form-container input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 4px;
        }
        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .doctor-container img {
            max-width: 150px;
            max-height: 150px;
            border-radius: 8px;
            margin-right: 20px;
        }
        .doctor-container .doctor-info {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Add Doctor</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="specialist">Specialist:</label>
        <input type="text" name="specialist" required>

        <label for="experience">Experience (years):</label>
        <input type="number" name="experience" required>

        <label for="photo">Photo:</label>
        <input type="file" name="photo" accept="image/*" required>

        <input type="submit" value="Add Doctor">
    </form>
</div>

<div class="doctor-container">
    <h2>Doctors</h2>
    <?php
    if ($res && $res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            echo "<div class='doctor-info'>";
            echo "<img src='" . htmlspecialchars($row['photo']) . "' alt='Doctor Photo'>";
            echo "<div>";
            echo "<p><strong>Name:</strong> " . htmlspecialchars($row['name']) . "</p>";
            echo "<p><strong>Specialist:</strong> " . htmlspecialchars($row['specialist']) . "</p>";
            echo "<p><strong>Experience:</strong> " . htmlspecialchars($row['experience']) . " years</p>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>No doctors found.</p>";
    }
    ?>
</div>

</body>
</html>

<?php
$conn->close();
?>
