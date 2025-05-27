
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediSync Hub</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #e0f7fa, #e1bee7);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #6a1b9a;
            color: #fff;
        }
        .header h1 {
            font-size: 2em;
            font-weight: bold;
            display: flex;
            align-items: center;
        }
        .header h1 i {
            color: #ff80ab;
            margin-right: 10px;
        }
        .navbar a {
            color: #fff;
            padding: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }
        .navbar a:hover {
            color: #ffcc80;
        }
        .profile-section {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }
        .profile-dropdown {
            display: none;
            position: absolute;
            right: 0;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.2);
            border-radius: 6px;
        }
        .profile-dropdown a {
            display: block;
            padding: 10px;
            color: #6a1b9a;
            text-decoration: none;
        }
        .profile-section:hover .profile-dropdown {
            display: block;
        }
        .home {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: #6a1b9a;
            background: url('https://www.example.com/your-gif.gif') no-repeat center;
            background-size: cover;
        }
        .home .content h3 {
            font-size: 2.5em;
            color:#142d4c;
            animation: fadeIn 2s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .about {
            padding: 60px 20px;
            background-color: #f3e5f5;
            text-align: center;
        }
        .about h2 {
            font-size: 2.5em;
            color: #6a1b9a;
            margin-bottom: 40px;
        }
        .about .row {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: auto;
        }
        .about .content p {
            font-family:Century Schoolbook;
            font-size: 1.5em;
            line-height: 1.6;
            color: blue;
            max-width: 1000px;
            margin: 100px auto;
        }
        .services {
            padding: 60px 20px;
            background: #ffebee;
            text-align: center;
        }
        .services .heading {
            font-size: 2.5em;
            color: #b71c1c;
            margin-bottom: 10px;
        }
        .services .box-container {
            display: flex;
            justify-content: space-evenly;
            flex-wrap: wrap;
        }
        .services .box {
            width: 300px;
            padding: 100px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            margin: 10px;
        }
        .services .box:hover {
            transform: translateY(-10px);
            transition: all 0.3s;
        }
        .services .box i {
            font-size: 3em;
            color: #ff6f61;
            margin-bottom: 6px;
        }

        <style>
    .doctors {
        padding: 60px 20px;
        background: #e0f7fa;
    }

    .doctor-container {
        display: flex; 
        flex-wrap: wrap; 
        justify-content: center; 
    }
    .doctor-card {
        flex: 0 1 300px; 
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        background: #fff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        margin: 15px;
        transition: transform 0.3s;
    }

    .doctor-card:hover {
        transform: scale(1.05);
    }

    .doctor-card img {
        border-radius: 50%;
        margin-bottom: 10px;
    }

    .doctor-card h2 {
        font-size: 1.2em;
        color: #6a1b9a;
        margin-bottom: 8px;
    }

    .doctor-card p {
        color: white;
        font-size: 1em;
    }
        .footer {
            background-color: #6a1b9a;
            color:Black;
            padding: 40px 20px;
            display: flex;
            justify-content: space-around;
        }
        .footer a {
            color: darkpink;
            text-decoration: none;
            margin: 8px 0;
            display: block;
        }
        .footer .box h3 {
            text-align:center;
            color: green;
        }
        .footer .box i {
            margin-right: 8px;
        }
        @media (max-width: 768px) {
            .about .row, .services .box-container {
                flex-direction: column;
            }
            .doctor-card {
                width: 100%;
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>
<header class="header">
    <h1><i class="fas fa-heartbeat"></i> MediSync Hub</h1>
    <nav class="navbar">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#services">Services</a>
        <a href="#doctors">Doctors & Blogs</a>
       
        <div class="profile-section">
            <a href="#" class="profile-icon"><i class="fas fa-user"></i></a>
            <div class="profile-dropdown">
                <a href="admin_panel/admin.html">Admin</a>
                <a href="doctor_panel/doctor.html">Doctor</a>
                <a href="patient_panel/patient_main.html">Patient</a>
            </div>
        </div>
    </nav>
</header>
<section class="home" id="home">
<div class="content">
        <h3>Welcome...!!!!</h3>
        <h3>We are united and there for you</h3>
    </div>

    <div class="image">
    <img src="image/image.png" alt="">
    </div>
    
</section>



<section class="about" id="about">
    <h2>About Us</h2>
    <div class="row">
        <div class="image">
            <img src="image/about-img.svg" alt="About Us" width="300">
        </div>
        <div class="content">
            <p>Welcome to MediSync Hub! an all-in-one platform designed to streamline healthcare processes and improve patient care. We are committed to leveraging technology to simplify the administrative and operational challenges faced by hospitals, clinics, and medical professionals.</p>
            <a href="#" class="btn">Learn More</a>
        </div>
    </div>
</section>

<section class="services" id="services">
    <h2 class="heading">Our Services</h2>
    <div class="box-container">
        <div class="box">
            <i class="fas fa-notes-medical"></i>
            <h3>Free checkups</h3>
            <p>Get a Free Health Check-Up Today!</p>
            <a href="#" class="btn">Learn More</a>
        </div>
        <br>
        <div class="box">
            <i class="fas fa-user-md"></i>
            <h3>Expert doctors</h3>
            <p>Excellence in Consultation
                <br>"Expert Doctors at Your Service!"</p>
            <a href="#" class="btn">learn more <span class="fas fa-chevron-right"></span></a>
        </div>
        <br>
        <div class="box">
            <i class="fas fa-pills"></i>
            <h3>Medicines</h3>
            <p>Trusted Medicines for Patient
           <br> "Restoring Health with Every Dose!"</p>
            <a href="#" class="btn">learn more <span class="fas fa-chevron-right"></span></a>
        </div>
        <br>
        <div class="box">
            <i class="fas fa-procedures"></i>
            <h3>Bed facility</h3>
            <p>Comfort in Every Rest
            <br>   "Where Rest Meets Recovery: Experience Our Bed Facilities!"</p>
            <a href="#" class="btn">learn more <span class="fas fa-chevron-right"></span></a>
        </div>
        <br>
        <div class="box">
            <i class="fas fa-heartbeat"></i>
            <h3>Total care</h3>
            <p>A New Standard in Healthcare
               "Experience Total Care for Every Patient!"</p>
            <a href="#" class="btn">learn more <span class="fas fa-chevron-right"></span></a>
        </div>
    </div>
</section>


<section class="doctors" id="doctors">
<div class="doctor-container">
    <h2>Our Doctors</h2>
   
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hms";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $res = $conn->query("SELECT name, specialist, experience FROM add_doctor");

    if ($res && $res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            echo "<div class='doctor-info'>";
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

    $conn->close();
    ?>
</div>

<style>
    .doctor-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        font-family: Arial, sans-serif;
    }
    .doctor-info {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        width: 80%;
        max-width: 600px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .doctor-info div {
        display: flex;
        flex-direction: column;
    }
</style>
<section class="services" id="services">
    <h2 class="heading">Our blogs</h2>
    <div class="box-container">
    <div class="image">
                <img src="image/blog-1.jpg" alt="Blog 1">
            </div>
            <div class="content">
                <div class="icon">
                    <a href="#"> <i class="fas fa-calendar"></i> 03 June 2024 </a>
                    <a href="#"> <i class="fas fa-user"></i> by MediSync Hub</a>
                </div>
                <h3>"Streamlining Patient Care with HMS".</h3>
                <p>
                Explore how HMS simplifies patient management.</p>
                <a href="#" class="btn">Learn More <span class="fas fa-chevron-right"></span></a>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="box-container">
    <div class="image">
                <img src="image/blog-2.jpg" alt="Blog 2">
            </div>
            <div class="content">
                <div class="icon">
                    <a href="#"> <i class="fas fa-calendar"></i>11 June 2024 </a>
                    <a href="#"> <i class="fas fa-user"></i> by MediSync Hub</a>
                </div>
                <h3>"Benefits of Digital Health Records"</h3>
                <p>Discussing the advantage of digital records.</p>
                <a href="#" class="btn">Learn More <span class="fas fa-chevron-right"></span></a>
            </div>
        </div>
        <br>
        <br>
        <hr>
        <div class="box-container">
    <div class="image">
                <img src="image/blog-3.jpg" alt="Blog 3">
            </div>
            <div class="content">
                <div class="icon">
                    <a href="#"> <i class="fas fa-calendar"></i>05 July 2024 </a>
                    <a href="#"> <i class="fas fa-user"></i> by MediSync Hub</a>
                </div>
                <h3>"Telemedicine: The Future of Healthcare"</h3>
                <p>Discuss the impact of telemedicine in HMS.</p>
                <a href="#" class="btn">Learn More <span class="fas fa-chevron-right"></span></a>
            </div>
        </div>
        <br>
        <br>
        <hr>
<section class="footer" >
    <div class="box-container">
        <div class="box">
            <h3>Appointment info</h3>
            <a href="#"> <i class="fas fa-phone"></i> 9102134567</a>
            <a href="#"> <i class="fas fa-phone"></i> 9102134569 </a>
            <a href="#"> <i class="fas fa-envelope"></i> medisynchub@gmail.com</a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> Nagercoil,  </a>
        </div>
        <div class="box">
            <h3>Stay connected with us on.....</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i> Facebook </a>
            <a href="#"> <i class="fab fa-twitter"></i> Twitter </a>
            <a href="#"> <i class="fab fa-instagram"></i> Instagram </a>
        </div>
    </div>
</section>
<div class="credit"> Created by <span>medisync hub</span> | all rights reserved  2024</div>
<script src="js/script.js"></script>
</body>
</html>