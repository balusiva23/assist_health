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
                    <h2>Organizing Health records</h2>
                    <ul class="breadcumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><span>Organizing Health records</span></li>
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
                <img src="<?php echo base_url(); ?>assets/web_assets/img/services/health_records.png" alt="Organising Health Records Image">
            </div>
            <div class="col-md-7 single-team-member">
                <h3>Organising Health Records</h3>
                <br><br>
                <p style="font-size: 20px;">
                    Effortless Health Record Management.<br>
                    Experience seamless organization of your health records with AssistHealth, ensuring easy access for accurate, timely medical care tailored to your unique needs.
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
                             <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/5.png" alt="Feature 5">
                        </div>
                    </div>
                    <div class="content">
                        <h3>Centralized Records</h3>
                        <p>All your health information in one place.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6"></div>
            <div class="col-md-4 col-sm-6">
                <div class="single-service-home">
                    <div class="icon-box">
                        <div class="inner-box">
                              <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/6.png" alt="Feature 6">
                        </div>
                    </div>
                    <div class="content">
                        <h3>Privacy Assurance</h3>
                        <p>Secure handling of your sensitive data.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="single-service-home">
                    <div class="icon-box">
                        <div class="inner-box">
                             <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/7.jpg" alt="Feature 7">
                        </div>
                    </div>
                    <div class="content">
                        <h3>User-Friendly Access</h3>
                        <p>Quick retrieval of your medical history.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6"></div>
            <div class="col-md-4 col-sm-6">
                <div class="single-service-home">
                    <div class="icon-box">
                        <div class="inner-box">
                              <img src="<?php echo base_url(); ?>assets/web_assets/img/services/features/8.png" alt="Feature 8">
                        </div>
                    </div>
                    <div class="content">
                        <h3>Time-Saving Organization</h3>
                        <p>Streamlined records reduce repeated tests.</p>
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
        <img src="<?php echo base_url(); ?>assets/web_assets/img/services/health_rec_works.png" alt="How It Works">

        <div style="    margin: 30px;">
            <a href="#" class="thm-btn mt-4" data-toggle="modal" data-target="#contact-modal">Book Now</a>
            </div>
            
    </div>
</section>

    <!-- <section class="sec-padding doctor-profile">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="<?php echo base_url(); ?>assets/web_assets/img/health-records.jpg" alt="">
                </div>
                <div class="col-md-7 single-team-member">
                    <h3>Effortless Organization of Health Records with AssistHealth</h3>
                    <p> At AssistHealth, we understand the importance of well-organized health records in receiving
                        proper medical treatment.
                        That's why we offer a specialized service to our members – organizing their health records. We
                        believe that having an
                        efficient and comprehensive health history is vital for a doctor to deliver accurate and timely
                        care.


                    </p>

                    <p> Often, patients carry unnecessary and extensive health records, which can be overwhelming for
                        doctors to review
                        thoroughly. This can result in repeated investigations, causing unnecessary expenses and wasted
                        time. Our dedicated team
                        at AssistHealth is here to streamline this process for you.


                    </p>

                    <p> Our team will meticulously organize your health records, ensuring that all pertinent information
                        is easily accessible
                        and readily available. Before your consultation, we compile a detailed health history that
                        captures your medical
                        journey, eliminating the need for repetitive tests and examinations. By providing your treating
                        doctor with a
                        comprehensive overview of your health records, we save both time and resources, allowing for
                        more focused and efficient
                        medical consultations.


                    </p>
                    <p> With our user-friendly platform, both you and your doctor can access your organized health
                        records with just a simple
                        click. No more searching through stacks of papers or struggling to remember important details
                        from past medical visits.
                        AssistHealth centralizes your health information, making it easily retrievable whenever it is
                        needed, empowering you to
                        take control of your healthcare journey.


                    </p>
                    <p> Our commitment to privacy and security ensures that your health records are handled with the
                        utmost confidentiality. You
                        can trust AssistHealth to safeguard your sensitive information while providing seamless access
                        to authorized healthcare
                        professionals.


                    </p>
                    <p>Experience the convenience and efficiency of having your health records organized with
                        AssistHealth. Join us today and
                        embark on a hassle-free healthcare experience, where your medical history is readily available
                        at your fingertips. Trust
                        us to enhance the quality of your medical consultations while saving you time and unnecessary
                        expenses. Your health
                        deserves the best care, and it starts with organized health records.
                    </p>

                </div>
            </div>
        </div>
    </section> -->




<!-- footer -->
   <?php $this->load->view('Frontend/footer'); ?>




</body>


</html>