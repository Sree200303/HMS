<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require __DIR__ . '/../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['appointment_id'], $_POST['status'], $_POST['patient_email'], $_POST['meet_link'])) {
        $appointmentId = $_POST['appointment_id']; 
        $status = $_POST['status']; 
        $patientEmail = $_POST['patient_email']; 
        $meetLink = $_POST['meet_link']; 
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'priyadharsinit36@gmail.com';  
            $mail->Password = 'desv zdbz kksb uarf';           
            $mail->SMTPSecure = 'tls';                   
            $mail->Port = 587;            
            $mail->setFrom('priyadharsinit36@gmail.com', 'Your Name'); 
            $mail->addAddress($patientEmail); 
            $mail->isHTML(true); 
            $mail->Subject = 'Appointment Status Update';
            $mail->Body = "Dear Patient,<br><br>Your appointment has been <strong>{$status}</strong>.<br><br>" .
                          "Here is your Google Meet link for the virtual consultation: <a href='{$meetLink}'>Join Meeting</a><br><br>" .
                          "Thank you for choosing us!<br>Best Regards,<br>MediSync Hub Team";
            $mail->send();
            $message = "Email notification sent to the patient successfully.";
        } catch (Exception $e) {
            $message = "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        $message = "Directing.....please wait a moment";
    }
}
if (!empty($message)) {
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Update Form</title>
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f4f4f4; font-family: Arial, sans-serif;">

    <form action="" method="POST" style="background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); width: 300px;">
        <h2 style="text-align: center; color: #333;">Update Appointment</h2>

        <label for="appointment_id" style="display: block; margin-bottom: 8px; color: #333;">Appointment ID:</label>
        <input type="text" id="appointment_id" name="appointment_id" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">

        <label for="status" style="display: block; margin-bottom: 8px; color: #333;">Status:</label>
        <input type="text" id="status" name="status" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">

        <label for="patient_email" style="display: block; margin-bottom: 8px; color: #333;">Patient Email:</label>
        <input type="email" id="patient_email" name="patient_email" style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">

        <label for="meet_link" style="display: block; margin-bottom: 8px; color: #333;">Google Meet Link:</label>
        <input type="url" id="meet_link" name="meet_link" placeholder="https://meet.google.com/..." style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">

        <button type="submit" style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">Submit</button>
    </form>

</body>
</html>
