<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/imagepicker/image-picker/image-picker.css">
<div class="portlet light bordered">
   <div class="portlet-title">
      <div class="caption">
         <i class="fa fa-gift"></i>Campaign Edit -   <?php echo $setting_result[0]->campaign_name ?>
         <a href="<?php echo base_url('campaign/load/'.$setting_result[0]->campaign_id); ?>" target="_blank" class="btn btn-outline btn-circle btn-sm blue" >Preview</a>
         <p class="text-danger" ><?php echo $double_AD; ?></p>
      </div>
   </div>
   <div class="portlet-body" style="display: block;">
      <div class="row">
         <div class="col-md-2 col-sm-2 col-xs-2">
            <ul class="nav nav-tabs tabs-left">
               <li class="active">
                  <a href="#page_general" data-toggle="tab" aria-expanded="true">Campaign Setting</a>
               </li>
               <li class="">
                  <a href="#page_ads" data-toggle="tab" aria-expanded="false">Target Audience</a>
               </li>
            </ul>
         </div>
         <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <?php echo form_open("Campaign/campaign_edit_update", array("class" => "form-horizontal", "name" => "campaign_edit_update"));?>
            <input type="text" class="hidden" name="campaign_id" value="<?php echo $campaign_id ?>" >
            <div class="form-body">
               <div class="col-md-10 col-sm-10 col-xs-10">
                  <div class="tab-content">
                     <div class="tab-pane active in" id="page_general">
                        <div class="form-group">
                           <label class="control-label col-md-2">Campaign Name: </label>
                           <div class="col-md-9">
                              <input class="form-control" value="<?php echo $setting_result[0]->campaign_name ?>" name="campaign_name" type="text" >
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label col-md-2">Campaign Location: </label>
                           <div class="col-md-9">
                              <input class="form-control" value="<?php echo $setting_result[0]->campaign_location ?>" name="campaign_location" type="text" >
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label col-md-2">Ads Time-Out(SEC.): </label>
                           <div class="col-md-9">
                              <input class="form-control" value="<?php echo $setting_result[0]->ads_waiting_time ?> " name="ads_waiting_time" type="text" > 
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label col-md-2">Campaign: </label>
                           <div class="col-md-9">
                              <div class="tabbable-custom nav-justified">
                                 <ul class="nav nav-tabs nav-justified">
                                    <li class="<?php if ($setting_result[0]->campaign_template == 'Single_img') { echo "active";}?>">
                                       <a href="#tab11" name="campaign_template" value="Single_img" data-toggle="tab" aria-expanded="false"><i class="fa fa-image"></i> Image </a>
                                    </li>
                                    <li class="<?php if ($setting_result[0]->campaign_template == 'Single_video') { echo "active";}?>">
                                       <a href="#tab12" name="campaign_template" value="Single_video" data-toggle="tab" aria-expanded="false"><i class="fa fa-youtube-play"></i> Youtube </a>
                                    </li>
                                 </ul>
                                 <div class="tab-content">
                                    <div class="tab-pane <?php if ($setting_result[0]->campaign_template == 'Single_img') { echo "active";}?>" id="tab11">
                                       <select class="image-picker hidden" name="campaign_image" >
                                          <option value=""></option>
                                          <?php
                                             foreach($image as $img)
                                             {                                    
                                             if($img->video_name==$setting_result[0]->campaign_content){$tmp = 'selected';}else{$tmp = "";}
                                             echo '<option '.$tmp.' data-img-src="'.base_url().''. $img->video_path . '/' . $img->video_name.'" value="'.$img->video_name.'">'.$img->video_name.'</option>';
                                             }           
                                             ?>
                                       </select>
                                       <a href="<?php echo base_url("/media/image")?>" class="btn blue-hoki" target="_blank"></i> Upload Image </a>
                                    </div>
                                    <div class="tab-pane <?php if ($setting_result[0]->campaign_template == 'Single_video') { echo "active";}?>" id="tab12">
                                       <label>YouTube Embed Link</label>
                                       <div class="input-group">
                                          <span class="input-group-addon">
                                          <i class="fa fa-youtube"></i>
                                          </span>
                                          <input type="text" class="form-control" placeholder="Paste your LINK here!" name="campaign_youtube" value="<?php echo $setting_result[0]->campaign_youtube; ?>">
                                       </div>
                                       <br>
                                       <label>YouTube Setting:</label>
                                       <div class="mt-checkbox-inline">
                                          <label class="mt-checkbox mt-checkbox-outline">
                                          <input type="hidden" id="youtube_autoplay" name="youtube_autoplay" value="0" />
                                          <input type="checkbox" id="youtube_autoplay" name="youtube_autoplay" value="1" > Autoplay
                                          <span></span>
                                          </label>
                                          <label class="mt-checkbox mt-checkbox-outline">
                                          <input type="hidden" name="youtube_control" value="1" />
                                          <input type="checkbox" name="youtube_control" value="0" >Hidden Controls                                         
                                          <span></span>
                                          </label>
                                          <label class="mt-checkbox mt-checkbox-outline">
                                          <input type="hidden" name="youtube_loop" value="0" />
                                          <input type="checkbox" name="youtube_loop" value="1" >Enable loop modes
                                          <span></span>
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <textarea class="hidden" rows="4" cols="50" id="path_display"><?php echo $setting_result[0]->campaign_content; ?></textarea>
                              <span class="help-block"> </span>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label col-md-2">Campaign Period: </label>
                           <div class="col-md-9">
                              <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                                 <input type="text" class="form-control" name="from_campaign_period" value="<?php echo $setting_result[0]->from_campaign_period ?>">
                                 <span class="input-group-addon"> to </span>
                                 <input type="text" class="form-control" name="to_campaign_period" value="<?php echo $setting_result[0]->to_campaign_period ?>"> 
                              </div>
                              <!-- /input-group -->
                              <span class="help-block"> Select date range </span>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="page_ads">
                        <div class="form-group">
                           <label class="control-label col-md-2">Target Gender: </label>
                           <div class="col-md-9">
                              <div class="clearfix">
                                 <div class="btn-group" data-toggle="buttons">
                                    <?php foreach ($target_result as $key) { ?>
                                    <?php if ($key->value == 'All') { ?>
                                    <label class="btn btn-outline btn-sm blue-madison active">
                                    <input type="radio" name="target_gender" value="All" checked> All
                                    <span></span>
                                    </label>
                                    <label class="btn btn-outline btn-sm blue-madison ">
                                    <input type="radio" name="target_gender" value="Male"> Male
                                    <span></span>
                                    </label>
                                    <label class="btn btn-outline btn-sm blue-madison">
                                    <input type="radio" name="target_gender" value="Female"> Female
                                    <span></span>
                                    </label>
                                    <?php } elseif($key->value == 'Male') { ?>
                                    <label class="btn btn-outline btn-sm blue-madison ">
                                    <input type="radio" name="target_gender" value="All" > All
                                    <span></span>
                                    </label>
                                    <label class="btn btn-outline btn-sm blue-madison active">
                                    <input type="radio" name="target_gender" value="Male" checked> Male
                                    <span></span>
                                    </label>
                                    <label class="btn btn-outline btn-sm blue-madison ">
                                    <input type="radio" name="target_gender" value="Female"> Female
                                    <span></span>
                                    </label>
                                    <?php } elseif($key->value == 'Female') { ?>
                                    <label class="btn btn-outline btn-sm blue-madison ">
                                    <input type="radio" name="target_gender" value="All" > All
                                    <span></span>
                                    </label>
                                    <label class="btn btn-outline btn-sm blue-madison">
                                    <input type="radio" name="target_gender" value="Male"> Male
                                    <span></span>
                                    </label>
                                    <label class="btn btn-outline btn-sm blue-madison active">
                                    <input type="radio" name="target_gender" value="Female" checked> Female
                                    <span></span>
                                    </label>     
                                    <?php } ?>
                                    <?php } ?>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label col-md-2">Target Age Range: </label>
                           <div class="col-md-9">
                              <select class="bs-select form-control" multiple="multiple" name="target_age[]">
                              <?php foreach ($temp_age as $key) { ?>
                              <?php echo $key; ?>
                              <?php } ?>
                              </select> 
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label col-md-2">Target Login Method: </label>
                           <div class="col-md-9">
                              <select class="bs-select form-control" multiple="multiple" name="target_login[]">
                              <?php foreach ($temp_login as $key) { ?>
                              <?php echo $key; ?>
                              <?php } ?>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="form-actions right">
               <div class="row">
                  <div class="col-md-offset-3 col-md-4">
                     <button type="submit" class="btn green">Submit</button>
                     <a href="<?php echo base_url("Campaign/campaigns_manage")?>" class="btn btn-default btn-fill" type="button">Cancel</a>
                  </div>
               </div>
            </div>
            <?php echo form_close(); ?>
            <!-- END FORM-->
         </div>
      </div>
   </div>
