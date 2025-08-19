<?php
if (session_status() == PHP_SESSION_NONE) session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
$current = basename($_SERVER['PHP_SELF']);
?>
<!-- Top Bar Start -->
        <div class="top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="logo">
                            <a href="index.php">
                                <h1>CAR <span>Wash</span></h1>
                            </a>
                        </div>
                    </div>

<?php 
$sql = "SELECT * from tblpages where type='contact'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $result)
{       
?>
                    <div class="col-lg-8 col-md-7 d-none d-lg-block px-2">
                        <div class="row">
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <em class="fa fa-clock"></em>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Opening Hour</h3>
                                        <p>Mon - Fri, 8:00 AM - 9:00 PM</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <em class="fa fa-phone-alt"></em>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Call Us</h3>
                                        <p>+91 9789027597</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="top-bar-item">
                                    <div class="top-bar-icon">
                                        <em class="far fa-envelope"></em>
                                    </div>
                                    <div class="top-bar-text">
                                        <h3>Email Us</h3>
                                        <p>Car Wash</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
        
        
        <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.php" class="nav-item nav-link <?php echo $current==='index.php'?'active':''; ?>">Home</a>
                            <a href="about.php" class="nav-item nav-link <?php echo $current==='about.php'?'active':''; ?>">About</a>
                            <a href="washing-plans.php" class="nav-item nav-link <?php echo $current==='washing-plans.php'?'active':''; ?>">Washing Plans</a>
                            <a href="location.php" class="nav-item nav-link <?php echo $current==='location.php'?'active':''; ?>">Washing Points</a>
                            <a href="contact.php" class="nav-item nav-link <?php echo $current==='contact.php'?'active':''; ?>">Contact</a>
                            <?php if($username): ?>
                                <a href="Bookingpage.php" class="nav-item nav-link <?php echo $current==='Bookingpage.php'?'active':''; ?>">New Booking</a>
                                <a href="getBookings.php" class="nav-item nav-link <?php echo $current==='getBookings.php'?'active':''; ?>">My Booking</a>
                            <?php endif; ?>
                            <?php if(!$username): // show admin only when NOT logged in ?>
                                <a href="admin" class="nav-item nav-link <?php echo $current==='admin'?'active':''; ?>">admin</a>
                            <?php endif; ?>
                        </div>
                        <?php if ($username): ?>
                            <div class="ml-auto d-flex align-items-center">
                                <span class="text-white mr-3">Hello, <?php echo htmlspecialchars($username); ?></span>
                                <a class="btn btn-custom" href="logout.php">LOGOUT</a>
                            </div>
                        <?php else: ?>
                            <div class="ml-auto d-flex">
                                <a class="btn btn-custom mr-2" href="Login.php">LOGIN</a>
                                <a class="btn btn-custom" href="Signup.php">SIGN UP</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </nav>
            </div>
        </div>
<style>
.navbar-nav .nav-link.disabled {opacity:.5; pointer-events:none;}
</style>
<style>
.navbar-nav .nav-link.disabled {opacity:.5; pointer-events:none;}
</style>
