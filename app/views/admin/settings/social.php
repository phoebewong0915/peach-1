<div class="portlet light bordered">
<div class="portlet-title">
   <div class="caption">
      <i class="fa fa-gift"></i>Social API Setting</div>
   <div class="tools">
      <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
      <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
   </div>
</div>
<div class="portlet-body" style="display: block;">
   <div class="row">
      <div class="col-md-2 col-sm-2 col-xs-2">
         <ul class="nav nav-tabs tabs-left">
            <li class="active">
               <a href="#page_fb" data-toggle="tab" aria-expanded="true"> Facebook </a>
            </li>
            <li class="">
               <a href="#page_tw" data-toggle="tab" aria-expanded="false"> Twitter </a>
            </li>
            <li class="">
               <a href="#page_ig" data-toggle="tab" aria-expanded="false"> Instagram </a>
            </li>
            
         </ul>
      </div>
      <div class="portlet-body form">
         <!-- BEGIN FORM-->
        
         
       <div class="form-body">
            
            <div class="col-md-10 col-sm-10 col-xs-10">
               <div class="tab-content">
                  <div class="tab-pane active in" id="page_fb">
                  <?php   echo form_open("Admin/fb_setting")
                  ?>
                     <div class="form-group">
                        <label class="control-label col-md-2">APP ID: <span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-9">
                           <input class="form-control" placeholder="small" name="app_id" type="text" value="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-2">APP Secret: </label>
                        <div class="col-md-9">
                           <input class="form-control" placeholder="small" name="app_secret" type="text" value="">
                           <span class="help-block"> This is inline help </span>
                        </div>
                     </div>
                     <button type="submit" class="btn green">Update</button>
                     <?php echo form_close(); ?>
                  </div>
                  <div class="tab-pane fade" id="page_tw">
                  <?php echo form_open("Admin/tw_setting")
                  ?>
                    <div class="form-group">
                        <label class="control-label col-md-2">APP ID: <span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-9">
                           <input class="form-control" placeholder="small" name="app_id" type="text" value="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-2">APP Secret: </label>
                        <div class="col-md-9">
                           <input class="form-control" placeholder="small" name="app_secret" type="text" value="">
                           <span class="help-block"> This is inline help </span>
                        </div>
                     </div>
                     <button type="submit" class="btn green">Update</button>
                     <?php echo form_close(); ?>
                  </div>
                  
              <div class="tab-pane fade" id="page_ig">
                  <?php   echo form_open("Admin/ig_setting")
                  ?>
                     <div class="form-group">
                        <label class="control-label col-md-2">APP ID: <span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-9">
                           <input class="form-control" placeholder="small" name="app_id" type="text" value="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-2">APP Secret: </label>
                        <div class="col-md-9">
                           <input class="form-control" placeholder="small" name="app_secret" type="text" value="">
                           <span class="help-block"> This is inline help </span>
                        </div>
                     </div>
                     <button type="submit" class="btn green">Update</button>
                     <?php echo form_close(); ?>
                  </div>
                  

               </div>
            </div>
         </div>
         <div class="form-actions right">
          <div class="row">
            
         </div>
         </div>

         <!-- END FORM-->
      </div>
   </div>
</div>