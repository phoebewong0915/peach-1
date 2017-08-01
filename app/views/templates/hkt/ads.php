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
</nav>
</header>
<!-- /End of Header/Navigation -->

<!-- Jumbotron -->
<div class="jumbotron">
	<div class="ads">
	<?php if ($content[0]->campaign_template == 'Single_video') {
			echo $content[0]->campaign_content;
		  }
		  else
		  {
			echo  '<a href="'.base_url().''.$content[0]->img_link.'"> <img src="'.base_url().'uploads/images/'.$content[0]->campaign_content.'" alt="" > </a>';
		  } ?>
	<p>Your login will be ready in  <span id="timeLeft" ><?php echo $content[0]->ads_waiting_time ?></span> Seconds</p>
	
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

    <!-- jQuery first, then Bootstrap JS. -->
    <script src="<?php echo base_url();?>template/hkt/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>template/hkt/js/bootstrap.min.js"></script>
	<script>
	$(document).ready(function() {  
		window.setInterval(function() {
		var timeLeft    = $("#timeLeft").html();                                
			if(eval(timeLeft) == 0){
					window.location= "<?php echo $redirect;?>";                 
			}else{              
				$("#timeLeft").html(eval(timeLeft)- eval(1));
			}
		}, 1000); 
	}); 
	</script>

  </body>
</html>