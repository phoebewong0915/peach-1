<div class="portlet light bordered">
<div class="portlet-title">
   <div class="caption">
      <i class="fa fa-gift"></i>Pages Customization
   </div>
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
               <a href="#page_general" data-toggle="tab" aria-expanded="true"> General </a>
            </li>
            <li class="">
               <a href="#page_login" data-toggle="tab" aria-expanded="false"> Login Page </a>
            </li>
            <li class="">
               <a href="#page_disclaimer" data-toggle="tab" aria-expanded="false"> Disclaimer </a>
            </li>
            <li class="">
               <a href="#page_ads" data-toggle="tab" aria-expanded="false">Campaigns </a>
            </li>
         </ul>
      </div>
      <div class="portlet-body form">
         <!-- BEGIN FORM-->
         <?php echo form_open("pages/pages_add", array("class" => "form-horizontal form-row-seperated", "name" => "pages_add"));?>
         
       <div class="form-body">
            <div class="col-md-10 col-sm-10 col-xs-10">
               <div class="tab-content">
                  <div class="tab-pane active in" id="page_general">
                     <div class="form-group">
                        <label class="control-label col-md-2">Page Name: <span class="required" aria-required="true"> * </span></label>
                        <div class="col-md-9">
                           <input class="form-control" placeholder="small" name="page_name" type="text" value="">
                           <span class="help-block required"> Edit page name will affect another language. </span>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-2">Title: </label>
                        <div class="col-md-9">
                           <input class="form-control" placeholder="small" name="title" type="text" value="">
                           <span class="help-block"> This is inline help </span>
                        </div>
                     </div>
                <div class="form-group">
                        <label class="control-label col-md-2">Language: </label>
                        <div class="col-md-9">
                           <input class="form-control" type="text" value="English (Default)" readonly>
                           <input class="hidden" placeholder="small" name="lang" type="text" value="en">
                           <span class="help-block"> This is inline help </span>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-md-2">Theme: </label>
                        <div class="col-md-9">
                           <select class="form-control" name="theme">
                              <option value="azmind">Azmind (Default)</option>
                              <option value="Theme #2">Theme #2</option>
                              <option value="Theme #3">Theme #3</option>
                              <option value="Theme #4">Theme #4</option>
                           </select>
                           <span class="help-block"> This is inline help </span>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="page_login">
                     <div class="form-group">
                        <label class="col-md-2 control-label">Email: </label>
                        <div class="col-md-9">
                           <div class="mt-checkbox-inline">
                              <label class="mt-checkbox mt-checkbox-outline">
                              <input type="hidden" id="email_button_status" name="email_button_status" value="0">
                              <input type="checkbox" id="email_button_status" name="email_button_status" value="1"> E-mail (with verifica
                              <span></span>
                              </label>
                              <label class="mt-checkbox mt-checkbox-outline">
                              <input type="hidden" id="first_allow" name="first_allow" value="0" >
                              <input type="checkbox" id="first_allow" name="first_allow" value="1" > Allow first 30mins login
                              <span></span>
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-2 control-label">Social Login: </label>
                        <div class="col-md-9">
                           <div class="mt-checkbox-inline">
                              <label class="mt-checkbox mt-checkbox-outline">
                              <input type="hidden" id="fb_button_status" name="fb_button_status" value="0" >
                              <input type="checkbox" id="fb_button_status" name="fb_button_status" value="1" > Facebook OAuth 2.0)
                              <span></span>
                              </label>
                              <label class="mt-checkbox mt-checkbox-outline">
                              <input type="hidden" id="ig_button_status" name="ig_button_status" value="0" > 
                              <input type="checkbox" id="ig_button_status" name="ig_button_status" value="1" > Instagram 
                              <span></span>
                              </label>
                              <label class="mt-checkbox mt-checkbox-outline">
                              <input type="hidden" id="tw_button_status" name="tw_button_status" value="0"  > 
                              <input type="checkbox" id="tw_button_status" name="tw_button_status" value="1"  > Twitter 
                              <span></span>
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                <label class="col-md-2 control-label">Page Content: </label>
                        <div class="col-md-9">
                     <textarea name="login_page" id="login_page" >
                     
                     </textarea>
                  </div>
                     </div>
                  </div>
                  
              <div class="tab-pane fade" id="page_disclaimer">
                     <div class="form-group">
                        <label class="col-md-2 control-label">Accept Required: </label>
                        <div class="col-md-9">
                           <div class="mt-radio-inline">
                              <label class="mt-radio">
                              <input type="radio" name="iagree_status" value="1"> Enable
                              <span></span>
                              </label>
                              <label class="mt-radio">
                              <input type="radio" name="iagree_status" value="0"> Disable
                              <span></span>
                              </label>
                           </div>
                        </div>
                     </div>
                <div>
                <div class="form-group">
                <label class="col-md-2 control-label">Disclaimer/T&C: </label>
                        <div class="col-md-9">
                        <textarea name="disclaimer_page" id="disclaimer_page">
                        </textarea>
                  </div>
                </div>  
                     </div>
                  </div>

               <div class="tab-pane fade" id="page_ads">
                <div class="form-group">
                           <label class="control-label col-md-2">Promotion Mode: </label>
                           <div class="col-md-9">
                              <div class="clearfix">
                                 <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-outline btn-sm blue-madison active">
                                    <input type="radio" class="toggle" name="campaign_mode" value="random" checked> Random Mode </label>
                                    <label class="btn btn-outline btn-sm blue-madison"> 
                                    <input type="radio" class="toggle" name="campaign_mode" value="targeted" checked> Targeted Mode </label>
                                 </div>
                              </div>
                           </div>
                        </div> 
              <div class="form-group">
               <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                 <thead>
                   <tr>
                     <th> </th>
                     <th> Campaign</th>
                     <th> Campaign Period </th>
                     <th> Campaign Location </th>
                     <th> Campaign Preview </th>
                   </tr>
                 </thead>
                     <tbody>
                     <?php foreach ($campaigns as $data){ ?>
                        <tr>
                        <td>
                           <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                           <input type="checkbox" name="campaign_id[]" value="<?php echo $data->campaign_id ?>">
                           <span></span>
                           </label>
                        </td>
                        <td><?php echo $data->campaign_name; ?></td>
                        <td>
                           <?php echo $data->from_campaign_period;?>
                           <?php echo ' to '; ?>
                           <?php echo $data->to_campaign_period; ?>
                        </td>
                        <td><?php echo $data->campaign_location; ?></td>
                        <td><a href="<?php echo base_url('guest/campaign/'.$data->campaign_id); ?>" target="_blank" class="btn btn-outline btn-circle btn-sm blue" >Preview</a></td>
                        </tr>
                     <?php }?>
                     </tbody>
               </table>
                  </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="form-actions right">
               <div class="row">
                  <div class="col-md-offset-3 col-md-4">
                     <button type="submit" class="btn green">Submit</button>
                     <a href="<?php echo base_url("Pages")?>" class="btn btn-default btn-fill" type="button">Cancel</a>
                  </div>
               </div>
            </div>
            <?php echo form_close(); ?>
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