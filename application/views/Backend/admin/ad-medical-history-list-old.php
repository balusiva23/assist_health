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
                                                                   <?php //if($this->db->where(array('member_id'=>$member->id,'is_active'=>1))->count_all_results('medical_history')) { ?>
                                                                    <?php 
                                                                   $query = $this->db->get_where('medical_history', array('member_id' => $member->id, 'is_active' => 1));

                                                                   $get_data = $query->row();
                                                                   
                                                                  
                                                                   ?>
                                                                       
                                                                   <?php 
                                                                   if ($member->document) { 
                                                                       // If 'document' is NOT NULL
                                                                   ?>
                                                                       <a href="<?php echo base_url()?>assets/uploads/medical_history/<?php echo $member->document; ?>" class="tbldownloadbtn" target="_blank" data-id="<?php echo $member->id; ?>">
                                                                           <i class="fa fa-download"></i>
                                                                       </a>
                                                                       <a href="<?php echo base_url()?>assets/uploads/medical_history/<?php echo $member->document; ?>" class="  m-2" target="_blank" data-id="<?php echo $member->id; ?>">
                                                                           <i class="fa fa-eye text-primary"></i>
                                                                       </a>
                                                                       <a  class=" delete  m-2" target="_blank" data-id="<?php echo $member->id; ?>">
                                                                           <i class="fa fa-trash-o text-danger"></i>
                                                                       </a>
                                                                   <?php 
                                                                   } else{
                                                                   ?>
                                                                   <a href="#" class="tblEditBtn"
                                                                           data-bs-toggle="modal"
                                                                           data-bs-target="#propertyImagemodel" data-id="<?php echo $member->id; ?>">
                                                                           <i class="fa fa-plus"></i>
                                                                       </a>
                                                                    
                                                                        <?php } ?>
                                                                    
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
    <!-- Documents new bulk -->
    <div class="modal fade" id="propertyImagemodel" tabindex="-1">
	    <div class="modal-dialog modal-dialog-centered ">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h5 class="modal-title">Add Property Images</h5>
	          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	        </div>
	           <form action="#" id="form_images" class="form-horizontal" method="post" enctype="multipart/form-data">
        
               <div class="modal-body">
                      <div class="">
                             <label for="inputName" class="form-label">Property Image  <span class="error"> * <span  style="color:black;font-size: 11px;">You Can Upload Multiple Images(MAX 5)</span></span></label><br>
                           <input type="file" name="property_img[]" id="property_img"  class="" multiple>
                       </div>
              
             <div class="">
                <!-- table-responsive -->
                
              <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" style="width: 10%;">Sno</th>
                  <th scope="col" style="width:75%%">Image</th>
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
            <input type="hidden" name="property_id">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary " id="add_image">Save</button>
          </div>
        </form>
	      </div>
	    </div>
	  </div> 
    <!-- Documents new bulk -->
   <?php $this->load->view('Backend/admin/admin-temp/footer'); ?> 
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/material/material.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/flatpicker/js/flatpicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/data/date-time.init.js"></script>
</body>

