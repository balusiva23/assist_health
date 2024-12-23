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
                                                                   <th class="center">Action</th>
                                                                    <th class="center"> Document </th>
                                                                 
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                               <?php 
                                                               $i = 1;
                                                                foreach ($members as $member) {?>
                                                                 <tr class="odd gradeX">
                                                                    <td class="center"> <?=$i; ?></td>
                                                                    <td class="center">
                                                                        <?=$member->member_id; ?>
                                                                    </td>
                                                                    <td class="center">   <?=$member->name; ?></td>
                                                           
                                                                    <td class="center">
                                                                       
                                                                        <a class="btn deepPink btn-outline btn-circle m-b-10"  data-id="<?php echo $member->id; ?>" href="<?php echo base_url(); ?>Admin/Add_medical_history?id=<?php echo $member->id; ?>">
                                                                            Add/Update Medical History
                                                                        </a> 
                                                                        <a class="btn blue-bgcolor btn-outline btn-circle m-b-10"  data-id="<?php echo $member->id; ?>" href="<?php echo base_url(); ?>Admin/View_medical_history?id=<?php echo $member->id; ?>">
                                                                            View Medical History
                                                                        </a>
                                                                    </td>
                                                                     <!-- Document -->
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
                                                                   <?php 
                                                                   } else{
                                                                   ?>
                                                                   <a href="#" class="tblEditBtn"
                                                                           data-bs-toggle="modal"
                                                                           data-bs-target="#staticBackdrop" data-id="<?php echo $member->id; ?>">
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
   <?php $this->load->view('Backend/admin/admin-temp/footer'); ?> 
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/material/material.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/flatpicker/js/flatpicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/data/date-time.init.js"></script>
</body>

<script type="text/javascript">
               $(document).ready(function() {
        // $('.tblEditBtn').click(function() {
        $('#example4').on('click', '.tblEditBtn', function() {
        // Get the data attributes from the button
        var id = $(this).data('id');
        $('#staticBackdrop [name="id"]').val(id);


                    // Open the modal
                $('#staticBackdrop').modal('show');
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


</script>

</html>