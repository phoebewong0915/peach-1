<div class="portlet light bordered">
   <div class="portlet-title">
      <div class="caption">
         <i class="fa fa-envelope"></i>
         <span class="caption-subject font-sunglo bold uppercase">System Setting</span>
         <span class="caption-helper">System Setting</span>
      </div>
   </div>

   <div class="portlet-body">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">Apache Status</h3>
			</div>
			<div class="panel-body"><?php echo $httpd_status ?></div>
		</div>
   </div>
   <div class="portlet-body">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">Mysql Status</h3>
			</div>
			<div class="panel-body"><?php echo $mariadb_status ?></div>
		</div>
   </div>
   <div class="portlet-body">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<h3 class="panel-title">Radius Server Status</h3>
			</div>
			<div class="panel-body"><?php echo $radiusd_status ?></div>
			<div><a href="<?php echo base_url('setting/restart_radiusd'); ?>" class="btn btn-outline btn-circle btn-sm blue" >Restart Service</a></div>
		</div>
   </div>
   <div class="portlet-body">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<h3 class="panel-title">Last backup time</h3>
			</div>
			<div class="panel-body"><?php echo $backup_status ?></div>
		</div>
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