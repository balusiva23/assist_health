<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	

	<!-- responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- css -->
  <?php $this->load->view('Frontend/link-css'); ?> 

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
					<h2>FAQ</h2>
					<ul class="breadcumb">
						<li><a href="#">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li><span>FAQ</span></li>
					</ul>
					<span class="decor"><span class="inner"></span></span>
				</div>
			</div>
		</div>
	</section>




	<section class="sec-padding faq-home faq-page">
		<div class="container">
			<hr>
			<div class="row">
				<div class="col-md-12">
					<div class="sec-title text-center">
						<h2>FAQ</h2>
						<!-- <p>Lorem ipsum is a dummy text it will use for subtitle here</p> -->
						<span class="decor"><span class="inner"></span></span>
					</div>
					<div class="accrodion-grp" data-grp-name="faq-accrodion">
						<div class="accrodion active">
							<div class="accrodion-title">
								<h4>
									<span class="decor">
										<span class="inner"></span>
									</span>
									<span class="text">Why should we choose AssistHealth?</span>
								</h4>
							</div>
							<div class="accrodion-content">
							 <p>Personalized Healthcare Navigators: Our navigators provide tailored assistance for all your healthcare needs.</p>
							<p>Discounts with Associated Healthcare Providers: Enjoy priority services and discounts on bills. A dedicated coordinator addresses all your issues.</p>
							<p>One-time Membership Fee: No renewal charges and non-refundable.</p>
							<p>24/7 Helpline: Access support anytime, anywhere.</p>
							</div>
						</div>
						<div class="accrodion ">
							<div class="accrodion-title">
								<h4>
									<span class="decor">
										<span class="inner"></span>
									</span>
								    <span class="text">Is AssistHealth only for elderly care?</span>
								</h4>
							</div>
							<div class="accrodion-content">
							<p>AssistHealth is for all age groups. With a basic membership, you can access all AssistHealth services, including discounts. For personalized and continuum care, choose our packages tailored to your needs. The package price depends on your requirements and is determined after a teleconsultation with our physician.</p>
							</div>
						</div>
						<div class="accrodion ">
							<div class="accrodion-title">
								<h4>
									<span class="decor">
										<span class="inner"></span>
									</span>
									<span class="text">What is the difference between other healthcare services and AssistHealth?</span>
								</h4>
							</div>
							<div class="accrodion-content">
							<p>One-Stop Solution: All healthcare requirements are covered without needing to search different service providers.</p>
							<p>Verified Service Providers: Ensuring quality and reliability.</p>
							<p>Single Point of Contact: No need to search apps or social media. Just call or send a WhatsApp message.</p>
							<p>No Additional Charges: You only pay the service providers directly, with no extra fees from us.</p>
							<p>Doctor-founded: Our services are designed with special care to provide the best for our members.</p>
							<p>Flexible Connections: We can connect you to your preferred healthcare providers, even if they are not associated with us.</p>
							<p>Continuum of Care: We track your health journey and stay with you throughout.</p>
							<p>Dedicated Healthcare Professionals: Available to clear all your doubts.</p>
							<p>Comprehensive Services: Catering to all healthcare needs, not just one.</p>
							</div>
						</div>

						<div class="accrodion ">
							<div class="accrodion-title">
								<h4>
									<span class="decor">
										<span class="inner"></span>
									</span>
								    <span class="text">How much of a percentage discount will you give?</span>
								</h4>
							</div>
							<div class="accrodion-content">
							<p>Discounts range from 5% to 30%, depending on the healthcare providers and services availed.</p>
							</div>
						</div>
						<div class="accrodion ">
							<div class="accrodion-title">
								<h4>
									<span class="decor">
										<span class="inner"></span>
									</span>
									<span class="text">What is the use of an AssistHealth ID card?</span>
								</h4>
							</div>
							<div class="accrodion-content">
							<p>It identifies you as a member and must be shown at healthcare providers to avail discounts. It is also used in all prescriptions.</p>
							</div>
						</div>

						<div class="accrodion ">
							<div class="accrodion-title">
								<h4>
									<span class="decor">
										<span class="inner"></span>
									</span>
									<span class="text">Do I get a bill for one-time registration?</span>
								</h4>
							</div>
							<div class="accrodion-content">
							<p>Yes, an invoice will be provided.</p>
							</div>
						</div>
						<div class="accrodion ">
							<div class="accrodion-title">
								<h4>
									<span class="decor">
										<span class="inner"></span>
									</span>
									<span class="text">What happens after my registration?</span>
								</h4>
							</div>
							<div class="accrodion-content">
							<p>A unique profile is created on our website.</p>
								<p>A personal healthcare navigator is assigned.</p>
								<p>An AssistHealth ID card is issued.</p>
								<p>One teleconsultation with a physician is scheduled.</p>
								<p>Your medical history is created and updated.</p>
							</div>
						</div>
						<div class="accrodion ">
							<div class="accrodion-title">
								<h4>
									<span class="decor">
										<span class="inner"></span>
									</span>
									<span class="text">If my whole family wants to enroll, do we get a discount on the membership fee?</span>
								</h4>
							</div>
							<div class="accrodion-content">
							<p>Yes. The fee is 2,500 INR for a single person and 7,500 INR for a family of four.</p>
							</div>
						</div>
						<div class="accrodion ">
							<div class="accrodion-title">
								<h4>
									<span class="decor">
										<span class="inner"></span>
									</span>
									<span class="text">In Bangalore, which hospitals/diagnostic centers/home healthcare services are you tied up with?</span>
								</h4>
							</div>
							<div class="accrodion-content">
							<p>A list of associated services will be provided upon request.</p>
							</div>
						</div>
						<div class="accrodion ">
							<div class="accrodion-title">
								<h4>
									<span class="decor">
										<span class="inner"></span>
									</span>
									<span class="text">Do I get the doctor/homecare service provider profile?</span>
								</h4>
							</div>
							<div class="accrodion-content">
							<p>Yes, we will collect and share the details via a Google Form upon request.</p>
							</div>
						</div>
						<div class="accrodion ">
							<div class="accrodion-title">
								<h4>
									<span class="decor">
										<span class="inner"></span>
									</span>
									<span class="text">How does AssistHealth make money?</span>
								</h4>
							</div>
							<div class="accrodion-content">
							<p>Through membership fees and service packages.</p>
							</div>
						</div>
						<div class="accrodion ">
							<div class="accrodion-title">
								<h4>
									<span class="decor">
										<span class="inner"></span>
									</span>
									<span class="text">What are the packages available?</span>
								</h4>
							</div>
							<div class="accrodion-content">
							<p>AssistHealth offers curated packages for specific healthcare requirements. These packages can be customized as per the member's requirements. To know more, visit the website.</p>
							</div>
						</div>
						<div class="accrodion ">
							<div class="accrodion-title">
								<h4>
									<span class="decor">
										<span class="inner"></span>
									</span>
									<span class="text">If I don't want membership, will the fees be refunded?</span>
								</h4>
							</div>
							<div class="accrodion-content">
							<p>Membership fees are non-refundable.</p>
							</div>
						</div>
						<div class="accrodion " style="padding-right: 0px;">
							<div class="accrodion-title">
								<h4>
									<span class="decor">
										<span class="inner"></span>
									</span>
									<span class="text">If my family member is staying away from Bangalore or cities where you do not provide services, can you still help?</span>
								</h4>
							</div>
							<div class="accrodion-content">
							<p>Yes, we will try to leverage our contacts, but discounts and priority care might not be available.</p>
							</div>
						</div>
						<div class="accrodion ">
							<div class="accrodion-title">
								<h4>
									<span class="decor">
										<span class="inner"></span>
									</span>
									<span class="text">How do you help with ambulance services?</span>
								</h4>
							</div>
							<div class="accrodion-content">
							<p>We first check if the member is near an associated hospital. If so, we connect with the hospital receptionist to arrange an ambulance. If not, we connect with third-party ambulance services.</p>
							</div>
						</div>

						<div class="accrodion ">
  <div class="accrodion-title">
    <h4>
      <span class="decor">
        <span class="inner"></span>
      </span>
      <span class="text">How do you help with insurance?</span>
    </h4>
  </div>
  <div class="accrodion-content">
    <p>If you already have insurance, we connect you with the coordinator at our associated hospital. If not, we provide the contact for further assistance.</p>
  </div>
