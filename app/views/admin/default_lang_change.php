<div class="portlet light bordered">
   <div class="portlet-title">
      <div class="caption">
         <i class="icon-equalizer font-red-sunglo"></i>
         <span class="caption-subject font-red-sunglo bold uppercase">Create A New Language</span>
         <span class="caption-helper">Language</span>
      </div>
   </div>
   <div class="portlet-body form">
      <!-- BEGIN FORM-->
      <?php echo form_open("Admin/lang_change_update",'class="form-horizontal"');?>
      <div class="form-body">
         
         <div class="form-group">
            <label class="col-md-2 control-label">Default Language</label>
            <div class="col-md-4">
               	<select class="form-control" name="id">
	                <option value="">Select...</option>
	                <?php foreach($lang as $data)
	                {
	                	echo '<option value='.$data->id.'>'.$data->lang.'</option>'
	               ; }
	                ?>
	            </select>
            </div>
         </div>
      </div>
      <div class="form-actions">
         <div class="row">
            <div class="col-md-offset-3 col-md-4">
               <button type="submit" class="btn green">Submit</button>
               <a href="<?php echo base_url("admin/lang_list")?>" class="btn btn-default btn-fill" type="button">Cancel</a>
            </div>
         </div>
      </div>
      <?php form_close(); ?>
      <!-- END FORM-->
   </div>
</div>


														