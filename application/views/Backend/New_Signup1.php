<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="SmartUniversity" />
 <title>Assist Health</title>
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
	<link href="<?php echo base_url(); ?>assets/backend_assets/fonts/font-awesome/v6/css/all.css" rel="stylesheet" type="text/css" />
	<!-- bootstrap -->
	<link href="<?php echo base_url(); ?>assets/backend_assets/bundles/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend_assets/css/login.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend_assets/css/theme_style.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend_assets/password.css">
	 <!-- favicon -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon.ico" />


   <link href="<?php echo base_url(); ?>assets/wnoty/wnoty.css" rel="stylesheet" type="text/css" />  
   <link href="<?php echo base_url(); ?>assets/wnoty/jquery-confirm.min.css" rel="stylesheet" type="text/css" />  
   <link href="<?php echo base_url(); ?>assets/css/countries.css" rel="stylesheet" type="text/css" />  
      <style type="text/css">
    .error{
      color: red;
    }
        @media screen and (max-width: 768px){
  .signup-image, .signin-image {
    display: none !important;
  }
}
/* .main{
  height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
.main::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('<?php echo base_url(); ?>assets/uploads/2.jpg') no-repeat center center;
    background-size: cover;
    opacity: 0.5;
    z-index: -1;
} */
body, html {
    margin: 0;
    padding: 0;
    height: 100%; /* Ensure the body covers the entire page */
}

.main {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh; /* Ensures it at least covers the viewport height */
    position: relative;
}

.main::before {
    content: '';
    position: fixed; /* Use fixed positioning */
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('<?php echo base_url(); ?>assets/uploads/2.jpg') no-repeat center center;
    background-size: cover;
    opacity: 0.5;
    z-index: -1;
}

   </style> 
</head>

<body>
	<div class="main">
		<!-- Sign up form -->
		<section class="signup">
			<div class="container">
				<div class="signup-content">

					<div class="signup-form">
						<h2 class="form-title">Sign up</h2>
						<form method="POST" class="register-form" id="register-form" action="<?php echo base_url('payment/initiate_payment'); ?>">
							<div class="form-group">
								<div class="">
									<input name="uname"  id="uname" type="text" placeholder="Enter Your Name"
										class="form-control input-height" required value="Siva" />
								</div>
							</div>
							<div class="form-group">
								<div class="">
									<input name="email" type="email" id="email" placeholder="Enter Your Email "
										class="form-control input-height" value="sivabs1234@gmail.com" />
								</div>
							</div>
         
                  <div class="form-group">
                <div class="input-group">
               

                  <div class="select-box">
                  <div class="selected-option">
                      <div>
                        <iconify-icon icon="flag:in-4x3"></iconify-icon>
                         <!--  <span class="iconify" data-icon="flag:gb-4x3"></span>
                          <strong>+44</strong> -->
                            <span class="iconify" data-icon="flag:in-4x3"></span>
                            <span class="phone-code">+91</span>
                            <!-- <i class="fas fa-caret-down"></i> -->
                      </div>
                      <!-- <input type="tel" name="tel" placeholder="Phone Number"> -->
                      
                  <input name="number" id="number" type="tel" placeholder="Enter Mobile Number"
                    class="form-control input-height" value="97866638678" required/>
                    <input type="hidden" name="code" id="code" value="+91">
                  
                  </div>
                  <div class="options">
                      <input type="text" class="search-box form-control" placeholder="Search Country Name">
                      <ol class="ol">

                      </ol>
                  </div>
              </div>
              </div>
              <label id="number-error" class="error" for="number" style=" display:none;">This field is required.</label>
              </div>
							<div class="form-group">
								<div class="">
									<input name="password" type="password" placeholder="Password" id="pswd"
										class="form-control input-height" required  value="Siva@123"/>
								</div>
								<span id="popover-password-top" class="hide pull-right block-help text-danger error"> Enter a strong password</span>
							</div>
								<!-- password validation -->
							 <div id="pswd_info" style="display: none;">
	                        <h4>Password must contain:</h4>
	                        <ul>
	                        <li id="letter" class="valid">At least <strong>one letter</strong></li>
	                        <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
	                        <li id="num" class="invalid">At least <strong>one number</strong></li>
	                        <li id="special" class="invalid">At least <strong>one special character</strong></li>
	                        <li id="length" class="invalid">At least <strong>8 characters</strong></li>
	                        </ul>
	                      </div>
							<div class="form-group " style=" margin-bottom: 0px;">
								<div class="">
									<input name="cpassword" type="password" id="cpassword"  placeholder="Confirm Password"
										class="form-control input-height" required value="Siva@123"/>
								</div>
								   <label><span id="popover-cpassword" class=" hide pull-right block-help text-danger error">Password don't match</span></label>

								
							</div>
						   <div class="form-group ">
                                               
                  <div class="">
                      <div class="form-check ">
                          <input type="checkbox" class="form-check-input  toggle-password" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Show Password</label>
                        </div>
                  </div>
                </div>
               <!-- Membership Plan Selection -->