</div>
<div class="accrodion">
  <div class="accrodion-title">
    <h4>
      <span class="decor">
        <span class="inner"></span>
      </span>
      <span class="text">Are these 24/7 services?</span>
    </h4>
  </div>
  <div class="accrodion-content">
    <p>Yes, all our services are available 24/7.</p>
  </div>
</div>

<div class="accrodion">
  <div class="accrodion-title">
    <h4>
      <span class="decor">
        <span class="inner"></span>
      </span>
      <span class="text">Is there an advance payment for homecare services?</span>
    </h4>
  </div>
  <div class="accrodion-content">
    <p>Once we receive a service request, we will connect you directly with the service providers. AssistHealth does not insist on using any specific provider, even though we have meticulously curated and partnered with these healthcare providers to ensure the best healthcare for our members. The need for advance payment depends on the policies of the chosen service provider.</p>
  </div>
</div>

<div class="accrodion">
  <div class="accrodion-title">
    <h4>
      <span class="decor">
        <span class="inner"></span>
      </span>
      <span class="text">Is there any discount on consultations?</span>
    </h4>
  </div>
  <div class="accrodion-content">
    <p>Yes, discounts are available at a few associated hospitals.</p>
  </div>
</div>

<div class="accrodion">
  <div class="accrodion-title">
    <h4>
      <span class="decor">
        <span class="inner"></span>
      </span>
      <span class="text">How do you help members in other cities?</span>
    </h4>
  </div>
  <div class="accrodion-content">
    <p>We book appointments based on our contacts and strive to provide the best service.</p>
  </div>
</div>

