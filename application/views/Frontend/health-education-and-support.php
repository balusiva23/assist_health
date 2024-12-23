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
                    <h2>Health Education and Support</h2>
                    <ul class="breadcumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><span>Health Education and Support</span></li>
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
                <img src="<?php echo base_url(); ?>assets/web_assets/img/services/education.png" alt="Health Education and Support Image">
            </div>
            <div class="col-md-7 single-team-member">
                <h3>Health Education and Support</h3>
                <br><br>
                <p style="font-size: 20px;">
                    Transforming Health Through Education.<br>
                    Discover the tools and support you need at AssistHealth, where we provide tailored health education to help you make empowered decisions for your well-being.
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
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/13.png" alt="Feature 13">
                        </div>
                    </div>
                    <div class="content">
                        <h3>Personalized Education</h3>
                        <p>Tailored sessions for your health needs.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6"></div>
            <div class="col-md-4 col-sm-6">
                <div class="single-service-home">
                    <div class="icon-box">
                        <div class="inner-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/14.png" alt="Feature 14">
                        </div>
                    </div>
                    <div class="content">
                        <h3>Trusted Information</h3>
                        <p>Access reliable, evidence-based resources.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="single-service-home">
                    <div class="icon-box">
                        <div class="inner-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/15.png" alt="Feature 15">
                        </div>
                    </div>
                    <div class="content">
                        <h3>Lifestyle Guidance</h3>
                        <p>Support for nutrition and exercise goals.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6"></div>
            <div class="col-md-4 col-sm-6">
                <div class="single-service-home">
                    <div class="icon-box">
                        <div class="inner-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/16.png" alt="Feature 16">
                        </div>
                    </div>
                    <div class="content">
                        <h3>Emotional Wellness</h3>
                        <p>Compassionate support for mental health.</p>
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
        <img src="<?php echo base_url(); ?>assets/web_assets/img/services/education_works.png" alt="How It Works">

        <div style="    margin: 30px;">
            <a href="#" class="thm-btn mt-4" data-toggle="modal" data-target="#contact-modal">Book Now</a>
            </div>
            
    </div>
</section>

    <!-- <section class="sec-padding doctor-profile">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="<?php echo base_url(); ?>assets/web_assets/img/health-education-and-support.jpg" alt="">
                </div>
                <div class="col-md-7 single-team-member">
                    <h3>Empowering Health Education and Support with AssistHealth
                    </h3>
                    <p> At AssistHealth, we believe that knowledge is a powerful tool in achieving optimal health and
                        well-being. That's why we
                        offer a dedicated service focused on Health Education and Support, providing you with the
                        information, resources, and
                        guidance you need to make informed decisions about your health.
                    </p>

                    <p> Our team of healthcare professionals is passionate about empowering you to take control of your
                        health. We understand
                        that navigating the complex world of healthcare can be overwhelming, with an abundance of
                        information available from
                        various sources. That's where our Health Education and Support service comes in.
                    </p>
                    <h3>Here's how we can assist you:</h3>
                    <p>1- Personalized Health Education: We provide personalized health education sessions tailored to
                        your specific needs and
                        interests. Whether you want to learn about managing a chronic condition, adopting a healthier
                        lifestyle, or
                        understanding a specific medical procedure, our healthcare professionals will equip you with the
                        knowledge you need to
                        make informed choices.
                    </p>

                    <p>2- Reliable Health Information: With so much information available online, it can be challenging
                        to differentiate
                        between trustworthy sources and misinformation. Our team curates and shares evidence-based
                        health information, ensuring
                        that you have access to reliable and up-to-date resources.
                    </p>

                    <p>3- Lifestyle Guidance: Making positive lifestyle changes is key to long-term health and
                        well-being. Our Health Education
                        and Support service offers guidance on nutrition, exercise, stress management, and other
                        lifestyle factors that
                        contribute to overall wellness. We work with you to create realistic goals and provide ongoing
                        support to help you
                        achieve them.
                    </p>

                    <p>4- Chronic Disease Management: If you're living with a chronic condition, we understand the
                        unique challenges you face.
                        Our healthcare professionals offer education and support specific to managing chronic diseases,
                        helping you navigate
                        treatment options, medication management, symptom control, and lifestyle modifications. We're
                        here to empower you to
                        live your best life despite your condition.
                    </p>

                    <p>5- Emotional Support: We recognize that good health extends beyond the physical realm. Our Health
                        Education and Support
                        service also includes emotional support, acknowledging the impact that mental and emotional
                        well-being have on overall
                        health. Our compassionate team is here to listen, offer guidance, and provide resources to
                        support your mental and
                        emotional wellness.
                    </p>

                    <p>At AssistHealth, we are committed to your well-being, not only by providing medical services but
                        also by equipping you
                        with the knowledge and support you need to make informed decisions about your health. We believe
                        that with the right
                        information and guidance, you can actively participate in your own healthcare journey.
                    </p>

                    <p>Join AssistHealth's Health Education and Support service today and unlock the power of knowledge
                        to enhance your health
                        and well-being. Your health matters, and we're here to support you every step of the way.
                    </p>


                </div>
            </div>
        </div>
    </section> -->




<!-- footer -->
   <?php $this->load->view('Frontend/footer'); ?>



</body>


</html>