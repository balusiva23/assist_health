<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
   


    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- css -->
     <?php $this->load->view('Frontend/link-css'); ?> 



     <style>
  .img-box {
    overflow: hidden;
    position: relative;
    cursor: pointer;
}

.fullscreen-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.fullscreen-overlay img {
    max-width: 90%;
    max-height: 90%;
}

.fullscreen-overlay.active {
    display: flex;
}

.close-button {
    position: absolute;
    top: 20px;
    right: 20px;
    background: #fff;
    border: none;
    padding: 10px;
    cursor: pointer;
    font-size: 20px;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    text-align: center;
    line-height: 20px;
    z-index: 1001;
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
                    <h2>Senior care</h2>
                    <ul class="breadcumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><span>Senior care </span></li>
                    </ul>
                    <span class="decor"><span class="inner"></span></span>
                </div>
            </div>
        </div>
    </section>

    <section class="sec-padding doctor-profile">
        <div class="container">
            <div class="row">
                <div class="col-md-6 single-blog-post">
                <div class="img-box">
							<img src="<?php echo base_url(); ?>assets/web_assets/img/blog/1.jpg" alt="">
							<div class="overlay">
								<div class="box">
									<div class="content">
										<ul>
											<li><a href="#"><i class="fa fa-search-plus"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
                </div>
                <div class="col-md-6 single-team-member">
                    <h3>Senior care 
                    </h3>
                  
                        <p> &#10004; Personalized Healthcare Plan</p>
                        <p> &#10004; Regular health assessments</p>
                        <p> &#10004; Annual Comprehensive Health Checkup worth of 3,000 rs</p>
                        <p> &#10004; Discounts at our Associated Healthcare Providers  </p>
                        <p> &#10004; Home Medication Delivery </p>
                        <p> &#10004; Diagnostic Testing </p>
                        <p> &#10004; Education and Family Counselling </p>
                        <p> &#10004; SeniorCare Connect </p>
                        <p> &#10004; Ambulance Services</p>
                        <!-- <p> &#10004; Rehabilitation Support</p>
                        <p>&#10004;  Hospital Companion Service </p> -->
                        <p> &#10004; Doctor Appointments </p>
                        <p> &#10004; 15,000 rs /annum</p>
                   
                        <!-- <a href="<?php echo base_url(); ?>/package_checkout" class="thm-btn">Buy Now</a> -->
                   
                        <!-- <button type="button" id="buyNowBtn" data-href="<?php echo base_url(); ?>/package_checkout" class="thm-btn">Buy Now</button> -->
                        <a id="join-now-btn" href="#" class="thm-btn mt-5"
                            style="color:#004aad;background:white; display: inline-block;text-transform: capitalize;" data-toggle="modal" data-target="#package-modal">
                            Enquiry Now
                        </a>
                </div>
            </div>
        </div>
    </section>




<!-- footer -->
   <?php $this->load->view('Frontend/footer'); ?>




</body>


</html>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const imgBoxes = document.querySelectorAll('.img-box');
    const overlay = document.createElement('div');
    overlay.classList.add('fullscreen-overlay');
    document.body.appendChild(overlay);

    const overlayImg = document.createElement('img');
    overlay.appendChild(overlayImg);

    const closeButton = document.createElement('button');
    closeButton.classList.add('close-button');
    closeButton.innerHTML = '&times;';
    overlay.appendChild(closeButton);

    imgBoxes.forEach(imgBox => {
        imgBox.addEventListener('click', function() {
            const imgSrc = this.querySelector('img').src;
            overlayImg.src = imgSrc;
            overlay.classList.add('active');
        });
    });

    closeButton.addEventListener('click', function() {
        overlay.classList.remove('active');
    });

    overlay.addEventListener('click', function(event) {
        if (event.target === overlay) {
            overlay.classList.remove('active');
        }
    });
});



$(document).ready(function() {
    $('#buyNowBtn').click(function(event) {
      //  alert()
        event.preventDefault(); // Prevent the default link action

        var redirectUrl = $(this).data('href');

        // Send an AJAX request to check login status
        $.ajax({
            url: '<?= base_url("Home/check_login_status") ?>',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.logged_in) {
                    // If logged in, proceed with redirect
                    window.location.href = redirectUrl;
                } else {
                    // If not logged in, show alert or redirect to login
                    alert('Please log in to proceed.');
                    window.location.href = '<?= base_url("login") ?>';
                }
            }
        });
    });
});
    </script>