<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Saloon</title>
    <?php 
            include 'include/header-link.php' 
    ?>
</head>

<body>
    <div class="wrapper">
    <?php 
            include 'include/header.php' 
    ?>
    <div class="small-banner">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Contact Us</li>
            </ol>
        </nav>
        <img src="assets/img/fbanner.jpg" alt="" style="height:350px;width:100%;">
    </div>
	    
    <section class="contact-us">
        <div class="container">
            <div class="base-header2">
                <h3 class="    padding-bottom: 15px;"> <small>CONTACT</small> Get In Touch </h3>
                <p class="solution_dps">Interested in any of our products? Talk to our experts today </p>
            </div>

            <div class="containerbox">
                <div class="row">
                    <div class="col-md-6">
                        <div class="well1">
                            <div class="light-text">
                                <span class="title20">Salon</span>
                                <h2>Contact Info </h2>
                            </div>


                        </div>

                        <div class="address">
                            <div class="icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="text-tx">
                                <p class="p1" style="margin-bottom: 0;"> <small>ADDRESS</small></p>
                                <p class="p2">
                                    GH-6/160, Meera bagh, Paschim Vihar, New Delhi -110019 </p>
                            </div>
                        </div>
                        <div class="email">
                            <div class="icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="text-tx">
                                <p class="p1" style="margin-bottom: 0;"> <small> EMAIL ADDRESS</small></p>
                                <p class="p2">info@salon.com
                                </p>
                            </div>
                        </div>
                        <div class="tollfree">
                            <div class="icon">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div class="text-tx">
                                <p class="p1"> <small> WHATSAPP NUMBERS</small></p>
                                <p class="p2">+91-9999999999 </p>
                            </div>
                        </div>
                        <div class="phoneno">
                            <div class="icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="text-tx">
                                <p class="p1" style="margin-bottom: 0;"> <small>PHONE NUMBERS</small></p>
                                <p class="p2">+91-11-69092270, +91-9654871000 </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="well1">
                            <div class="light-text">
                                <span class="title20">Fill Form</span>
                                <h2>Send Us A Message</h2>
                            </div>


                        </div>

                        <!-- <h2 class="conheadings"> <i class="far fa-envelope-open"></i> Send Us A Message</h2> -->
                        <form method="post" id="contact-form">
                            <input class="input1" type="text" id="c_name" placeholder="Full Name" required="">
                            <input class="input2" type="email" id="c_email" placeholder="Email Id" required="">
                            <input class="input3" type="tel" id="c_mobile" placeholder="Mobile" required="">
                            <textarea class="textarea" type="text" name="Message" id="c_message" cols="66" rows="3" placeholder="Message"></textarea>
                            <div id="btndiv">
                                <button id="send" class="btn btn-primary contact_pages">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-map-dp">
        <div class="container">
            <div class="contact-wrap">
                <div class="row">
                    <div class="col-md-5">
                        <div class="left-section">

                            <div class="well1">
                                <div class="light-text">
                                    <span class="title20"> <i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp; Salon Address </span>
                                    <h2>Our Branch Offices </h2>
                                </div>


                            </div>

                            <div class="loaction-map">
                                <img src="assets/img/india-map.png">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="right-section">
                            <div class="well1">
                                <div class="light-text">
                                    <span class="title20"> Make an Appointment </span>
                                    <h2>To Make an Appointment for free enquiry call at 99999999999 </h2>
                                </div>


                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home" aria-expanded="true">western india</a></li>
                                <li class=""><a data-toggle="tab" href="#menu10" aria-expanded="false">eastern india</a></li>
                                <li class=""><a data-toggle="tab" href="#menu20" aria-expanded="false">central india</a></li>
                                <li class=""><a data-toggle="tab" href="#menu30" aria-expanded="false">northern india</a></li>
                                <li class=""><a data-toggle="tab" href="#menu40" aria-expanded="false">southern india</a></li> 
                            </ul>
                            <div class="tab-content">
                                <div id="home" class="tab-pane fade active in">
                                    <div class="branch">
                                        <h3>Branches in Maharashtra</h3>
                                       
                                        <ul class="contactuline">
                                            <li>Mumbai<a href="#Salonmain=Branches in  Maharashtra&amp;&amp;id=Mumbai">Book Now</a></li>
                                            <li>Nagpur<a href="#Salonmain=Branches in  Maharashtra&amp;&amp;id=Nagpur">Book Now</a></li>
                                            <li>Nashik<a href="#Salonmain=Branches in  Maharashtra&amp;&amp;id=Nashik">Book Now</a></li>
                                            <li>Kolhapur<a href="#Salonmain=Branches in  Maharashtra&amp;&amp;id=Kolhapur">Book Now</a></li>
                                            <li>Kolhapur<a href="#Salonmain=Branches in  Maharashtra&amp;&amp;id=Kolhapur">Book Now</a></li>
                                        </ul>
                                    </div>
                                    <div class="branch">
                                        <h3>Branches in Gujarat</h3>
                                        <ul class="contactuline">
                                            <li>Ahmedabad<a href="#Salonmain=Branches in Gujarat&amp;&amp;id=Ahmedabad">Book Now</a></li>
                                            <li>Surat<a href="#Salonmain=Branches in Gujarat&amp;&amp;id=Surat">Book Now</a></li>
                                            <li>Palanpur<a href="#Salonmain=Branches in Gujarat&amp;&amp;id=Palanpur">Book Now</a></li>
                                        </ul>
                                    </div>
                                    <div class="branch">
                                        <h3>Branches in Rajasthan</h3>
                                        <ul class="contactuline">
                                            <li>Jaipur<a href="#Salonmain=Branches in Rajasthan&amp;&amp;id=Jaipur">Book Now</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="menu10" class="tab-pane fade">
                                    <div class="branch">
                                        <h3>Branches in West Bengal</h3>
                                        <ul class="contactuline">
                                            <li>Kolkata<a href="make-appointment.php">Book Now</a></li>
                                        </ul>
                                    </div>
                                    <div class="branch">
                                        <h3>Branches in Odisha</h3>
                                        <ul class="contactuline">
                                            <li>Bhubneshwar<a href="make-appointment.php">Book Now</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="menu20" class="tab-pane fade">
                                    <div class="branch">
                                        <h3>Branches in Madhya Pradesh</h3>
                                        
                                        <ul class="contactuline">
                                            <li>Bhopal<a href="make-appointment.php">Book Now</a></li>
                                            <li>Indore<a href="make-appointment.php">Book Now</a></li>
                                        </ul>
                                    </div>
                                    <div class="branch">
                                        <h3>Branches in Chhattisgarh</h3>
                                        
                                        <ul class="contactuline">
                                            <li>Raipur<a href="make-appointment.php">Book Now</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="menu30" class="tab-pane fade">
                                    <div class="branch">
                                        <h3>Branches in Delhi</h3>
                                        
                                        <ul class="contactuline">
                                            <li>West Delhi<a href="make-appointment.php">Book Now</a></li>
                                            <li>Gurgaon<a href="make-appointment.php">Book Now</a></li>
                                            <li>East Delhi<a href="make-appointment.php">Book Now</a></li>
                                        </ul>
                                    </div>
                                    <div class="branch">
                                        <h3>Branches in Uttar Pradesh</h3>
                                        
                                        <ul class="contactuline">
                                            <li>Kanpur<a href="make-appointment.php">Book Now</a></li>
                                            <li>Gorakhpur<a href="make-appointment.php">Book Now</a></li>
                                            <li>Noida<a href="make-appointment.php">Book Now</a></li>
                                            <li>Lucknow<a href="make-appointment.php">Book Now</a></li>
                                        </ul>
                                    </div>
                                    <div class="branch">
                                        <h3>Branches in Haryana</h3>
                                       
                                        <ul class="contactuline">
                                            <li>Ambala<a href="make-appointment.php">Book Now</a></li>
                                            <li>Karnal<a href="make-appointment.php">Book Now</a></li>
                                            <li>Rewari<a href="make-appointment.php">Book Now</a></li>
                                            <li>Faridabad<a href="make-appointment.php">Book Now</a></li>
                                        </ul>
                                    </div>


                                </div>
                                <div id="menu40" class="tab-pane fade">
                                    <div class="branch">
                                        <h3>Branches in Andhra Pradesh &amp; Telangana</h3>
                                        
                                        <ul class="contactuline">
                                            <li>Hyderabad<a href="make-appointment.php">Book Now</a></li>
                                        </ul>
                                    </div>
                                    <div class="branch">
                                        <h3>Branches in Karnataka</h3>
                                       
                                        <ul class="contactuline">
                                            <li>Mysuru<a href="make-appointment.php">Book Now</a></li>
                                            <li>Gulbarga<a href="make-appointment.php">Book Now</a></li>
                                        </ul>
                                    </div>
                                    <div class="branch">
                                        <h3>Branches in Tamil Nadu</h3>
                                         
                                        <ul class="contactuline">
                                            <li>Chennai<a href="make-appointment.php">Book Now</a></li>
                                        </ul>
                                    </div>
                                </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <?php 
            include 'include/footer.php' 
    ?>