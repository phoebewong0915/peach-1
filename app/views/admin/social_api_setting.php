<!-- <div class="row">
   <div class="col-md-12">
      <div class="col-md-10">
         <div class="portlet box blue-steel ">
            <div class="portlet-title">
               <div class="caption">
                  <i class="fa fa-facebook-square"></i> Facebook API Settings 
               </div>
            </div>
            <div class="portlet-body form">
               <?php   echo form_open("Admin/fb_setting")
                  ?>
               <div class="form-body">
                  <div class="form-group">
                     <label class="control-label">APP ID</label>
                     <div class="input-icon right">
                        <input type="text" name="app_id" class="form-control" value="<?php echo $fb_app_id ?>"> 
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label">API Secure</label>
                     <div class="input-icon right">
                        <input type="text" name="app_secret" class="form-control" value="<?php echo $fb_secret ?>"> 
                     </div>
                  </div>
               </div>
               <div class="form-actions right">
                  <button type="submit" class="btn green">Submit</button>
               </div>
               <?php echo form_close(); ?>
            </div>
         </div>
      </div>
      <div class="col-md-10">
         <div class="portlet box green-jungle ">
            <div class="portlet-title">
               <div class="caption">
                  <i class="fa fa-wechat"></i> WeChat API Settings 
               </div>
            </div>
            <div class="portlet-body form">
               <form role="form">
                  <div class="form-body">
                     <div class="form-group">
                        <label class="control-label">APP ID</label>
                        <div class="input-icon right">
                           <input type="text" name="app_id" class="form-control" value="721y3y2198ee3h8deu12edhuqdw"> 
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label">API Secure</label>
                        <div class="input-icon right">
                           <input type="text"  name="app_secret" class="form-control" value="0091298y21832721y3y2198ee3h8deu12edhuqdw"> 
                        </div>
                     </div>
                  </div>
                  <div class="form-actions right">
                     <button type="submit" class="btn green">Submit</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="col-md-10">
         <div class="portlet box blue-soft ">
            <div class="portlet-title">
               <div class="caption">
                  <i class="fa fa-instagram"></i> Instagram API Settings 
               </div>
            </div>
            <div class="portlet-body form">
               <?php 
                  echo form_open("Admin/ig_setting")
                  ?>
               <div class="form-body">
                  <div class="form-group">
                  </div>
                  <div class="form-group">
                     <label class="control-label">APP ID</label>
                     <div class="input-icon right">
                        <input type="text" name="app_id" class="form-control" value="<?php echo $ig_app_id ?>"> 
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label">API Secure</label>
                     <div class="input-icon right">
                        <input type="text" name="app_secret" class="form-control" value="<?php echo $ig_secret ?>"> 
                     </div>
                  </div>
               </div>
               <div class="form-actions right">
                  <button type="submit" class="btn green">Submit</button>
               </div>
               <?php echo form_close(); ?>
            </div>
         </div>
      </div>
      <div class="col-md-10">
         <div class="portlet box blue ">
            <div class="portlet-title">
               <div class="caption">
                  <i class="fa fa-twitter"></i> Twitter API Settings 
               </div>
            </div>
            <div class="portlet-body form">
               <?php echo form_open("Admin/tw_setting") ?>
               <div class="form-body">
                  <div class="form-group">
                     <label class="control-label">APP ID</label>
                     <div class="input-icon right">
                        <input type="text" name="app_id" class="form-control" value="<?php echo $tw_app_id ?>"> 
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label">API Secure</label>
                     <div class="input-icon right">
                        <input type="text" name="app_secret" class="form-control" value="<?php echo $tw_secret ?>"> 
                     </div>
                  </div>
               </div>
               <div class="form-actions right">
                  <button type="submit" class="btn green">Submit</button>
               </div>
               <?php echo form_close(); ?>
            </div>
         </div>
      </div>
   </div>
</div> -->

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
                           <input class="form-control" placeholder="small" name="app_id" type="text" value="<?php echo $fb_app_id ?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-2">APP Secret: </label>
                        <div class="col-md-9">
                           <input class="form-control" placeholder="small" name="app_secret" type="text" value="<?php echo $fb_secret ?>">
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
                           <input class="form-control" placeholder="small" name="app_id" type="text" value="<?php echo $tw_app_id ?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-2">APP Secret: </label>
                        <div class="col-md-9">
                           <input class="form-control" placeholder="small" name="app_secret" type="text" value="<?php echo $tw_secret ?>">
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
                           <input class="form-control" placeholder="small" name="app_id" type="text" value="<?php echo $ig_app_id ?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-2">APP Secret: </label>
                        <div class="col-md-9">
                           <input class="form-control" placeholder="small" name="app_secret" type="text" value="<?php echo $ig_secret ?>">
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
<!--*************************************************************************************************************
   **************
   **************
   ************** Page level JS
   **************
   **************
   *****************************************************************************************************************
   -->
<script src="<?php echo base_url();?>assets/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script>
   // Replace the <textarea id="editor1"> with a CKEditor
   // instance, using default configuration.
   CKEDITOR.disableAutoInline = true;
   CKEDITOR.replace( 'login_page' , {
         filebrowserBrowseUrl: '/uploads/browse.php',
         filebrowserUploadUrl: '/uploads/upload.php',
         toolbar: [
            { name: 'document',    items : [ 'Table', 'HorizontalRule', 'Templates', 'Source' ] },
            { name: 'clipboard',   items : [ 'Cut','Copy','Paste','-','Undo','Redo' ] },
            { name: 'basicstyles', items : [ 'Font','FontSize','Bold','Italic' ] },
         { name: 'insert',      items : [ 'Link', 'Image', 'Iframe','addFile', 'addImage' ] },
         { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent','JustifyLeft','JustifyCenter','JustifyRight' ] },
            { name: 'colors',       items : [ 'TextColor','BGColor' ] },
            { name: 'tools',       items : [ 'Maximize' ] }
         ]
      });
   
   CKEDITOR.replace( 'disclaimer_page' , {
         filebrowserBrowseUrl: '/uploads/browse.php',
         filebrowserUploadUrl: '/uploads/upload.php',
         toolbar: [
            { name: 'document',    items : [ 'Source' ] },
            { name: 'clipboard',   items : [ 'Cut','Copy','Paste','-','Undo','Redo' ] },
            { name: 'basicstyles', items : [ 'Font','FontSize','Bold','Italic' ] },
         { name: 'insert',      items : [ 'Link', 'Image', 'Iframe','addFile', 'addImage' ] },
         { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent','JustifyLeft','JustifyCenter','JustifyRight' ] },
            { name: 'colors',       items : [ 'TextColor','BGColor' ] },
            { name: 'tools',       items : [ 'Maximize' ] }
         ]
      });
</script>