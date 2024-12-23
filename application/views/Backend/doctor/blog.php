<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="RedstarHospital" />
    <title>Admin Panel</title>
 <!-- css -->
     <?php $this->load->view('Backend/doctor/doctor-temp/link-css'); ?>
     
     <style>
        .intro-content {
    max-height: 50px; /* Initial collapsed height */
    overflow: hidden;
    transition: max-height 0.5s ease-in-out;
}
.intro-more {
    display: inline;
}
.intro-full {
    display: block;
}
     </style>
</head>
<!-- END HEAD -->

<body
    class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
        <!-- start header -->
         <!-- start header -->
         <?php $this->load->view('Backend/doctor/doctor-temp/header'); ?> 
          

        <div class="page-container">
            <!-- start sidebar menu -->
                <?php $this->load->view('Backend/doctor/doctor-temp/sidebar'); ?> 
            <!-- end sidebar menu -->
            <!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Blog</div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <!--   <a href="#" class="tblEditBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="74">
                                                                            <i class="fa fa-pencil"></i>
                                                                        </a> -->

                          <div class="d-flex justify-content-end">
                                  <a type="button" data-bs-toggle="modal" data-bs-target="#smallModel" 
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary text-right"  style="text-transform: capitalize;">Add Blog</a>
                                    </div>
                            <div class="tabbable-line">

                                <div class="tab-content">
                                    <div class="tab-pane active fontawesome-demo" id="tab1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-head">
                                                        <header></header>
                                                        <div class="tools">
                                                            <a class="fa fa-repeat btn-color box-refresh"
                                                                href="javascript:;"></a>
                                                            <a class="t-collapse btn-color fa fa-chevron-down"
                                                                href="javascript:;"></a>
                                                            <a class="t-close btn-color fa fa-times"
                                                                href="javascript:;"></a>
                                                        </div>
                                                    </div>
                                                    <div class="card-body ">
                                                    
                                                        <table
                                                            class="table table-striped table-bordered table-hover table-checkable order-column full-width"
                                                            id="example_tbl">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center" style="width: 10%;">S.No</th>
                                                                    <th class="center" style="width: 40%;text-align:center"> Title </th>
                                                                    <th class="center" style="width: 40%;text-align:center">Image </th>
                                                                    <th class="center" style="width: 40%;text-align:center">Content </th>
                                                                   
                                                                    <th class="center" style="width: 10%;"> Update / Delete</th>
                                                                </tr>
                                                            </thead>
                                                  
                                             <tbody>
                                                <?php

                                                 if (!empty($timeSlots)) {
                                                    $count = 1;
                                                    foreach ($timeSlots as $navigator) {

                                                        // $intro = $navigator->content;
                                                        // $intro_words = explode(' ', $intro);
                                                        // $intro_short = implode(' ', array_slice($intro_words, 0, 10));
                                                        // $intro_remaining = implode(' ', array_slice($intro_words, 10));

                                                        $full_content = $navigator->content;
                                                        $intro_words = explode(' ', strip_tags($full_content)); // Stripped tags for word slicing
                                                        
                                                        // Short intro with the first 20 words
                                                        $intro_short = implode(' ', array_slice($intro_words, 0, 10));
                                                     
                                                ?>
                                                        <tr class="odd gradeX" data-id="<?=$navigator->id;?>">
                                                             <?php //echo $navigator->name; ?>
                                                            <td class="center"><?php echo $count; ?></td>
                                                            <td class="center"><?php echo $navigator->title; ?></td>
                                                            <td class="center"> <img src="<?php echo base_url(); ?>assets/uploads/blog/<?php echo $navigator->thumnail ?>" alt="" class="img-fluid" style="width: 50px;"></td>
                                                                    <!-- <td class="center" style="text-align: justify;width:15%">         
                                    <span class="intro-short"><?php echo $intro_short; ?></span>
                                                                <?php if (!empty($intro_remaining)) { ?>
                                                                    <span class="intro-more" style="display: none;cursor: pointer;"><?php echo $intro_remaining; ?></span>
                                                                    <a class="read-more-btn" style="cursor: pointer;" onclick="toggleIntro(this)">Read More</a>
                                                                <?php } ?></td> -->
                                                           
                                                 
                                                                <td class="center" style="text-align: justify;width:15%">
                                                    <div class="intro-content">
                                                        <span class="intro-short"><?php echo $intro_short; ?>...</span>
                                                        <?php if (strlen($full_content) > strlen($intro_short)) { ?>
                                                            <span class="intro-full" style="display: none;"><?php echo $full_content; ?></span>
                                                            <a class="read-more-btn" style="cursor: pointer;" onclick="toggleIntro(this)">Read More</a>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                                        
                                                        

                                                            
                                                            <td class="center">
                                                                <a href="#" class="tblEditBtn" data-id="<?php echo $navigator->id; ?>">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                <a href="#" class="delete tblDelBtn" data-id="<?php echo $navigator->id; ?>">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                <?php
                                                        $count++;
                                                    }
                                                }

                                                 ?>
                                                </tbody>


                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end admited patient list -->
                </div>
            </div>
            <!-- end page content -->
            <!-- start chat sidebar -->

            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
     <?php $this->load->view('Backend/doctor/doctor-temp/footer'); ?> 

    <div class="modal fade" id="smallModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <form  id="form_sample_add" class="form-horizontal" method="post " enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Add Blog
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                                <label class="control-label col-md-3"> Title
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-8">
                                    <input type="text" name="title"  id="title" data-required="1" placeholder="Enter Title"
                                        class="form-control input-height" required />
                                </div>
                               
                            </div>
                    <div class="form-group row">
                                <label class="control-label col-md-3"> Image
                                    <span class="required"> * </span>
                                </label>
                            
                                <div class="col-md-8">
                                    <!-- <input type="text" name="percentage" id="percentage" data-required="1" placeholder="Enter Percentage"
                                        class="form-control input-height" required /> -->
                                        <input type="file"  class="form-control input-height" name="thumnail" id="thumnail" required>
                                </div>
                            </div>
                    <div class="form-group row">
                                <label class="control-label col-md-3"> Description
                                    <span class="required"> * </span>
                                </label>
                            
                                <div class="col-md-8">
                                <!-- <textarea id="content"  class="form-control input-height" name="content"></textarea> -->
                                <textarea id="content" class="mymce content" name="content[]"></textarea>
                                </div>
                            </div>

                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        aria-label="Close">Cancel</button>
                    <button type="button" class="btn btn-primary" id="save_nav">Save</button>
                </div>
            </div>
            </form>
        </div>
    </div>


    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
             <form  id="form_sample_1" class="form-horizontal" method="post " enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Update Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="form-group row">
                                <label class="control-label col-md-3"> Title
                                    <span class="required"> * </span>
                                </label>
                                <div class="col-md-8">
                                    <input type="text" name="title"  id="title1" data-required="1" placeholder="Enter Title"
                                        class="form-control input-height" required />
                                </div>
                               
                            </div>
                    <div class="form-group row">
                                <label class="control-label col-md-3"> Image
                                    <span class="required"> * </span>
                                </label>
                            
                                <div class="col-md-8">
                                    <!-- <input type="text" name="percentage" id="percentage" data-required="1" placeholder="Enter Percentage"
                                        class="form-control input-height" required /> -->
                                        <input type="file"  class="form-control input-height" name="thumnail" id="thumnail1" >
                                </div>
                            </div>
                    <div class="form-group row">
                                <label class="control-label col-md-3"> Description
                                    <span class="required"> * </span>
                                </label>
                            
                                <div class="col-md-8">
                                <!-- <textarea id="content"  name="content" class="form-control input-height"></textarea> -->
                                <textarea id="content1" class="mymce content" name="content[]"></textarea>
                                </div>
                            </div>

                        
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary"  id="update">update</button>
                </div>
                  </form>
            </div>
        </div>
    </div>
    <!-- end js include path -->
<script>
    $(document).ready(function() {

          $('#example_tbl').DataTable({

      });
 // smallModel

    //       $(document).on('click','#save_nav',function(){
    //     event.preventDefault();
    //     $("#form_sample_add").valid();


       
    //      var slot = $("input[name='slot']").val();
    //     var start_time = $("select[name='start_time']").val();
    //     var end_time = $("input[name='end_time']").val();
     

    // // Check if all required fields are filled out
    // if (slot !== '' &&  start_time !== '' && end_time !== '' ) {
          


    //     $.ajax({
    //     type:'post',
    //     url: '<?php echo base_url("Doctor/add_Blog");?>',
    //     data: new FormData($("#form_sample_add")[0]),
    //     contentType: false,
    //     processData: false, 
    //     success:function(resp){
    //     var data=$.parseJSON(resp);
    //     if(data.status == 'success'){
    //     $('#form_sample_add')[0].reset();

    //       $('#smallModel').modal('hide');
    //      $(".modal-backdrop").remove();
    //     $.wnoty({
    //     type: 'success',
    //     message: data.message,
    //     autohideDelay: 1000,
    //     position: 'top-right'

    //     });
    //              setTimeout(function(){
    //      location.reload(true);
    //     },2000);

    //     }else if(data.status == 'error'){

    //       $.wnoty({
    //             type: 'error',
    //             message: data.message,
    //             autohideDelay: 2000,
    //             position: 'top-right'

    //             });
    //     }
    //     },
    //     });
    //     } else {

    //     }

    //     return false;
    //     })

  

          $('#example_tbl').on('click', '.tblEditBtn', function() {
       // $('.tblEditBtn').click(function() {
            // Get the data attributes from the button
            var id = $(this).data('id');
            

            // Make an AJAX request to retrieve the data for the ID
            $.ajax({
                url: '<?php echo base_url("Doctor/getBlog_codeByID"); ?>?id=' + id,
                method: 'GET',
                data: { id: id },
                dataType: 'json',
                success: function(response) {
                    // Populate the modal with the data returned from the server
                    $('#staticBackdrop [name="id"]').val(response.id);
                    $('#staticBackdrop [name="title"]').val(response.title);
                   // $('#staticBackdrop [name="content"]').val(response.content);
                // Set content in TinyMCE
         // Set content in TinyMCE
         tinymce.get('content1').setContent(response.content);
           
               
                     // Open the modal
                    $('#staticBackdrop').modal('show');
                },
                error: function(xhr, status, error) {
                    console.log(error); // Handle the error if any
                }
            });
        });
    });

         $(document).on('click','#update',function(){
        event.preventDefault();
           $("#form_sample_1").valid();
         
        var contentArray = [];
        var title = $("#title1").val();
        var id = $("#id").val();
        var thumnail = $("#thumnail1").prop('files')[0]; // Fetch the selected file
    // Iterate through all TinyMCE instances and retrieve content
    $('.mymce').each(function() {
        var editorId = $(this).attr('id');
        var content = tinymce.get(editorId).getContent();
        contentArray.push(content);
    });

    var formData = new FormData();
            formData.append('title', title);
            formData.append('thumnail', thumnail);
            formData.append('content',contentArray);
            formData.append('id', id); // Convert to JSON string

         $.ajax({
        type:'post',
        url: '<?php echo base_url("Doctor/add_Blog");?>',//update_Blog
        //data: new FormData($("#form_sample_1")[0]),
        data:formData,
        contentType: false,
        processData: false, 
        success:function(resp){
        var data=$.parseJSON(resp);
        if(data.status == 'success'){
        $('#form_sample_1')[0].reset();
          $('#staticBackdrop').modal('hide');
         $(".modal-backdrop").remove();

        $.wnoty({
        type: 'success',
        message: data.message,
        autohideDelay: 1000,
        position: 'top-right'

        });
         setTimeout(function(){
         location.reload(true);
        },2000);
  


       }else if(data.status == 'error'){
       
        $('#staticBackdrop').modal('hide');
         $(".modal-backdrop").remove();
              $.wnoty({
                    type: 'error',
                    message: data.message,
                    autohideDelay: 2000,
                    position: 'top-right'

                    });
               setTimeout(function(){
         location.reload(true);
        },2000);
        }
        },
        });
       
     
        return false;
        })

         //delete
    $(document).on('click','.delete', function (e) {
    //var id = $(this).parents('tr').find('#id').val();
    var id = $(this).attr('data-id');
   $.confirm({
    title: 'Delete Warning!',
    content: 'Are you sure, you want to delete this?',
    boxWidth: '25%',
    useBootstrap: false,
    buttons: {
    delete: {
    text: 'Delete',
    btnClass: 'btn-primary',
    action: function(){
    $.ajax({
    type: 'post',
    url: '<?php echo base_url('Admin/delete_Blog') ?>',
    data: {id:id},
    success: function (response) {
     var data=$.parseJSON(response);
     if(data.status == 'success'){

    $.wnoty({
    type: 'success',
    message: data.message,
    autohideDelay: 1000,
    position: 'top-right'

    });
    setTimeout(function(){
         location.reload(true);
        },2000);
     }
    } 
   });
    }
    },
    close: function () {
    }
    }
    });

    });    

// function toggleIntro(button) {
//     var row = button.closest('tr');
//     var introShort = row.querySelector('.intro-short');
//     var introMore = row.querySelector('.intro-more');
    
//     if (introMore.style.display === 'none') {
//         introShort.style.display = 'none';
//         introMore.style.display = 'inline';
//         button.textContent = 'Read Less';
//     } else {
//         introShort.style.display = 'inline';
//         introMore.style.display = 'none';
//         button.textContent = 'Read More';
//     }
// }

function toggleIntro(button) {
    var row = button.closest('tr');
    var introShort = row.querySelector('.intro-short');
    var introFull = row.querySelector('.intro-full');
    
    if (introFull.style.display === 'none' || introFull.style.display === '') {
        introShort.style.display = 'none';
        introFull.style.display = 'block';
        button.textContent = 'Read Less';
        
        // Expand vertically
        row.querySelector('.intro-content').style.maxHeight = 'none';
    } else {
        introShort.style.display = 'inline';
        introFull.style.display = 'none';
        button.textContent = 'Read More';
        
        // Collapse back
        row.querySelector('.intro-content').style.maxHeight = '50px';
    }
}
</script>

<script src="<?php echo base_url(); ?>assets/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
// Initial TinyMCE initialization for the first editor
$(document).ready(function () {
    var i = 1;
function initializeTinyMCE(selector) {
            tinymce.init({
                selector: selector,
                   theme: "modern",
            height: 200,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",

            });
        }

initializeTinyMCE('textarea.mymce');
})
 $(document).on('click','#save_nav',function(){
        event.preventDefault();
        var title = $("#title").val();
        var id = $("#id").val();
        var thumnail = $("#thumnail").prop('files')[0]; // Fetch the selected file
      

        // var contentArray = [];
        //  //new
        //     var editedTitles = [];
        // // Iterate through all TinyMCE instances and retrieve content
        // $('.mymce').each(function() {
        //      var editorId = $(this).attr('id');
        //     var content = tinyMCE.get($(this).attr('id')).getContent();
        //     contentArray.push(content);
   
        // });

        var contentArray = [];
    
        $('.mymce').each(function() {
        var editorId = $(this).attr('id');
        var content = tinymce.get(editorId).getContent();
        contentArray.push(content);
    });


           if( $("#title").val() != ''){
            
    var formData = new FormData();
            formData.append('title', title);
            formData.append('thumnail', thumnail);
           // formData.append('content',contentArray);
           formData.append('content', JSON.stringify(contentArray));
            formData.append('id', id); // Convert to JSON string
            $.ajax({
            type:'post',
            url: '<?php echo base_url("Doctor/add_Blog");?>',
            //data: new FormData($("#member_form_add")[0]),
            data:formData,
            contentType: false,
            processData: false, 
            success:function(resp){
            var data=$.parseJSON(resp);
            if(data.status == 'success'){
                 $('#form_sample_add')[0].reset();

          $('#smallModel').modal('hide');
         $(".modal-backdrop").remove();
        $.wnoty({
        type: 'success',
        message: data.message,
        autohideDelay: 1000,
        position: 'top-right'

        });
                 setTimeout(function(){
         location.reload(true);
        },2000);

        
        }else if(data.status == 'error'){
                $.wnoty({
                        type: 'error',
                        message: data.message,
                        autohideDelay: 2000,
                        position: 'top-right'

                        });
                setTimeout(function(){
            location.reload(true);
            },2000);
            }
            },
            });
        }
        
            return false;
      
        })
    

</script>

</body>

 

</html>