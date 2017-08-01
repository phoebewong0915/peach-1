<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> <?php echo $content[0]->title; ?> </title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>template/hkt/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>template/hkt/css/hkt.css">
	
	<link rel="icon" type="image/x-icon" href="<?php echo base_url();?>template/hkt/favicon.ico">
  </head>
  <body>
   <div class="container">
<!-- Header/Navigation -->
<header>
  <nav class="navbar navbar-light bg-faded">
  <a class="navbar-brand" href="#" style="color:#00427b; font-weight: 700;">HKT</a>
  <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
    &#9776;
	
  </button>
  <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
    
    <ul class="nav navbar-nav pull-xs-right">
	  <?php foreach($page_lang as $data)
      {
		echo '<li class="nav-item active">';
		echo '<a class="nav-link" href="'.base_url().'guest/change_lang/'.$data->lang_code.'/'.$content[0]->page_name.'">'.$data->lang_text.'</a>';
		echo '</li>';
      } 
      ?>
      
    </ul>
  </div>
</nav>
</header>
<!-- /End of Header/Navigation -->

<!-- Carouser/Slider -->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
	<li data-target="#carousel-example-generic" data-slide-to="2"></li>
	<li data-target="#carousel-example-generic" data-slide-to="2"></li>
	<li data-target="#carousel-example-generic" data-slide-to="2"></li>
	<li data-target="#carousel-example-generic" data-slide-to="2"></li>
	<li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img src="<?php echo base_url();?>template/hkt/images/1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url();?>template/hkt/images/2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url();?>template/hkt/images/3.jpg" alt="Third slide">
    </div>
	<div class="carousel-item">
      <img src="<?php echo base_url();?>template/hkt/images/4.jpg" alt="Third slide">
    </div>
	<div class="carousel-item">
      <img src="<?php echo base_url();?>template/hkt/images/5.jpg" alt="Third slide">
    </div>
	<div class="carousel-item">
      <img src="<?php echo base_url();?>template/hkt/images/6.jpg" alt="Third slide">
    </div>
	<div class="carousel-item">
      <img src="<?php echo base_url();?>template/hkt/images/7.jpg" alt="Third slide">
    </div>
  </div>
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="icon-prev" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="icon-next" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- /End of Carousel/Slider -->



<!-- Jumbotron -->
<div class="jumbotron">

<!-- First Page -->
<div id="first"  class="first-page">
	<?php echo $content[0]->first_page; ?>
	<button id="btn-agree" type="submit" class="btn btn-primary"><?php echo $agree?></button>
	<button id="btn-cancel" type="submit" class="btn btn-danger"><?php echo $disagree?></button>
</div>
<!-- First Page -->

<!-- Login Form -->
<div id="login" class="nb-login">

	<!-- Login Page Content -->
	<?php echo $content[0]->login_page; ?>
	<!-- Login Page Content -->
	
	<!-- Email Sign-In Form -->
	<?php echo form_open("emailauth/email_signup", array("class" => "login-form", "name" => "email_login"));?>
		<div class="form-group">
            <input type="email" name="email" placeholder="E-mail..." class="form-username form-control" id="email" required>
        </div><button type="submit" class="btn btn-block"><?php echo $sign_in?></button>
    <?php echo form_close();?>
	<!-- Email Sign-In Form -->
		
	<?php 
		if($content[0]->email_button_status == 1 && ($content[0]->fb_button_status != null || $content[0]->tw_button_status != null || $content[0]->ig_button_status != null) )
        { 
		echo '<div class="center or">'.$or.'</div><h3 class="center">'.$sign_in_using.'</h3>'; 
		}    
	?>
    
	<div class="social">
		<?php foreach ($providers as $provider) {echo $provider;}?>
	</div>
</div>

<div id="disagree">
<h1>Bye!</h1>	
</div>

</div>


<!-- footer -->
<footer>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <p>&copy; 2016. Free Wi-Fi @ <a href="https://www.hkt.com/">HKT</a></p>
      </div>
    </div>
  </div>
</footer>
</div>



<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Terms &amp; Conditions</h4>
        </div>
        <div class="modal-body">
			<?php echo $content[0]->disclaimer; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

    <!-- jQuery first, then Bootstrap JS. -->
    <script src="<?php echo base_url();?>template/hkt/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>template/hkt/js/bootstrap.min.js"></script>
    <script>
		// Disable login screen by first load
		$( document ).ready(function() {
			$("#login").hide();
			$("#disagree").hide();
		});
		
		$("#btn-agree").click(function(){
			$("#first").hide();
			$("#login").show();
		});
		
		$("#btn-cancel").click(function(){
			$("#first").hide();
			$("#login").hide();
			$("#disagree").show();
		});
		
    </script>
	
  </body>
</html>