</div>
<!--*************************************************************************************************************
   **************
   **************
   **************  Page level JS
   **************
   **************
   *****************************************************************************************************************
   -->
<script src="<?php echo base_url();?>assets/global/scripts/app.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/imagepicker/image-picker/image-picker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/pages/scripts/components-bootstrap-select.min.js" type="text/javascript"></script>
<script>
   // Replace the <textarea id="editor1"> with a CKEditor
   // instance, using default configuration.
   /**CKEDITOR.replace( 'campaign_content' , {
         filebrowserBrowseUrl: '/files/browse.php',
         filebrowserUploadUrl: '/files/upload.php',
         toolbar: [
            { name: 'document',    items : [ 'Source'] },
            { name: 'clipboard',   items : [ 'Undo','Redo' ] },
   { name: 'insert',      items : [ 'Image','Html5video','Youtube'] }
         ]
      });*/
   
      $(document).ready(function(){
          $('#youtube_autoplay').click(function() {
              if($(this).is(':checked'))
               {var autoplay = 1;}
              else
               {var autoplay =0;}
         });
      });
   
   
   $(".image-picker").imagepicker({
   hide_select: false
   });
   
   var $select_images = $('.image_picker_selector');
   // initialize
   $select_images.imagesLoaded(function () {
   $select_images.masonry({
   columnWidth: 30,
   itemSelector: '.thumbnail'
   });
   });
   
   //});
</script>
