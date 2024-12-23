<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
   


    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- css -->
     <?php $this->load->view('Frontend/link-css'); ?> 

  <style>
    .single-team-member p, body{
        color: black;
    }
  </style>
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
                    <h2>Refund Policy for AssistHealth</h2>
                
                    <span class="decor"><span class="inner"></span></span>
                </div>
            </div>
        </div>
    </section>

    <section class="sec-padding doctor-profile">
    <div class="container">
        <div class="row">
            <div class="col-md-12 single-team-member">
                <h2>Refund Policy Overview</h2>
                <p>At AssistHealth, we strive to provide exceptional health and wellness services. Our registration fee is strictly non-refundable, covering administrative and initial service setup costs.</p>

                <h3>Details of the Policy</h3>
                <h4>1. Nature of the Fee:</h4>
                <ul>
                    <li>The registration charges facilitate onboarding, including account creation, initial consultations, and personalized health plan setup.</li>
                </ul>

                <h4>2. No Refunds:</h4>
                <ul>
                    <li>The registration fee is non-refundable under any circumstances.</li>
                </ul>

                <h4>3. Service Commitment:</h4>
                <ul>
                    <li>By paying the registration fee, you secure your spot and commit to initial services.</li>
                </ul>

                <h4>4. Exceptions:</h4>
                <ul>
                    <li>In rare cases of AssistHealth errors (e.g., duplicate charges), we may review and correct or refund if valid.</li>
                </ul>

                <h3>Why is the Registration Fee Non-Refundable?</h3>
                <p>Our non-refundable policy ensures efficient resource allocation and uninterrupted high-quality services. The registration fee covers:</p>
                <ul>
                    <li>Administrative processing</li>
                    <li>Initial consultations and assessments</li>
                    <li>Personalized health service plan setup</li>
                </ul>

                <h3>Contact Information</h3>
                <p>For questions or concerns regarding this refund policy, please contact our customer support team:</p>
                <p>Phone: +91 96112 32519</p>
                <p>Thank you for choosing AssistHealth. We look forward to serving your health and wellness needs.</p>
            </div>
        </div>
    </div>
</section>





<!-- footer -->
   <?php $this->load->view('Frontend/footer'); ?>




</body>


</html>