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
                    <h2>24/7 Care Helpline</h2>
                    <ul class="breadcumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><span>24/7 Care Helpline</span></li>
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
                <img src="<?php echo base_url(); ?>assets/web_assets/img/services/24-care.png" alt="24/7 Care Helpline Image">
            </div>
            <div class="col-md-7 single-team-member">
                <h3>24/7 Care Helpline</h3>
                <br><br>
                <p style="font-size: 20px;">
                    24/7 Care at Your Fingertips.<br>
                    Experience immediate support with AssistHealth's 24/7 Care Helpline, providing reliable assistance and personalized guidance for all your healthcare inquiries, day or night.
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
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/17.png" alt="Feature 17">
                        </div>
                    </div>
                    <div class="content">
                        <h3>24/7 Support</h3>
                        <p>Round-the-clock assistance for urgent inquiries.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6"></div>
            <div class="col-md-4 col-sm-6">
                <div class="single-service-home">
                    <div class="icon-box">
                        <div class="inner-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/18.png" alt="Feature 18">
                        </div>
                    </div>
                    <div class="content">
                        <h3>Personalized Guidance</h3>
                        <p>Tailored help based on your unique needs.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="single-service-home">
                    <div class="icon-box">
                        <div class="inner-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/19.png" alt="Feature 19">
                        </div>
                    </div>
                    <div class="content">
                        <h3>Resourceful Navigation</h3>
                        <p>Expert advice on healthcare services available.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6"></div>
            <div class="col-md-4 col-sm-6">
                <div class="single-service-home">
                    <div class="icon-box">
                        <div class="inner-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/20.png" alt="Feature 20">
                        </div>
                    </div>
                    <div class="content">
                        <h3>Continuum Care</h3>
                        <p>Coordinated care aligned with your health history.</p>
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
        <img src="<?php echo base_url(); ?>assets/web_assets/img/services/helpline_works.png" alt="How It Works">

        <div style="    margin: 30px;">
            <a href="#" class="thm-btn mt-4" data-toggle="modal" data-target="#contact-modal">Book Now</a>
            </div>
            
    </div>
</section>

<!-- 
    <section class="sec-padding doctor-profile">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="<?php echo base_url(); ?>assets/web_assets/img/kv5.jpg" alt="">
                </div>
                <div class="col-md-7 single-team-member">
                    <h3> Accessible 24/7 Care Helpline with AssistHealth

                    </h3>
                    <p> At AssistHealth, we understand that health concerns can arise at any time, and having quick
                        access to reliable
                        information and support is crucial. That's why we offer a dedicated service, our 24/7 Care
                        Helpline, designed to provide
                        immediate assistance and guidance whenever you need it.

                    </p>

                    <p> With our 24/7 Care Helpline, you have access to a team of highly skilled Navigators who are
                        ready to address your
                        inquiries and concerns, ensuring that you receive the best possible help and support. Our
                        Navigators are trained
                        healthcare professionals who understand the complexities of the healthcare system and can
                        provide the guidance you need
                        to make informed decisions.

                    </p>
                    <h3>Here's how our 24/7 Care Helpline can assist you:</h3>
                    <p> 1- Immediate Support: Whether it's a medical question, a medication concern, or a general health
                        inquiry, our Navigators
                        are available around the clock to provide immediate support. No matter the time of day or night,
                        you can rely on us to
                        be there for you.

                    </p>

                    <p> 2- Personalized Assistance: Our Navigators take the time to understand your unique situation and
                        concerns. They will
                        listen attentively, ask relevant questions, and provide tailored information and recommendations
                        based on your specific
                        needs. We strive to offer personalized assistance that meets your individual requirements.

                    </p>

                    <p>3- Resourceful Guidance: With a vast knowledge of healthcare resources and services, our
                        Navigators can help you
                        navigate the healthcare landscape effectively. Whether you need help finding a suitable
                        specialist, understanding your
                        insurance coverage, or accessing community resources, our Navigators are here to guide you in
                        the right direction.

                    </p>

                    <p> 4- Continuity of Care: Our 24/7 Care Helpline works in coordination with our other services,
                        ensuring seamless
                        continuity of care. If you are already a registered member with AssistHealth, our Navigators
                        have access to your health
                        history and can provide consistent support aligned with your personalized care plan.

                    </p>

                    <p> 5- Peace of Mind: Health concerns can be stressful, but with our 24/7 Care Helpline, you can
                        have peace of mind knowing
                        that help is just a phone call away. Our compassionate and knowledgeable Navigators are
                        dedicated to easing your worries
                        and providing the assistance you need, when you need it most.

                    </p>

                    <p> With AssistHealth's 24/7 Care Helpline, you can trust that you're never alone in your healthcare
                        journey. Our Navigators
                        are here to be your reliable guides, helping you find the best suitable help and support for
                        your inquiries. We
                        prioritize your well-being and are committed to providing exceptional service whenever you reach
                        out to us.

                    </p>

                    <p> Join AssistHealth today and gain access to our 24/7 Care Helpline, where our Navigators are
                        ready to assist you with
                        your healthcare inquiries, ensuring that you receive the best possible care and support. Your
                        health matters to us, and
                        we're here to help, 24 hours a day, 7 days a week.

                    </p>


                </div>
            </div>
        </div>
    </section> -->



<!-- footer -->
   <?php $this->load->view('Frontend/footer'); ?>




</body>


</html>