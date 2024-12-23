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
                    <h2>Healthcare Navigation</h2>
                    <ul class="breadcumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><span>Healthcare Navigation</span></li>
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
                <img src="<?php echo base_url(); ?>assets/web_assets/img/services/health_care.jpg" alt="Healthcare Navigation Image">
            </div>
            <div class="col-md-7 single-team-member">
                <h3>Healthcare Navigation</h3>
                <br><br>
                <p style="font-size: 20px;">
                    Simplifying Your Healthcare Experience.<br>
                    Navigate healthcare effortlessly with AssistHealth. Our dedicated Navigators and doctors deliver personalized support to ensure you receive the best care for your health.
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
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/9.png" alt="Feature 9">
                        </div>
                    </div>
                    <div class="content">
                        <h3>Personalized Navigation</h3>
                        <p>Tailored guidance for your healthcare journey.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6"></div>
            <div class="col-md-4 col-sm-6">
                <div class="single-service-home">
                    <div class="icon-box">
                        <div class="inner-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/10.png" alt="Feature 10">
                        </div>
                    </div>
                    <div class="content">
                        <h3>Dedicated Support</h3>
                        <p>Personalized support for optimal care tailored to your unique needs.</p>
                    </div>
                </div>
            </div>
           
            <div class="col-md-4 col-sm-6">
                <div class="single-service-home">
                    <div class="icon-box">
                        <div class="inner-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/11.png" alt="Feature 11">
                        </div>
                    </div>
                    <div class="content">
                        <h3>Expert Coordination</h3>
                        <p>Seamless communication and centralized support among all your healthcare providers.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6"></div>
            <div class="col-md-4 col-sm-6">
                <div class="single-service-home">
                    <div class="icon-box">
                        <div class="inner-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/12.png" alt="Feature 12">
                        </div>
                    </div>
                    <div class="content">
                        <h3>Comprehensive Resources</h3>
                        <p>Access to the latest healthcare options.</p>
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
        <img src="<?php echo base_url(); ?>assets/web_assets/img/services/health_care_works.png" alt="How It Works">

        <div style="    margin: 30px;">
            <a href="#" class="thm-btn mt-4" data-toggle="modal" data-target="#contact-modal">Book Now</a>
            </div>
            
    </div>
</section>

    <!-- <section class="sec-padding doctor-profile">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="<?php echo base_url(); ?>assets/web_assets/img/health-navigator.jpg" alt="">
                </div>
                <div class="col-md-7 single-team-member">
                    <h3>Your Personal Guide to Seamless Healthcare: Expert Navigation with AssistHealth</h3>
                    <p> At AssistHealth, we understand that navigating the complex healthcare system can be overwhelming
                        and time-consuming.
                        That's why we offer a specialized service to our members – Health Navigation. Our dedicated
                        Navigators are here to guide
                        you through every step of your healthcare journey, ensuring that you receive the best and most
                        suitable care.

                    </p>

                    <p> When you become a registered member with AssistHealth, you are assigned a personal Navigator and
                        a dedicated doctor.
                        This dynamic duo works in close coordination to address all your healthcare needs effectively.
                        Your Navigator acts as
                        your trusted advocate, providing expert guidance, support, and personalized assistance
                        throughout your healthcare
                        experience.



                    </p>

                    <p> Our Navigators are highly knowledgeable and experienced professionals who have a deep
                        understanding of the healthcare
                        landscape. They stay up-to-date with the latest advancements, medical resources, and specialized
                        providers to ensure
                        that you receive the best possible care. Whether you need help finding the right specialist,
                        scheduling appointments, or
                        understanding complex medical procedures, your Navigator is there for you.



                    </p>
                    <p> With their expertise, our Navigators carefully assess your individual healthcare requirements
                        and match you with the
                        most suitable healthcare providers. They take into consideration your unique medical needs,
                        preferences, and any
                        specific conditions to ensure that you receive personalized and tailored care.


                    </p>
                    <p> Your Navigator also serves as a reliable point of contact for all your healthcare-related
                        queries. They provide clear
                        and timely communication, helping you understand your treatment options, answering your
                        questions, and addressing any
                        concerns you may have. With their guidance, you can make informed decisions about your
                        healthcare and feel confident in
                        the choices you make.

                    </p>
                    <p> At AssistHealth, we prioritize your well-being and convenience. Our Navigators go above and
                        beyond to streamline your
                        healthcare journey, eliminating the stress and confusion often associated with accessing quality
                        care. They work hand in
                        hand with your dedicated doctor, ensuring seamless communication and coordination to optimize
                        your healthcare outcomes.

                    </p>

                    <p>Experience the ease and peace of mind that comes with having a personal Navigator and doctor by
                        your side. Join
                        AssistHealth today and let our team navigate your healthcare needs, so you can focus on what
                        matters most – your health
                        and well-being. Trust us to guide you to the best suitable care and empower you to make informed
                        decisions about your
                        healthcare journey. Your health deserves the highest level of support, and AssistHealth is here
                        to provide it.
                    </p>

                </div>
            </div>
        </div>
    </section> -->




    
<!-- footer -->
   <?php $this->load->view('Frontend/footer'); ?>


</body>


</html>