<div class="portlet light bordered">
   <div class="portlet-title">
      <div class="caption">
         <i class="icon-equalizer font-red-sunglo"></i>
         <span class="caption-subject font-red-sunglo bold uppercase">Language Editor-<?php echo $lang[0]->lang ?></span>
         <span class="caption-helper"> Language Setting</span>
      </div>
   </div>
   <div class="portlet-body form">
      <!-- BEGIN FORM-->
      <?php $temp_arr = array("class" => "form-horizontal", "name" => "loginpage_edit_update");  echo form_open("Language/lang_edit_update", $temp_arr);?>
      <input type="text" class="hidden" name="id" value="<?php echo $lang[0]->id ?>" >
      <div class="form-body">
         
         <div class="form-group">
            <label class="col-md-2 control-label">Language Name</label>
            <div class="col-md-4">
               <input class="form-control" name="lang" type="text" value="<?php echo $lang[0]->lang ?>">
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-2 control-label">Language Code</label>
            <div class="col-md-4">
               <input class="form-control" name="lang_code" type="text" value="<?php echo $lang[0]->lang_code ?>">
            </div>
         </div>
         <div class="form-group">
            <label class="col-md-2 control-label">Language Text</label>
            <div class="col-md-4">
               <input type="text" class="form-control" name="lang_text" value="<?php echo $lang[0]->lang_text ?>">
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