<script type="text/javascript">
        $(document).ready(function() {
        $('.tblEditBtn').click(function() {
            // Get the data attributes from the button
            var id = $(this).data('id');
            var medical_condition = "List any current or past medical conditions (e.g., diabetes, hypertension, asthma)";
            var diagnosis = "Date of diagnosis";
            var treatment = "Treatment received";
            var medications = "List all current medications, including prescribed medications, over-the-counter drugs, and supplements";
            var dosage = "Dosage and frequency";
            var surgeries = "List any previous surgeries, including the type of surgery, date, and outcome";
            var hereditary = "Provide information about any significant medical conditions or hereditary diseases in";
            var immediate_familymembers = "immediate family members (e.g., heart disease, cancer, diabetes)";
            var immunizations = "Document the immunizations received, including the dates and types (e.g., tetanus, flu shot)";
            var Indicate = "Smoking: Indicate current or past smoking habits (e.g., non-smoker, former smoker, current smoker)";
            var Consumption = "Alcohol Consumption: Specify frequency and quantity of alcohol consumption";
            var drugs = "Recreational Drug Use: Inquire about any current or past use of recreational drugs";
            var anxiety = "Inquire about any history of mental health conditions, such as anxiety, depression, or bipolar disorder";
            var Women = "Women's Health (if applicable):";
            var pregnancies = "Include questions about menstrual history, pregnancies, and any relevant gynecological conditions";


            // Make an AJAX request to retrieve the data for the ID
            $.ajax({
                url: '<?php echo base_url("Admin/getMemberByID"); ?>?id=' + id,
                method: 'GET',
                data: { id: id },
                dataType: 'json',
                success: function(response) {

                    // Populate the modal with the data returned from the server
                $('#staticBackdrop [name="id"]').val(response.id);
                    $('#staticBackdrop [name="member_id"]').val(response.member_id);
                    $('#staticBackdrop [name="name"]').val(response.name);
                    $('#staticBackdrop [name="email"]').val(response.email);
                    $('#staticBackdrop [name="gender"]').val(response.gender);
                    $('#staticBackdrop [name="number"]').val(response.number);
                    $('#staticBackdrop [name="emergency_contact_name"]').val(response.emergency_contact_name);
                    $('#staticBackdrop [name="emergency_contact_relationship"]').val(response.emergency_contact_relationship);
                    $('#staticBackdrop [name="emergency_contact_phone"]').val(response.emergency_contact_phone);
                    $('#staticBackdrop [name="weight"]').val(response.weight);
                    $('#staticBackdrop [name="height"]').val(response.height);

                     $('#staticBackdrop [name="employment_status"]').val(response.employment_status);
                    $('#staticBackdrop [name="education_level"]').val(response.education_level);
                    $('#staticBackdrop [name="marital_status"]').val(response.marital_status);
                    $('#staticBackdrop [name="exercise_habits"]').val(response.exercise_habits);
                    $('#staticBackdrop [name="diet_preferences"]').val(response.diet_preferences);
                    $('#staticBackdrop [name="additional_information"]').val(response.additional_information);
                    $('#staticBackdrop [name="address"]').val(response.address);
                    //
                       //medical_conditions
                     if (medical_condition !== response.medical_conditions && diagnosis !== response.medical_conditions && treatment !== response.medical_conditions && response.medical_conditions !== ''){

                         $('#staticBackdrop [name="medical_conditions"]').val(response.medical_conditions);
                         $($('#medical_conditions')).val('others');
                         $($('#medical_conditions')).prop('disabled', true);
                         $($('#mec')).show();
                         $($('#mec')).prop('disabled', false);
                       //  $('#staticBackdrop [name="medical_conditions"]').val(response.medical_conditions);
                     }
                      //medications
                    if (medications !== response.medications && dosage !== response.medications && response.medications !== ''){

                         $('#staticBackdrop [name="medications"]').val(response.medications);
                         $($('#medications')).val('others');
                         $($('#medications')).prop('disabled', true);
                         $($('#mec1')).show();
                         $($('#mec1')).prop('disabled', false);
                      //$('#staticBackdrop [name="medications"]').val(response.medications);
                     }


                         //surgical_history
                        if (surgeries !== response.surgical_history && response.surgical_history !== ''){
                          console.log('selected ');
                         $('#staticBackdrop [name="surgical_history"]').val(response.surgical_history);
                         $($('#surgical_history')).val('others');
                         $($('#surgical_history')).prop('disabled', true);
                         $($('#mec2')).show();
                         $($('#mec2')).prop('disabled', false);

                        }
                        //family_medical_history
                        if (hereditary !== response.family_medical_history && immediate_familymembers !== response.family_medical_history && response.family_medical_history !== '') {{
                          console.log('selected ');
                         $('#staticBackdrop [name="family_medical_history"]').val(response.family_medical_history);
                         $($('#family_medical_history')).val('others');
                         $($('#family_medical_history')).prop('disabled', true);
                         $($('#mec3')).show();
                         $($('#mec3')).prop('disabled', false);
                         //
                   // $('#staticBackdrop [name="family_medical_history"]').val(response.family_medical_history);

                        }//immunizations
                        if (immunizations !== response.immunizations && response.immunizations !== ''){
                         // console.log('selected ');
                         $('#staticBackdrop [name="immunizations"]').val(response.immunizations);
                         $($('#immunizations')).val('others');
                         $($('#immunizations')).prop('disabled', true);
                         $($('#mec4')).show();
                         $($('#mec4')).prop('disabled', false);
                         //   $('#staticBackdrop [name="immunizations"]').val(response.immunizations);

                        }//lifestyle_and_habits
                        if (Indicate !== response.lifestyle_and_habits && Consumption !== response.lifestyle_and_habits && drugs !== response.lifestyle_and_habits && response.lifestyle_and_habits !== ''){
                         // console.log('selected ');
                         $('#staticBackdrop [name="lifestyle_and_habits"]').val(response.lifestyle_and_habits);
                         $($('#lifestyle_and_habits')).val('others');
                         $($('#lifestyle_and_habits')).prop('disabled', true);
                         $($('#mec5')).show();
                         $($('#mec5')).prop('disabled', false);
                         //  $('#staticBackdrop [name="lifestyle_and_habits"]').val(response.lifestyle_and_habits);

                        }//mental_health
                        if (anxiety !== response.mental_health && Women !== response.mental_health && pregnancies !== response.mental_health && response.mental_health !== ''){
                          //console.log('selected ');
                         $('#staticBackdrop [name="mental_health"]').val(response.mental_health);
                         $($('#mental_health')).val('others');
                         $($('#mental_health')).prop('disabled', true);
                         $($('#mec6')).show();
                         $($('#mec6')).prop('disabled', false);
                         //
                      //  $('#staticBackdrop [name="mental_health"]').val(response.mental_health);

                        }

                        $('#staticBackdrop #pre-img').attr('src',"");

                      if(response.profile){
                          $('#staticBackdrop #pre-img').attr('src',"<?php echo base_url('assets/uploads/users_profile/'); ?>"+response.profile);

                    }

                     // Open the modal
                    $('#staticBackdrop').modal('show');
                }

                }
               

                // error: function(xhr, status, error) {
                //     console.log(error); // Handle the error if any
                // }

            });
        });
    });

 $(document).on('click','#update_member',function(){
        event.preventDefault();
        
    
    

        $.ajax({
        type:'post',
        url: '<?php echo base_url("Admin/add_medical_history_document");?>',
        data: new FormData($("#member_form_add")[0]),
        contentType: false,
        processData: false, 
        success:function(resp){
        var data=$.parseJSON(resp);
        if(data.status == 'success'){
        $('#member_form_add')[0].reset();
         $('#staticBackdrop').modal('hide');
         $(".modal-backdrop").remove();


        $.wnoty({
        type: 'success',
        message: "Data Updated successfully",
        autohideDelay: 1000,
        position: 'top-right'

        });
         setTimeout(function(){
         location.reload(true);
        },2000);
       
       }else if(data.status == 'error'){
              $.wnoty({
                    type: 'error',
                    message: "Data Updated Failed",
                    autohideDelay: 2000,
                    position: 'top-right'

                    });
        //        setTimeout(function(){
        //  location.reload(true);
        // },2000);
        }
        },
        });
       
     
        return false;
        })

           //delete
    $(document).on('click','.tblDelBtn', function (e) {
    //var id = $(this).parents('tr').find('#id').val();
    var id = $(this).attr('data-id');
   $.confirm({
    title: 'Delete Warning!',
    content: 'Are you sure, you want to delete this member and appointment details ?',
    boxWidth: '25%',
    useBootstrap: false,
    buttons: {
    delete: {
    text: 'Delete',
    btnClass: 'btn-primary',
    action: function(){
    $.ajax({
    type: 'post',
    url: '<?php echo base_url('Admin/AllMemberdelete') ?>',
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
    url: '<?php echo base_url('Admin/delete_docu') ?>',
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


</script>

</html>