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
      <?php $this->load->view('Backend/manager/manager-temp/link-css'); ?> 
    <!-- Date Time item CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend_assets/bundles/flatpicker/css/flatpickr.min.css" />
</head>
<!-- END HEAD -->

<body
    class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
        <!-- start header -->
       <?php $this->load->view('Backend/manager/manager-temp/header'); ?> 
        <div class="page-container">
            <!-- start sidebar menu -->
                      <?php $this->load->view('Backend/manager/manager-temp/sidebar'); ?> 
            <!-- end sidebar menu -->
            <!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Ongoing Appointments</div>
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
                                                            id="ongoingtbl">


                                                          <thead>
                                                            <tr>
                                                              <th>#</th>
                                                              <th>Member ID</th>
                                                              <th>Name</th>
                                                              <th>Address</th>
                                                              <th>Phone Number</th>
                                                              <th>Appointment</th>
                                                              <th>Appointment Date</th>
                                                              <th>Appointment Time</th>
                                                              <th>Comments</th>
                                                              <th>Payment Status</th>
                                                              <th>Appointment Status</th>
                                                              <th>Actions</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                            <?php
                                                            $i = 1;
                                                            foreach ($members as $member) {
                                                            ?>
                                                              <tr class="odd gradeX"  data-id="<?=$member->id;?>">
                                                                <td class="center"><?= $i; ?></td>
                                                                <td class="center"><?= $member->member_id; ?></td>
                                                                <td class="center"><?= $member->name; ?></td>
                                                                <td class="center"><?= $member->address; ?></td>
                                                                <td class="center"><a href="tel:<?= $member->number; ?>"><?= $member->number; ?></a></td>
                                                                <td class="center"><?php if ($member->services) {
                                                                                    echo $member->services;
                                                                                  } else {
                                                                                    echo 'TBD';
                                                                                  } ?></td>
                                                                <td class="center"><?php if ($member->appointment_date) {
                                                                                    echo $member->appointment_date;
                                                                                  } else {
                                                                                    echo 'TBD';
                                                                                  } ?></td>
                                                                <td class="center"><?php if ($member->appointment_time) {
                                                                                    echo $member->appointment_time;
                                                                                  } else {
                                                                                    echo 'TBD';
                                                                                  } ?></td>
                                                                <td class="center"><?php if ($member->comments) {
                                                                                    echo $member->comments;
                                                                                  } else {
                                                                                    echo 'TBD';
                                                                                  } ?></td>
                                                                <td class="center"><?php if ($member->payment_status) {
                                                                                    echo $member->payment_status;
                                                                                  } else {
                                                                                    echo 'TBD';
                                                                                  } ?></td>
                                                                <td class="center"><?= $member->appointment_status ?? ''; ?></td>
                                                                <td class="center">
                                                                  <a href="" class="tblEditBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-id="<?php echo $member->id; ?>">
                                                                    <i class="fa fa-pencil"></i>
                                                                  </a>
                                                                 <!--  <a class="tblDelBtn" data-id="<?php echo $member->id; ?>">
                                                                    <i class="fa fa-trash-o"></i>
                                                                  </a> -->
                                                                </td>
                                                              </tr>
                                                            <?php
                                                              $i++;
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
                     <!-- Subprofile -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabbable-line">

                                <div class="tab-content">
                                    <div class="tab-pane active fontawesome-demo" id="tab1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-head">
                                                        <header>Sub Profile</header>
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
                                                            id="subexample4">


                                                          <thead>
                                                            <tr>
                                                              <th>#</th>
                                                              <th>Member ID</th>
                                                              <th>Name</th>
                                                              <th>Address</th>
                                                          
                                                              <th>Appointment</th>
                                                              <th>Appointment Date</th>
                                                              <th>Appointment Time</th>
                                                              <th>Comments</th>
                                                              <th>Payment Status</th>
                                                              <th>Appointment Status</th>
                                                              <th>Actions</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                            <?php
                                                            $i = 1;
                                                            foreach ($submembers as $member) {
                                                            ?>
                                                              <tr class="odd gradeX"  data-id="<?=$member->id;?>">
                                                                <td class="center"><?= $i; ?></td>
                                                                <td class="center"><?= $member->member_id; ?></td>
                                                                <td class="center"><?= $member->name; ?></td>
                                                                <td class="center"><?= $member->address; ?></td>
                                                                <!-- <td class="center"><a href="tel:<?= $member->number; ?>"><?= $member->number; ?></a></td> -->
                                                                <td class="center"><?php if ($member->services) {
                                                                                    echo $member->services;
                                                                                  } else {
                                                                                    echo 'TBD';
                                                                                  } ?></td>
                                                                <td class="center"><?php if ($member->appointment_date) {
                                                                                    echo $member->appointment_date;
                                                                                  } else {
                                                                                    echo 'TBD';
                                                                                  } ?></td>
                                                                <td class="center"><?php if ($member->appointment_time) {
                                                                                    echo $member->appointment_time;
                                                                                  } else {
                                                                                    echo 'TBD';
                                                                                  } ?></td>
                                                                <td class="center"><?php if ($member->comments) {
                                                                                    echo $member->comments;
                                                                                  } else {
                                                                                    echo 'TBD';
                                                                                  } ?></td>
                                                                <td class="center"><?php if ($member->payment_status) {
                                                                                    echo $member->payment_status;
                                                                                  } else {
                                                                                    echo 'TBD';
                                                                                  } ?></td>
                                                                <td class="center"><?= $member->appointment_status ?? ''; ?></td>
                                                                <td class="center">
                                                                  <a href="" class="tblEditBtn1" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" data-id="<?php echo $member->id; ?>">
                                                                    <i class="fa fa-pencil"></i>
                                                                  </a>
                                                                 <!--  <a class="tblDelBtn" data-id="<?php echo $member->id; ?>">
                                                                    <i class="fa fa-trash-o"></i>
                                                                  </a> -->
                                                                </td>
                                                              </tr>
                                                            <?php
                                                              $i++;
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

        </div>
        <!-- end page container -->
        <!-- start footer -->
 
        <!-- end footer -->

        <div class="modal fade" id="smallModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">{Name}
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you going to delete the from record
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            aria-label="Close">No</button>
                        <button type="button" class="btn btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
               <form  id="member_ongoing_update" method="post" class="form-horizontal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Update Appointment Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-4">First Name
                                        <span class="required"> </span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" data-required="1"
                                            placeholder="enter  name"
                                            class="form-control input-height" readonly/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Address
                                        <span class="required"> </span>
                                    </label>
                                    <div class="col-md-8">
                                        <textarea name="address" placeholder="address" class="form-control"
                                            rows="5" readonly></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Mobile No.
                                        <span class="required"> </span>
                                    </label>
                                    <div class="col-md-8">
                                        <input name="number" type="text" placeholder="mobile number" 
                                            class="form-control input-height" readonly/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-4">For Appointment
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-8">
                                       
                                        <select class="form-control mec" name="services" id="services1"
                                            onchange='CheckColors4(this.value);' required>
                                             <option value="" selected>select</option>
                                              <option value="doctor appointment">Doctor Appointment</option>
                                            <option value="home care services">Home Care Services</option>
                                            <option value="diagnostics">Diagnostics</option>
                                            <option value="ambulance">Ambulance</option>
                                            <option value="pharmacy">Pharmacy</option>
                                            <option value="hospital care">Hospital Care</option>
                                            <option value="post hospital care">Post Hospital Care</option>
                                            <option value="physiotherapy">Physiotherapy</option>
                                            <option value="health insurance">Health Insurance</option>
                                            <option value="e commerce">E Commerce</option>
                                             <option value="AH Hospital Companion">AH Hospital Companion</option>
                                            <option value="others">Others</option>

                                        </select>
                                        <input type="text" name="services" class="mt-10 form-control mec4" id="mec4"
                                            style='display:none;'  />
                                    </div>
                                </div>

                          
                                      <div class="form-group row">
                                    <label class="control-label col-md-4">Date
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-8">
                                        <div
                                            class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class="form-control" type="text" id="date" name="appointment_date" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Time
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-8">
                                        <div
                                            class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class="form-control" type="time" id="" name="appointment_time" required>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-4">Comments
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control input-height" placeholder="Comments"
                                            name="comments">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-4">Payment Status
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-8">
                                        <select class="form-control input-height" name="payment_status" id="payment_status" required>
                                            <option value="">Select...</option>
                                            <option value="Yes">Yes </option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Appointment Status
                                        <span class="required"> </span>
                                    </label>
                                    <div class="col-md-8">
                                        <select class="form-control input-height" name="appointment_status">
                                        <option value="Pending">Select...</option>
                                            <option value="Ongoing">Ongoing </option>
                                            <option value="Completed">Completed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                     
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="update">update</button>
                    </div>
                </div>
            </div>
               </form>
        </div>
         <!-- Sub profile -->
         <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
               <form  id="member_ongoing_update1" method="post" class="form-horizontal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Update Appointment Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="control-label col-md-4">First Name
                                        <span class="required"> </span>
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" data-required="1"
                                            placeholder="enter  name"
                                            class="form-control input-height" readonly/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Address
                                        <span class="required"> </span>
                                    </label>
                                    <div class="col-md-8">
                                        <textarea name="address" placeholder="address" class="form-control"
                                            rows="5" readonly></textarea>
                                    </div>
                                </div>
                              <!--   <div class="form-group row">
                                    <label class="control-label col-md-4">Mobile No.
                                        <span class="required"> </span>
                                    </label>
                                    <div class="col-md-8">
                                        <input name="number" type="text" placeholder="mobile number" 
                                            class="form-control input-height" readonly/>
                                    </div>
                                </div>
 -->
                                <div class="form-group row">
                                    <label class="control-label col-md-4">For Appointment
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-8">
                                         <select class="form-control mec" name="services" id="services1"
                                            onchange='CheckColors4(this.value);' required>
                                             <option value="" selected>select</option>
                                              <option value="doctor appointment">Doctor Appointment</option>
                                            <option value="home care services">Home Care Services</option>
                                            <option value="diagnostics">Diagnostics</option>
                                            <option value="ambulance">Ambulance</option>
                                            <option value="pharmacy">Pharmacy</option>
                                            <option value="hospital care">Hospital Care</option>
                                            <option value="post hospital care">Post Hospital Care</option>
                                            <option value="physiotherapy">Physiotherapy</option>
                                            <option value="health insurance">Health Insurance</option>
                                            <option value="e commerce">E Commerce</option>
                                             <option value="AH Hospital Companion">AH Hospital Companion</option>
                                            <option value="others">Others</option>

                                        </select>
                                    </div>
                                </div>

                          
                                      <div class="form-group row">
                                    <label class="control-label col-md-4">Date
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-8">
                                        <div
                                            class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class="form-control" type="text" id="date" name="appointment_date" required>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Time
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-8">
                                        <div
                                            class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                            <input class="form-control" type="time" id="" name="appointment_time" required>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-4">Comments
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control input-height" placeholder="Comments"
                                            name="comments">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-4">Payment Status
                                        <span class="required"> * </span>
                                    </label>
                                    <div class="col-md-8">
                                        <select class="form-control input-height" name="payment_status" id="payment_status1" required>
                                            <option value="">Select...</option>
                                            <option value="Yes">Yes </option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Appointment Status
                                        <span class="required"> </span>
                                    </label>
                                    <div class="col-md-8">
                                        <select class="form-control input-height" name="appointment_status">
                                        <option value="Pending">Select...</option>
                                            <option value="Ongoing">Ongoing </option>
                                            <option value="Completed">Completed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                     
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="update1">update</button>
                    </div>
                </div>
            </div>
               </form>
        </div>
    </div>
    <!-- start js include path -->
    <?php $this->load->view('Backend/manager/manager-temp/footer'); ?> 
    <!-- end js include path -->

    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/material/material.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend_assets/bundles/flatpicker/js/flatpicker.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/backend_assets/data/date-time.init.js"></script> -->
</body>

<script type="text/javascript">
      $('#ongoingtbl').DataTable({
      });

     
        $(document).ready(function() {
      //  $('.tblEditBtn').click(function() {
             $('#ongoingtbl').on('click', '.tblEditBtn', function() {
            // Get the data attributes from the button
             var id = $(this).data('id');

            $('#time').removeAttr("readonly");
            // Make an AJAX request to retrieve the data for the ID
            $.ajax({
                url: '<?php echo base_url("Navigator/getMemberOngoingByID"); ?>',
                method: 'GET',
                data: { id: id },
                dataType: 'json',
                success: function(response) {

                    // Populate the modal with the data returned from the server
                $('#staticBackdrop [name="id"]').val(response.id);

                    $('#staticBackdrop [name="name"]').val(response.name);
                    $('#staticBackdrop [name="email"]').val(response.email);
                    $('#staticBackdrop [name="gender"]').val(response.gender);
                    $('#staticBackdrop [name="number"]').val(response.number);
  
                    $('#staticBackdrop [name="address"]').val(response.address);
                    $('#staticBackdrop [name="appointment"]').val(response.appointment);
                    $('#staticBackdrop [name="appointment_date"]').val(response.appointment_date);
                    $('#staticBackdrop [name="appointment_time"]').val(response.appointment_time);
                    $('#staticBackdrop [name="comments"]').val(response.comments);
                    $('#staticBackdrop [name="payment_status"]').val(response.payment_status);
                    $('#staticBackdrop [name="appointment_status"]').val(response.appointment_status);
                       // Check if services value exists in the dropdown options
                     $('#staticBackdrop [name="services"]').val(response.services);
                    var servicesField = $('#staticBackdrop [name="services"]');
                    var serviceValue = response.services;
                    var optionExists = servicesField.find('option[value="' + serviceValue + '"]').length;

                    if (optionExists) {
                        servicesField.val(serviceValue);  // Select the value if it exists in the dropdown
                        $('#staticBackdrop #mec4').hide(); // Hide the 'Others' text field
                    } else {
                        servicesField.val('others');  // Set dropdown to "Others"
                        $('#staticBackdrop #mec4').val(serviceValue).show();  // Show 'Others' text field and set the value
                    }

                     // Open the modal
                    $('#staticBackdrop').modal('show');
                }

                });
               

            });
        });
       // sub profile
        $(document).ready(function() {
      //  $('.tblEditBtn').click(function() {
             $('#subexample4').on('click', '.tblEditBtn1', function() {
            // Get the data attributes from the button
             var id = $(this).data('id');

            $('#time').removeAttr("readonly");
            // Make an AJAX request to retrieve the data for the ID
            $.ajax({
                url: '<?php echo base_url("Navigator/getMemberOngoingByID"); ?>',
                method: 'GET',
                data: { id: id },
                dataType: 'json',
                success: function(response) {

                    // Populate the modal with the data returned from the server
                $('#staticBackdrop1 [name="id"]').val(response.id);

                    $('#staticBackdrop1 [name="name"]').val(response.name);
                    $('#staticBackdrop1 [name="email"]').val(response.email);
                    $('#staticBackdrop1 [name="gender"]').val(response.gender);
                    $('#staticBackdrop1 [name="number"]').val(response.number);
  
                    $('#staticBackdrop1 [name="address"]').val(response.address);
                    $('#staticBackdrop1 [name="appointment"]').val(response.appointment);
                    $('#staticBackdrop1 [name="appointment_date"]').val(response.appointment_date);
                    $('#staticBackdrop1 [name="appointment_time"]').val(response.appointment_time);
                    $('#staticBackdrop1 [name="comments"]').val(response.comments);
                    $('#staticBackdrop1 [name="payment_status"]').val(response.payment_status);
                    $('#staticBackdrop1 [name="appointment_status"]').val(response.appointment_status);
                    $('#staticBackdrop1 [name="services"]').val(response.services);
                  var servicesField = $('#staticBackdrop1 [name="services"]');
                    var serviceValue = response.services;
                    var optionExists = servicesField.find('option[value="' + serviceValue + '"]').length;

                    if (optionExists) {
                        servicesField.val(serviceValue);  // Select the value if it exists in the dropdown
                        $(' #staticBackdrop1 #mec4').hide(); // Hide the 'Others' text field
                    } else {
                        servicesField.val('others');  // Set dropdown to "Others"
                        $(' #staticBackdrop1 #mec4').val(serviceValue).show();  // Show 'Others' text field and set the value
                    }
          

                     // Open the modal
                    $('#staticBackdrop1').modal('show');
                }

                });
               

            });
        });
 

       $(document).on('click','#update',function(){
        event.preventDefault();
           $("#member_ongoing_update").valid();
          if($('#services').val() == 'others'){
            $($('#services')).prop('disabled', true);
           
        }else{
             $($('#mec4')).prop('disabled', true);
        } 



       // if($("#services").val() != '' && $("#date").val() != '' && $("#time").val() != '' && $("#payment_status").val() != '' ){
        $.ajax({
        type:'post',
        url: '<?php echo base_url("Navigator/update_ongoing_member");?>',
        data: new FormData($("#member_ongoing_update")[0]),
        contentType: false,
        processData: false, 
        success:function(resp){
        var data=$.parseJSON(resp);
        if(data.status == 'success'){
        $('#member_ongoing_update')[0].reset();
         $('#staticBackdrop').modal('hide');
         $(".modal-backdrop").remove();


        $.wnoty({
        type: 'success',
        message: "Member Appointment Updated successfully",
        autohideDelay: 1000,
        position: 'top-right'

        });
        //  setTimeout(function(){
        //  location.reload(true);
        // },2000);
        var memberId = data.member.id;
        // console.log(data.member)
        var rowToUpdate = $("tr[data-id='" + memberId + "']");
        rowToUpdate.find(".center:eq(2)").text(data.member.name);
        rowToUpdate.find(".center:eq(3)").text(data.member.address);
        rowToUpdate.find(".center:eq(4) a").text(data.member.number).attr("href", "tel:" + data.member.number);
        rowToUpdate.find(".center:eq(5)").text(data.member.services);
        rowToUpdate.find(".center:eq(6)").text(data.member.appointment_date);
        rowToUpdate.find(".center:eq(7)").text(data.member.appointment_time);
        rowToUpdate.find(".center:eq(8)").text(data.member.comments);
        rowToUpdate.find(".center:eq(9)").text(data.member.payment_status);
        rowToUpdate.find(".center:eq(10)").text(data.member.appointment_status);
       
       }else if(data.status == 'error'){
              $.wnoty({
                    type: 'error',
                    message: "Data Updated Failed",
                    autohideDelay: 2000,
                    position: 'top-right'

                    });
               setTimeout(function(){
         location.reload(true);
        },2000);
        }
        },
        });
       
       // }
        return false;
        })       
     // sub profile
       $(document).on('click','#update1',function(){
        event.preventDefault();
           $("#member_ongoing_update1").valid();
          if($('#services').val() == 'others'){
            $($('#services')).prop('disabled', true);
           
        }else{
             $($('#mec4')).prop('disabled', true);
        } 



       // if($("#services1").val() != '' && $('#staticBackdrop1 [name="appointment_date"]').val() != '' && $('#staticBackdrop1 [name="appointment_time"]').val() != '' && $("#payment_status1").val() != '' ){
        $.ajax({
        type:'post',
        url: '<?php echo base_url("Navigator/update_ongoing_member");?>',
        data: new FormData($("#member_ongoing_update1")[0]),
        contentType: false,
        processData: false, 
        success:function(resp){
        var data=$.parseJSON(resp);
        if(data.status == 'success'){
        $('#member_ongoing_update')[0].reset();
         $('#staticBackdrop1').modal('hide');
         $(".modal-backdrop").remove();


        $.wnoty({
        type: 'success',
        message: "Member Appointment Updated successfully",
        autohideDelay: 1000,
        position: 'top-right'

        });
        //  setTimeout(function(){
        //  location.reload(true);
        // },2000);
        var memberId = data.member.id;
        // console.log(data.member)
        var rowToUpdate = $("tr[data-id='" + memberId + "']");
        rowToUpdate.find(".center:eq(2)").text(data.member.name);
        rowToUpdate.find(".center:eq(3)").text(data.member.address);
        // rowToUpdate.find(".center:eq(4) a").text(data.member.number).attr("href", "tel:" + data.member.number);
        rowToUpdate.find(".center:eq(4)").text(data.member.services);
        rowToUpdate.find(".center:eq(5)").text(data.member.appointment_date);
        rowToUpdate.find(".center:eq(6)").text(data.member.appointment_time);
        rowToUpdate.find(".center:eq(7)").text(data.member.comments);
        rowToUpdate.find(".center:eq(8)").text(data.member.payment_status);
        rowToUpdate.find(".center:eq(9)").text(data.member.appointment_status);
       
       }else if(data.status == 'error'){
              $.wnoty({
                    type: 'error',
                    message: "Data Updated Failed",
                    autohideDelay: 2000,
                    position: 'top-right'

                    });
               setTimeout(function(){
         location.reload(true);
        },2000);
        }
        },
        });
       
        //}
        return false;
        })

       //delete
        $(document).on('click','.tblDelBtn', function (e) {
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
        url: '<?php echo base_url('Navigator/Memberdelete') ?>',
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