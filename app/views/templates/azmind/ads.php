<?php include 'templates/azmind/header.php';?>
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

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/zh_HK/sdk.js#xfbml=1&version=v2.9&appId=602934816573982";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</head>

<!-- Top content -->
<div class="top-content">
   <div class="inner-bg">
      <div class="container">
         
		 <div>
		<h1>You will be logged in to WIFI Network within <span id="timeLeft" ><?php echo $content[0]->ads_waiting_time ?></span> Seconds</h1>
		</div>

		 <!-- -->
		 <!-- -->
		 <!-- -->
		 <?php if ($content[0]->campaign_template == 'Single_video') {
			 echo $content[0]->campaign_content;}
			 else{
			 	echo  ' <a href="'.$content[0]->img_link.'"> <img src="'.base_url().'uploads/images/'.$content[0]->campaign_content.'" alt="" > </a>';
			 } ?>
				
		 
		 <!-- 

		<div class="fb-page" 
		data-href="https://www.facebook.com/hkcsl/" 
		data-tabs="timeline" 
		data-small-header="false" 
		data-adapt-container-width="true" 
		data-hide-cover="false" 
		data-show-facepile="true">
			<blockquote cite="https://www.facebook.com/hkcsl/" class="fb-xfbml-parse-ignore">
				<a href="https://www.facebook.com/hkcsl/">csl</a>
			</blockquote></div>-->
			
		<!-- 	
			<div class="fb-like" 
			data-href="http://www.hkt.com" 
			data-layout="standard" 
			data-action="like" 
			data-size="large" 
			data-show-faces="true" 
			data-share="true"></div>-->
		 </div>
      </div>
   </div>
</div>

</body>
</html>