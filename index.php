<?php 
include('includes/config.php'); 

if(isset($_POST['book']))
{
$ptype=$_POST['packagetype'];
$wpoint=$_POST['washingpoint'];   
$fname=$_POST['fname'];
$mobile=$_POST['contactno'];
$date=$_POST['washdate'];
$time=$_POST['washtime'];
$message=$_POST['message'];
$status='New';
$bno=mt_rand(100000000, 999999999);
$sql="INSERT INTO tblcarwashbooking(bookingId,packageType,carWashPoint,fullName,mobileNumber,washDate,washTime,message,status) VALUES(:bno,:ptype,:wpoint,:fname,:mobile,:date,:time,:message,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':bno',$bno,PDO::PARAM_STR);
$query->bindParam(':ptype',$ptype,PDO::PARAM_STR);
$query->bindParam(':wpoint',$wpoint,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':date',$date,PDO::PARAM_STR);
$query->bindParam(':time',$time,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
 
  echo '<script>alert("Your booking done successfully. Booking number is "+"'.$bno.'")</script>';
 echo "<script>window.location.href ='washing-plans.php'</script>";
}
else 
{
 echo "<script>alert('Something went wrong. Please try again.');</script>";
}

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Car Wash management System | Home Page</title>


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
<?php include_once('includes/header.php');?>

        <!-- Carousel Start -->
        <div class="carousel">
            <div class="container-fluid">
                <div class="owl-carousel">
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="img/cr1.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h3>Washing & Detailing</h3>
                            <h1>Keep Your Car Newer</h1>
                       
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="img/cr2.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h3>Washing & Detailing</h3>
                            <h1>Quality service for you</h1>
                      
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img src="img/cr3.jpg" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h3>Washing & Detailing</h3>
                            <h1>Exterior & Interior Washing</h1>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->
        

        <!-- About Start -->
        <div class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="img/cr4.jpg" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-header text-left">
                            <p>About Us</p>
                            <h2>car washing and detailing</h2>
                        </div>
                        <div class="about-content">
                            <p>
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
                            </p>
                            <ul>
                                <li><em class="far fa-check-circle"></em>Seats washing</li>
                                <li><em class="far fa-check-circle"></em>Vacuum cleaning</li>
                                <li><em class="far fa-check-circle"></em>Interior wet cleaning</li>
                                <li><em class="far fa-check-circle"></em>Window wiping</li>
                            </ul>
                            <a class="btn btn-custom" href="about.php">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Service Start -->
        <div class="service">
            <div class="container">
                <div class="section-header text-center">
                    <p>What We Do?</p>
                    <h2>Premium Washing Services</h2>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <em class="flaticon-car-wash-1"></em>
                            <h3>Exterior Washing</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <em class="flaticon-car-wash"></em>
                            <h3>Interior Washing</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <em class="flaticon-vacuum-cleaner"></em>
                            <h3>Vacuum Cleaning</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <em class="flaticon-seat"></em>
                            <h3>Seats Washing</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <em class="flaticon-car-service"></em>
                            <h3>Window Wiping</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <em class="flaticon-car-service-2"></em>
                            <h3>Wet Cleaning</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <em class="flaticon-car-wash"></em>
                            <h3>Oil Changing</h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="service-item">
                            <em class="flaticon-brush-1"></em>
                            <h3>Brake Reparing</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->
        
        
        <!-- Facts Start -->
        <div class="facts" data-parallax="scroll" data-image-src="img/facts.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="facts-item">
                            <em class="fa fa-map-marker-alt"></em>
                            <div class="facts-text">
                                <h3 data-toggle="counter-up">25</h3>
                                <p>Service Points</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="facts-item">
                            <em class="fa fa-user-circle"></em> 
                            <div class="facts-text">
                                <h3 data-toggle="counter-up">350</h3>
                                <p>Engineers & Workers</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="facts-item">
                            <em class="fa fa-users"></em>
                            <div class="facts-text">
                                <h3 data-toggle="counter-up">1500</h3>
                                <p>Happy Clients</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="facts-item">
                            <em class="fa fa-check"></em>
                            <div class="facts-text">
                                <h3 data-toggle="counter-up">5000</h3>
                                <p>Projects Completed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Facts End -->

        <!-- Testimonial Start -->
        <div class="testimonial">
            <div class="container">
                <div class="section-header text-center">
                    <p>What Our Clients Say</p>
                    <h2>Testimonials</h2>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item">
                        <div class="testimonial-text">
                            <p>Excellent service! My car looks brand new every time. Highly recommended.</p>
                        </div>
                        <div class="testimonial-info">
                            <img src="img/testimonial-1.jpg" alt="Client">
                            <h3>Rahul Sharma</h3>
                            <h4>Delhi</h4>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-text">
                            <p>Professional staff and quick turnaround. The best car wash in town!</p>
                        </div>
                        <div class="testimonial-info">
                            <img src="img/testimonial-2.jpg" alt="Client">
                            <h3>Priya Singh</h3>
                            <h4>Noida</h4>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-text">
                            <p>Affordable prices and great results. I am a regular customer now.</p>
                        </div>
                        <div class="testimonial-info">
                            <img src="img/testimonial-3.jpg" alt="Client">
                            <h3>Arjun Verma</h3>
                            <h4>Ghaziabad</h4>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-text">
                            <p>I'm very particular about my car, and these guys did not disappoint. Fantastic job!</p>
                        </div>
                        <div class="testimonial-info">
                            <img src="img/testimonial-4.jpg" alt="Client">
                            <h3>Anjali Mehta</h3>
                            <h4>Faridabad</h4>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-text">
                            <p>Great attention to detail and very friendly staff. Will definitely come again!</p>
                        </div>
                        <div class="testimonial-info">
                            <img src="img/testimonial-5.jpg" alt="Client">
                            <h3>Suresh Reddy</h3>
                            <h4>Gurgaon</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

        <!-- FAQ Start -->
        <div class="faq">
            <div class="container">
                <div class="section-header text-center">
                    <p>Frequently Asked Questions</p>
                    <h2>FAQ</h2>
                </div>
                <div class="accordion" id="faqAccordion">
                    <div class="card">
                        <div class="card-header" id="faq1">
                            <h5 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                    How do I book a car wash?
                                </button>
                            </h5>
                        </div>
                        <div id="collapse1" class="collapse show" aria-labelledby="faq1" data-parent="#faqAccordion">
                            <div class="card-body">
                                You can book a car wash online through our Booking page or visit us directly at any of our service points.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faq2">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                    What are your working hours?
                                </button>
                            </h5>
                        </div>
                        <div id="collapse2" class="collapse" aria-labelledby="faq2" data-parent="#faqAccordion">
                            <div class="card-body">
                                We are open from Monday to Friday, 8:00 AM to 9:00 PM. Weekend timings may vary by location.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faq3">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                    Do you offer interior cleaning?
                                </button>
                            </h5>
                        </div>
                        <div id="collapse3" class="collapse" aria-labelledby="faq3" data-parent="#faqAccordion">
                            <div class="card-body">
                                Yes, we offer both exterior and interior cleaning packages. Please check our Washing Plans for details.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="faq4">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                    Can I reschedule my booking?
                                </button>
                            </h5>
                        </div>
                        <div id="collapse4" class="collapse" aria-labelledby="faq4" data-parent="#faqAccordion">
                            <div class="card-body">
                                Yes, you can reschedule your booking by contacting our support team or through your account dashboard.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FAQ End -->

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

