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
                    <h2>PRIVACY POLICY FOR ASSISTHEALTH</h2>
              
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
                <p>At AssistHealth, we are committed to protecting your privacy and ensuring the security of your personal information. This Privacy Policy outlines how we collect, use, disclose, and safeguard your data when you visit our website and use our services. By accessing and using our website, you agree to the terms outlined in this Privacy Policy.</p>

                <h3>1. Information We Collect</h3>
                <p>We may collect various types of information when you interact with our website or use our services. The information we collect may include:</p>
                <ul>
                    <li><strong>Personal Information:</strong> This includes your name, email address, phone number, and other identifying information you provide when you sign up for our services or contact us through our website.</li>
                    <li><strong>Health Information:</strong> As a healthcare support service, we may collect certain health-related information to better understand your needs and provide you with personalized assistance. We will only collect health information with your explicit consent and in accordance with applicable laws.</li>
                    <li><strong>Usage Data:</strong> We may gather non-personal information about how you interact with our website, such as your IP address, browser type, pages visited, and time spent on each page. This data helps us improve our website's performance and enhance user experience.</li>
                </ul>

                <h3>2. Consent to Access and Manage Health Information</h3>
                <p>As a member of AssistHealth, you are assigned a dedicated Healthcare Navigator responsible for managing and coordinating your healthcare needs. To provide you with personalized and efficient healthcare services, your Healthcare Navigator will need to access and collect information related to your health from hospitals, clinics, and other healthcare providers.</p>
                <p><strong>By becoming a member of AssistHealth, you consent to the following:</strong></p>
                <ul>
                    <li><strong>Access to Health Information:</strong> You authorize your Healthcare Navigator to collect, access, and review your health records, medical history, test results, and any other relevant health information from hospitals, clinics, diagnostic centers, and healthcare providers involved in your care.</li>
                    <li><strong>Purpose of Information Collection:</strong> The information collected will be used solely for the purpose of managing your healthcare, coordinating treatment, and ensuring continuity of care. This may include scheduling appointments, obtaining referrals, following up on treatment plans, and any other healthcare-related services you may require.</li>
                    <li><strong>Confidentiality and Security:</strong> All health information collected by your Healthcare Navigator will be treated with the utmost confidentiality and will be securely stored in accordance with applicable data protection laws. AssistHealth is committed to ensuring that your personal health information is protected and only accessed by authorized personnel.</li>
                    <li><strong>Sharing of Information:</strong> Your health information may be shared with healthcare providers and specialists involved in your care as necessary to coordinate your treatment. This sharing will be done under strict confidentiality agreements to ensure the security of your information.</li>
                    <li><strong>Revocation of Consent:</strong> You have the right to revoke this consent at any time. However, please note that revoking consent may limit the ability of your Healthcare Navigator to provide comprehensive and personalized healthcare services.</li>
                </ul>

                <h3>3. How We Use Your Information</h3>
                <p>We use the collected information for the following purposes:</p>
                <ul>
                    <li>To provide personalized healthcare support and services to you and our other members.</li>
                    <li>To improve our website, services, and customer support based on your feedback and usage patterns.</li>
                    <li>To send you relevant updates, newsletters, and marketing communications, with your consent.</li>
                    <li>To comply with legal obligations and enforce our terms of service.</li>
                </ul>

                <h3>4. How We Protect Your Information</h3>
                <p>We employ strict security measures to protect your personal information from unauthorized access, alteration, disclosure, or destruction. Our website is secured with encryption protocols (HTTPS) to ensure the safety of data transmission.</p>

                <h3>5. Sharing of Information</h3>
                <p>We may share your information with third-party service providers and partners who assist us in delivering our services. These third parties are bound by confidentiality agreements and are only allowed to use your information for the specific purposes authorized by us. We will not sell, trade, or rent your personal information to any third party without your explicit consent.</p>

                <h3>6. Cookies and Tracking Technologies</h3>
                <p>AssistHealth may use cookies and similar tracking technologies to enhance your experience on our website. Cookies are small files stored on your device that help us recognize your preferences and track your activity on our site. You can adjust your browser settings to manage or block cookies if you prefer.</p>

                <h3>7. Your Choices</h3>
                <p>You have the right to access, update, or delete your personal information at any time. You can also choose to opt-out of receiving marketing communications from us by following the instructions provided in our emails.</p>

                <h3>8. Children's Privacy</h3>
                <p>Our services are not intended for children under the age of 13. We do not knowingly collect personal information from children without parental consent. If you believe that we have inadvertently collected information from a child, please contact us, and we will take appropriate steps to remove the data.</p>

                <h3>9. Data Security</h3>
                <p>We implement appropriate security measures to safeguard your information from unauthorized access, alteration, disclosure, or destruction. However, no method of data transmission over the internet or electronic storage is 100% secure, and we cannot guarantee absolute security.</p>

                <h3>10. Changes to this Privacy Policy</h3>
                <p>We may update this Privacy Policy from time to time to reflect changes in our practices or for other operational, legal, or regulatory reasons. We will post the updated version on our website, and the revised date will indicate the latest version.</p>

                <h3>11. Contact Us</h3>
                <p>If you have any questions, concerns, or requests regarding our Privacy Policy or the use of your personal information, please contact us at <a href="mailto:infoassisthealth@gmail.com">infoassisthealth@gmail.com</a>. We will respond to your inquiries promptly.</p>

                <p>Thank you for entrusting AssistHealth with your healthcare support needs. Your privacy and security are of utmost importance to us.</p>
                <p>By using AssistHealth's website and services, you acknowledge that you have read and understood this Privacy Policy and consent to the collection, use, and disclosure of your information as described herein.</p>
            </div>
        </div>
    </div>
</section>


<!-- footer -->
   <?php $this->load->view('Frontend/footer'); ?>




</body>


</html>