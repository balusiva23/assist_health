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
     <?php $this->load->view('Backend/members/member-temp/link-css'); ?> 
    <!-- Date Time item CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend_assets/bundles/flatpicker/css/flatpickr.min.css" />
    
    <link href="<?php echo base_url(); ?>assets/select2/select2.min.css" rel="stylesheet" type="text/css" />   
    <link href="<?php echo base_url(); ?>assets/select2/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />  
    <style>


    </style>
</head>
<!-- END HEAD -->

<body
    class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
        <!-- start header -->
        <?php $this->load->view('Backend/members/member-temp/header'); ?> 
        <div class="page-container">
            <!-- start sidebar menu -->
          <?php $this->load->view('Backend/members/member-temp/sidebar'); ?> 
            <!-- end sidebar menu -->
            <!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">My
                                    Members</div>
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
                                                            id="example4"  style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th class="center" style="width:10%">S.No</th>
                                                                 
                                                                    <th class="center" style="width:50%"> Name </th>
                                                                    <th class="center" style="width:30%"> Date </th>
                                                                
                                                                      <th class="center" style="width:10%">Prescription </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                               <?php 
                                                               $i = 1;
                                                                foreach ($members as $member) {
                                                               
                                                                    ?>

                                                                 <tr class="odd gradeX" data-id="<?=$member->id;?>">
                                                                    <td class="center"> <?=$i; ?></td>
                                                                    <td class="center">
                                                                        <?=$member->Name; ?>
                                                                    </td>
                                                                    <td class="center">   <?=$member->date; ?></td>
                                                               
                                                              
                                                             

                                                                       <td class="center">
                                                                

                                                                        <a href="<?php echo base_url(); ?>Member/Prescriptionpdf?id=<?php echo $member->id; ?>" class="" data-id="<?php echo $member->id; ?>" target="_blank">
                                                                                <i class="fa fa-file"></i>
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


    </div>
   <?php $this->load->view('Backend/members/member-temp/footer'); ?> 
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/material/material.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/flatpicker/js/flatpicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/data/date-time.init.js"></script>
</body>

<script type="text/javascript">
        $(document).ready(function() {
        //$('.tblEditBtn').click(function() {
             $('#example4').on('click', '.tblEditBtn', function() {
            // Get the data attributes from the button
            var id = $(this).data('id');
          

            // Make an AJAX request to retrieve the data for the ID
            $.ajax({
                url: '<?php echo base_url("Doctor/getMemberByID"); ?>?id=' + id,
                method: 'GET',
                data: { id: id },
                dataType: 'json',
                success: function(response) {

                    // Populate the modal with the data returned from the server
               $('#staticBackdrop [name="member_id"]').val(response.id);
                    $('#staticBackdrop [name="m_id"]').val(response.member_id);
                    $('#staticBackdrop [name="name"]').val(response.name);
                    $('#staticBackdrop [name="email"]').val(response.email);
                    $('#staticBackdrop [name="gender"]').val(response.gender);
                    $('#staticBackdrop [name="number"]').val(response.number);
                    $('#staticBackdrop [name="address"]').val(response.address);
             

                     // Open the modal
                    $('#staticBackdrop').modal('show');
                }

                
               

                // error: function(xhr, status, error) {
                //     console.log(error); // Handle the error if any
                // }

            });
        });
    });
        $(document).ready(function() {
        //$('.tblEditBtn').click(function() {
             $('#ex5').on('click', '.edit_btn', function() {
            // Get the data attributes from the button
            var id = $(this).data('id');
          

            // Make an AJAX request to retrieve the data for the ID
            $.ajax({
                url: '<?php echo base_url("Doctor/getPrescriptionByID"); ?>?id=' + id,
                method: 'GET',
                data: { id: id },
                dataType: 'json',
                success: function(response) {

                    // Populate the modal with the data returned from the server
              // Assuming 'response' contains the data from your PHP script
              $('#staticBackdrop [name="id"]').val(response.id);
              $('#staticBackdrop [name="name"]').val(response.Name);
$('#staticBackdrop [name="member_id"]').val(response.member_id);
$('#staticBackdrop [name="age"]').val(response.Age);
$('#staticBackdrop [name="gender"]').val(response.Gender).change();;
$('#staticBackdrop [name="address"]').val(response.Address);
$('#staticBackdrop [name="chief_complaints"]').val(response.Chief_Complaints);
$('#staticBackdrop [name="allergies"]').val(response.Allergies);
$('#staticBackdrop [name="history"]').val(response.History);
$('#staticBackdrop [name="diagnosis"]').val(response.Diagnosis);
$('#staticBackdrop [name="treatment"]').val(response.Treatment);
$('#staticBackdrop [name="investigations"]').val(response.Investigations);
$('#staticBackdrop [name="note"]').val(response.Note);
$('#staticBackdrop [name="parent_member_id"]').val(response.parent_member_id);
$('#staticBackdrop [name="member_status"]').val(response.member_status);
$('#staticBackdrop [name="isActive"]').prop('checked', response.isActive);
$('#staticBackdrop [name="date"]').val(response.date);

                ;
             

                     // Open the modal
                    $('#staticBackdrop').modal('show');
                }

                
               

                // error: function(xhr, status, error) {
                //     console.log(error); // Handle the error if any
                // }

            });
        });
    });
//get allowance
// function loadproperty_images(){
//         //$(document).ready(function () {
//         $(document).on("click", '.tblEditBtn',function (event) {
//         event.preventDefault();
//         var id = $(this).attr("data-id");  
//         console.log(id);
//         if(id != '' ){
//         $.ajax({
//           url: "Get_prescription_data?id="+id,
//           type:"GET",
//           dataType:'',
//           data:'data',          
//           success: function(response) {
//             console.log(response);
//             $('.allowancetbl').html(response);
//           },
//           error: function(response) {
            
//           }
//         });
//       }
//       });
//       //});

//       }
//       loadproperty_images();
function loadproperty_images() {
    $(document).on("click", '.tblEditBtn', function (event) {
        event.preventDefault();
        var id = $(this).attr("data-id");
        console.log(id);

        if (id != '') {
            $.ajax({
                url: "Get_prescription_data?id=" + encodeURIComponent(id),
                type: "GET",
                //dataType: "html",  // Expect HTML in response
                success: function(response) {
                    console.log(response);  // Check the response

                  

                    // Destroy the existing DataTable to avoid issues
                    var table = $('#ex5').DataTable();
                    table.destroy();  // Destroy the previous instance

                      // Clear the previous DataTable data
                      $('.allowancetbl').html(response);  // Populate the table

                    // Reinitialize the DataTable
                    $('#ex5').DataTable({
                        columnDefs: [
                            { width: "10%", targets: 0 },
                            { width: "25%", targets: 1 },
                            { width: "50%", targets: 2 },
                            { width: "15%", targets: 3 }
                        ],
                        autoWidth: false, // Prevent automatic adjustment of widths
                    });
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: " + error);  // Handle AJAX error
                }
            });
        }
    });
}

loadproperty_images();



 $(document).on('click','#update_member',function(){
        event.preventDefault();
        
        $("#member_form_add").valid();
       
    

        $.ajax({
        type:'post',
        url: '<?php echo base_url("Doctor/save_prescription_data");?>',
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
        message: "Updated successfully",
        autohideDelay: 1000,
        position: 'top-right'

        });
        //  setTimeout(function(){
        //  location.reload(true);
        // },2000);
    
       
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
 $(document).on('click','#update_member1',function(){
        event.preventDefault();
        
        $("#member_form_add1").valid();
       
    

        $.ajax({
        type:'post',
        url: '<?php echo base_url("Doctor/save_prescription_data1");?>',
        data: new FormData($("#member_form_add1")[0]),
        contentType: false,
        processData: false, 
        success:function(resp){
        var data=$.parseJSON(resp);
        if(data.status == 'success'){
        $('#member_form_add1')[0].reset();
         $('#staticBackdrop1').modal('hide');
         $(".modal-backdrop").remove();


        $.wnoty({
        type: 'success',
        message: "Updated successfully",
        autohideDelay: 1000,
        position: 'top-right'

        });
        //  setTimeout(function(){
        //  location.reload(true);
        // },2000);
         // Update the table row with the new data
   
       
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
    url: '<?php echo base_url('Doctor/AllMemberdelete') ?>',
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



////New-------------------
$(document).ready(function () {
    // Check if there is a stored page number in sessionStorage
    var savedPage = sessionStorage.getItem('tablePage');

    // Initialize DataTable with the saved page number if available
    var table = $('#example5').DataTable({
        "pageLength": 10, // Set the desired number of rows per page
        "displayStart": savedPage ? (parseInt(savedPage) * 10) : 0 // Set the saved page number or default to 0
    });

    // Event listener for page change
    table.on('page.dt', function () {
        // Store the current page number in sessionStorage
        sessionStorage.setItem('tablePage', table.page.info().page);
    });
});

</script>
<script src="<?php echo base_url(); ?>assets/select2/select2.min.js"type="text/javascript"></script>
    <script>


//   $(document).ready(function() {
//     $('#staticBackdrop').on('shown.bs.modal', function () {
//       // Initialize select2 with dropdownParent
//       $('#parent_member').select2({
//         theme: 'bootstrap',
//         width: '100%',
//         dropdownParent: $('#staticBackdrop')  // Setting the dropdown parent to the modal
//       });

//       // Focus the search input field after the modal opens
//       setTimeout(function() {
//         $('.select2-search__field').focus();
//       }, 200);  // Delay to ensure modal content is fully loaded
//     });
//   });
</script>
</html>