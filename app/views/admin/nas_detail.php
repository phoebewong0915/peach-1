<div id="create_nas_modal" class="modal fade" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
   <div class="portlet box green">
      <div class="portlet-title">
         <div class="caption">
            <i class="fa fa-gift"></i> Horizontal Form Validation States 
         </div>
         <div class="tools">
         </div>
      </div>
      <div class="portlet-body form">
         <form role="form" class="form-horizontal">
		 <?php echo form_open('nas/create_nas', 'name="nas_data" role="form" class="form-horizontal"'); ?>
            <div class="form-body">
               <div class="form-group">
                  <label class="col-md-4 control-label">NAS Vendor</label>
                  <div class="col-md-8">
				     <div class="input-icon right">
						<i class="fa fa-info-circle tooltips" data-original-title="Wireless Controller" data-container="body"></i>
						<select class="form-control input-large " name="brand">
							<option value="Aruba Networks">Aruba Networks</option>
							<option value="Cisco System">Cisco System</option>
							<option value="Ruckus ZoneDirector">Ruckus ZoneDirector</option>
							<option value="Ruckus SmartZone">Ruckus SmartZone</option>
                         </select>
					 </div>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">NAS Name</label>
                  <div class="col-md-8">
                     <div class="input-icon right">
                        <i class="fa fa-info-circle tooltips" data-original-title="Wireless Controller" data-container="body"></i>
                        <input type="text" class="form-control" name="nas_name"> 
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">IP Address</label>
                  <div class="col-md-8">
                     <div class="input-icon right">
                        <i class="fa fa-info-circle tooltips" data-original-title="IP Address" data-container="body"></i>
                        <input type="text" class="form-control" name="nas_ip"> 
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-4 control-label">NAS MAC Address</label>
                  <div class="col-md-8">
                     <div class="input-icon right">
                        <i class="fa fa-info-circle tooltips" data-original-title="MAC Address" data-container="body"></i>
                        <input type="text" class="form-control" name="nas_mac"> 
                     </div>
                  </div>
               </div>		   
            </div>
            <div class="form-actions">
               <div class="row">
                  <div class="col-md-offset-4 col-md-8">
                     <button type="button" class="btn red">Cancel</button>
                     <button type="submit" class="btn blue">Create</button>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
 </div>
</div>