<div class="form-group row">
    <label class="control-label " >Membership plan
        <span class="required"> </span>
    </label>
    <div class="">
        <select class="form-control input-height" name="plan" id="plan" required>
            <option value="">Select...</option>
            <option value="basic">Basic Membership</option>
            <option value="premium">Premium Membership</option>
        </select>
    </div>
</div>

<!-- Membership Details and Total Box (Initially Hidden) -->
<div class="profile-sidebar" id="total-box" style="width:290px; display: none;">
    <div class="card" style="box-shadow:none;padding:0">
        <div class="card-body no-padding height-9" style="padding: 15px;">
          <span id="plan-label"></span>
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item" style="border-top:0">
                    <b id="registration-label">Registration Charges</b> <a class="pull-right" id="registration">--</a>
                </li>
                <li class="list-group-item" id="annual-item" style="display: none;">
                    <b id="annual-label">Annual Charges</b> <a class="pull-right" id="annual">--</a>
                </li>
                <li class="list-group-item">
                    <b>GST (18%)</b> <a class="pull-right" id="gst">--</a>
                </li>
                <li class="list-group-item" style="border-bottom:0">
                    <b>Total (including GST)</b> <a class="pull-right" id="total">--</a>
                </li>
            </ul>
        </div>
    </div>
</div>
                <!--  -->
              <div class="">
              <input type="checkbox" id="accept_terms" name="accept_terms" required="" style="margin: 0;">
                You are accepting our
                 <a href="<?php echo base_url(); ?>/Terms_conditions" target="_blank">terms and conditions</a> and <a href="<?php echo base_url(); ?>/Privacy_policy" target="_blank">privacy policy</a>and <a href="<?php echo base_url(); ?>/Refund_policy" target="_blank">Refund policy</a> by clicking on 'Register'
              </div>
              <label id="accept_terms-error" class="error" for="accept_terms" style="display:none">Please accept terms and condition.</label>

              <div class="form-group form-button mt-5">
                <input type="hidden" name="amount" id="amount"/>
								<!-- <button class="btn btn-round btn-primary" type="submit" name="signup" id="savepass">Register</button> -->
								<button class="btn btn-round btn-primary" type="submit" name="signup" id="savepass">Buy Now</button>
							</div> 
						</form>
            <!-- <div class="signup-image">
      
            <a href="<?php echo base_url(); ?>login" class="signup-image-link">I am already member</a>
          </div> -->
          <div class="row">
           <div class="col text-left mt-5">
                    <a href="<?php echo base_url(); ?>" class="" style="font-size: 14px; color: #222; display: block; text-decoration: none"><i class="fa-solid fa-arrow-left"></i> Back To Home</a>
                </div>
                <div class="col text-right mt-5">
                <a href="<?php echo base_url(); ?>login" class="signup-image-link">I am already member</a>
                </div>
            </div>

					</div>
	 	   <div class="signup-image" style="margin: 0 42px; margin-top:45px">
						<figure><img src="<?php echo base_url(); ?>assets/backend_assets/img/pages/signup.jpg" alt="sing up image"></figure>
						<!-- <a href="<?php echo base_url(); ?>" class="signup-image-link"><i class="fa-solid fa-arrow-left"></i> Back To Home</a> -->
					</div> 
				</div>
			</div>
		</section>
	</div>
	<!-- start js include path -->
	<script src="<?php echo base_url(); ?>assets/backend_assets/bundles/jquery/jquery.min.js"></script>



	<!-- bootstrap -->
	<script src="<?php echo base_url(); ?>assets/backend_assets/bundles/bootstrap/js/bootstrap.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/wnoty/wnoty.js"></script>
    
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/countries.js"></script> 
    <script src="<?php echo base_url(); ?>assets/wnoty/jquery-confirm.min.js"></script>
     <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script> 

	<!-- end js include path -->
	<script>
     $(document).ready(function() {
        $('#popover-password-top').hide();
           $('#popover-cpassword').hide();
            //$('#savepass').prop('disabled', true);

          $('#pswd').keyup(function() {
            var pswd = $('#pswd').val();
            if (checkStrength(pswd) == false) {
                $('#savepass').attr('disabled', true);
               
            }else
            {
                $('#savepass').attr('disabled', false);
            }
        }).focus(function() {
            $('#pswd_info').show();
          }).blur(function() {
            $('#pswd_info').hide();
          });
             
        //check strong
      /*  if(!checkStrength(pswd)){
            $('#savepass').prop('disabled', true);  
        }*/
      
        $('#cpassword').blur(function() {
            if ($('#pswd').val() !== $('#cpassword').val()) {
                $('#popover-cpassword').removeClass('hide');
                $('#popover-cpassword').show();
                $('#savepass').attr('disabled', true);
            } else {
                $('#popover-cpassword').addClass('hide');
                $('#popover-cpassword').hide();
            }

        });
            $('#cpassword').on("change",function() {
            if ($('#pswd').val() === $('#cpassword').val()) {
               $('#popover-cpassword').addClass('hide');
                 $('#popover-cpassword').show();
                $('#savepass').attr('disabled', false);
            } else {
                $('#popover-cpassword').addClass('hide');
                  $('#popover-cpassword').hide();
            }
            
        });
 

  //you have to use keyup, because keydown will not catch the currently entered value
  //$('#pswd').keyup(function() {

    // set password variable
   // var pswd = $(this).val();

    //validate the length
     function checkStrength(pswd) {

    if (pswd.length < 8) {
      $('#length').removeClass('valid').addClass('invalid');
      $('#popover-password-top').show();
        $('#savepass').attr('disabled', true);
      
    } else {
      $('#length').removeClass('invalid').addClass('valid');
      $('#popover-password-top').hide();

    }

    //validate letter
    if (pswd.match(/[A-z]/)) {
      $('#letter').removeClass('invalid').addClass('valid');
    } else {
      $('#letter').removeClass('valid').addClass('invalid');
       $('#popover-password-top').show();
         $('#savepass').attr('disabled', true);
    }

    //validate uppercase letter
    if (pswd.match(/[A-Z]/)) {
      $('#capital').removeClass('invalid').addClass('valid');
    } else {
      $('#capital').removeClass('valid').addClass('invalid');
       $('#popover-password-top').show();
         $('#savepass').attr('disabled', true);
    }

    //validate number
    if (pswd.match(/\d/)) {
      $('#num').removeClass('invalid').addClass('valid');
    } else {
      $('#num').removeClass('valid').addClass('invalid');
       $('#popover-password-top').show();
         $('#savepass').attr('disabled', true);
    }
    //validate special char
    if (pswd.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
     $('#special').removeClass('invalid').addClass('valid');
    } else {
      $('#special').removeClass('valid').addClass('invalid');
       $('#popover-password-top').show();
         $('#savepass').attr('disabled', true);
    }

    }
  });

  //    $(document).on('click','#savepass',function(){
  //       event.preventDefault();
  //          $("#register-form").valid();
  //          var name = $("#uname").val();
  //          var email = $("#email").val();
  //           var password=$("#pswd").val();
  //           var password=$("#pswd").val();
  //           var number=$("#number").val();
           
  //        // if (number.length > 10) {
  //        //  return;
  //        // }
  //        const termsCheckbox = $("#accept_terms");
  // const errorMessage = $("#accept_terms-error");
  //           if (!termsCheckbox.is(":checked")) {
  //     // Update error message text (optional)
  //     errorMessage.text("You must agree to the terms and conditions");
  //     errorMessage.show();  // Display the error message
  //     event.preventDefault();  // Prevent form submission
  //   } 

  //       if(name != '' && password != '' && number != '' ){ //email != '' && 
       
  //        $.ajax({
  //       type:'post',
  //       url: '<?php echo base_url("Login/Savemember");?>',
  //       data: new FormData($("#register-form")[0]),
  //       contentType: false,
  //       processData: false, 
  //       success:function(resp){
  //       var data=$.parseJSON(resp);
  //       //console.log(data)
  //       if(data.status == 'success'){
  //       $('#register-form')[0].reset();
  //       $.wnoty({
  //       type: 'success',
  //       message: data.message,
  //       autohideDelay: 1000,
  //       position: 'top-right'

  //       });
  //       setTimeout(function(){
  //       window.location.href = '<?php echo base_url()?>login';
  //       },2000);
  //      }else if(data.status == 'error'){
      
  //             $.wnoty({
  //                   type: 'error',
  //                   message: data.message,
  //                   autohideDelay: 1000,
  //                   position: 'top-right'

  //                   });
  //       }
  //       },
  //       });
  //       }
     
  //       return false;
  //       })


       $(document).ready(function() {
      // Show/hide password
      $('.toggle-password').change(function() {
        var passwordInput = $('input[name="password"]');
        var confirmPasswordInput = $('input[name="cpassword"]');
        var passwordFieldType = passwordInput.attr('type');
        var confirmPasswordFieldType = confirmPasswordInput.attr('type');
        
        // Toggle password visibility for password field
        if (passwordFieldType === 'password') {
          passwordInput.attr('type', 'text');
        } else {
          passwordInput.attr('type', 'password');
        }
        
        // Toggle password visibility for confirm password field
        if (confirmPasswordFieldType === 'password') {
          confirmPasswordInput.attr('type', 'text');
        } else {
          confirmPasswordInput.attr('type', 'password');
        }
      });
      });

 
