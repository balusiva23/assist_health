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
                        <li><span>Blog</span></li>
                    </ul>
                    <span class="decor"><span class="inner"></span></span>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-home sec-padding">
        <div class="container">
        <div class="row filter_data">
			
			</div>
            <!--  -->
           
            <div class="pagination-box hidden-mb-45 text-center">
                    <!-- <nav aria-label="Page navigation example" id="pagination_link">
                      
                    </nav> -->
                    <nav aria-label="Page navigation example" id="pagination_link" style="
    display: flex;
    justify-content: center;
">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                    </nav>
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

</html>