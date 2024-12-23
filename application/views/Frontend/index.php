<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	

	<!-- responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- css -->
  <?php $this->load->view('Frontend/link-css'); ?> 

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plan-style.css">
<style>
	.new-body{padding-top:20px;}
.new-table .hw-18 {
height: 18px!important;
min-width: 18px!important;
width: 18px!important;
}
.new-table .rounded-circle {
border-radius: 50%!important;
}
.new-table .border {
border: 1px solid #cbd5e1!important;
}
.new-table .badge-light {
color: #101729;
background-color: #f1f4f9;
}
.new-table .badge {
display: inline-block;
padding: .25em .4em;
font-size: 75%;
font-weight: 700;
line-height: 1;
text-align: center;
white-space: nowrap;
vertical-align: baseline;
border-radius: .25rem;
transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.new-table .say-yes:before {
content: "";
vertical-align: middle;
display: inline-block;
background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg height='24' width='24' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath fill='%2314b89c' d='M9.707 19.121a.997.997 0 01-1.414 0l-5.646-5.647a1.5 1.5 0 010-2.121l.707-.707a1.5 1.5 0 012.121 0L9 14.171l9.525-9.525a1.5 1.5 0 012.121 0l.707.707a1.5 1.5 0 010 2.121z'/%3E%3C/svg%3E");
}
.new-table .say-yes, .new-table .say-yes:before {
height: 1.5rem;
width: 1.5rem;
}
.new-table .say-yes {
position: relative;
display: block;
margin: 0 auto;
}
.new-table .btn-white {
border: 1px solid #cbd5e1;
background-color: #fff;
}
.new-table .mt-3, .new-table .my-3 {
margin-top: 1rem!important;
}
.new-table .btn-group-sm>.btn, .new-table .btn-sm {
padding: .7rem 1.55rem;
font-size: .875rem;
line-height: 1.5;
border-radius: .25rem;
}
.new-table p {
margin-top: 0;
margin-bottom: 1rem;
}
.new-table .table.table-lg td, .new-table .table.table-lg th {
padding: 1rem .75rem;
}
.new-table .table.table-lg td, .new-table .table.table-lg th {
padding: 1rem .75rem;
}
/* .new-body .table-borderless td, .table-borderless th, .table-borderless thead th {
border: 0;
} */
/* .new-body  .table-borderless th {
border: 0;
}
.new-body  .table-borderless thead th {
border: 0;
} */


.new-table {
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
}

.new-table:hover {
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}


</style>
</head>

<body>


  <!-- header -->
   <?php $this->load->view('Frontend/header'); ?> 

   <!-- Navbar -->
   <?php $this->load->view('Frontend/navbar'); ?>


 <!-- /.mainmenu-area -->

<!-- Banner -->
	<!-- <section class="rev_slider_wrapper">
		<div id="slider1" class="rev_slider" data-version="5.0">
			<ul>
				<li data-transition="parallaxvertical">
					<img src="<?php echo base_url(); ?>assets/web_assets/img/banner/1.png" alt="" width="1920" height="705" data-bgposition="top center"
						data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1">
				
					 
				</li>
				<li data-transition="parallaxvertical">
					<img src="<?php echo base_url(); ?>assets/web_assets/img/banner/2.png" alt="" width="1920" height="705" data-bgposition="top center"
						data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="2">
				
				 
				</li>
				<li data-transition="parallaxvertical">
					<img src="<?php echo base_url(); ?>assets/web_assets/img/banner/3.png" alt="" width="1920" height="705" data-bgposition="top center"
						data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="3">
				
				 
				</li>
				<li data-transition="parallaxvertical">
					<img src="<?php echo base_url(); ?>assets/web_assets/img/banner/4.png" alt="" width="1920" height="705" data-bgposition="top center"
						data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="4">
				
				 
				</li>
				<li data-transition="parallaxvertical">
					<img src="<?php echo base_url(); ?>assets/web_assets/img/banner/5.png" alt="" width="1920" height="705" data-bgposition="top center"
						data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5">
				
				 
				</li>
			</ul>
		</div>
	</section> -->

	<section class="rev_slider_wrapper">
    <div id="slider1" class="rev_slider" data-version="5.0">
        <ul>
            <li data-transition="slidehorizontal" data-slotamount="default" data-masterspeed="500" data-thumb="">
                <img src="<?php echo base_url(); ?>assets/web_assets/img/banner/1.png" alt="" width="1920" height="705" data-bgposition="top center"
                    data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1">
            </li>
            <li data-transition="slidehorizontal" data-slotamount="default" data-masterspeed="500" data-thumb="">
                <img src="<?php echo base_url(); ?>assets/web_assets/img/banner/2.png" alt="" width="1920" height="705" data-bgposition="top center"
                    data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="2">
            </li>
            <li data-transition="slidehorizontal" data-slotamount="default" data-masterspeed="500" data-thumb="">
                <img src="<?php echo base_url(); ?>assets/web_assets/img/banner/3.png" alt="" width="1920" height="705" data-bgposition="top center"
                    data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="3">
            </li>
            <li data-transition="slidehorizontal" data-slotamount="default" data-masterspeed="500" data-thumb="">
                <img src="<?php echo base_url(); ?>assets/web_assets/img/banner/4.png" alt="" width="1920" height="705" data-bgposition="top center"
                    data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="4">
            </li>
            <li data-transition="slidehorizontal" data-slotamount="default" data-masterspeed="500" data-thumb="">
                <img src="<?php echo base_url(); ?>assets/web_assets/img/banner/5.png" alt="" width="1920" height="705" data-bgposition="top center"
                    data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5">
            </li>
        </ul>
    </div>
</section>


	<!-- <section class="rev_slider_wrapper">
		<div id="slider1" class="rev_slider" data-version="5.0">
			<ul>
				<li data-transition="parallaxvertical">
					<img src="<?php echo base_url(); ?>assets/web_assets/img/sv1.jpg" alt="" width="1920" height="705" data-bgposition="top center"
						data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1">
					<div class="tp-caption sfl tp-resizeme thm-banner-h1" data-x="left" data-hoffset="0" data-y="top"
						data-voffset="225" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="o:0"
						data-transform_out="o:0" data-start="500">
						<span class=" thm-banner-h1 blue-bg">Assist </span><span class="thm-banner-h1 black-bg">Health</span>
					</div>

					<div class="tp-caption sfb tp-resizeme thm-banner-h3" data-x="left" data-hoffset="0" data-y="top"
						data-voffset="353" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="o:0"
						data-transform_out="o:0" data-start="1500">
						<b>Personalized Healthcare Support<br> & Preventive Care</b>
					</div>

					<div class="tp-caption sfl tp-resizeme" data-x="left" data-hoffset="0" data-y="top"
						data-voffset="474" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="o:0"
						data-transform_out="o:0" data-start="2300">
						<a href="tel:+919611232519" class="thm-btn">Call us Today</a>
					</div>
					 
				</li>
				<li data-transition="parallaxvertical">
					<img src="<?php echo base_url(); ?>assets/web_assets/img/sv2.jpg" alt="" width="1920" height="705" data-bgposition="top center"
						data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="2">
					<div class="tp-caption sfl tp-resizeme thm-banner-h1 blue-bg" data-x="left" data-hoffset="0"
						data-y="top" data-voffset="209" data-whitespace="nowrap" data-transform_idle="o:1;"
						data-transform_in="o:0" data-transform_out="o:0" data-start="500">
						Personalized 
					</div>
					<div class="tp-caption sfr tp-resizeme thm-banner-h1 heavy black-bg" data-x="left" data-hoffset="0"
						data-y="top" data-voffset="263" data-whitespace="nowrap" data-transform_idle="o:1;"
						data-transform_in="o:0" data-transform_out="o:0" data-start="1000">
					Healthcare 
					</div>
					<div class="tp-caption sfb tp-resizeme thm-banner-h3" data-x="left" data-hoffset="0" data-y="top"
						data-voffset="341" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="o:0"
						data-transform_out="o:0" data-start="1500">
					Support & Preventive Care
					</div>
				 
					<div class="tp-caption sfl tp-resizeme" data-x="left" data-hoffset="0" data-y="top"
						data-voffset="465" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="o:0"
						data-transform_out="o:0" data-start="2300">
						<a href="tel:+919611232519" class="thm-btn">Call us Today</a>
					</div>
				 
				</li>
			</ul>
		</div>
	</section> -->


	<section class="sec-padding about-content full-sec">
		<div class="container">
			<div class="row">

				<div class="col-lg-5 col-md-12">
					<div class="full-sec-content">
						<div class="sec-title style-two">
							<h2>More about us</h2>
							<span class="decor">
								<span class="inner"></span>
							</span>
						</div>
						<h4 style="color:#000">Invest in yourself </h4> <h3>Start your Health journey with us</h3>
						<br>
						<p> At AssistHealth, we are proud to have a team of experienced professionals dedicated to
							providing personalized health
							assistance to our members. Our team consists of Primary Care Doctors, Health Navigators, and
							support staff who work
							together to ensure that our members receive the highest level of care and support.
						</p>
						<br>

						<br>
						<a href="<?php echo base_url(); ?>About" class="thm-btn">Read More</a>
					</div>
				</div>
				<div class="col-md-7 hidden-md text-right">
					<img src="<?php echo base_url(); ?>assets/web_assets/img/home/about.jpg" alt="Awesome Image" />
				</div>
			</div>
		</div>
	</section>


	<br><br><br><br>

	<section class="fact-counter-wrapper sec-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-4">
					<h3>"AssistHealth: Your All-in-One Healthcare Solution. We are dedicated to ensuring you receive the finest medical care and support available."</h3><br><br>
					<a href="<?php echo base_url(); ?>login" class="thm-btn inverse">Join AssistHealth</a>
				</div>
				<div class="col-lg-6 col-md-8">
					<div class="single-fact">
						<div class="icon-box">
						      <i class="fa fa-handshake-o" aria-hidden="true"></i>
						</div>
						<span class="timer" data-from="8" data-to="8" data-speed="6000"
							data-refresh-interval="50">8</span>
						<p>Our Team</p>
					</div>
					<div class="single-fact">
						<div class="icon-box">
							<i class="flaticon-people-3"></i>
						</div>
						<span class="timer" data-from="3000" data-to="3000" data-speed="6000"
							data-refresh-interval="50">3000</span>
						<p>Members</p>
					</div>
					<div class="single-fact">
						<div class="icon-box">
						 <i class="fa fa-map-marker" aria-hidden="true"></i>
						</div>
						<span class="timer" data-from="6" data-to="6" data-speed="6000"
							data-refresh-interval="50">6</span>
						<p>Cities</p>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="sec-padding meet-doctors">
		<div class="container">
			<div class="sec-title text-left">
				<h2> Our Services </h2>
				<p> Start Your Health Journey With Us </p>
				<span class="decor"><span class="inner"></span></span>
			</div>
			<div class="clearfix">
				<div class="team-carousel owl-carousel owl-theme">
					<div class="item">
						<div class="single-team-member">
							<div class="img-box">
								<img src="<?php echo base_url(); ?>assets/web_assets/img/home/service1.jpg" alt="" style="height: 250px;">

							</div>
							<h3>Doctor Appointments</h3>
							<p>When it comes to your healthcare needs, finding the right specialist is crucial</p>

							<a href="<?php echo base_url(); ?>doctor-appointments" class="thm-btn">View More</a>
						</div>
					</div>
					<div class="item">
						<div class="single-team-member">
							<div class="img-box">
								<img src="<?php echo base_url(); ?>assets/web_assets/img/home/service2.jpg" alt=""  style="height: 250px;">

							</div>
							<h3>Post Hospital Care</h3>
							<p>At AssistHealth, we understand that the journey to recovery doesn't</p>

							<a href="<?php echo base_url(); ?>post-hospital-care" class="thm-btn">View More</a>
						</div>
					</div>
					<div class="item">
						<div class="single-team-member">
							<div class="img-box">
								<img src="<?php echo base_url(); ?>assets/web_assets/img/home/service3.jpg" alt=""  style="height: 250px;">

							</div>
							<h3>Organize Health Records</h3>
							<p>At AssistHealth, we understand the importance of well-organized health</p>

							<a href="<?php echo base_url(); ?>organizing-health-records" class="thm-btn">View More</a>
						</div>
					</div>
					<div class="item">
						<div class="single-team-member">
							<div class="img-box">
								<img src="<?php echo base_url(); ?>assets/web_assets/img/home/service4.jpg" alt=""  style="height: 250px;">

							</div>
							<h3>Healthcare Navigation</h3>
							<p>At AssistHealth, we understand that navigating the complex healthcare</p>

							<a href="<?php echo base_url(); ?>healthcare-navigation" class="thm-btn">View More</a>
						</div>
					</div>
					<div class="item">
						<div class="single-team-member">
							<div class="img-box">
								<img src="<?php echo base_url(); ?>assets/web_assets/img/home/service5.jpg" alt=""  style="height: 250px;">

							</div>
							<h3>Health Education and Support:</h3>
							<p>At AssistHealth, we believe that knowledge is a powerful tool in achieving</p>

							<a href="<?php echo base_url(); ?>health-education-and-support" class="thm-btn">View More</a>
						</div>
					</div>
					<div class="item">
						<div class="single-team-member">
							<div class="img-box">
								<img src="<?php echo base_url(); ?>assets/web_assets/img/home/service6.jpg" alt=""  style="height: 250px;">

							</div>
							<h3>24/7 Care Helpline</h3>
							<p>At AssistHealth, we understand that health concerns can arise at any time</p>

							<a href="<?php echo base_url(); ?>24-care-helpline" class="thm-btn">View More</a>
						</div>
					</div>


				</div>
			</div>
		</div>
	</section>


	<section class="sec-padding testimonials-wrapper">
		<div class="container">
			<div class="sec-title colored text-center">
				<h2>Testimonials</h2>
				<span class="decor">
					<span class="inner"></span>
				</span>
			</div>
			<div class="testimonaials-carousel owl-carousel owl-theme">
				<div class="item">
					<div class="single-testimonaials">
						<div class="qoute-box">
							<i class="qoute">“</i>
						</div>
						<p>The AssistHealth Team excels in coordinating efficient and top-tier healthcare services. They ensure patients receive the most suitable appointments with exceptional doctors in their respective fields. Moreover, they diligently follow up on consultations, diagnostics, procedures, and overall patient care, from initial appointment scheduling to post-operative support. This remarkable dedication deserves commendation. Excellent work!
</p>
						<h3>Dr Vinay Babu,
</h3>
						<span> Bioneeds</span>
					</div>
				</div>
				<div class="item">
					<div class="single-testimonaials">
						<div class="qoute-box">
							<i class="qoute">“</i>
						</div>
						<p>During my recent diagnostic appointment, Assist Health proved to be instrumental in guaranteeing a seamless procedure. Their crucial role involved coordinating with the Diagnostic Centre to ensure timely arrangements, enabling a smooth experience. Moreover, they efficiently managed all the necessary documents required for the procedure and went above and beyond by taking care of travel logistics to and from the hospital. Their invaluable assistance contributed to a hassle-free and positive experience.
</p>
						<h3>Vikram Sai Lekkala
</h3>
						 
					</div>
				</div>
				<div class="item">
					<div class="single-testimonaials">
						<div class="qoute-box">
							<i class="qoute">“</i>
						</div>
						<p>I am so grateful for the care and support that the Assist Health team provided to my father. They made a difficult time in our lives a little bit easier. I would highly recommend them to anyone who is facing a cancer diagnosis.
</p>
						<h3>Mr Sai Arun Kumar, 
						<span>Texas, USA
</h3></span>
					</div>
				</div>
				
					<div class="item">
					<div class="single-testimonaials">
						<div class="qoute-box">
							<i class="qoute">“</i>
						</div>
						<p>AssistHealth helped me manage my health records and made my hospital journey very easy. The Navigators helped me throughout the procedures. I 100% recommend it!
</p>
						<h3>Ruthwika Lekkala 
						 
</h3> 
					</div>
				</div>
				
					<div class="item">
					<div class="single-testimonaials">
						<div class="qoute-box">
							<i class="qoute">“</i>
						</div>
						<p> As an NRI, I was confused about getting medical help, when I visited India, AssistHealth helped me in getting specialist appointments and the navigators helped me in every step of my hospital visit. cc
</p>
						<h3>Laxman Boyapati
						 
</h3> 
					</div>
				</div>
				 
			 
				 
			 
				 
			 
			 
			 
				 
			</div>
		</div>
	</section>

	<section class="sec-padding faq-home faq-page">
		<div class="container">
			
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
						
						<a href="<?php echo base_url(); ?>Faq" class="thm-btn text-center">View More</a>


</div>

</div>
</div>
</div>
</section>
<!-- Pricing -->
	<!-- <section class="sec-padding faq-home faq-page" style="background-color: white;">
		<div class="container">
			
			<div class="row">
				<div class="col-md-12">
					<div class="sec-title text-center">
						<h2>Membership Plans</h2>
					
						<span class="decor"><span class="inner"></span></span>
					</div>
					<div class="container new-body">
					<table class="new-table table table-lg table-hover table-borderless bg-white">
   <thead class="border-bottom">
      <tr class="text-center">
         <th scope="col" class="text-left">
            <div class="mb-5">
               <div class="h4 font-weight-bold">Choose a Plan</div>
            </div>
         </th>
         <th scope="col" class="text-center text-nowrap">
        
			<a href="javascript:;" class="btn btn-primary btn-sm waves-effect mt-3" role="button">Basic</a>
           
         </th>
         <th scope="col" class="text-center text-nowrap">
         
			<a href="javascript:;" class="btn btn-primary btn-sm waves-effect mt-3" role="button">Premium</a>
           
         </th>
      </tr>
   </thead>
   <tbody>
      <tr class="border-bottom bg-light">
         <th scope="row" class="h6 py-3 font-weight-semibold text-nowrap border-0 mb-0">Contact & Account Management</th>
         <td class="py-3 border-0"></td>
         <td class="py-3 border-0"></td>
      </tr>
      <tr>
         <th class="font-weight-normal" scope="row">Personalised healthcare navigator support</th>
         <td class="text-center">24 / 7</td>
         <td class="text-center">24 / 7</td>
      </tr>
      <tr>
         <th class="font-weight-normal" scope="row">Unique AssistHealth ID</th>
         <td class="text-center">Yes</td>
         <td class="text-center">Yes</td>
      </tr>
      <tr>
         <th class="font-weight-normal" scope="row">Discounts at Empanelled healthcare providers</th>
         <td class="text-center">NIL</td>
         <td class="text-center">5-10% on all healthcare services at our associated providers</td>
      </tr>
      <tr>
         <th class="font-weight-normal" scope="row">Priority care at Empanelled healthcare providers</th>
         <td class="text-center">Yes</td>
         <td class="text-center">Yes</td>
      </tr>
      <tr>
         <th class="font-weight-normal" scope="row">Emergency support</th>
         <td class="text-center">Yes</td>
         <td class="text-center">Yes</td>
      </tr>
      <tr>
         <th class="font-weight-normal" scope="row">Comprehensive Insurance Cover</th>
         <td class="text-center">Guidance on insurance options and coverage tailored to individual needs</td>
         <td class="text-center">Guidance on insurance options and coverage tailored to individual needs</td>
      </tr>
      <tr>
         <th class="font-weight-normal" scope="row">AssistHealth Hospital Companion</th>
         <td class="text-center">No Discounts</td>
         <td class="text-center">5 % Discount</td>
      </tr>
      <tr>
         <th class="font-weight-normal" scope="row">AssistHealth Customised curated healthcare packages & services</th>
         <td class="text-center">No Discount</td>
         <td class="text-center">10 % Discount</td>
      </tr>
      <tr>
         <th class="font-weight-normal" scope="row">Specialist Doctor & Diagnostic Appointments</th>
         <td class="text-center">Yesl</td>
         <td class="text-center">5 % Discount</td>
      </tr>
      <tr>
         <th class="font-weight-normal" scope="row">Regular Follow Ups from AssistHealth Navigators</th>
         <td class="text-center">Nil</td>
         <td class="text-center">Yes</td>
      </tr>
   </tbody>
</table>

</div>

</div>
</div>
</div>
</section> -->
<section style="background:">
        <!-- #d8dfeb; -->
    <!-- <div class="offer">Save 50%</div> -->
    <div class="sec-title text-center">
						<h2>BENEFITS</h2>
					
						<span class="decor"><span class="inner"></span></span>
					</div>
<div class="main">
  <div class="plan basic">
    <h1>Basic</h1>
    <ul>
      <li class="tick"><span></span>24/7 Personalised Healthcare Navigation</li>
      <li class="tick">
        <span></span>Unique AssistHealth ID
      </li>
      <li class="tick"><span></span>Insurance assistance given</li>
      <li class="tick"><span></span>1 Free teleconsultation by AssistHealth physician + 10% discount</li>
      <li class="tick"><span></span>Emergency support provided</li>
      <li class="tick"><span></span>5% discount on Specialist consultation</li>
  
      <li ><span></span>For Diagnostics 10-15% on blood test+ Radiology 10%</li>
      <li ><span></span>5% Discounts on Insurance Premium</li>
      <li ><span></span>5% discount on Inpatient services</li>
     
    </ul>
    <div style="text-align: center;">
    <a href="<?php echo base_url(); ?>plans" class="thm-btn mt-5" 
       style="color:#004aad;background:white; margin-bottom: 6%; margin-top: 20%; display: inline-block;">
        View Plans
    </a>
</div>

  </div>
  <div class="plan premium">
    <h1>Premium</h1>
    <ul>
    <li class="tick"><span></span>24/7 Personalised Healthcare Navigation</li>
      <li class="tick">
        <span></span>Unique AssistHealth ID
      </li>
      <li class="tick"><span></span>Insurance assistance given</li>
      <li class="tick"><span></span>1 Free teleconsultation by AssistHealth physician + 10% discount</li>
      <li class="tick"><span></span>Emergency support provided</li>
      <li class="tick"><span></span>5% discount on Specialist consultation</li>
  
      <li><span></span>For Diagnostics 10-15% on blood test+ Radiology 10%</li>
      <li><span></span>5% Discounts on Insurance Premium</li>
      <li><span></span>5% discount on Inpatient services</li>
    </ul>
    <div style="text-align: center;">
    <a href="<?php echo base_url(); ?>plans" class="thm-btn mt-5" 
       style="color:#004aad;background:white; margin-bottom: 6%; margin-top: 20%; display: inline-block;">
	   View Plans
    </a>
</div>

  </div>
</div>
    </section>

<!-- footer -->
   <?php $this->load->view('Frontend/footer'); ?>

</body>


</html>