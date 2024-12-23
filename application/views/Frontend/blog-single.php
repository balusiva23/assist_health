<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">


    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- css -->
     <?php $this->load->view('Frontend/link-css'); ?> 


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
                    <h2>Blog</h2>
                    <ul class="breadcumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li><span><?= $data->title?></span></li>
                    </ul>
                    <span class="decor"><span class="inner"></span></span>
                </div>
            </div>
        </div>
    </section>

 
	<section class="blog-home sec-padding blog-page blog-details">
		<div class="container">
			<div class="row">
				<div class="col-md-12 pull-left">
					<div class="single-blog-post">
						<div class="img-box  " style=" display: flex; justify-content: center; ">
							<img src="<?= base_url()?>assets/uploads/blog/<?=$data->thumnail?>" alt="" style="Width:600px">
						</div>
						<div class="content-box">
							<div class="date-box">
								<div class="inner">
									<div class="date">
										<b><?= $d?></b>
										<?= $m?>
									</div>
									<div class="comment">
                                    <?= $y?>
									</div>
								</div>
							</div>
							<div class="content">
								<a href="#"><h3><?= $data->title?></h3></a>
								<p><?= $data->content?></p> <br>
							
							</div>


						</div>
					</div>
				
					<div id="demo"></div>

				</div>
				<div class="col-md-4 pull-right">
			
			</div>
		</div>
	</section>

<!-- footer -->
   <?php $this->load->view('Frontend/footer'); ?>


</body>
<script>
	// Social icons
	$('#demo').socialSharingPlugin({

		// URL to share
		url: window.location.href,

		// get description from meta description tag
		description: $('meta[name=description]').attr('content'),

		// get title from title tag
		title: $('title').text(),

		enable: ['copy', 'facebook', 'twitter',  'linkedin',  'whatsapp']

		})
// 	$('#demo').socialSharingPlugin({
//     // URL to share
//     url: window.location.href,

//     // Get description from meta description tag
//     description: $('meta[name=description]').attr('content'),

//     // Get title from title tag
//     title: $('title').text(),

//     enable: [
//         'copy', 
//         '<a target="_blank">facebook</a>',
//         '<a target="_blank">twitter</a>',
//         '<a target="_blank">pinterest</a>',
//         '<a target="_blank">linkedin</a>',
//         '<a target="_blank">reddit</a>',
//         '<a target="_blank">stumbleupon</a>',
//         '<a target="_blank">pocket</a>',
//         '<a target="_blank">email</a>',
//         '<a target="_blank">whatsapp</a>'
//     ]
// });
     //
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

</html>