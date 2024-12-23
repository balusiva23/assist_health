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
</head>
<!-- END HEAD -->

<body
    class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
    <div class="page-wrapper">
        <!-- start header -->
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
                                <div class="page-title">Speciality</div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="d-flex justify-content-end">
                                  <a type="button" data-bs-toggle="modal" data-bs-target="#smallModel" 
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary text-right"  style="text-transform: capitalize;">Add Speciality
								</a>
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
                                                                    <th class="center" style="width: 40%;"> Name </th>
                                                                    <th class="center" style="width: 10%;"> Update / Delete</th>
                                                                </tr>
                                                            </thead>
                                                  
                                             <tbody>
                                                <?php

                                                 if (!empty($specialities)) {
                                                    $count = 1;
                                                    foreach ($specialities as $speciality) { ?>
                                                        <tr class="odd gradeX" data-id="<?=$speciality->id;?>">
                                                            
                                                            <td class="center"><?php echo $count; ?></td>
                                                            <td class="center"><?php echo $speciality->name; ?></td>
                                                            <td class="center">
                                                                <a href="#" class="tblEditBtn" data-id="<?php echo $speciality->id; ?>">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                <a href="#" class="delete tblDelBtn" data-id="<?php echo $speciality->id; ?>">
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
     <?php $this->load->view('Backend/manager/manager-temp/footer'); ?> 

    <div class="modal fade" id="smallModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form  id="form_sample_add" class="form-horizontal" method="post " enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Add Speciality
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
						<label class="control-label col-md-3"> Name
							<span class="required"> * </span>
						</label>
						<div class="col-md-8">
							<input type="text" name="specialityname" data-required="1" placeholder="Enter Name"
								class="form-control input-height" required />
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
        <div class="modal-dialog modal-lg">
             <form  id="form_sample_1" class="form-horizontal" method="post " enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Update Speciality</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   
                     <div class="form-group row">
						<label class="control-label col-md-3"> Name
							<span class="required"> * </span>
						</label>
						<div class="col-md-8">
							<input type="text" name="specialityname" data-required="1" placeholder="Enter Name"
								class="form-control input-height" />
						</div>
					</div>
                  
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id">
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

          $(document).on('click','#save_nav',function(){
        event.preventDefault();
        $("#form_sample_add").valid();


       
         var specialityname = $("input[name='specialityname']").val();
       
    if (specialityname !== '' ) {
          


        $.ajax({
        type:'post',
        url: '<?php echo base_url("Navigator/Save_Speciality");?>',
        data: new FormData($("#form_sample_add")[0]),
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
        }
        },
        });
        } else {

        }

        return false;
        })

  

          $('#example_tbl').on('click', '.tblEditBtn', function() {
       // $('.tblEditBtn').click(function() {
            // Get the data attributes from the button
            var id = $(this).data('id');
            

            // Make an AJAX request to retrieve the data for the ID
            $.ajax({
                url: '<?php echo base_url("Navigator/getSpecialityById"); ?>?id=' + id,
                method: 'GET',
                data: { id: id },
                dataType: 'json',
                success: function(response) {
                    // Populate the modal with the data returned from the server
                    $('#staticBackdrop [name="id"]').val(response.id);
                    $('#staticBackdrop [name="specialityname"]').val(response.name);
                   
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
        $.ajax({
			type:'post',
			url: '<?php echo base_url("Navigator/update_speciality");?>',
			data: new FormData($("#form_sample_1")[0]),
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
					setTimeout(function(){location.reload(true);},2000);
				}else if(data.status == 'error'){
					$('#staticBackdrop').modal('hide');
					$(".modal-backdrop").remove();
					$.wnoty({
						type: 'error',
						message: data.message,
						autohideDelay: 2000,
						position: 'top-right'
					});
					setTimeout(function(){location.reload(true);},2000);
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
    url: '<?php echo base_url('Navigator/delete_speciality') ?>',
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

function toggleIntro(button) {
    var row = button.closest('tr');
    var introShort = row.querySelector('.intro-short');
    var introMore = row.querySelector('.intro-more');
    
    if (introMore.style.display === 'none') {
        introShort.style.display = 'none';
        introMore.style.display = 'inline';
        button.textContent = 'Read Less';
    } else {
        introShort.style.display = 'inline';
        introMore.style.display = 'none';
        button.textContent = 'Read More';
    }
}


</script>

</body>

 

</html>