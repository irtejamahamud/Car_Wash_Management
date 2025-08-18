<?php 
session_start();
error_reporting(0);
include('includes/config.php');

// Redirect if not logged in
if (empty($_SESSION['username'])) {
    header("Location: Login.php");
    exit;
}

// Get user id from users table
$username = $_SESSION['username'];
$userSql = "SELECT username FROM users WHERE username = :username LIMIT 1";
$userQuery = $dbh->prepare($userSql);
$userQuery->bindParam(':username', $username, PDO::PARAM_STR);
$userQuery->execute();
$userRow = $userQuery->fetch(PDO::FETCH_OBJ);

if (!$userRow) {
    echo "<script>alert('User not found');window.location.href='Login.php';</script>";
    exit;
}

// Helper for package type
function mapPackageType($p) {
    switch((int)$p){
        case 1: return "BASIC CLEANING (Rs1000)";
        case 2: return "PREMIUM CLEANING (Rs2000)";
        case 3: return "COMPLEX CLEANING (Rs3000)";
        case 4: return "SUPER DELUXE (Rs4000)";
        default: return "N/A";
    }
}

// Fetch bookings for logged-in user using user_id
$sql = "SELECT b.*, w.washingPointName, w.washingPointAddress 
        FROM user_bookings b
        LEFT JOIN tblwashingpoints w ON w.id = b.carWashPoint
        WHERE b.user_id = :userid
        ORDER BY b.postingDate DESC";
$q = $dbh->prepare($sql);
$q->bindParam(':userid', $userRow->username, PDO::PARAM_STR);
$q->execute();
$bookings = $q->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>CWMS | My Bookings</title>
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
<?php include_once('includes/headerlogout.php');?>
<div class="contact">
    <div class="container">
        <div class="section-header text-center">
            <h2>My Bookings</h2>
            <p>Below are your car wash bookings and their status.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <table id="table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Booking No.</th>
                            <th>Package</th>
                            <th>Washing Point</th>
                            <th>Wash Date</th>
                            <th>Wash Time</th>
                            <th>Status</th>
                            <th>Message</th>
                            <th>Booked On</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(count($bookings)): ?>
                        <?php foreach($bookings as $b): ?>
                        <tr>
                            <td><?php echo htmlentities($b->bookingId); ?></td>
                            <td><?php echo htmlentities(mapPackageType($b->packageType)); ?></td>
                            <td>
                                <?php echo htmlentities($b->washingPointName ?: '—'); ?><br>
                                <small><?php echo htmlentities($b->washingPointAddress ?: ''); ?></small>
                            </td>
                            <td><?php echo htmlentities($b->washDate); ?></td>
                            <td><?php echo htmlentities($b->washTime); ?></td>
                            <td>
                                <?php 
                                  $st = trim($b->status);
                                  $cls = 'badge-secondary';
                                  if ($st === 'New' || $st === 'Pending') $cls='badge-warning';
                                  if ($st === 'Accepted') $cls='badge-info';
                                  if ($st === 'Completed') $cls='badge-success';
                                  if ($st === 'Rejected') $cls='badge-danger';
                                ?>
                                <span class="badge <?php echo $cls; ?>"><?php echo htmlentities($st ?: 'Pending'); ?></span>
                            </td>
                            <td><?php echo $b->message ? htmlentities($b->message) : '<em>-</em>'; ?></td>
                            <td><?php echo htmlentities($b->postingDate); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" style="color:red;text-align:center;">No bookings found.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
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
<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>
</html>
