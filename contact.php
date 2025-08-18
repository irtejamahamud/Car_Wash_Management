<?php
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $user_id = (isset($_SESSION['username']) ? $_SESSION['username'] : null);

    $sql = "INSERT INTO user_messages (user_id, name, email, subject, message) VALUES (:user_id, :name, :email, :subject, :message)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':subject', $subject, PDO::PARAM_STR);
    $stmt->bindParam(':message', $message, PDO::PARAM_STR);
    if ($stmt->execute()) {
        echo '<script>alert("Your message has been sent successfully!");</script>';
    } else {
        echo '<script>alert("Failed to send message. Please try again.");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CWMS | Contact Us</title>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php include_once('includes/header.php'); ?>

<div class="contact">
    <div class="container">
        <div class="section-header text-center">
            <h2>Contact Us</h2>
            <p>We'd love to hear from you! Fill out the form below or reach us using the details.</p>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form method="post" action="">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" required placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" required placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" class="form-control" required placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea name="message" class="form-control" rows="5" required placeholder="Message"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-custom">Send Message</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="contact-info" style="color: #fff;">
                    <h3>Contact Details</h3>
                    <p><em class="fa fa-map-marker-alt"></em> Amtola More, Khilkhet, Dhaka</p>
                    <p><em class="fa fa-phone-alt"></em> 01959641122</p>
                    <p><em class="far fa-envelope"></em> <a href="mailto:irtejamahamud9@gmail.com" style="color: #fff;">irtejamahamud9@gmail.com</a></p>
                    <h4>Opening Hours</h4>
                    <p>Mon - Fri: 8:00 AM - 9:00 PM</p>
                    <p>Sat - Sun: 9:00 AM - 6:00 PM</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('includes/footer.php'); ?>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>
</html>
