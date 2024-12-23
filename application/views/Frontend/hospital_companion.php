<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
   

    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- css -->
     <?php $this->load->view('Frontend/link-css'); ?> 


     <style>


.inner-header{
    background: url(<?php echo base_url(); ?>assets/web_assets/img/banner/service-bg.jpg) center center no-repeat;
    background-size: cover !important;
    height: 350px;

}

</style>

</head>

<body>


    <!-- header -->
   <?php $this->load->view('Frontend/header'); ?> 

   <!-- Navbar -->
   <?php $this->load->view('Frontend/navbar'); ?>


    <section class="inner-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 sec-title colored text-center">
                    <h2>Hospital Companion</h2>
                    <ul class="breadcumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><span>Hospital Companion</span></li>
                    </ul>
                    <span class="decor"><span class="inner"></span></span>
                </div>
            </div>
        </div>
    </section>
    <section class="sec-padding doctor-profile" style="padding-bottom: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <img src="<?php echo base_url(); ?>assets/web_assets/img/services/hospital_companion.png" alt="Hospital Companion Image">
            </div>
            <div class="col-md-7 single-team-member">
                <h3>AH Hospital Companion</h3>
                <br><br>
                <p style="font-size: 20px;">
                    Your Compassionate Healthcare Companion.<br>
                    Transform your healthcare visits with AH Hospital Companion. Enjoy stress-free support from door-to-door, ensuring comfort, guidance, and compassionate care throughout your journey.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="home-serivce sec-padding" style="padding-top:0px;padding-bottom: 0px;">
    <div class="container">
        <div class="sec-title text-center">
            <h2>Key Features</h2>
            <span class="decor"><span class="inner"></span></span>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="single-service-home">
                    <div class="icon-box">
                        <div class="inner-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/21.png" alt="Feature 21">
                        </div>
                    </div>
                    <div class="content">
                        <h3>Doorstep Pickup</h3>
                        <p>Comfortable and punctual journey starts here.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6"></div>
            <div class="col-md-4 col-sm-6">
                <div class="single-service-home">
                    <div class="icon-box">
                        <div class="inner-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/22.png" alt="Feature 22">
                        </div>
                    </div>
                    <div class="content">
                        <h3>On-Site Support</h3>
                        <p>Expert guidance through registration and procedures.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="single-service-home">
                    <div class="icon-box">
                        <div class="inner-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/23.png" alt="Feature 23">
                        </div>
                    </div>
                    <div class="content">
                        <h3>Empathetic Care</h3>
                        <p>Compassionate companionship during your hospital visit.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6"></div>
            <div class="col-md-4 col-sm-6">
                <div class="single-service-home">
                    <div class="icon-box">
                        <div class="inner-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/24.png" alt="Feature 24">
                        </div>
                    </div>
                    <div class="content">
                        <h3>Safe Return Home</h3>
                        <p>Ensuring safe drop-off back to home.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sec-padding contact-content appointment-content" style="padding-top:0px">
    <div class="container text-center">
        <div class="sec-title text-center">
            <h2>How It Works</h2>
            <span class="decor"><span class="inner"></span></span>
        </div>
        <img src="<?php echo base_url(); ?>assets/web_assets/img/services/hospital_companion_works.png" alt="How It Works">

        <div style="    margin: 30px;">
            <a href="#" class="thm-btn mt-4" data-toggle="modal" data-target="#contact-modal">Book Now</a>
            </div>
            
    </div>
