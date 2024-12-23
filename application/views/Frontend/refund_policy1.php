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
                    <!-- <ul class="breadcumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><span>Doctor Appointments</span></li>
                    </ul> -->
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
    <p><strong>Non-Refundable Registration Charges:</strong> The registration fee collected by AssistHealth is strictly non-refundable. This fee is solely for the purpose of covering administrative and initial service setup costs.</p>

    <h3>Details of the Policy</h3>
    <h4>1. Nature of the Fee:</h4>
    <ul>
        <li>The registration charges are used to facilitate the onboarding process, including the creation of your account, initial consultations, and setup of personalized health plans or services.</li>
        <li>These charges are mandatory to commence the services offered by AssistHealth and are not subject to any form of refund once payment has been made.</li>
    </ul>

    <h4>2. No Refunds:</h4>
    <ul>
        <li>Once the registration fee is paid, no refunds will be issued under any circumstances.</li>
        <li>This policy applies to all users and is strictly enforced to maintain fairness and consistency.</li>
    </ul>

    <h4>3. Service Commitment:</h4>
    <ul>
        <li>By paying the registration fee, you are securing your spot and committing to the initial services provided by AssistHealth.</li>
        <li>Our team is dedicated to ensuring that the registration process is smooth and that you receive the full benefit of the services covered by this fee.</li>
    </ul>

    <h4>4. Exceptions:</h4>
    <ul>
        <li>In extraordinary cases where an error is made by AssistHealth (e.g., duplicate charges), the matter will be reviewed, and if found valid, a correction or refund may be processed.</li>
    </ul>

    <h3>Why is the Registration Fee Non-Refundable?</h3>
    <p>The non-refundable policy helps us allocate resources efficiently and ensure that we can deliver high-quality, uninterrupted services to all clients. The registration fee covers various initial expenses, including but not limited to:</p>
    <ul>
        <li>Administrative processing</li>
        <li>Initial consultations and assessments</li>
        <li>Setup of your personalized health service plan</li>
    </ul>

    <h3>Contact Information</h3>
    <p>If you have any questions or concerns regarding this refund policy, please do not hesitate to contact our customer support team at +91 96112 32519

.</p>
    <p>Thank you for choosing AssistHealth. We look forward to serving your health and wellness needs.</p>
                </div>
            </div>
        </div>
    </section>




<!-- footer -->
   <?php $this->load->view('Frontend/footer'); ?>




</body>


</html>