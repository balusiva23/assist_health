<!DOCTYPE html>
< lang="en">
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="description" content="Responsive Admin Template" />
    <meta name="author" content="RedstarHospital" />
    <title>Admin Panel</title>
  <!-- css -->
     <?php $this->load->view('Backend/admin/admin-temp/link-css'); ?> 
    <!-- Date Time item CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend_assets/bundles/flatpicker/css/flatpickr.min.css" />
</head>
<!-- END HEAD -->

<body
    class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
        <!-- start header -->
        <?php $this->load->view('Backend/admin/admin-temp/header'); ?> 
        <div class="page-container">
            <!-- start sidebar menu -->
          <?php $this->load->view('Backend/admin/admin-temp/sidebar'); ?> 
            <!-- end sidebar menu -->
            <!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">
                                    Medical History</div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
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
                                                            id="example4">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center">S.No</th>
                                                                    <th class="center">M-ID</th>
                                                                    <th class="center"> Name </th>
                                                                    <th class="center"> Address </th>
                                                                    <th class="center">Mobile
                                                                    </th>
                                                                 
                                                                    <th class="center">Action</th>
                                                                    <th class="center"> Sub Profile </th>
                                                                    <th class="center"> Document </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                               <?php 
                                                               $i = 1;
                                                                foreach ($members as $member) {

                                                                      if($member->isSubprofile){
                                                                   $p_id = $member->parent_member;
                                                                   $parent_member = $this->Manager_model->getMemberByID($p_id); 
                                                                    $email = $parent_member->email;
                                                                    $number = $parent_member->number;
                                                                    //$address = $parent_member->address;
                                                                     $address = $member->address;
                                                                
                                                                    }else{
                                                                       $email = $member->email;
                                                                       $number = $member->number;
                                                                       $address = $member->address;
                                                                    }
                                                                    ?>
                                                                 <tr class="odd gradeX">
                                                                    <td class="center"> <?=$i; ?></td>
                                                                    <td class="center">
                                                                        <?=$member->member_id; ?>
                                                                    </td>
                                                                    <td class="center">   <?=$member->name; ?></td>
                                                                    <td class="center">   <?=$member->address; ?></td>
                                                                    <td class="center"><a href="tel:<?=$number; ?>">
                                                                               <?=$number; ?> </a></td>
                                                         
                                                                    <td class="center">
                                                                       
                                                                        <a class="btn deepPink btn-outline btn-circle m-b-10"  data-id="<?php echo $member->id; ?>" href="<?php echo base_url(); ?>Admin/Add_medical_history?id=<?php echo $member->id; ?>">
                                                                            Add/Update Medical History
                                                                        </a> 
                                                                        <a class="btn blue-bgcolor btn-outline btn-circle m-b-10"  data-id="<?php echo $member->id; ?>" href="<?php echo base_url(); ?>Admin/View_medical_history?id=<?php echo $member->id; ?>">
                                                                            View Medical History
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        <?php 
                                                                         //echo $member->id;
                                                                       
                                                                        if($this->db->where(array('parent_member'=>$member->id,'isActive'=>1))->count_all_results('members')) { ?>
                                                                        <a class="btn blue-bgcolor btn-outline btn-circle m-b-10" data-id="<?php echo $member->id; ?>" href="<?php echo base_url(); ?>Admin/SubMedical_history?id=<?= 
                                                                        $member->id?>">
                                                                             <!-- <i class="fa fa-eye"></i> -->
                                                                            view
                                                                        </a>
                                                                           <?php } ?>
                                                                    </td>
                                                                    <!-- Document -->
                                                                    <td class="text-center">
                                                                  
                                                                        <a href="#" class="tblEditBtn"
                                                                           data-bs-toggle="modal"
                                                                           data-bs-target="#propertyImagemodel" data-id="<?php echo $member->id; ?>">
                                                                           <i class="fa fa-plus"></i>
                                                                       </a>
                                                                    
                                                                    </td>
                                                                </tr>


                                                                <?php $i++; } ?>
                                                            

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

        </div>
        <!-- end page container -->
        <!-- start footer -->
 
        <!-- end footer -->

       
      <!-- Document -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Document</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" id="member_form_add" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="form-body">
                               
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Document <span class="error"> * </span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="file" class="default" name="file_url">
                                    </div>
                                </div>
                                  <!-- <div class="preview" style="  display: grid;place-items: center;">
                                <img src="" id="pre-img" style="width:100px;margin-bottom: 2%;"> -->

                            </div>



                               
                            </div>
                            <div class="form-actions">
                                    <div class="col-lg-12 p-t-20 ">
                                        <input type="hidden" name="id">
                                        <button type="button"
                                            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary" id="update_member" style="    float: right;">Add</button>

                                    </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
   <?php $this->load->view('Backend/admin/admin-temp/footer'); ?> 
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/material/material.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/flatpicker/js/flatpicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/data/date-time.init.js"></script>
</body>
<!-- Documents new bulk -->
<div class="modal fade" id="propertyImagemodel" tabindex="-1">
	    <div class="modal-dialog modal-dialog-centered ">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h5 class="modal-title">Add Documents</h5>
	          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	        </div>
	           <form action="#" id="form_images" class="form-horizontal" method="post" enctype="multipart/form-data">
        
               <div class="modal-body">
                      <div class="">
                             <label for="inputName" class="form-label">Files  <span class="error"> * </span></label><br>
                           <input type="file" name="property_img[]" id="property_img"  class="" multiple>
                       </div>
              
             <div class="">
                <!-- table-responsive -->
                
              <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" style="width: 10%;">Sno</th>
                  <th scope="col" style="width:75%;text-align:center">Document</th>
                  <th scope="col" style="width:75%;text-align:center">Attachment</th>
                   <th scope="col" style="width: 10%;">Action</th>
                </tr>
              </thead>
              <tbody class="allowancetbl">
       
              </tbody>
            </table>
 
              </div>
            
            </div>
          
         
          <div class="modal-footer">
            <input type="hidden" name="id">
            <input type="hidden" name="member_id">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary " id="add_image">Save</button>
          </div>
        </form>
	      </div>
	    </div>
	  </div> 
      <script>
      //-----------------------------Documents  -------------------------------
      //  
       $(document).ready(function(){  


            $('#add_image').click(function () {
    var maxAllowedFiles = 5; // Set the maximum allowed files
    var selectedFiles = $('#property_img').get(0).files;

    if (selectedFiles.length > 0) {
       // if (selectedFiles.length <= maxAllowedFiles) {
            // Create a FormData object to send the form data
            var formData = new FormData($('#form_images')[0]);
            
            $.ajax({
                url: "<?php echo base_url('Admin/add_bulk_medical_documents');?>",
                method: "POST",
                data: formData,
                contentType: false, // Set to false for FormData
                processData: false, // Set to false for FormData
                success: function (res) {
                    var data = $.parseJSON(res);
                    if (data.status == 'success') {
                        $('#form_images')[0].reset();
                        $('#propertyImagemodel').modal('hide');
                        $(".modal-backdrop").remove();
                        $.wnoty({
                            type: 'success',
                            message: data.message,
                            autohideDelay: 1000,
                            position: 'top-right'
                        });
                        $('.addfields').remove();
                        loadimage();
                    } else if (data.status == 'error') {
                        $('#form_images')[0].reset();
                        $('#propertyImagemodel').modal('hide');
                        $(".modal-backdrop").remove();
                        $.wnoty({
                            type: 'error',
                            message: data.message,
                            autohideDelay: 1000,
                            position: 'top-right'
                        });
                        $('.addfields').remove();
                        loadimage();
                    }
                }
            });
        // } else {
        //     alert("You can only upload a maximum of " + maxAllowedFiles + " images.");
        // }
    } else {
        // Handle the case when no files are selected
        alert("Please select a file to upload.");
    }
});
});
       //get allowance
       function loadproperty_images(){
        //$(document).ready(function () {
        $(document).on("click", '.tblEditBtn',function (event) {
        event.preventDefault();
        var id = $(this).attr("data-id");  
        console.log(id);
        if(id != '' ){
        $.ajax({
          url: "Get_medical_Documents?id="+id,
          type:"GET",
          dataType:'',
          data:'data',          
          success: function(response) {
            console.log(response);
            $('.allowancetbl').html(response);
          },
          error: function(response) {
            
          }
        });
      }
      });
      //});

      }
      loadproperty_images();
      //delete allowance
      $(document).ready(function () {
        $(document).on("click", '.deleteImage',function (event) {
        event.preventDefault();
        var id = $(this).attr("data-id");  
         var row = $(this).closest("tr");
        if(id != ''  ){
        $.ajax({
          url: '<?php echo base_url("Admin/deleteImage")?>',
          type:"POST",
          data: {id:id},          
          success: function(response) {
          
           row.remove();
           /* $('#AdditionModal').modal('hide');
            $(".modal-backdrop").remove();*/
             $.wnoty({
              type: 'success',
              message: "Deleted Successfully",
              autohideDelay: 1000,
              position: 'top-right'

              });
          },
          error: function(response) {
            
          }
        });
      }
      });
      });



  
          $(document).ready(function () {

            $(document).on('click', ".tblEditBtn", function (e) {
              e.preventDefault(e);
              var id = $(this).attr('data-id');
             
             $('#form_images').find('[name="member_id"]').val(id).end();
             loadproperty_images();
         //  console.log('working');

               });
             });
            </script>
    <!-- Documents new bulk -->
</html>