</section>


    <!-- <section class="sec-padding doctor-profile">
        <div class="container">
        
            <div class="row " style=" margin-top: 40px; ">
                
                <div class="col-md-7 single-team-member mt-4" style=" margin-top: 40px; ">
                <p>Imagine a healthcare experience where you're never alone a seamless journey guided by a caring companion dedicated to your well-being. Meet AH Hospital Companion, the trusted assistant from AssistHealth, designed to transform your visits to healthcare providers into stress-free and supportive encounters.</p>

                    <h3> Beginning Your Journey

                    </h3>

                    <p> AH Hospital Companion begins by picking you up from your doorstep, ensuring your journey starts comfortably and punctually. They greet you warmly, understanding the importance of your healthcare appointments and respecting your time.</p>
                 


                </div>
                <div class="col-md-5">
                    <img src="<?php echo base_url(); ?>assets/web_assets/img/begin.png" alt="">
                </div>
            </div>
            <div class="row " style=" margin-top: 40px; ">
            <div class="col-md-5">
                    <img src="<?php echo base_url(); ?>assets/web_assets/img/acompany.jpg" alt="" style="height: 300px;">
                </div>
                
                <div class="col-md-7 single-team-member mt-4" style=" margin-top: 40px; ">
              

                    <h3> Accompanying You Every Step of the Way </h3>

                    <p> As you arrive at the healthcare center, AH Hospital Companion remains by your side, offering steadfast support. Navigating through the bustling corridors and registration process can be daunting, but with AH Hospital Companion, you have a knowledgeable ally who ensures you find your way effortlessly. </p>
                 


                </div>
              
            </div>
            <div class="row " style=" margin-top: 40px; ">
                
                <div class="col-md-7 single-team-member mt-4" style=" margin-top: 40px; ">
              

                    <h3> Supporting Your Needs</h3>

                    <p> Whether it's aiding with paperwork, providing reassurance during consultations, or simply being there to listen, AH Hospital Companion understands the importance of empathy in healthcare. They offer companionship that goes beyond logistics, fostering a sense of ease and comfort throughout your visit.
                    </p>
                 


                </div>
                <div class="col-md-5">
                    <img src="<?php echo base_url(); ?>assets/web_assets/img/support.jpg" alt="">
                </div>
            </div>
            <div class="row " style=" margin-top: 40px; ">
            <div class="col-md-5">
                    <img src="<?php echo base_url(); ?>assets/web_assets/img/ensure.jpg" alt="">
                </div>
                
                <div class="col-md-7 single-team-member mt-4" style=" margin-top: 40px; ">
              

                    <h3> Ensuring Your Return Home</h3>

                    <p> Once your healthcare needs are met, AH Hospital Companion ensures you safely return home. They prioritize your well-being until the very end of your journey, making sure you feel cared for and supported every step of the way.
                    </p>
                 


                </div>
              
            </div>
            <div class="row " style=" margin-top: 40px; ">
                
                <div class="col-md-7 single-team-member mt-4" style=" margin-top: 40px; ">
              

                    <h3> A Commitment to Your Comfort and Care
                    </h3>

                    <p>AH Hospital Companion from AssistHealth isn't just a service; it's a promise of reliable assistance and compassionate care. By choosing AH Hospital Companion, you're choosing a dedicated partner who respects your dignity and prioritizes your health journey above all else.

                    </p>
                 


                </div>
                <div class="col-md-5">
                    <img src="<?php echo base_url(); ?>assets/web_assets/img/commit.jpg" alt="">
                </div>
            </div>
            <div class="row " style=" margin-top: 40px; ">
            <div class="col-md-5">
                    <img src="<?php echo base_url(); ?>assets/web_assets/img/companian.jpg" alt="">
                </div>
                
                <div class="col-md-7 single-team-member mt-4" style=" margin-top: 40px; ">
              

                    <h3> Experience AH Hospital Companion Today
                    </h3>

                    <p> Let AH Hospital Companion transform your healthcare experience into a journey marked by ease, support, and peace of mind. Discover the difference a caring companion can make, ensuring you receive the healthcare you deserve with the comfort you need.

                      <br>Trust AH Hospital Companion, Your Partner in Healthcare Excellence.
                    </p>
                 


                </div>
              
            </div>
        </div>
        
    </section> -->



<!-- footer -->
   <?php $this->load->view('Frontend/footer'); ?>




</body>


</html>