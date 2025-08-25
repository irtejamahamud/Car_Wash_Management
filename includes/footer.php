<style>
.footer {
    background: #222;
    color: #fff;
    padding: 40px 0 0 0;
    font-family: 'Barlow', sans-serif;
}
.footer h2 {
    color: #43db83;
    font-weight: 700;
    margin-bottom: 1rem;
}
.footer-contact h5 {
    color: #fff;
    font-size: 1.1rem;
    margin-bottom: 0.5rem;
}
.footer-contact p, .footer-contact a {
    color: #bbb;
    margin-bottom: 0.3rem;
    font-size: 1rem;
}
.footer-contact a:hover {
    color: #43db83;
    text-decoration: underline;
}
.footer-social {
    margin-top: 1.5rem;
}
.footer-social .btn {
    background: #333;
    color: #43db83;
    margin-right: 8px;
    border-radius: 50%;
    width: 38px;
    height: 38px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
    transition: background 0.2s, color 0.2s;
    text-decoration: none; /* Ensure no underline by default */
}
.footer-social .btn:hover {
    background: #43db83;
    color: #222;
    text-decoration: none; /* Remove underline on hover */
}
.footer-link {
    margin-top: 1.5rem;
}
.footer-link a {
    display: block;
    color: #bbb;
    margin-bottom: 0.5rem;
    font-size: 1rem;
    text-decoration: none;
    transition: color 0.2s;
}
.footer-link a:hover {
    color: #43db83;
    text-decoration: underline;
}
.copyright {
    border-top: 1px solid #444;
    margin-top: 2rem;
    padding: 1rem 0;
    text-align: center;
    color: #bbb;
    font-size: 1rem;
    letter-spacing: 1px;
}
@media (max-width: 767px) {
    .footer-contact, .footer-link {
        margin-top: 2rem;
    }
}
</style>
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
                        <p><em class="fa fa-envelope"></em> <a href="mailto:irtejamahamud9@gmail.com">irtejamahamud9@gmail.com</a></p>
                    </div>
                            <div class="footer-social">
                                <a class="btn" href="#"><em class="fab fa-twitter"></em></a>
                                <a class="btn" href="#"><em class="fab fa-facebook-f"></em></a>
                                <a class="btn" href="#"><em class="fab fa-youtube"></em></a>
                                <a class="btn" href="#"><em class="fab fa-instagram"></em></a>
                                <a class="btn" href="#"><em class="fab fa-linkedin-in"></em></a>
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
                <p>&copy; <?php echo date('Y'); ?> Car Wash Management System. All Rights Reserved.</p>
            </div>
        </div>
        <!-- Footer End -->        <!-- Back to top button -->
        <a href="#" class="back-to-top"><em class="fa fa-chevron-up"></em></a>
        
        <!-- Pre Loader -->
        <div id="loader" class="show">
            <div class="loader"></div>
        </div>