</script>

<script>


// $(document).on('click', '#savepass', function(event){
//     event.preventDefault();
    
//     // Validate the form
//     if ($("#register-form").valid()) {
//         var name = $("#uname").val();
//         var email = $("#email").val();
//         var password = $("#pswd").val();
//         var number = $("#number").val();
        
//         const termsCheckbox = $("#accept_terms");
//         const errorMessage = $("#accept_terms-error");

//         // Check if the terms and conditions are accepted
//         if (!termsCheckbox.is(":checked")) {
//             errorMessage.text("You must agree to the terms and conditions").show();
//             return;
//         }

//         if(name != '' && password != '' && number != '') {
//             // First, initiate the payment
//             $.ajax({
//                 type: 'POST',
//                 url: '<?php echo base_url("payment/initiate_payment"); ?>',
//                 data: new FormData($("#register-form")[0]),
//                 contentType: false,
//                 processData: false,
//                 success: function(resp){
//                     var data = $.parseJSON(resp);

//                     if(data.status == 'success'){
//                         $('#register-form')[0].reset();
//                         $.wnoty({
//                             type: 'success',
//                             message: data.message,
//                             autohideDelay: 1000,
//                             position: 'top-right'
//                         });

//                         // After successful payment, save member data
//                         saveMemberData(name, email, password, number);
//                     } else if(data.status == 'error'){
//                         $.wnoty({
//                             type: 'error',
//                             message: data.message,
//                             autohideDelay: 1000,
//                             position: 'top-right'
//                         });
//                     }
//                 }
//             });
//         }
//     } else {
//         // If form is not valid, prevent submission
//         event.preventDefault();
//     }

