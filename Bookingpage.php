<?php 
$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "cwmsdb";  

include('includes/config.php');
  
$con = mysqli_connect($host, $user, $password, $db_name);  

if(mysqli_connect_errno()) {  
    die("Failed to connect with MySQL: ". mysqli_connect_error()); 
}
if(isset($_POST['book']))
{
    $ptype=$_POST['packagetype'];
    $wpoint=$_POST['washingpoint'];   
    $wpoin=$_POST['City'];
    $fname=$_POST['fname'];
    $mobile=$_POST['contactno'];
    $date=$_POST['washdate'];
    $time=$_POST['washtime'];
    $message=$_POST['message'];
    $status='Pending';
    $bno=mt_rand(100000000, 999999999);
    $r="SELECT * FROM tblcarwashbooking WHERE washDate='$date'";
    $res=mysqli_query($con,$r);
    $rowcnt=mysqli_num_rows($res);
    $sql="INSERT INTO tblcarwashbooking(bookingId,packageType,carWashPoint,fullName,mobileNumber,washDate,washTime,message,status,City) VALUES(:bno,:ptype,:wpoint,:fname,:mobile,:date,:time,:message,:status,:wpoin)";
    $query = $dbh->prepare($sql);

    // Get user id from session (username)
    session_start();
    $user_id = isset($_SESSION['username']) ? $_SESSION['username'] : null;

    if($rowcnt == 5)
    {
        echo "<script>alert('Select Different Date')</script>";
        header("Location: bookingpage.php");
    }
    else
    {
        // Insert into tblcarwashbooking
        $query->bindParam(':bno',$bno,PDO::PARAM_STR);
        $query->bindParam(':ptype',$ptype,PDO::PARAM_STR);
        $query->bindParam(':wpoint',$wpoint,PDO::PARAM_STR);
        $query->bindParam(':fname',$fname,PDO::PARAM_STR);
        $query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
        $query->bindParam(':date',$date,PDO::PARAM_STR);
        $query->bindParam(':time',$time,PDO::PARAM_STR);
        $query->bindParam(':message',$message,PDO::PARAM_STR);
        $query->bindParam(':status',$status,PDO::PARAM_STR);
        $query->bindParam(':wpoin',$wpoin,PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();

        // Insert into user_bookings
        $sql2 = "INSERT INTO user_bookings(user_id, bookingId, packageType, carWashPoint, fullName, mobileNumber, washDate, washTime, message, status, City) VALUES(:user_id, :bno, :ptype, :wpoint, :fname, :mobile, :date, :time, :message, :status, :wpoin)";
        $query2 = $dbh->prepare($sql2);
        $query2->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query2->bindParam(':bno',$bno,PDO::PARAM_STR);
        $query2->bindParam(':ptype',$ptype,PDO::PARAM_STR);
        $query2->bindParam(':wpoint',$wpoint,PDO::PARAM_STR);
        $query2->bindParam(':fname',$fname,PDO::PARAM_STR);
        $query2->bindParam(':mobile',$mobile,PDO::PARAM_STR);
        $query2->bindParam(':date',$date,PDO::PARAM_STR);
        $query2->bindParam(':time',$time,PDO::PARAM_STR);
        $query2->bindParam(':message',$message,PDO::PARAM_STR);
        $query2->bindParam(':status',$status,PDO::PARAM_STR);
        $query2->bindParam(':wpoin',$wpoin,PDO::PARAM_STR);
        $query2->execute();

        if($lastInsertId)
        {
            echo '<script>alert("Your booking done successfully. Booking number is "+"'.$bno.'")</script>';
            echo "<script>window.location.href ='booking-pg.php'</script>";
        }
        else 
        {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CWMS | Booking</title>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .booking-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
            padding: 2rem 2.5rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
        .booking-card h2 {
            font-weight: 700;
            color: #007bff;
            margin-bottom: 1.5rem;
        }
        .booking-card .form-group label {
            font-weight: 500;
            color: #333;
        }
        .booking-card .form-control {
            border-radius: 8px;
        }
        .booking-card .btn-custom {
            padding: 0.75rem 2.5rem;
            font-size: 1.1rem;
            border-radius: 8px;
        }
        .booking-icon {
            font-size: 2.5rem;
            color: #007bff;
            margin-bottom: 1rem;
        }
        .booking-bg {
            background: linear-gradient(135deg, #007bff 0%, #00c6ff 100%);
            border-radius: 12px;
            padding: 2rem;
            color: #fff;
            text-align: center;
        }
        @media (max-width: 768px) {
            .booking-card { padding: 1rem; }
            .booking-bg { padding: 1rem; }
        }
    </style>
    <script>
        function dateval() {
            var today = new Date();
            d = document.f.washdate.value;
            today = Date.parse(today);
            d = Date.parse(d);
            if(d<today)
            {
                alert("Date is not valid");
                return false;
            }
        }
    </script>
</head>
<body>
<?php include_once('includes/header.php');?>

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-6 col-md-8">
            <div class="booking-card shadow">
                <div class="text-center">
                    <span class="booking-icon"><i class="fas fa-car-side"></i></span>
                    <h2>Book Your Car Wash</h2>
                    <p class="mb-4 text-muted">Fill out the form below to schedule your car wash appointment.</p>
                </div>
                <form name="f" onsubmit="return dateval()" method="POST">
                    <div class="form-group">
                        <label for="packagetype"><i class="fas fa-list"></i> Select Service</label>
                        <select name="packagetype" id="packagetype" required class="form-control">
                            <option value="">Select Services</option>
                            <?php 
                            $sql = "SELECT * from tblservices";
                            $query = $dbh -> prepare($sql);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            foreach($results as $result) { ?>  
                                <option value="<?php echo htmlentities($result->S_id);?>"><?php echo htmlentities($result->services);?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="washingpoint"><i class="fas fa-map-marker-alt"></i> Select Washing Point</label>
                        <select name="washingpoint" id="washingpoint" required class="form-control">
                            <option value="">Select Washing Point</option>
                            <?php 
                            $sql = "SELECT * from tblwashingpoints";
                            $query = $dbh -> prepare($sql);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            foreach($results as $result) { ?>  
                                <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->washingPointName);?> (<?php echo htmlentities($result->washingPointAddress);?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="City"><i class="fas fa-city"></i> Select City</label>
                        <select name="City" id="City" required class="form-control">
                            <option value="">Select City</option>
                            <?php 
                            $sql = "SELECT * from tblwashingpoints";
                            $query = $dbh -> prepare($sql);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            foreach($results as $result) { ?>  
                                <option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->City);?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fname"><i class="fas fa-user"></i> Full Name</label>
                        <input type="text" name="fname" id="fname" class="form-control" required placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <label for="contactno"><i class="fas fa-phone"></i> Mobile No.</label>
                        <input type="text" name="contactno" id="contactno" class="form-control" pattern="[0-9]{10}" title="10 numeric characters only" required placeholder="Mobile No.">
                    </div>
                    <div class="form-group">
                        <label for="washdate"><i class="fas fa-calendar-alt"></i> Wash Date</label>
                        <input type="date" name="washdate" id="washdate" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="washtime"><i class="fas fa-clock"></i> Wash Time</label>
                        <input type="time" name="washtime" id="washtime" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="message"><i class="fas fa-comment"></i> Message (optional)</label>
                        <textarea name="message" id="message" class="form-control" placeholder="Message if any"></textarea>
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn btn-custom btn-primary" type="submit" name="book"><i class="fas fa-paper-plane"></i> Book Now</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5 d-none d-lg-block">
            <div class="booking-bg shadow">
                <h3 class="mb-3"><i class="fas fa-info-circle"></i> Why Choose Us?</h3>
                <ul class="list-unstyled mb-4">
                    <li><i class="fas fa-check-circle"></i> Professional Service</li>
                    <li><i class="fas fa-check-circle"></i> Modern Equipment</li>
                    <li><i class="fas fa-check-circle"></i> Affordable Pricing</li>
                    <li><i class="fas fa-check-circle"></i> Quick & Convenient</li>
                </ul>
                <p>Book your car wash now and experience the best service in town!</p>
            </div>
        </div>
    </div>
</div>

<?php include_once('includes/footer.php');?>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>

<!-- Contact Javascript File -->
<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
   <!--  -->

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>
</html>