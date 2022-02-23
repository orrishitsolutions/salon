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
                <li class="breadcrumb-item active">Make An Appointment</li>
            </ol>
        </nav>
        <img src="assets/img/fbanner.jpg" alt="" style="height:450px;width:100%;">
    </div>
	  
    <section class="site-content">
        <div id="content">
            <div class="container">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
                        <article id="post-25" class="post-25 page type-page status-publish hentry">
                            <div class="base-header2">
                                <h3 class="    padding-bottom: 15px;"> <small> Fill form </small> Make An Appointment </h3>
                                <p class="solution_dps"> Get specialized protection where you need it most </p>
                            </div>

                            <div class="appointment">
                                <div class="row">
                                    <div class=" col-md-4 col-xs-12 col-sm-12">
                                        <div class="working">
                                            <div class="working1">
                                                <div class="hours">
                                                    <h2><span class="tq">Working</span> Hours</h2>
                                                    <p>Get to the brighter side of life with a beauty makeover. Book an appointment to treat your senses. We are open from 10 am to 9 pm on all days. Fill in the form and submit online, we will be ready to
                                                        book a slot at the date and time convenient to you. </p>
                                                    <h3>Mon – Sun</h3>
                                                    <p>10:00am – 09:00pm</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-xs-12 col-sm-12">
                                        <div class="form ">
                                            <div role="form" class="makes_dp" lang="en-US" dir="ltr">

                                                <form action="" method="post" class="salon-form init row" novalidate="novalidate" data-status="init">

                                                    <p class="name1 col-md-6 col-xs-12 col-sm-12"><span class="salon-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Name"></span></p>
                                                    <p class="phone1 col-md-6 col-xs-12 col-sm-12"><span class="salon-form-control-wrap tel-770"><input type="tel" name="tel-770" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" aria-required="true" aria-invalid="false" placeholder="Phone Number"></span>                                                        </p>
                                                    <p class="email1 col-md-6 col-xs-12 col-sm-12"><span class="salon-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Email-id"></span>                                                        </p>
                                                    <p class="date1 col-md-6 col-xs-12 col-sm-12" id="dates"><span class="salon-form-control-wrap date-351"><input type="date" name="date-351" value="2020-02-14" class="wpcf7-form-control wpcf7-date wpcf7-validates-as-required wpcf7-validates-as-date required" id="dates" min="2022-01-06" step="1" aria-required="true" aria-invalid="false"></span>                                                        </p>
                                                    <p class="time1 col-md-6 col-xs-12 col-sm-12">
                                                        <span class="salon-form-control-wrap time">
                                    <select name="time" class="validates-as-required" aria-required="true" aria-invalid="false">
                                       <option value="">Time</option>
                                       <option value="10:00am - 12:00pm">10:00am - 12:00pm</option>
                                       <option value="12:00pm - 02:00pm">12:00pm - 02:00pm</option>
                                       <option value="02:00pm - 04:00pm">02:00pm - 04:00pm</option>
                                       <option value="04:00pm - 06:00pm">04:00pm - 06:00pm</option>
                                       <option value="06:00pm - 08:00pm">06:00pm - 08:00pm</option>
                                    </select>
                                 </span>
                                                    </p>
                                                    <p class="service1 col-md-6 col-xs-12 col-sm-12">
                                                        <span class="salon-form-control-wrap service">
                                    <select name="service" class="salon-form-control wpcf7-select wpcf7-validates-as-required" aria-required="true" aria-invalid="false">
                                       <option value="">Service</option>
                                       <option value="Hair">Hair</option>
                                       <option value="Skin">Skin</option>
                                       <option value="Makeup">Makeup</option>
                                       <option value="Bridal">Bridal</option>
                                       <option value="Bridegroom">Bridegroom</option>
                                    </select>
                                 </span>
                                                    </p>
                                                    <p class="salon col-md-12 col-xs-12 col-sm-12">
                                                        <span class="salon-form-control-wrap salonbranch">
                                    <select name="salonbranch" class="salon-form-control salon-select salon-validates-as-required" aria-required="true" aria-invalid="false">
                                       <option value="">Choose Salon</option>
                                       <option value="Chennai - Alwarpet">Chennai - Alwarpet</option>
                                       <option value="Chennai - Anna Nagar">Chennai - Anna Nagar</option>
                                       <option value="Chennai - Besant Nagar">Chennai - Besant Nagar</option>
                                       <option value="Chennai - MRC Nagar">Chennai - MRC Nagar</option>
                                       <option value="Chennai - Nungambakkam">Chennai - Nungambakkam</option>
                                       <option value="Coimbatore - Race Course Road">Coimbatore - Race Course Road</option>
                                       <option value="Andhra - Nellore - Magunta Layout">Andhra - Nellore - Magunta Layout</option>
                                       <option value="Andhra Pradesh - Vijayawada - Labbipet">Andhra Pradesh - Vijayawada - Labbipet</option>
                                       <option value="Karnataka - Bangalore - Whitefield">Karnataka - Bangalore - Whitefield</option>
                                       <option value="Hyderabad - Jubilee Hills - Film Nagar">Hyderabad - Jubilee Hills - Film Nagar</option>
                                       <option value="Hyderabad - Jubilee Hills - Road No.10">Hyderabad - Jubilee Hills - Road No.10</option>
                                       <option value="Telangana - Hyderabad - Gachibowli">Telangana - Hyderabad - Gachibowli</option>
                                    </select>
                                 </span>
                                                    </p>
                                                    <p class="salon col-md-12 col-xs-12 col-sm-12">
                                                        <span class="salon-form-control-wrap salonbranch">
             <textarea placeholder="Message"></textarea>
                               </span>
                                                    </p>
                                                    <p class="submit col-md-12 col-xs-12 col-sm-12"><input type="submit" value="Submit"><span class="ajax-loader"></span></p>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>
                </article>
                </main>
            </div>
        </div>
        </div>
    </section>
    <?php 
            include 'include/footer.php' 
?>