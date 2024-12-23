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
                    <h2>Doctor Appointments</h2>
                    <ul class="breadcumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><span>Doctor Appointments</span></li>
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
                    <img src="<?php echo base_url(); ?>assets/web_assets/img/services/doctor_appointment.png" alt="">
                </div>
                <div class="col-md-7 single-team-member">
                    <h3>Find Your Perfect Specialist
                    </h3>
                    <br>
                    <br>
                
                    <p style=" font-size: 20px;">Unlock personalized healthcare with AssistHealth.<br> Our dedicated team connects you with top specialists<br>  tailored to your unique medical needs, ensuring exceptional <br> care every time.
                    </p>


                </div>
            </div>
        </div>
    </section>
    <section class="home-serivce sec-padding" style="padding-top:0px;padding-bottom: 0px;">
		<div class="container">
			<div class="sec-title text-center">
				<h2>Key Features</h2>
				<!-- <p>Lorem ipsum is a dummy text it will use for subtitle here</p> -->
				<span class="decor"><span class="inner"></span></span>
			</div>
			<div class="row">
    <div class="col-md-4 col-sm-6">
        <div class="single-service-home">
            <div class="icon-box">
                <div class="inner-box">
                      <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/img-1.png" alt="Feature ">
                </div>
            </div>
            <div class="content">
                <h3>Specialist Access</h3>
                <p>Connect with top specialists.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6"></div>
    <div class="col-md-4 col-sm-6">
        <div class="single-service-home">
            <div class="icon-box">
                <div class="inner-box">
                      <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/img-2.png" alt="Feature ">
                </div>
            </div>
            <div class="content">
                <h3>Hassle-Free Coordination</h3>
                <p>We handle all scheduling and logistics.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="single-service-home">
            <div class="icon-box">
                <div class="inner-box">
                      <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/img-3.png" alt="Feature ">
                </div>
            </div>
            <div class="content">
                <h3>Expert Support</h3>
                <p>Guidance from medical professionals always.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6"></div>
    <div class="col-md-4 col-sm-6">
        <div class="single-service-home">
            <div class="icon-box">
                <div class="inner-box">
                      <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/img-4.png" alt="Feature ">
                </div>
            </div>
            <div class="content">
                <h3>Personalized Matching</h3>
                <p>Tailored recommendations based on needs.</p>
            </div>
        </div>
    </div>
</div>

		</div>
	</section>
    <section class="sec-padding contact-content appointment-content" style="padding-top:0px">
		<div class="container text-center">
        <div class="sec-title text-center">
				<h2>How It Works </h2>
				<!-- <p>Lorem ipsum is a dummy text it will use for subtitle here</p> -->
				<span class="decor"><span class="inner"></span></span>
			</div>
			<img src="<?php echo base_url(); ?>assets/web_assets/img/services/da_works.png" alt="Awesome Image">


			<div style="    margin: 30px;">
            <a href="#" class="thm-btn mt-4" data-toggle="modal" data-target="#contact-modal">Book Now</a>
            </div>
            
		</div>
	</section>



<!-- footer -->
   <?php $this->load->view('Frontend/footer'); ?>




</body>


</html>