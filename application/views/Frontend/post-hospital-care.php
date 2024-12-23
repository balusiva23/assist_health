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
                    <h2>POST HOSPITAL CARE</h2>
                    <ul class="breadcumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><span>POST HOSPITAL CARE</span></li>
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
                <img src="<?php echo base_url(); ?>assets/web_assets/img/services/post_hospital.jpg" alt="Post-Hospital Care Image">
            </div>
            <div class="col-md-7 single-team-member">
                <h3>Post-Hospital Care - Seamless Recovery with AssistHealth</h3>
                <br><br>
                <p style="font-size: 20px;">
                    Smooth Transition from Hospital to Home.<br>
                    Supporting your recovery every step of the way with personalised post-hospital care.
                </p>
                <p style="font-size: 18px;">
                    <strong>24 hours caretaker service - Starting at 1000/-</strong><br>
                    <strong>12 hours caretaker service - Starting at 800/-</strong>
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
                    <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/1.jpg" alt="Feature 1">
                </div>
            </div>
            <div class="content">
                <h3>Coordinated Care</h3>
                <p>Collaboration between your treatment doctor and healthcare professionals.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6"></div>
    <div class="col-md-4 col-sm-6">
        <div class="single-service-home">
            <div class="icon-box">
                <div class="inner-box">
                    <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/2.jpg" alt="Feature 2">
                </div>
            </div>
            <div class="content">
                <h3>Personalised Recovery Plan</h3>
                <p>Tailored support based on your specific post-hospital needs.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="single-service-home">
            <div class="icon-box">
                <div class="inner-box">
                    <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/3.jpg" alt="Feature 3">
                </div>
            </div>
            <div class="content">
                <h3>Home Health Assistance</h3>
                <p>Skilled nurses, physiotherapists, and more arranged for your care.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6"></div>
    <div class="col-md-4 col-sm-6">
        <div class="single-service-home">
            <div class="icon-box">
                <div class="inner-box">
                    <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/4.jpg" alt="Feature 4">
                </div>
            </div>
            <div class="content">
                <h3>Clear Communication</h3>
                <p>We act as a bridge between you and your doctor for seamless updates.</p>
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
        <img src="<?php echo base_url(); ?>assets/web_assets/img/services/post_works.png" alt="How It Works">

        <div style="    margin: 30px;">
            <a href="#" class="thm-btn mt-4" data-toggle="modal" data-target="#contact-modal">Book Now</a>
            </div>
            
    </div>
</section>

    <!-- <section class="sec-padding doctor-profile">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="<?php echo base_url(); ?>assets/web_assets/img/post-hospital-care.jpg" alt="">
                </div>
                <div class="col-md-7 single-team-member">
                    <h3>A Smooth Transition from Hospital to Home with AssistHealth</h3>
                    <p> At AssistHealth, we understand that the journey to recovery doesn't end when you leave the
                        hospital. That's why we
                        provide a valuable service exclusively for our registered members – post-hospital care. Our
                        mission is to assist our
                        members in achieving a seamless transition from the hospital to the comfort of their own home
                        after their hospital stay.

                    </p>

                    <p> We recognize that once you're home, there can be confusion and uncertainty regarding treatment
                        plans and protocols. The
                        stress on both the patient and their family members can be overwhelming. That's where our
                        dedicated team steps in. We
                        act as a bridge between you and your treatment doctor, ensuring effective communication and
                        maximizing the quality of
                        care you receive.

                    </p>

                    <p> Our team works closely with your treatment doctor, coordinating your post-hospital care to
                        ensure it aligns with the
                        prescribed treatment plan. We understand that each individual's recovery process is unique, so
                        we tailor our assistance
                        to meet your specific needs. From helping you understand and follow the treatment protocols to
                        coordinating with
                        healthcare professionals, our goal is to provide the support and guidance you require for a
                        successful recovery.

                    </p>
                    <p> We assist in finding the necessary healthcare professionals to meet your specific care needs.
                        Whether it's arranging for
                        skilled nurses, physiotherapists, or any other healthcare professionals, we strive to connect
                        you with the right experts
                        who can provide the highest level of care during your recovery journey.

                    </p>
                    <p> Your well-being and peace of mind are our top priorities. With AssistHealth, you can rest
                        assured that you have a
                        dedicated team by your side, helping you navigate the road to recovery with confidence. Join
                        AssistHealth today and
                        experience a smooth transition from the hospital to the comfort of your own home. Your health
                        and recovery matter to us.

                    </p>

                </div>
            </div>
        </div>
    </section> -->



<!-- footer -->
   <?php $this->load->view('Frontend/footer'); ?>



</body>


</html>