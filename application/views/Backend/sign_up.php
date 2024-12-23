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

/* html,body{
		height: 100%;
	  }
	  body{
		display: flex;
      align-items: center;
      justify-content: center;
	  } */

   
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }

    body {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .main1 {
        width: 100%;
        height: 100%;
    }

    .signup {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
    }

    .signup-content {
        width: 100%;
        max-width: 1200px;
    }

    .container {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
    }

    .form-title {
        text-align: center;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .input-height {
        height: 40px;
    }

    /* .btn-round {
        border-radius: 50px;
    } */

    .btn-primary {
        background-color: #007bff;
        border: none;
        color: white;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
        color: white;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
        color: white;
    }

    @media screen and (max-width: 768px) {
        /* .signup-content {
         
           padding: 10% 5% 0% 5%;
        }

        .form-title {
            font-size: 18px;
        } */

        .signup-content {
                padding: 20px 10px;
            }

            .form-title {
                font-size: 18px;
                margin-bottom: 10px;
            }

            .form-group {
                margin-bottom: 10px;
            }

            .input-height {
                height: 35px;
            }

            .btn-primary {
                width: 100%;
                margin-top: 10px;
            }

            .form-group input,
            .form-group select {
                width: 100%;
            }
    }
    .custom-field{
      background-color: white!important;
    }


   </style> 
   
</head>

<body class="main1">
	<div class="main" >
    <!-- main -->
    <!-- style=" height: 100vh;padding: 10px;" -->
		<!-- Sign up form -->
		<section class="signup">
			<div class="container" >
        <!-- style="width: 1200px;" -->
				<div class="signup-content">

					<div class="" style="width: 100%;">
            <!-- signup-form -->
						<h3 class="form-title text-center">New Member Registration Form <br><p>(2500 Per member)</p></h3>
						<form method="POST" class="register-form" id="register-form">
              <div class="row">
                <div class="col-md-4 col-12 mt-4">
                    <div class="form-group">
                <div class="">
                  <input name="uname"  id="uname" type="text" placeholder="Enter Your Name"
                    class="form-control input-height" required />
                </div>
              </div>
                </div>
                <div class="col-md-4 col-12 mt-4">
                  <div class="form-group">
                <div class="">
                  <input name="email" type="email" id="email" placeholder="Enter Your Email "
                    class="form-control input-height" />
                </div>
              </div>
                </div> 
                <div class="col-md-4 col-12 mt-4">
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
                    class="form-control input-height"  required/>
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
                </div>
                
              </div>
              
            <div class="row">
                <div class="col-md-4 col-12 mt-4">
                    <div class="form-group">
                        <div class="">
                            <input name="dob" id="dob" type="date" placeholder="Enter Your Date of Birth"
                                   class="form-control input-height" required />
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12 mt-4">
                    <div class="form-group">
                        <div class="">
                            <select name="gender" id="gender" class="form-control input-height" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12 mt-4">
                    <div class="form-group">
                        <div class="">
                            <input name="address" id="address" type="text" placeholder="Enter Your Address"
                                   class="form-control input-height" required />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mt-4">
                    <div class="form-group">
                    <label class="control-label ">Enter Promo code (optional)<span class="required"> </span> </label>
                        <div class="">
                            <input name="promo_code" id="promo_code" type="text" placeholder="Enter Promo code (optional)"
                                   class="form-control input-height"  />
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mt-4">
                    <div class="form-group">
                    <label class="control-label ">Enter Referal Id (optional)<span class="required">  </span> </label>
                        <div class="">
                            <input name="referal_id" id="referal_id" type="text" placeholder="Enter Referal Id (optional)"
                                   class="form-control input-height"  />
                        </div>
                    </div>
                </div>
            </div>

              <h4 class="mt-2">Add Members  <button type="button" class="btn btn-round btn-success" id="add-member">+</button></h4>
            <div id="form-container">
              <!-- <div class="member-container row">
                <div class="col-md-3 col-12 mt-2">
                  <div class="form-group">
                    <input type="text" name="mname[]" class="form-control input-height" required placeholder="Enter Name">
                  </div>
                </div>
                <div class="col-md-3 col-12 mt-2">
                  <div class="form-group">
                    <input type="date" name="mdob[]" class="form-control input-height" required>
                  </div>
                </div>
                <div class="col-md-2 col-12 mt-2">
                  <div class="form-group">
                    <select name="mgender[]" required class="form-control input-height" placeholder="Select Gender">
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                      <option value="other">Other</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3 col-12 mt-2">
                  <div class="form-group">
                    <input type="text" name="relationship[]" class="form-control input-height" required placeholder="Relationship with Primary Member">
                  </div>
                </div>
            
                <div class="col  mt-2">
                  <div class="form-group">
                    <button type="button" class="btn btn-round btn-success" id="add-member">+</button>
                  </div>
                </div>
              </div> -->
            </div>
            <div class="row mt-4 justify-content-end">
    <div class="col-md-4">
        <div class="form-group row">
            <label for="total" class="col-sm-5 col-form-label text-right">Total:    &nbsp; &nbsp; </label>
            <div class="col-sm-7">
                <input type="text" id="total" name="total" class="form-control input-height custom-field total1" readonly>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-end">
    <div class="col-md-4 mt-4">
        <div class="form-group row ">
            <label for="promo_discount" class="col-sm-5 col-form-label text-right">Promo code Discount:</label>
            <div class="col-sm-7">
                <input type="text" id="promo_discount" name="promo_discount" class="form-control input-height custom-field" readonly>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-end">
    <div class="col-md-4">
        <div class="form-group row">
            <label for="referral_discount" class="col-sm-5 col-form-label text-right">Referral Discount:</label>
            <div class="col-sm-7">
                <input type="text" id="referral_discount" name="referral_discount"  value="0" class="form-control input-height custom-field" readonly>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-end">
    <div class="col-md-4">
        <div class="form-group row">
            <label for="total_amount" class="col-sm-5 col-form-label text-right">Total Amount:</label>
            <div class="col-sm-7">
                <input type="text" id="total_amount" name="total_amount" class="form-control input-height custom-field total2" readonly>
            </div>
        </div>
    </div>
</div>




            <div class="row">

              <div class="col-md-10 mt-4">
              <input type="checkbox" id="accept_terms" name="accept_terms" required="" style="margin: 0;">
                You are accepting our
                 <a href="<?php echo base_url(); ?>/Terms_conditions" target="_blank">terms and conditions</a> and <a href="<?php echo base_url(); ?>/Privacy_policy" target="_blank">privacy policy</a>and <a href="<?php echo base_url(); ?>/Refund_policy" target="_blank">Refund policy</a> by clicking on 'Register'
              </div>
              <label id="accept_terms-error" class="error" for="accept_terms" style="display:none">Please accept terms and condition.</label>
            </div>
            <div class="row">
						 	<div class="form-group form-button mt-4 text-right" >
               <input type="hidden" id="promo_percentage" value="0">
                <input type="hidden" id="referral_discount1" value="0">

								<button class="btn btn-round btn-primary" type="submit" name="signup" id="savepass" style="float: right;">Register</button>
							</div>
							</div>
						</form>
            <!-- <div class="signup-image">
      
            <a href="<?php echo base_url(); ?>login" class="signup-image-link">I am already member</a>
          </div> -->
          <div class="row">
           <div class="col-md-6  col-sm-3 text-left mt-5">
                    <a href="<?php echo base_url(); ?>" class="" style="font-size: 14px; color: #222; display: block; text-decoration: none"><i class="fa-solid fa-arrow-left"></i> Back To Home</a>
                </div>
                <div class="col-md-6 col-md-3 text-right mt-5">
                <a href="<?php echo base_url(); ?>login" class="signup-image-link" style="float: right;">I am already member</a>
                </div>
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

     $(document).on('click','#savepass',function(){
        event.preventDefault();
           $("#register-form").valid();
           var name = $("#uname").val();
           var email = $("#email").val();
            var password=$("#pswd").val();
            var password=$("#pswd").val();
            var number=$("#number").val();


             // new
             const termsCheckbox = $("#accept_terms");
  const errorMessage = $("#accept_terms-error");
            if (!termsCheckbox.is(":checked")) {
      // Update error message text (optional)
      errorMessage.text("You must agree to the terms and conditions");
      errorMessage.show();  // Display the error message
      event.preventDefault();  // Prevent form submission
    } 
            // new
           
         // if (number.length > 10) {
         //  return;
         // }
     

        if(name != ''  && email != '' && number != '' ){ //email != '' &&  && password != ''
       
         $.ajax({
        type:'post',
        url: '<?php echo base_url("Login/SaveNewMember");?>', //Savemember
        data: new FormData($("#register-form")[0]),
        contentType: false,
        processData: false, 
        success:function(resp){
        var data=$.parseJSON(resp);
        //console.log(data)
        if(data.status == 'success'){
        $('#register-form')[0].reset();
        $.wnoty({
        type: 'success',
        message: data.message,
        autohideDelay: 1000,
        position: 'top-right'

        });
        setTimeout(function(){
        window.location.href = '<?php echo base_url()?>login';
        },2000);
       }else if(data.status == 'error'){
      
              $.wnoty({
                    type: 'error',
                    message: data.message,
                    autohideDelay: 1000,
                    position: 'top-right'

                    });
        }
        },
        });
        }
     
        return false;
        })


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


// -----------------------------------------------------------------------



//New code
// $(document).ready(function() {
//     // Initial values
//     $('.total1').val(2500);
//     $('.total2').val(2500);

//     // Add member
//     $(document).on('click', '#add-member', function() {
//         calcTotal();
//     });

//     // Promo code change
//     $(document).on('change', '#promo_code', function() {
//         calcTotal();
//     });

//     // Referral code change
//     $(document).on('change', '#referal_id', function() {
//         calcTotal();
//     });

//     // Remove member
//     $("#form-container").on("click", ".remove-member", function() {
//         $(this).closest(".member-container").remove();
//         calcTotal();
//     });

//     // Common function to calculate total
//     function calcTotal() {
//         let baseAmount = 2500;
//         let sum = baseAmount;

//         // Sum up all member amounts
//         $('#form-container .member_amount').each(function() {
//             if ($(this).val() != "") {
//                 sum += parseFloat($(this).val());
//             }
//         });

//         // Apply promo code discount
//         let promoCode = $('#promo_code').val();
//         let promoDiscount = 0;
//         if (promoCode === 'PROMO10') {
//             promoDiscount = sum * 0.10;
//         }

//         // Apply referral code discount
//         let referralCode = $('#referal_id').val();
//         let referralDiscount = 0;
//         if (referralCode === 'AAA01') {
//             referralDiscount = 100;
//         }

//         // Calculate final amount
//         let finalAmount = sum - promoDiscount - referralDiscount;

//         // Update the total fields
//         $('.total1').val(sum.toFixed(0));
//         $('.total2').val(finalAmount.toFixed(0));

//         // Update discount fields
//         if (promoDiscount > 0) {
//             $('#promo_discount').val('-' + promoDiscount.toFixed(0));
//         } else {
//             $('#promo_discount').val('');
//         }

//         if (referralDiscount > 0) {
//             $('#referral_discount').val('-' + referralDiscount.toFixed(0));
//         } else {
//             $('#referral_discount').val('');
//         }

//         // Debug logs
//         console.log("Total Amount: " + sum);
//         console.log("Promo Discount: " + promoDiscount);
//         console.log("Referral Discount: " + referralDiscount);
//         console.log("Final Amount: " + finalAmount);
//     }
// });

//New code
//New code 1
// $(document).ready(function() {
//     // Initial values
//     $('.total1').val(2500);
//     $('.total2').val(2500);

//     // Add member
//     $(document).on('click', '#add-member', function() {
//         calcTotal();
//     });

//     // Promo code change
//     $(document).on('change', '#promo_code', function() {
//         fetchPromoCode();
//     });

//     // Referral code change
//     $(document).on('change', '#referal_id', function() {
//         checkReferralCode();
//     });

//     // Remove member
//     $("#form-container").on("click", ".remove-member", function() {
//         $(this).closest(".member-container").remove();
//         calcTotal();
//     });

//     // Fetch promo code details
//     function fetchPromoCode() {
//         let promoCode = $('#promo_code').val();
//         $.ajax({
//             url: 'Login/get_promo',
//             type: 'POST',
//             data: { promo_code: promoCode },
//             dataType: 'json',
//             success: function(response) {
//                 $('#promo_percentage').val(response.percentage);
//                 calcTotal();
//             },
//             error: function() {
//                 alert('Error fetching promo code details.');
//             }
//         });
//     }

//     // Check referral code details
//     function checkReferralCode() {
//         let referralCode = $('#referal_id').val();
//         $.ajax({
//             url: 'Login/check_referral',
//             type: 'POST',
//             data: { referral_id: referralCode },
//             dataType: 'json',
//             success: function(response) {
//                 if (response.valid) {
//                 console.log(response.valid);
//                     $('#referral_discount').val(100);
//                 } else {
//                     $('#referral_discount').val(0);
//                 }
//                 calcTotal();
//             },
//             error: function() {
//                 alert('Error checking referral ID.');
//             }
//         });
//     }

//     // Common function to calculate total
//     function calcTotal() {
//         let baseAmount = 2500;
//         let sum = baseAmount;

//         // Sum up all member amounts
//         $('#form-container .member_amount').each(function() {
//             if ($(this).val() != "") {
//                 sum += parseFloat($(this).val());
//             }
//         });

//         // Get promo discount percentage
//         let promoPercentage = parseFloat($('#promo_percentage').val()) || 0;
//         let promoDiscount = sum * (promoPercentage / 100);

//         // Get referral discount
//         let referralDiscount = parseFloat($('#referral_discount').val()) || 0;

//         // Calculate final amount
//         let finalAmount = sum - promoDiscount - referralDiscount;

//         // Update the total fields
//         $('.total1').val(sum.toFixed(0));
//         $('.total2').val(finalAmount.toFixed(0));

//         // Update discount fields
//         if (promoDiscount > 0) {
//             $('#promo_discount').val('-' + promoDiscount.toFixed(0));
//         } else {
//             $('#promo_discount').val('');
//         }

//         if (referralDiscount > 0) {
//             $('#referral_discount').val('-' + referralDiscount.toFixed(0));
//         } else {
//             $('#referral_discount').val('');
//         }

//         // Debug logs
//         console.log("Total Amount: " + sum);
//         console.log("Promo Discount: " + promoDiscount);
//         console.log("Referral Discount: " + referralDiscount);
//         console.log("Final Amount: " + finalAmount);
//     }
// });

//New code 1
//New code 2
$(document).ready(function() {
    // Initial values
    $('.total1').val(2500);
    $('.total2').val(2500);

    // Add member
    $(document).on('click', '#add-member', function() {
        calcTotal();
    });

    // Promo code change
    $(document).on('change', '#promo_code', function() {
        fetchPromoCode();
    });

    // Referral code change
    $(document).on('change', '#referal_id', function() {
        checkReferralCode();
    });

    // Remove member
    $("#form-container").on("click", ".remove-member", function() {
        $(this).closest(".member-container").remove();
        calcTotal();
    });

    // Fetch promo code details
    function fetchPromoCode() {
        let promoCode = $('#promo_code').val();
        $.ajax({
            url: 'Login/get_promo',
            type: 'POST',
            data: { promo_code: promoCode },
            dataType: 'json',
            success: function(response) {
                $('#promo_percentage').val(response.percentage);
                calcTotal();
            },
            error: function() {
                alert('Error fetching promo code details.');
            }
        });
    }

    // Check referral code details
    function checkReferralCode() {
        let referralCode = $('#referal_id').val();
        $.ajax({
            url: 'Login/check_referral',
            type: 'POST',
            data: { referral_id: referralCode },
            dataType: 'json',
            success: function(response) {
                if (response.valid) {
                    $('#referral_discount').val(100);
                    $('#referral_discount1').val(100);
                } else {
                    $('#referral_discount').val(0);
                    $('#referral_discount1').val(0);
                }
                calcTotal();
            },
            error: function() {
                alert('Error checking referral ID.');
            }
        });
    }

    // Common function to calculate total
    function calcTotal() {
        let baseAmount = 2500;
        let sum = baseAmount;

        // Sum up all member amounts
        $('#form-container .member_amount').each(function() {
            if ($(this).val() != "") {
                sum += parseFloat($(this).val());
            }
        });

        // Get promo discount percentage
        let promoPercentage = parseFloat($('#promo_percentage').val()) || 0;
        let promoDiscount = sum * (promoPercentage / 100);

        // Get referral discount
        let referralDiscount = parseFloat($('#referral_discount1').val()) || 0;
       console.log(referralDiscount);
        // Calculate final amount
        let finalAmount = sum - promoDiscount - referralDiscount;

        // Update the total fields
        $('.total1').val(sum.toFixed(0));
        $('.total2').val(finalAmount.toFixed(0));

        // Update discount fields
        if (promoDiscount > 0) {
            $('#promo_discount').val('-' + promoDiscount.toFixed(0));
        } else {
            $('#promo_discount').val('');
        }

        if (referralDiscount > 0) {
            $('#referral_discount').val('-' + referralDiscount.toFixed(0));
            $('#referral_discount1').val( referralDiscount.toFixed(0));
        } else {
            $('#referral_discount').val('');
            $('#referral_discount1').val('');
        }

        // Debug logs
        console.log("Total Amount: " + sum);
        console.log("Promo Discount: " + promoDiscount);
        console.log("Referral Discount: " + referralDiscount);
        console.log("Final Amount: " + finalAmount);
    }
});

//New code 2

 $(document).ready(function () {

 
 

    // Initialize the total value
   var memberCount = 1
    $('#add-member').click(function() {
  memberCount++;
  $('#form-container').append('<div id="member-row-' + memberCount + '" class="member-container row">' +
    '<div class="col-md-3 mt-2">' +
    '<div class="form-group">' +
    '<input type="text" name="mname[]" class="form-control input-height" required placeholder="Enter Name">' +
    '</div>' +
    '</div>' +
    '<div class="col-md-3 mt-2">' +
    '<div class="form-group">' +
    '<input type="date" name="mdob[]" class="form-control input-height" required>' +
    '</div>' +
    '</div>' +
    '<div class="col-md-2 mt-2">' +
    '<div class="form-group">' +
    '<select name="mgender[]" required class="form-control input-height" placeholder="Select Gender">' +
    '<option value="male">Male</option>' +
    '<option value="female">Female</option>' +
    '<option value="other">Other</option>' +
    '</select>' +
    '</div>' +
    '</div>' +
    '<div class="col-md-3 mt-2">' +
    '<div class="form-group">' +
    '<input type="text" name="relationship[]" class="form-control input-height" required placeholder="Relationship with Primary Member">' +
    '</div>' +
    '</div>' +
    '<div class="col-md-1 mt-2">' +
    '<div class="form-group">' +
    '<input type="hidden" class="member_amount" name="member_amount" value="2500">' +
    '<button type="button" name="remove" id="member-' + memberCount + '" class="remove-member btn btn-danger">X</button>' +
    '</div>' +
    '</div>' +
    // '<div class="col-md-2 mt-2">' +
    // '<div class="form-group">' +
    // '<button type="button" class="btn btn-round btn-success add-member">Add</button>' +
    // '</div>' +
    '</div>' +
    '</div>');
});
});
     
</script>
</body>
</html>