//     return false;
// });

// // Function to save member data
// function saveMemberData(name, email, password, number) {
//     $.ajax({
//         type: 'POST',
//         url: '<?php echo base_url("Login/Savemember"); ?>',
//         data: {
//             name: name,
//             email: email,
//             password: password,
//             number: number
//         },
//         success: function(resp) {
//             var data = $.parseJSON(resp);
//             if(data.status == 'success') {
//                 // Redirect or show success message
//                 $.wnoty({
//                     type: 'success',
//                     message: "Member saved successfully!",
//                     autohideDelay: 2000,
//                     position: 'top-right'
//                 });
                
//                 setTimeout(function(){
//                     window.location.href = '<?php echo base_url("some/other/page"); ?>'; // Change to desired page
//                 }, 2000);
//             } else {
//                 $.wnoty({
//                     type: 'error',
//                     message: data.message,
//                     autohideDelay: 1000,
//                     position: 'top-right'
//                 });
//             }
//         }
//     });
// }

$(document).on('click', '#savepass', function(event){
    event.preventDefault();

    // Validate the form
    if ($("#register-form").valid()) {
        var name = $("#uname").val();
        var email = $("#email").val();
        var password = $("#pswd").val();
        var number = $("#number").val();

        const termsCheckbox = $("#accept_terms");
        const errorMessage = $("#accept_terms-error");

        // Check if the terms and conditions are accepted
        if (!termsCheckbox.is(":checked")) {
            errorMessage.text("You must agree to the terms and conditions").show();
            return;
        }

        if(name != '' && password != '' && number != '') {
            // Set the values in the form before submitting
            $("input[name='name']").val(name);
            $("input[name='email']").val(email);
            $("input[name='password']").val(password);
            $("input[name='number']").val(number);

            // Directly submit the form to initiate payment
            $("#register-form").submit();
        }
    } else {
        // If form is not valid, prevent submission
        event.preventDefault();
    }

    return false;
});


    $(document).ready(function() {
        const gstRate = 0.18;

        function updateTotal() {
            // Get selected plan
            const selectedPlan = $('#plan').val();
            let registration, annual, total, gstAmount;

            if (selectedPlan === "basic") {
                registration = 1000;
                annual = 0;
                gstAmount = registration * gstRate;
                total = registration + gstAmount;

                // Hide annual charges for Basic plan and change labels dynamically
                $('#annual-item').hide();
                $('#plan-label').text("Basic Membership Details");
                $('#registration-label').text("Registration Charges");
            } else if (selectedPlan === "premium") {
                registration = 1000;
                annual = 2000;
                gstAmount = (registration + annual) * gstRate;
                total = registration + annual + gstAmount;

                // Show annual charges for Premium plan and change labels dynamically
                $('#annual-item').show();
                $('#plan-label').text("Premium Membership Details");
                $('#registration-label').text("Registration Charges");
                $('#annual-label').text("Annual Charges");
            } else {
                $('#total-box').hide();
                return; // If no valid plan selected, exit the function
            }

            // Update the values in the total box
            $('#registration').text("Rs " + registration);
            $('#annual').text(annual ? "Rs " + annual : "--");
            $('#gst').text("Rs " + gstAmount.toFixed(2));
            $('#total').text("Rs " + total.toFixed(2));
            $('#amount').val(total.toFixed(0));

            // Show the total box after value is selected
            $('#total-box').show();
        }

        // Attach the updateTotal function to the onchange event of the select element
        $('#plan').on('change', updateTotal);
    });
</script>
</body>
</html>