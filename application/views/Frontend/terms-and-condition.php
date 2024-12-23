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
                    <h2>ASSISTHEALTH’S TERMS AND CONDITIONS</h2>
                
                    <span class="decor"><span class="inner"></span></span>
                </div>
            </div>
        </div>
    </section>

 

    <section class="sec-padding doctor-profile">
    <div class="container">
        <div class="row">
            <div class="col-md-12 single-team-member">
            <h1>Welcome to AssistHealth!</h1>
                <p> This Membership Agreement outlines the terms and conditions for utilizing our services. By accessing and utilizing AssistHealth's services, you agree to abide by these terms. Kindly review them carefully.</p>
                
                <h3>1. Acceptance of Agreement:</h3>
                <p>By using AssistHealth's services, you acknowledge that you have read, understood, and accepted this Membership Agreement. If any part of these terms is disagreeable, please refrain from using our services.</p>
                
                <h3>2. Membership Enrollment:</h3>
                <p>To become an AssistHealth member, you must provide accurate and complete information during the registration process. Additionally, you must agree to our Privacy Policy, which explicates how we collect, use, and safeguard your personal data. The collection and management of health information by the Healthcare Navigator is governed by the Privacy Policy, and members must review and agree to it.</p>
                
                <h3>3. Appropriate Service Utilization:</h3>
                <p>You commit to using AssistHealth's services for lawful purposes and in accordance with relevant laws and regulations. Solely, you are accountable for the accuracy of information you provide to us, and you agree not to furnish false or misleading data. Our services are aimed at delivering personalized healthcare support. You agree to supply precise and comprehensive health-related information when seeking assistance.</p>
                
                <h3>4. Privacy and Confidentiality:</h3>
                <p>You acknowledge that personal and health-related information you disclose to us will be treated in accordance with our Privacy Policy. While we take precautions to protect your data, you understand that electronic communications and data transmission may not be entirely secure. Your use of our services entails inherent risk.</p>
                
                <h3>5. Membership Fees:</h3>
                <p>The membership fees for AssistHealth's services are specified on our website. Upon becoming a member, you agree to pay the prescribed fees corresponding to your chosen subscription plan. Fee amounts are subject to alteration, and any changes will be communicated to you before they come into effect.</p>
                
                <h3>6. Membership Termination and Refunds:</h3>
                <p>You may terminate your membership at any time, but no refunds will be issued.</p>
                
                <h3>7. Limited Responsibility:</h3>
                <p>AssistHealth is a healthcare support service that furnishes guidance based on the information you provide. However, we do not offer medical diagnosis or treatment recommendations. We assist you in accessing the best available healthcare based on our resources. Our team, to the best of our capabilities, advises you on the most suitable healthcare options. We have collaborated with healthcare providers whom we have screened and thoughtfully included in our network. We recommend these services based on your healthcare needs. Any consequences resulting from using these services are not our liability. You have the option to choose your own providers, and we can guide you in this selection. AssistHealth shall not be held accountable for indirect, incidental, special, consequential, or punitive damages arising from using our services.</p>
                
                <h3>8. Changes to Terms and Services:</h3>
                <p>We may update this Membership Agreement periodically. Your continued use of our services following such updates signifies your acceptance of the revised terms. We retain the right to modify or terminate our services at any time without prior notice.</p>
                
                <h3>9. Governing Law and Dispute Resolution:</h3>
                <p>This Membership Agreement is governed by Indian laws. Any disputes will be subject to the exclusive jurisdiction of the courts in Bangalore, Karnataka, India.</p>
                
                <h3>10. Contact Us:</h3>
                <p>If you have inquiries or concerns about this Membership Agreement or your utilization of AssistHealth's services, please contact us at <a href="mailto:infoassisthealth@gmail.com">infoassisthealth@gmail.com</a>.<br>Thank you for choosing AssistHealth for your healthcare support needs.</p>
            </div>
        </div>
    </div>
</section>



<!-- footer -->
   <?php $this->load->view('Frontend/footer'); ?>




</body>


</html>