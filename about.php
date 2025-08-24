<?php 
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Car Wash management System | About Us Page</title>
   

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
<?php include_once('includes/header.php');?>
        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>About Us</h2>
                    </div>
                    <div class="col-12">
                        <a href="index.php">Home</a>
                        <a href="about.php">About Us</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        

        <!-- About Start -->
        <div class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="img/cr2.jpg" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-header text-left">
                            <p>About Us</p>
                            <h2>Car washing and detailing</h2>
                        </div>
                        <div class="about-content">
<?php 
$sql = "SELECT type,detail from tblpages where type='aboutus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $result)
{       
?>

                            <p>
                            <?php   echo $result->detail; ?>
                            </p>
                        <?php } ?>
                        <hr />
                            <ul>
                                <li><em class="far fa-check-circle"></em>Seats washing</li>
                                <li><em class="far fa-check-circle"></em>Vacuum cleaning</li>
                                <li><em class="far fa-check-circle"></em>Interior wet cleaning</li>
                                <li><em class="far fa-check-circle"></em>Window wiping</li>
                            </ul>
                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Why Choose Us Start -->
        <div class="container my-5">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h2 class="font-weight-bold">Why Choose Us?</h2>
                    <p class="lead">We deliver the best car wash experience with quality, reliability, and care.</p>
                </div>
                <div class="col-md-4 text-center">
                    <em class="fas fa-star fa-3x text-warning mb-3"></em>
                    <h4>Quality Service</h4>
                    <p>Our team uses top-grade products and equipment to ensure your car gets the best treatment every time.</p>
                </div>
                <div class="col-md-4 text-center">
                    <em class="fas fa-user-shield fa-3x text-primary mb-3"></em>
                    <h4>Trusted Professionals</h4>
                    <p>Experienced staff with a passion for cars and customer satisfaction.</p>
                </div>
                <div class="col-md-4 text-center">
                    <em class="fas fa-clock fa-3x text-success mb-3"></em>
                    <h4>Convenient & Fast</h4>
                    <p>Quick turnaround and easy booking options to fit your busy schedule.</p>
                </div>
            </div>
        </div>
        <!-- Why Choose Us End -->
        
        



  

<?php include_once('includes/footer.php');?>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
