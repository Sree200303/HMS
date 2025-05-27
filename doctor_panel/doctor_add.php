<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Panel</title>
    <link rel="stylesheet" href="doctor.css">
</head>
<body>
    <header>
        <h1>Doctor Panel</h1>
    </header>
    <main>
        <p>Welcome to the Doctor Panel. Please choose an option below:</p>
        <div class="button-container">
            <button onclick="location.href='doctor_list.php'" class="button">Doctor Profiles</button> 
            <button onclick="location.href='appointments.php'" class="button">Virtual appointment available</button>
            <button onclick="location.href='appointment.php'" class="button">Inperson appointment available</button>
            <button onclick="location.href='patientfeedback.php'" class="button">Feedback by patient</button>

        </div>
    </main>
</body>
</html>
