
	<header class="header">
		<div class="container">
			<div class="logo pull-left">
				<a href="<?php echo base_url(); ?>">
					<img src="<?php echo base_url(); ?>assets/web_assets/img/logo.png" alt="Awesome Image" />
				</a>
			</div>
			<div class="header-right-info pull-right clearfix">

				<div class="single-header-info">
					<div class="icon-box">
						<div class="inner-box">
							<i class="flaticon-telephone"></i>
						</div>
					</div>
					<div class="content">
						<h3>Call Now</h3>
						<p><b><a href="tel:+91 9611232519">+91 96112 32519</a></b></p>
					</div>
				</div>
				<?php if($this->session->userdata('user_login_id')) { ?>
                 <div class="single-header-info">
                  <label class="dropdown">

				  <div class="dd-button">
				    <?php echo $this->session->userdata('name') ?>
				  </div>

				  <input type="checkbox" class="dd-input" id="test">

				  <ul class="dd-menu">
				    <li><a href="<?php echo base_url().$this->session->userdata('url') ?>">Profile</a></li>
				    <li class="divider"></li>
				    <li><a href="<?php echo base_url(); ?>Login/Logout"> Logout</a></li>
				   
				  </ul>
				  
				</label>
			   </div>

		     	<?php }else{ ?>

					<div class="single-header-info">
					<a href="<?php echo base_url(); ?>login" 
						class="thm-btn">Login/Register</a>
				</div>

			<?php } ?>
			</div>
		</div>
	</header> <!-- /.header -->

	<style>
		.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
	margin-top:16px;
}

.modal-dialog {
position: absolute;
left: 0;
right: 0;
top: 0;
bottom: 0;
margin: auto;
/* width: 600px;
height:300px; */
}

*, *::before, *::after{
    box-sizing: border-box;    
}

.mf-social-side-list {
    position: fixed;
    top: 30vh;
    right: 10px;
    z-index: 100;
}
.mf-social-side-list ul {
    list-style: none;
    display: flex;
    flex-direction: column;
   padding: 0;
   margin:0
}
.mf-social-side-list ul li a {
    color: #ffffff;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    line-height: 35px;
    margin-top: 5px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    -webkit-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
    transition: all .3s ease-in-out;
}
.mf-social-side-list ul li a:hover {
    opacity: .9;
    -webkit-transform: translateY(-3px);
    transform: translateY(-3px);
}
.mf-social-side-list ul li a[href*='facebook'] {
    background: #3b5998;
}
.mf-social-side-list ul li a[href*='instagram'] {
    background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);;
}
.mf-social-side-list ul li a[href*='youtube'] {
    background: #c4302b;
}
.mf-social-side-list ul li a[href*='linkedin'] {
    background: #0077B5;
}
.mf-social-side-list ul li a[href*='twitter'] {
    background: #00acee;
}

	</style>


<div class="mf-social-side-list">
   <ul>
      <li>
         <a href="https://www.facebook.com/assisthealthsolutions" target="_blank"><i class="fa fa-facebook-f"></i></a>
      </li>
      <li>
         <a href="https://www.instagram.com/assist_health/" target="_blank"><i class="fa fa-instagram"></i></a>
      </li>
      <li>
         <a href="https://youtube.com/@assisthealth?si=q4ATCFr9M0gtD9LV" target="_blank"><i class="fa fa-youtube"></i></a>
      </li>
      <!-- <li>
         <a href="https://www.linkedin.com" target="_blank"><i class="fa fa-linkedin-in"></i></a>
      </li> -->
      <li>
         <a href="https://twitter.com/assisthealth" target="_blank" style="background:black">
			<!-- <i class="fa fa-twitter"></i> -->
			 <img src="<?php echo base_url(); ?>assets/web_assets/img/x.png">
		</a>
      </li>
   </ul>
</div>