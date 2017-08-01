<head>
   <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/imagepicker/image-picker/image-picker.css">
   <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/css/base/jquery-ui.css">
</head>
<div class="portlet light bordered">
   <div class="portlet-title">
      <div class="caption">
         <i class="icon-volume-2"></i>Create New Campagin
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
            <?php echo form_open("campaign/campaign_adding", array("class" => "form-horizontal form-row-seperated", "name" => "advertising_adding"));?>
            <div class="form-body">
               <input type="text" class="hidden" name="page_id" >
               <div class="col-md-10 col-sm-10 col-xs-10">
                  <div class="tab-content">
                     <div class="tab-pane active in" id="page_general">
                        <div class="form-group">
                           <label class="control-label col-md-2">Campaign Name: </label>
                           <div class="col-md-9">
                              <input class="form-control" placeholder="Enter Campigan Name"  name="campaign_name" type="text" >
                              <span class="help-block"> </span>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label col-md-2">Campaign Location: </label>
                           <div class="col-md-9">
                              <input class="form-control" placeholder="Enter Campigan Location" name="campaign_location" type="text" >
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label col-md-2">Ads Time-Out(SEC.): </label>
                           <div class="col-md-9">
                              <input class="form-control" placeholder="Enter Time in Seconds" name="ads_waiting_time" type="text" > 
                           </div>
                        </div>
                        <!--
                           <div class="form-group">
                              <label class="control-label col-md-2">Campaign Template: </label>
                              <div class="col-md-9">
                                 <div class="mt-radio-inline">
                                    <label class="mt-radio">
                                    <input type="radio" class="chb" onclick="func();" name="campaign_template" value="Single_img" > Single Image [0]
                                    <span></span>
                                    </label>
                                    <label class="mt-radio">
                                    <input type="radio" class="chb" onclick="func();" name="campaign_template" value="Single_video" > Single Video [1]
                                    <span></span>
                                    </label>
                                 </div>
                              </div>
                           </div>-->
                           <div class="form-group">
                           <label class="control-label col-md-2">Campaign: </label>
                           <div class="col-md-9">
                              <div class="tabbable-custom nav-justified">
                                <ul class="nav nav-tabs nav-justified">
                                    <li class="image active">
                                        <a href="#tab11" data-toggle="tab" aria-expanded="false"><i class="fa fa-image"></i> Image </a>
                                    </li>
                                    <li class="youtube">
                                        <a href="#tab12" data-toggle="tab" aria-expanded="false"><i class="fa fa-youtube-play"></i> Youtube </a>
                                    </li>
                                </ul>
                                 <div class="tab-content">
                                    <div class="tab-pane active" id="tab11" >
                                       <select class="image-picker hidden" id="campaign_image" name="campaign_image" >
                                       <option value=""></option>
                                             <?php
                                                foreach($image as $img)
                                                {
                                                    echo '<option data-img-src="'.base_url().''. $img->video_path . '/' . $img->video_name.'" value="'.$img->video_name.'">'.$img->video_name.'</option>';
                                                }                   
                                                ?>
                                       </select>
                                       <a href="<?php echo base_url("/media/image")?>" class="btn blue-hoki" target="_blank"></i> Upload Image </a>
                                       <div class="form-group">
										   
										   <div class="col-md-12">
											<label class="control-label col-md-4">Image Redirect Link: </label>
											 <div class="col-md-8">
												<input class="form-control" placeholder="Enter redirect link"  name="img_link" type="text" >
											 </div>
										   </div>
									   </div>
                                    </div>
                                    <div class="tab-pane" id="tab12" >
                                       <label>YouTube Embed Link</label>
                                                <div class="input-group">
                                                <span class="input-group-addon">
                                                <i class="fa fa-youtube"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Paste your LINK here!" id="campaign_youtube" name="campaign_youtube" > 
                                                </div>
                                    <br>
                                     <label>YouTube Setting:</label>
                                       <div class="mt-checkbox-inline">
                                          <label class="mt-checkbox mt-checkbox-outline">
                                          <input type="hidden" name="youtube_autoplay" value="0" />
                                          <input type="checkbox" id="youtube_autoplay" name="youtube_autoplay" value="1"> Autoplay
                                          <span></span>
                                          </label>
                                          <label class="mt-checkbox mt-checkbox-outline">
                                          <input type="hidden" name="youtube_control" value="1" />
                                          <input type="checkbox" id="youtube_control" name="youtube_control" value="0" >Hidden Controls                                         
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
                     <span class="help-block"> </span>
                           </div>
                           </div>

         <!--///////////////////////////////////////////////////////////////////-->
                        <div class="form-group">
                           <label class="control-label col-md-2">Campaign Period: </label>
                           <div class="col-md-9">
                              <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                                 <input type="text" class="form-control" name="from_campaign_period">
                                 <span class="input-group-addon"> to </span>
                                 <input type="text" class="form-control" name="to_campaign_period"> 
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
                                    <label class="btn btn-outline btn-sm blue-madison active">
                                    <input type="radio" class="toggle" name="target_gender" value="All" checked> All </label>
                                    <label class="btn btn-outline btn-sm blue-madison"> 
                                    <input type="radio" class="toggle" name="target_gender" value="Male" checked> Male </label>
                                    <label class="btn btn-outline btn-sm blue-madison">
                                    <input type="radio" class="toggle" name="target_gender" value="Female" checked> Female </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label col-md-2">Target Age Range: </label>
                           <div class="col-md-9">
                              <select class="bs-select form-control" multiple="multiple" name="target_age[]">
                                 <option value="under18" >Under 18</option>
                                 <option value="18to30" >18 to 30</option>
                                 <option value="31to45" >31 to 45</option>
                                 <option value="46to60" >46 to 60</option>
                                 <option value="above61" >Above 61</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label col-md-2">Target Login Method: </label>
                           <div class="col-md-9">
                              <select class="bs-select form-control" multiple="multiple" name="target_login[]">
                                 <option value="Facebook">Facebook</option>
                                 <option value="Instagram">Instagram</option>
                                 <option value="Twitter">Twitter</option>
                                 <option value="Wechat">Wechat</option>
                                 <option value="Email">Email</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="control-label col-md-2">Target Operating System: </label>
                           <div class="col-md-9">
                              <select class="bs-select form-control" multiple="multiple" name="target_os[]">
                                 <option value="IOS">IOS</option>
                                 <option value="Android">Android</option>
                                 <option value="Windows_10">Windows 10</option>
                                 <option value="Windows_7">Windows 7</option>
                                 <option value="Mac_OS_X">Mac OS X</option>
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
                     <a href="<?php echo base_url("campaign/campaigns_manage")?>" class="btn btn-default btn-fill" type="button">Cancel</a>
                  </div>
               </div>
            </div>
            <input type="text" class="hidden" name="selector" id="selector" value="">
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
<script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/imagepicker/image-picker/image-picker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/pages/scripts/components-bootstrap-select.min.js" type="text/javascript"></script>
<script>

   // Replace the <textarea id="editor1"> with a CKEditor
   // instance, using default configuration.
   //CKEDITOR.replace( 'campaign_content' , {
   //      filebrowserBrowseUrl: '/files/browse.php',
   //      filebrowserUploadUrl: '/files/upload.php',
   //      toolbar: [
   //         { name: 'document',    items : [ 'Source'] },
   //         { name: 'clipboard',   items : [ 'Undo','Redo' ] },
	//		{ name: 'insert',      items : [ 'Image','Html5video'] }
   //      ]
   //   });
/*
      var loop = 1;
      var controls = 0;
      var autoplay = 0;

      $(function(){
          $('#youtube_autoplay').click(function() {
              if($(this).is(':checked'))
               {var autoplay = 1;}
              else
               {var autoplay =0;}
         });
      });

      $('#campaign_youtube').keyup(function () {
         var str = $(this).val();
         $('#path_display').html('<iframe id="video" width="560" height="315" src="' + str + '?autoplay='+ autoplay +'&loop='+ loop +'&controls='+ controls +'" frameborder="0" allowfullscreen></iframe>');
      });
*/







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

   
</script>



