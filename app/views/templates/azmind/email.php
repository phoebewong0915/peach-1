<div class="row">	
	<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 form-box">	   
		<div class="form-bottom email">
			 
			<?php echo form_open("Api_email/email_signup", array("class" => "login-form", "name" => "email_login")); ?>

			<div class="form-group">
				<label class="sr-only" for="email">Email</label>
				<input type="text" name="email" class="form-username form-control" id="email">
				<?php echo form_error('email', '<div class="error">', '</div>'); ?>
			</div>
				<button type="submit" id="email_button" class="btn btn-link-1 "><i class="fa fa-envelope"></i>Log me in</button>
			 
			<?php echo form_close(); ?>
		</div>
	</div>
</div>