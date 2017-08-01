<div class="portlet light bordered">
   <div class="portlet-title">
      <div class="caption">
         <i class="fa fa-envelope"></i>
         <span class="caption-subject font-sunglo bold uppercase">SMTP Setting</span>
         <span class="caption-helper">Email Server Setup</span>
      </div>
   </div>

   <div class="portlet-body form">
      <!-- BEGIN FORM-->
      <?php echo form_open("setting/email_update",'class="form-horizontal"');?>
      <div class="form-body">
         
         <div class="form-group">
            <label class="col-md-2 control-label">SMTP Host</label>
            <div class="col-md-4">
               <input type="text" class="form-control" name="smtp_host" value="<?php echo $data[0]->smtp_host ?>" required>
            </div>
         </div>
          <div class="form-group">
            <label class="col-md-2 control-label">SMTP Port</label>
            <div class="col-md-4">
               <input type="text" class="form-control" name="smtp_port" value="<?php echo $data[0]->smtp_port ?>" required>
            </div>
          </div>
		  <div class="form-group">
            <label class="col-md-2 control-label">Sender Name</label>
            <div class="col-md-4">
               <input type="text" class="form-control" name="sender" value="<?php echo $data[0]->sender ?>" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Server Login Username</label>
            <div class="col-md-4">
               <input type="email" class="form-control" name="smtp_user" value="<?php echo $data[0]->smtp_user ?>" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">SMTP Password</label>
            <div class="col-md-4">
               <input type="password" class="form-control" name="smtp_pass" value="<?php echo $data[0]->smtp_pass ?>" required>
            </div>
           </div>
           <div class="form-group">
            <label class="col-md-2 control-label">Email Subject</label>
            <div class="col-md-4">
               <input type="text" class="form-control" name="subject" value="<?php echo $data[0]->subject ?>" required>
            </div>
           </div>
			<div class="form-group">
            <label class="col-md-2 control-label">Email Title</label>
            <div class="col-md-4">
               <input type="text" class="form-control" name="email_title" value="<?php echo $data[0]->email_title ?>" required>
            </div>
           </div>
         <div class="form-group">
            <label class="col-md-2 control-label">Email message</label>
            <div class="col-md-4">
               <div class="form-group last">
                  <div class="col-md-12">
                     <textarea class="ckeditor form-control" name="email_message" rows="3" data-error-container="" value="<?php echo $data[0]->email_message ?>"><?php echo $data[0]->email_message ?></textarea>
                  </div>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-2 control-label">Email sign-in button</label>
            <div class="col-md-4">
               <input type="text" class="form-control" name="email_button" value="<?php echo $data[0]->email_button ?>"  required>
            </div>
			<span>Edit Sign-in Button Text</span>
           </div>
      <div class="form-actions">
         <div class="row">
            <div class="col-md-offset-3 col-md-6">
			   <button id="submit_email" class="btn red" type="button"><i class="fa fa-arrow-left fa-fw"></i> Start Test</button>
			   <button type="submit" class="btn green">Update Setting</button>
			   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> Launch Email Test </button>
            </div>
         </div>
      </div>
      <?php form_close(); ?>
      <!-- END FORM-->
   </div>
</div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Email Test</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  
	  <?php	echo form_open(); ?>
	  <div class="input-group">
		<div class="input-icon">
        <i class="fa fa-envelope"></i>
        <input id="email" class="form-control" type="email" name="email" placeholder="Please Enter E-mail to test"> </div>
		<span class="input-group-btn">
			<button id="submit_email" class="btn btn-success" type="button">
				<i class="fa fa-arrow-left fa-fw"></i> Start Test</button>
		</span>
	  </div>
	  <?php echo form_close(); ?>
	 	  
	    <div id='result_show' style='display: none'>
			<label class='label_output'>Testing result :<div id='value'> </div></label>
		</div>
	</div>

		<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
	  
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
$("#submit_email").click(function(event) {
event.preventDefault();
var email = $("#email").val();
jQuery.ajax({
type: "POST",
url: "<?php echo base_url(); ?>" + "/emailauth/email_test",
dataType: 'json',
data: {email: email},
success: function(res) {
if (res)
{
// Show Entered Value
jQuery("#result_show").show();
jQuery("#value").html(res);
}
}
});
});
});
</script>