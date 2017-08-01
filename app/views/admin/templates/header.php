<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
	
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title><?php echo base_url();?> Guest Solution</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/apps/css/todo-2.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/imagepicker/image-picker/image-picker.css" rel="stylesheet" type="text/css" />
		
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url();?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
		
		<link href="<?php echo base_url();?>assets/global/css/components-hkt.css" rel="stylesheet" id="style_components" type="text/css" />
		
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url();?>assets/layouts/layout2/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/layouts/layout2/css/themes/hkt.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url();?>assets/layouts/layout2/css/custom.min.css" rel="stylesheet" type="text/css" />
		<link href="http://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
		
		<!--[if lt IE 9]>
<script src="<?php echo base_url();?>assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/excanvas.min.js"></script> 
<script src="<?php echo base_url();?>assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
	</head>
    <!-- END HEAD -->
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">

        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="<?php echo base_url()?>admin">
                        <img src="<?php echo base_url();?>assets/images/logo-site-header.png" alt="logo" class="logo-default" data-pin-nopin="true" style="width:120px; padding-top:20px"/> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN PAGE TOP -->
                <div class="page-top">
                    <!-- BEGIN HEADER SEARCH BOX -->
                    <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                    <form class="search-form search-form-expanded" action="" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..." name="query">
                            <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                        </div>
                    </form>
                    <!-- END HEADER SEARCH BOX -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right blue-">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
							<!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-dark">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="<?php echo base_url();?>assets/layouts/layout2/img/avatar3_small.jpg" />
                                    <span class="username username-hide-on-mobile"> Nick </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                   
                                    <li>
                                        <a href="page_user_login_1.html">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- END SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Monitor</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item ">
                                    <a href="<?php echo base_url()?>admin" class="nav-link ">
                                        <i class="fa fa-pie-chart"></i>
                                        <span class="title">Dashboard</span>
                                    </a>
                                </li>
								<li class="nav-item ">
                                    <a href="<?php echo base_url()?>admin/admin_assoc_history" class="nav-link ">
                                        <i class="fa fa-bar-chart"></i>
                                        <span class="title">Association History</span>
                                    </a>
                                </li>
								<li class="nav-item ">
                                    <a href="<?php echo base_url()?>admin/guest_list" class="nav-link ">
                                        <i class="fa fa-users"></i>
                                        <span class="title">Guest Summary</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="<?php echo base_url()?>admin/connected_devices" class="nav-link ">
                                        <i class="icon-screen-desktop"></i>
                                        <span class="title">End Devices</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
						
						<li class="nav-item">
							<a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-pointer"></i>
								<span class="title">Zone</span>
								<span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
							<ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>Zone" class="nav-link ">
                                        <i class="icon-layers"></i>
										<span class="title">Zones</span>
                                    </a>
                                </li>
								<li class="nav-item">
                                    <a href="<?php echo base_url()?>Nas" class="nav-link ">
                                        <i class="icon-grid"></i>
										<span class="title">NAS</span>
                                    </a>
                                </li>
								<li class="nav-item">
                                    <a href="<?php echo base_url()?>AccessPoint" class="nav-link ">
                                        <i class="icon-feed"></i>
										<span class="title">APs Mapping</span>
                                    </a>
                                </li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-note"></i>
								<span class="title">Pages</span>
								<span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
							<ul class="sub-menu">
                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>pages" class="nav-link ">
                                        <i class="icon-docs"></i>
										<span class="title">Login Pages</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url()?>campaign" class="nav-link ">
                                        <i class="icon-volume-2"></i>
                                        <span class="title">Campaign</span>
                                    </a>
                                </li>
								<li class="nav-item">
                                    <a href="<?php echo base_url()?>language/lang_list" class="nav-link ">
                                        <i class="icon-flag"></i>
                                        <span class="title">Language</span>
                                    </a>
                                </li>
                            </ul>
						</li>
						<li class="nav-item">
							<a href="" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">Report</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
							<ul class="sub-menu">
								<li class="nav-item  ">
									<a href="<?php echo base_url()?>admin/guest_list" class="nav-link nav-toggle">
										<i class="icon-users"></i>
										<span class="title">Guest by Social</span>
										<span class="selected"></span>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
								<i class="icon-settings"></i>
								<span class="title">Settings</span>
								<span class="selected"></span>
                                <span class="arrow open"></span>
							</a>
							<ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="<?php echo base_url()?>setting/email" class="nav-link ">
                                             <i class=""></i>
											<span class="title">SMTP Server   
                                        </a>
                                    </li> 
                                    <li class="nav-item  ">
                                        <a href="<?php echo base_url()?>setting/social" class="nav-link ">
                                             <i class=""></i>
                                            <span class="title">Social APIs   
                                        </a>
                                    </li>    
                                </li>   
                                </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                       
						<?php if($this->session->tempdata('msg')!=null){echo '<div id="alert_container" class="alert alert-success">'.$this->session->tempdata('msg').'</div>';}?>
					   