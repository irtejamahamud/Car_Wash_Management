<div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="footer-contact">
                            <h2>Get In Touch</h2>
<?php 
$sql = "SELECT * from tblpages where type='contact'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $result)
{       
?>


                        <?php } ?>
                            <div class="mt-3">
                        <h5 class="mb-2">Owner / Contact</h5>
                        <p><em class="fa fa-map-marker-alt"></em> Amtola More, Khilkhet, Dhaka</p>
                        <p><em class="fa fa-phone-alt"></em> 01959641122</p>
                        <p><em class="fa fa-envelope"></em> <a href="mailto:irtejamahamud9@gmail.com"></a>irtejamahamud9@gmail.com</p>
                    </div>
                            <div class="footer-social">
                                <a class="btn" href=""><em class="fab fa-twitter"></em></a>
                                <a class="btn" href=""><em class="fab fa-facebook-f"></em></a>
                                <a class="btn" href=""><em class="fab fa-youtube"></em></a>
                                <a class="btn" href=""><em class="fab fa-instagram"></em></a>
                                <a class="btn" href=""><em class="fab fa-linkedin-in"></em></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="footer-link">
                            <h2>Popular Links</h2>
                              <a href="index.php">Home</a>
                            <a href="about.php">About Us</a>
                            <a href="washing-plans.php">Washing Plans</a>
                            <a href="location.php">Washing Points</a>
                            <a href="contact.php">Contact Us</a>
                          
                            
              
                        </div>
                    </div>
             
                </div>
            </div>
            <div class="container copyright">
                <p>Car Wash Management System</p>
            </div>
        </div>
        <!-- Footer End -->        <!-- Back to top button -->
        <a href="#" class="back-to-top"><em class="fa fa-chevron-up"></em></a>
        
        <!-- Pre Loader -->
        <div id="loader" class="show">
            <div class="loader"></div>
        </div>