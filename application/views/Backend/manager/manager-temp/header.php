     <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <!-- logo start -->
                <div class="page-logo">
                    <a href="<?php echo base_url(); ?>">
                        <span class=""><img src="<?php echo base_url(); ?>assets/backend_assets/img/alogo.png"></span>
                        <span class="logo-default">AssistHealth</span> </a>
                </div>
                <!-- logo end -->
                <ul class="nav navbar-nav navbar-left in">
                    <li><a href="#" class="menu-toggler sidebar-toggler"><i data-feather="menu"></i></a></li>
                </ul>
            <!--     <form class="search-form-opened" action="#" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="query">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form> -->
                <!-- start mobile menu -->
                <a class="menu-toggler responsive-toggler" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                    <span></span>
                </a>
                <!-- end mobile menu -->
                <!-- start header menu -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                    <li>   <a href="<?php echo base_url(); ?>" type="button" class="btn btn-sm btn-circle btn-primary text-right" style="    margin: 10px;"><i class="fa-solid fa-arrow-left"></i> Back To Home</a></li>

                                 <!-- start notification dropdown -->
                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                            <a class="dropdown-toggle notifications-button" data-bs-toggle="dropdown" data-hover="dropdown"
                                data-close-others="true">
                                <i data-feather="bell"></i>
                                <span class="badge headerBadgeColor1 count"> 0 </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3><span class="bold">Notifications</span></h3>
                                    <!-- <span class="notification-label purple-bgcolor count">New </span> -->
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list small-slimscroll-style message-center" id="notifications-modal"  data-handle-color="#637283">
                                
                                    </ul>
                                   <div class="dropdown-menu-footer">
                                        <a href="#" class="clear" id="clear"> Clear All</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- end notification dropdown -->


                        <!-- end message dropdown -->
                        <!-- start manage user dropdown -->
                        <li class="dropdown dropdown-user">
                            <a class="dropdown-toggle" data-bs-toggle="dropdown" data-hover="dropdown"
                                data-close-others="true">
                                <img alt="" class="img-circle " src="<?php if($manager_data->profile_picture && file_exists(base_url('assets/uploads/manager_profile/').$manager_data->profile_picture) ) { echo base_url('assets/uploads/manager_profile/').$manager_data->profile_picture; }else{echo base_url('assets/default.png'); }?>" />
                                <span class="username username-hide-on-mobile"> <?= $manager_data->name ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">


                                <li>
                                    <a href="<?php echo base_url(); ?>Navigator/Logout">
                                        <i class="icon-logout"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- end manage user dropdown -->

                    </ul>
                </div>
            </div>
        </div>

        <style type="text/css">
      .read{
        display: none;
      }
      .txt-name{
        color: black;
        font-size: 12px;
        font-weight: bold;
        
         margin-left: 13%;
      }
           .time{
            max-width: none!important;
      }
  </style>