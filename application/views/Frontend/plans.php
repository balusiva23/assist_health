<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">


    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- css -->
     <?php $this->load->view('Frontend/link-css'); ?> 
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plan-style.css">
     <!-- plan-style.css -->

 <style>

    .img-box img{
       height: 250px;
    }
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
                    <h2>MEMBERSHIP PLANS</h2>
                    <ul class="breadcumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><span>MEMBERSHIP PLANS</span></li>
                    </ul>
                    <span class="decor"><span class="inner"></span></span>
                </div>
            </div>
        </div>
    </section>
     
	<section class="full-sec" style="background:#7ecbf9;padding:10px">
		<div class="container">
			<div class="row">
            <div class="col-lg-5 col-md-12">
					<div class="full-sec-content">
						<div class="sec-title style-two">
							<!-- <h2 style="color:#004aad">More about us</h2> -->
                            <div class="container oldie">
                                <span class="arrow before"></span>
                                <p class="arrow_box"> ASSISTHEALTH MEMBERSHIP PLANS </p>
                                <span class="arrow after"></span>
                            </div>
                             
							<span class="decor">
								<span class="inner"></span>
							</span>
						</div>
						<h3 style="color:#004aad">Get enrolled and saveup
                        on healthcare expenses</h3>
						
						<a href="#plan-tab" class="thm-btn mt-5" style="color:#004aad;background:white;    margin-top: 10%;
">EXPLORE PLANS</a>
					</div>
				</div>
                <div class="col-md-2 hidden-md hidden-sm hidden-xs"></div>
				<div class="col-md-5 hidden-md hidden-sm hidden-xs">
					<img class="full-image pull-right" src="<?php echo base_url(); ?>assets/web_assets/img/plans1.png" alt="">
				</div>
				
			</div>
		</div>
	</section>
	<section class="full-sec" style=";padding:10px">
		<div class="container">
        <div class="sec-title text-center">
						<h2>CHOOSE A PLAN</h2>
					
						<span class="decor"><span class="inner"></span></span>
					</div>
			<div class="row">
            <div class="col-lg-6 col-md-12">
					<div class="full-sec-content" style="background:#d8dfeb;border-radius: 20px;">
						<div class="sec-title style-two">
							<!-- <h2 style="color:#004aad">More about us</h2> -->
                            <div class="container oldie">
                                <span class="arrow before1"></span>
                                <p class="arrow_box">  MEMBERSHIP PLANS </p>
                                <span class="arrow after"></span>
                            </div>
                             
							<!-- <span class="decor">
								<span class="inner"></span>
							</span> -->
						</div>
						<h3 style="color:#004aad">Prioritycare,<br>
Personalised navigation,<br>
discounts and much more</h3>
						
                    <!-- <div style="text-align: center;">
                        <a href="<?php echo base_url(); ?>signup" class="thm-btn mt-5" 
                        style="color:#004aad;background:white; margin-bottom: 6%; margin-top: 20%; display: inline-block;">
                            Join Now
                        </a>
                    </div> -->
                    <div style="text-align: center;">
                        <a id="join-now-btn" href="#" class="thm-btn mt-5"
                            style="color:#004aad;background:white; margin-bottom: 6%; margin-top: 20%; display: inline-block;">
                            Join Now
                        </a>
                    </div>


					</div>
				</div>
               
				<div class="col-md-6 ">
                <div class="plans" id="plan-tab">
                        <!-- <div class="title">Choose a pricing plan</div> -->
                        <div>
                        <label class="plan basic-plan" for="basic">
                            <input checked type="radio" name="plan" id="basic" />
                            <div class="plan-content">
                            <!-- <img loading="lazy" src="https://ismailvtl-images-project.vercel.app/life-saver-img.svg" alt="" /> -->
                            <div class="plan-details">
                                <span>BASIC MEMBERSHIP</span>
                                <strong style="color:#004aad;font-size: 30px">1000rs</strong>
                                <p>One time-registration charge</p>
                            </div>
                            </div>
                        </label>
                        </div>
                        <div>
                        <label class="plan complete-plan" for="complete">
                            <input type="radio" id="complete" name="plan" />
                            <div class="plan-content">
                            <!-- <img loading="lazy" src="https://ismailvtl-images-project.vercel.app/potted-plant-img.svg" alt="" /> -->
                            <div class="plan-details">
                                <span>PREMIUM MEMBERSHIP</span>
                                <p style="color:#004aad; font-size: 30px; font-weight:bold;">
                                    3000rs 
                                    <span style="color:#004aad; font-size: 15px; display:inline-block">
                                        [250rs/month]
                                    </span>
                                </p>

                                <p>2000rs Registration charge <br> + <br>
                                1000rs Annual renewal charge</p>
                            </div>
                            </div>
                        </label>
                        </div>
                      
                    
                      
                        </div>
				</div>
				
			</div>
		</div>
	</section>
   <!-- benifits  BENEFITS-->
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
    <a href="<?php echo base_url(); ?>signup" class="thm-btn mt-5" 
       style="color:#004aad;background:white; margin-bottom: 6%; margin-top: 20%; display: inline-block;">
        Join Now
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
    <a href="<?php echo base_url(); ?>signup" class="thm-btn mt-5" 
       style="color:#004aad;background:white; margin-bottom: 6%; margin-top: 20%; display: inline-block;">
        Join Now
    </a>
</div>

  </div>
</div>
    </section>
   <!-- foot -->
   <section class="footer-call-to-action">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<h3>INDIA’s FIRST HEALTHCARE NAVIGATION
                    PLATFORM</h3>
					<!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have lorem</p> -->
				</div>
				<div class="col-md-3">
					<a href="<?php echo base_url(); ?>ContactUs"  class="thm-btn inverse pull-right">NEED ASSISTANCE?</a>
				</div>
			</div>
		</div>
	</section>



<!-- footer -->
   <?php $this->load->view('Frontend/footer'); ?>


</body>

<script>
    $(document).ready(function() {
        // When the "Join Now" button is clicked, pass the selected plan to the signup page via URL
        $('#join-now-btn').on('click', function() {
            let selectedPlan = $('input[name="plan"]:checked').attr('id'); // Get selected radio button ID
            let selectedValue = (selectedPlan === 'basic') ? '1' : '2'; // Map "basic" to 1 and "complete" (premium) to 2
            if (selectedValue) {
                window.location.href = '<?php echo base_url(); ?>signup?plan=' + selectedValue; // Navigate to signup page with selected plan
            }
        });
    });
</script>
</html>