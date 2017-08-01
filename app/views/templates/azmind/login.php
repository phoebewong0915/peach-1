<?php// include 'templates/azmind/header.php';?>

<div class='topbar'>
   <?php foreach($page_lang as $data)
      {
      echo '<a style="color:#ffffff" href="'.base_url().'guest/change_lang/'.$data->lang_code.'/'.$content[0]->page_name.'">'.$data->lang_text.' | </a>';
      } 
      ?>
</div>
<h2><?php echo $this->session->flashdata('item'); ?></h2> 
<!-- Top content -->
<div class="top-content">
   <div class="inner-bg">
      <div class="container">
         
		 <!-- -->
		 <!-- -->
		 <!-- -->
		 
		 <?php echo $content[0]->login_page; ?>
		 <p id="demo"> </p>
		 <!-- -->
		 <!-- -->
		 <!-- -->
		 
		 <?php
         if($content[0]->email_button_status == 1)
         { 
			 echo '<div class="row">	<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 form-box">	   <div class="form-bottom email">';
			 
			 echo form_open("Api_email", array("class" => "login-form", "name" => "email_login"));

			 echo '<div class="form-group">
					<label class="sr-only" for="email">Email</label>
					<input type="text" name="email" class="form-username form-control" id="email">';
			 echo form_error('email', '<div class="error">', '</div>');
			 echo '</div><button type="submit" id="email_button" class="btn btn-link-1 "><i class="fa fa-envelope"></i>Log me in</button>';
			 
			 echo form_close();
			 echo '</div></div></div>';
			 
         } ?>
		 
		 <!-- -->
		 <!-- -->
		 <!-- -->
		 
         <div class="row">
            <div class="col-sm-12 social-login">
               <?php if($content[0]->email_button_status == 1 && ($content[0]->fb_button_status != null || $content[0]->tw_button_status != null || $content[0]->ig_button_status != null) )
                  { echo "<h4>...or login with:</h4>"; }
               ?>
               
			   <div class="social-login-buttons">
                  <?php 
                     /*
                     foreach($login_button_enabled as $button) {
                     	echo '<a class="btn '.$button->css_class.' " href="'.base_url('guest/'.$button->social_login_type.'_api').
                     	'"> <i class="fa '.$button->css_icon.'"></i>'.$button->text.' </a>'; //expected path guest/facebook
                     }
                     */
                     if($content[0]->fb_button_status == 1)
                     {
                     	echo '<a class="btn btn-link-1 btn-link-1-facebook " id="fb_button" href="'.base_url('api_facebook/facebook_api').
                     	'"> <i class="fa fa-facebook"></i> Facebook </a>'; //expected path guest/facebook'
                     }
                     
                     if($content[0]->tw_button_status == 1)
                     {
                     	echo '<a class="btn btn-link-1 btn-link-1-twitter " id="tw_button" href="'.base_url('api_twitter/twitter_api').
                     	'"> <i class="fa fa-twitter"></i> Twitter </a>'; //expected path guest/facebook'
                     }
                     
                     if($content[0]->ig_button_status == 1)
                     {
                     	echo '<a class="btn btn-link-1 btn-link-1-instagram " id="ig_button" href="'.base_url('api_instagram/instagram_api').
                     	'"> <i class="fa fa-instagram"></i> Instagram </a>'; //expected path guest/facebook'
                     }
                     	
                     ?>
               </div>
            </div>
         </div>
		 
		 <div class="row">
			<?php if($content[0]->iagree_status == 1)
                     {
                     	echo '
						<style>
						/* The Modal (background) */
						.modal {
							display: none; /* Hidden by default */
							position: fixed; /* Stay in place */
							z-index: 1; /* Sit on top */
							left: 0;
							top: 0;
							width: 100%; /* Full width */
							height: 100%; /* Full height */
							overflow: auto; /* Enable scroll if needed */
							background-color: rgb(0,0,0); /* Fallback color */
							background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
						}

						/* Modal Content/Box */
						.modal-content {
							background-color: #fefefe;
							margin: 5% auto; /* 15% from the top and centered */
							padding: 20px;
							border: 1px solid #888;
							width: 90%; /* Could be more or less, depending on screen size */
						}

						/* The Close Button */
						.close {
							color: #aaa;
							float: right;
							font-size: 28px;
							font-weight: bold;
						}

						.close:hover,
						.close:focus {
							color: black;
							text-decoration: none;
							cursor: pointer;
						}
						</style>
						
						<!-- Trigger/Open The Modal -->
						<div class="checkbox">

            <label style="font-size: 1em;>
                <input type="checkbox" value="" checked="">
                <span class="cr"></span><h4>
                I do agree the above</br><a id="myBtn"> Terms & Condition</a></h4></div>

						<!-- The Modal -->
						<div id="myModal" class="modal">

						  <!-- Modal content -->
						  <div class="modal-content">
							<span class="close">&times;</span>
							'.$content[0]->disclaimer.'
						  </div>

						</div>
						
						<script>
						// Get the modal
						var modal = document.getElementById("myModal");

						// Get the button that opens the modal
						var btn = document.getElementById("myBtn");

						// Get the <span> element that closes the modal
						var span = document.getElementsByClassName("close")[0];

						// When the user clicks on the button, open the modal 
						btn.onclick = function() {
							modal.style.display = "block";
						}

						// When the user clicks on <span> (x), close the modal
						span.onclick = function() {
							modal.style.display = "none";
						}

						// When the user clicks anywhere outside of the modal, close it
						window.onclick = function(event) {
							if (event.target == modal) {
								modal.style.display = "none";
							}
						}
						</script>
						';
                     }?>
		 </div>
      </div>
   </div>
</div>
<footer class="footer"><?php echo "All right reserved to HKT" ?></footer>
</body>
</html>