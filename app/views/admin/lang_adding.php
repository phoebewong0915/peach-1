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
      <?php echo form_open("Language/lang_add",'class="form-horizontal"');?>
      <div class="form-body">
         <p class="text-danger" ><?php echo $exist; ?></p>
         <div class="form-group">
            <label class="col-md-2 control-label">Language Name</label>
            <div class="col-md-4">
               <input type="text" class="form-control" name="lang" placeholder="Enter Language Name">
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-2 control-label">Language Code</label>
            <div class="col-md-4">
               <input type="text" class="form-control" name="lang_code" placeholder="Enter Language Code">
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-2 control-label">Language Text</label>
            <div class="col-md-4">
               <input type="text" class="form-control" name="lang_text" placeholder="Enter Language Text">
            </div>
         </div>
      </div>
      <div class="form-actions">
         <div class="row">
            <div class="col-md-offset-3 col-md-4">
               <button type="submit" class="btn green">Submit</button>
               <a href="<?php echo base_url("language/lang_list")?>" class="btn btn-default btn-fill" type="button">Cancel</a>
            </div>
         </div>
      </div>
      <?php form_close(); ?>
      <!-- END FORM-->
   </div>
</div>