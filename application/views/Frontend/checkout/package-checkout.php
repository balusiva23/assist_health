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
                    <h2>Hospital & Post Hospitalisation care
                    </h2>
                    <ul class="breadcumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><span>Hospital & Post Hospitalisation care</span></li>
                    </ul>
                    <span class="decor"><span class="inner"></span></span>
                </div>
            </div>
        </div>
    </section>

    <section class="sec-padding doctor-profile">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4"></div>
            <div class="col-md-4 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your Package</span>
                </h4>
                <ul class="infos list-group-item" style="margin-bottom: 5%;">
                    <li class="list-group-item"><span>Name</span> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;test</span></li>
                    <li class="list-group-item"><span>Email</span> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;test@gmail.com</span></li>
                    <li class="list-group-item"><span>Package</span> <span>Senior care</span></li>
                </ul>
                <ul class="infos list-group-item" style="margin-bottom: 5%;">
                    <li class="list-group-item"><span>Package Price</span> <span>&nbsp;&nbsp;2500 <small>/m</small></span></li> 
                    <li class="list-group-item"><span>Select Month</span>
                        <span>
                            <select name="numbers">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </span>
                    </li>
                </ul>
                <ul class="infos list-group-item" style="margin-bottom: 5%;">
                    <li class="list-group-item"><span>Total</span> <span id="total-amount">2500</span></li>
                    <li class="list-group-item"><span>GST(18%)</span> <span id="gst-amount">450</span></li>
                    <li class="list-group-item"><span>Total Amount</span> <span id="final-total">2950</span></li>
                </ul>

                <form class="card mt-5">
                    <div class="input-group">
                        <div class="input-group-append">
                            <button type="submit" class="thm-btn mt-4">Pay</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

 
</section>



<!-- footer -->
   <?php $this->load->view('Frontend/footer'); ?>




</body>


</html>
<script>
        $(document).ready(function() {
            const packagePrice = 2500; // Fixed package price
            const gstRate = 0.18; // 18% GST
            
            function updateTotal() {
                // Get selected month
                const selectedMonth = parseInt($('select[name="numbers"]').val());
                
                // Calculate total and GST
                const total = packagePrice * selectedMonth;
                const gst = total * gstRate;
                const finalTotal = total + gst;
                
                // Update the total and GST values in the document
                $('#total-amount').text(total.toFixed(2));
                $('#gst-amount').text(gst.toFixed(2));
                $('#final-total').text(finalTotal.toFixed(2));
            }
            
            // Attach the updateTotal function to the onchange event of the select element
            $('select[name="numbers"]').on('change', updateTotal);
            
            // Initialize total on page load
            updateTotal();
        });
    </script>

