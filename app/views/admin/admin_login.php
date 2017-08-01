<html lang="en"><!--<![endif]--><!-- BEGIN HEAD --><head>
        <meta charset="utf-8">
        <title>Metronic Admin Theme #1 | User Login 5</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta content="Preview page of Metronic Admin Theme #1 for " name="description">
        <meta content="" name="author">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("/assets/global/plugins/font-awesome/css/font-awesome.min.css")?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("/assets/global/plugins/simple-line-icons/simple-line-icons.min.css")?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("/assets/global/plugins/bootstrap/css/bootstrap.min.css")?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css")?>" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url("/assets/global/plugins/select2/css/select2.min.css")?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("/assets/global/plugins/select2/css/select2-bootstrap.min.css")?>" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url("/asset/global/css/components-rounded.min.css")?>" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url("/assets/global/css/plugins.min.css")?>" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo base_url("/assets/pages/css/login-5.min.css")?>" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico"> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN : LOGIN PAGE 5-1 -->
        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-6 bs-reset mt-login-5-bsfix">
                    <div class="login-bg " style="background: none; position: relative; z-index: 0;">
					</div>
                        <!-- <div class="backstretch" style="left: 0px; top: 0px; overflow: hidden; margin: 0px; padding: 0px; height: 794px; width: 800px; z-index: -999998; position: absolute;"><img style="position: absolute; margin: 0px; padding: 0px; border: none; width: 882.222px; height: 794px; max-height: none; max-width: none; z-index: -999999; left: -41.1111px; top: 0px;" src="../assets/pages/img/login/bg1.jpg"></div></div>-->
                </div>
                <div class="col-md-6 login-container bs-reset mt-login-5-bsfix">
				<img class="login-logo" src="<?php echo base_url("assets/img/hkt_logo.png")?>">
                    <div class="login-content">
                        <h1>Guest Portal Admin Login</h1>
                        <p> HiHi! Bla Bla Bla~ </p>
                        <?php echo form_open('admin/login', array('class' => "login-form", 'id' => "login-form")) ?>
						<!--<form action="javascript:;" class="login-form" method="post" novalidate="novalidate"> -->
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                <span>Enter any username and password. </span>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Username" name="username" required="" aria-required="true"> </div>
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password" name="password" required="" aria-required="true"> </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="rem-password">
                                        <label class="rememberme mt-checkbox mt-checkbox-outline">
                                            <input type="checkbox" name="remember" value="1"> Remember me
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-8 text-right">
                                    <div class="forgot-password">
                                        <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                                    </div>
                                    <button class="btn green" type="submit">Sign In</button>
                                </div>
                            </div>
                        <?php echo form_close() ?>
                        <!-- BEGIN FORGOT PASSWORD FORM -->
                        <form class="forget-form" action="javascript:;" method="post" style="display: none;">
                            <h3 class="font-green">Forgot Password ?</h3>
                            <p> Enter your e-mail address below to reset your password. </p>
                            <div class="form-group">
                                <input class="form-control placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Email" name="email"> </div>
                            <div class="form-actions">
                                <button type="button" id="back-btn" class="btn green btn-outline">Back</button>
                                <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
                            </div>
                        </form>
                        <!-- END FORGOT PASSWORD FORM -->
                    </div>
                    <div class="login-footer">
                        <div class="row bs-reset">
                            
                            <div class="col-xs-5 bs-reset">
                                <div class="login-copyright text-right">
                                    <p>Copyright © HKT-WIFITEAM 2017</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END : LOGIN PAGE 5-1 -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url("/assets/global/plugins/jquery.min.js")?>" type="text/javascript"></script>
        <script src="<?php echo base_url("/assets/global/plugins/bootstrap/js/bootstrap.min.js")?>" type="text/javascript"></script>
        <script src="<?php echo base_url("/assets/global/plugins/js.cookie.min.js")?>" type="text/javascript"></script>
        <script src="<?php echo base_url("/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js")?>" type="text/javascript"></script>
        <script src="<?php echo base_url("/assets/global/plugins/jquery.blockui.min.js")?>" type="text/javascript"></script>
        <script src="<?php echo base_url("/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js")?>" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url("/assets/global/plugins/jquery-validation/js/jquery.validate.min.js")?>" type="text/javascript"></script>
        <script src="<?php echo base_url("/assets/global/plugins/jquery-validation/js/additional-methods.min.js")?>" type="text/javascript"></script>
        <script src="<?php echo base_url("/assets/global/plugins/select2/js/select2.full.min.js")?>" type="text/javascript"></script>
        <script src="<?php echo base_url("/assets/global/plugins/backstretch/jquery.backstretch.min.js")?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url("/assets/global/scripts/app.min.js")?>" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url("/assets/pages/scripts/login-5.min.js")?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script>
		<!-- Google Code for Universal Analytics -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		  ga('create', 'UA-37564768-1', 'auto');
		  ga('send', 'pageview');
		</script>
		<!-- End -->

		<!-- Google Tag Manager -->
		<noscript>&lt;iframe src="//www.googletagmanager.com/ns.html?id=GTM-W276BJ"
		height="0" width="0" style="display:none;visibility:hidden"&gt;&lt;/iframe&gt;</noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-W276BJ');</script>
		<!-- End -->



</body>

</html>