<div class="accrodion">
  <div class="accrodion-title">
    <h4>
      <span class="decor">
        <span class="inner"></span>
      </span>
      <span class="text">How experienced are the doctors for online/offline consultations?</span>
    </h4>
  </div>
  <div class="accrodion-content">
    <p>We provide detailed information about each doctor's experience upon request.</p>
  </div>
</div>

<div class="accrodion">
  <div class="accrodion-title">
    <h4>
      <span class="decor">
        <span class="inner"></span>
      </span>
      <span class="text">How do you help single members during admission?</span>
    </h4>
  </div>
  <div class="accrodion-content">
    <p>A navigator assists with the admission process and coordinates with home care service providers if a caretaker is needed.</p>
  </div>
</div>

<div class="accrodion">
  <div class="accrodion-title">
    <h4>
      <span class="decor">
        <span class="inner"></span>
      </span>
      <span class="text">Do you have a turnaround time for arranging services?</span>
    </h4>
  </div>
  <div class="accrodion-content">
    <p>The turnaround time depends on the specific service requested.</p>
  </div>
</div>

<div class="accrodion">
  <div class="accrodion-title">
    <h4>
      <span class="decor">
        <span class="inner"></span>
      </span>
      <span class="text">How can I get support if I have questions or issues with AssistHealth?</span>
    </h4>
  </div>
  <div class="accrodion-content">
    <p>Reach out to the navigator through a call or message.</p>
  </div>
</div>

<div class="accrodion">
  <div class="accrodion-title">
    <h4>
      <span class="decor">
        <span class="inner"></span>
      </span>
      <span class="text">Do you have a portal or app where I can manage my account and access resources?</span>
    </h4>
  </div>
  <div class="accrodion-content">
    <p>Yes, you can manage your account and access resources through our portal. Log in to your profile at www.assisthealth.in, or you can call your healthcare navigator who will assist you with any details you need.</p>
  </div>
</div>

<div class="accrodion">
  <div class="accrodion-title">
    <h4>
      <span class="decor">
        <span class="inner"></span>
      </span>
      <span class="text">Can I choose my healthcare provider within the network?</span>
    </h4>
  </div>
  <div class="accrodion-content">
    <p>Yes, we are available to arrange your requirements within your network.</p>
  </div>
</div>

<div class="accrodion">
  <div class="accrodion-title">
    <h4>
      <span class="decor">
        <span class="inner"></span>
      </span>
      <span class="text">Is AssistHealth covered by insurance?</span>
    </h4>
  </div>
  <div class="accrodion-content">
    <p>No, AssistHealth coordinates with other insurance companies and assists you.</p>
  </div>
</div>

<div class="accrodion">
  <div class="accrodion-title">
    <h4>
      <span class="decor">
        <span class="inner"></span>
      </span>
      <span class="text">Is AssistHealth secure and private?</span>
    </h4>
  </div>
  <div class="accrodion-content">
    <p>Yes, AssistHealth prioritizes security and privacy. All personal health information is encrypted and stored securely in compliance with healthcare privacy regulations.</p>
  </div>
</div>

<div class="accrodion">
  <div class="accrodion-title">
    <h4>
      <span class="decor">
        <span class="inner"></span>
      </span>
      <span class="text">How can I sign up for AssistHealth?</span>
    </h4>
  </div>
  <div class="accrodion-content">
    <p>You can sign up for AssistHealth through their website or mobile app. The process typically involves creating an account, providing basic health information, and selecting the services you need.</p>
  </div>
</div>

<div class="accrodion">
  <div class="accrodion-title">
    <h4>
      <span class="decor">
        <span class="inner"></span>
      </span>
      <span class="text">Can AssistHealth help with managing chronic conditions?</span>
    </h4>
  </div>
  <div class="accrodion-content">
    <p>Yes, AssistHealth specializes in helping individuals manage chronic conditions such as diabetes, hypertension, asthma, and more. They provide tools for monitoring health metrics, medication adherence, and lifestyle management.</p>
  </div>
</div>

<div class="accrodion">
  <div class="accrodion-title">
    <h4>
      <span class="decor">
        <span class="inner"></span>
      </span>
      <span class="text">What types of reminders does AssistHealth offer?</span>
    </h4>
  </div>
  <div class="accrodion-content">
    <p>AssistHealth provides reminders for medication schedules, upcoming doctor appointments, health screenings, and other important healthcare tasks. These reminders help users stay on track with their health management.</p>
  </div>
</div>

<div class="accrodion">
  <div class="accrodion-title">
    <h4>
      <span class="decor">
        <span class="inner"></span>
      </span>
      <span class="text">How can I provide feedback or suggestions to AssistHealth?</span>
    </h4>
  </div>
  <div class="accrodion-content">
    <p>Users can typically provide feedback or suggestions to AssistHealth through their website.</p>
  </div>
</div>
</div>

</div>
</div>
</div>
</section>
						


	
	
<!-- footer -->
<?php $this->load->view('Frontend/footer'); ?>

</body>


</html>