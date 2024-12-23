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
                    <h2>Packages</h2>
                    <ul class="breadcumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><span>Packages</span></li>
                    </ul>
                    <span class="decor"><span class="inner"></span></span>
                </div>
            </div>
        </div>
    </section>



    <section class="blog-home sec-padding">
        <div class="container">

            <div class="row">
                <div class="col-md-4">
                    <div class="single-blog-post">
                        <div class="img-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/packages/1.jpg" alt="">
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <ul>
                                            <li><a href="<?php echo base_url(); ?>Seniorcare"><i class="fa fa-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">

                            <div class="content">
                                <a href="<?php echo base_url(); ?>Seniorcare">
                                    <h3>Senior Care</h3>
                                </a>
                               
                                <a href="<?php echo base_url(); ?>Seniorcare" class="thm-btn">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-blog-post">
                        <div class="img-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/packages/2.jpg" alt="">
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">

                            <div class="content">
                                <a href="<?php echo base_url(); ?>Post_hospitalCare">
                                    <h3>Hospital & Post Hospitalisation care
                                    </h3>
                                </a>
                               
                                <a href="<?php echo base_url(); ?>Post_hospitalCare" class="thm-btn">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-blog-post">
                        <div class="img-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/packages/3.jpg" alt="">
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <ul>
                                            <li><a href="<?php echo base_url(); ?>Maternity_care"><i class="fa fa-link"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">

                            <div class="content">
                                <a href="<?php echo base_url(); ?>Maternity_care">
                                    <h3>Maternity care

                                    </h3>
                                </a>
                               
                                <a href="<?php echo base_url(); ?>Maternity_care" class="thm-btn">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pt-30">
                <div class="col-md-4">
                    <div class="single-blog-post">
                        <div class="img-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/packages/4.jpg" alt="">
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <ul>
                                            <li><a href="<?php echo base_url(); ?>Mother_child_care"><i class="fa fa-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">

                            <div class="content">
                                <a href="<?php echo base_url(); ?>Mother_child_care">
                                    <h3>Mother & Child 
                                    </h3>
                                </a>
                               
                                <a href="<?php echo base_url(); ?>Mother_child_care" class="thm-btn">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-blog-post">
                        <div class="img-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/packages/5.jpg" alt="">
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <ul>
                                            <li><a href="<?php echo base_url(); ?>Cancer_care"><i
                                                        class="fa fa-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">

                            <div class="content">
                                <a href="<?php echo base_url(); ?>Cancer_care">
                                    <h3>Cancer care

                                    </h3>
                                </a>
                               
                                <a href="<?php echo base_url(); ?>Cancer_care" class="thm-btn">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-blog-post">
                        <div class="img-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/packages/6.jpg" alt="">
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <ul>
                                            <li><a href="<?php echo base_url(); ?>Surgery_care"><i class="fa fa-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">

                            <div class="content">
                                <a href="<?php echo base_url(); ?>Surgery_care">
                                    <h3>Surgery care
                                    </h3>
                                </a>
                               
                                <a href="<?php echo base_url(); ?>Surgery_care" class="thm-btn">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-blog-post">
                        <div class="img-box">
                            <img src="<?php echo base_url(); ?>assets/web_assets/img/packages/7.jpg" alt="">
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <ul>
                                            <li><a href="<?php echo base_url(); ?>Critical_care"><i class="fa fa-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">

                            <div class="content">
                                <a href="<?php echo base_url(); ?>Critical_care">
                                    <h3>Critical care
                                    </h3>
                                </a>
                               
                                <a href="<?php echo base_url(); ?>Critical_care" class="thm-btn">View More</a>
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
<script>
    $(document).ready(function(){

     

filter_data(1);

function filter_data(page)
{
       
 

    $('.filter_data').html('<div id="loading" style="" ></div>');
    $('#pagination_link').hide();
    var action = 'fetch_data';
    //var page = 1;

    var sale = get_filter('sale');
    var rent = get_filter('rent');
    var lease = get_filter('lease');
    var city = get_filter('city');
    var area = get_filter('area');
    var property_type = get_filter('property_type');
    console.log(property_type)
    $.ajax({
        url:"<?php echo base_url(); ?>Home/fetch_data/"+page,
        method:"POST",
        dataType:"JSON",
        //data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, ram:ram, storage:storage},
        data:{action:action, sale:sale, rent:rent,lease:lease,city:city,area:area,property_type:property_type},
        success:function(data)
        {
             $('.filter_data').html(data.product_list);
             $('#pagination_link').show();
                   // $('#pagination_link').html(data.pagination_link);
                    $('.pagination-box #pagination_link').html(data.pagination_link);
                   
                   // console.log(data.pagination_link)
              
           
        }
    })
}



function get_filter(class_name)
{
    var filter = [];
    $('.'+class_name+':checked').each(function(){
        filter.push($(this).val());
    });
    return filter;
}

$(document).on("click", ".pagination li a", function(event){
    event.preventDefault();
    var page = $(this).data("ci-pagination-page");
    filter_data(page);
});

$('.common_selector').click(function(){
    filter_data(1);
});



});



</script>
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

    </script>
</html>