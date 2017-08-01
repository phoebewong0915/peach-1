<div class="row">
<?php if($this->session->flashdata('msg') != null) {
  echo '<div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	'.$this->session->flashdata('msg').'
</div>';}
?>
   <div class="col-md-12">
      <div class="page-bar">
         <ul class="page-breadcrumb">
            <li>
               <i class="icon-home"></i>
               <a href="index.html">GSS v1</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <span><?php echo $subject?></span>
            </li>
         </ul>
         <div class="page-toolbar">
            <div class="btn-group pull-right">
               <a class="btn btn-fit-height blue" data-toggle="modal" href="#create_nas_modal"><i class="fa fa-plus"></i> Add Newtrok Device </a>
               
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light portlet-fit ">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-settings"></i>
                     <span class="caption-subject sbold uppercase">Network Devices </span><small><?php echo $total; ?></small>
                  </div>
               </div>
               <div class="portlet-body">
                  <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                     <thead>
                        <tr>
                           <?php foreach($theader as $thead)
                              {   
                              	echo "<th>".$thead."</th>";
                              } ?>
                        </tr>
                     </thead>
                     <tbody>
                        <?php echo $tdata; ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <?php foreach($theader as $thead)
                              {   
                              	echo "<th>".$thead."</th>";
                              } ?>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
         </div>
      </div>
   </div>
</div>

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
		 <?php echo form_open("nas/create_nas", 'role="form" class="form-horizontal"'); ?>
            <div class="form-body">
               <div class="form-group">
                  <label class="col-md-4 control-label">NAS Vendor</label>
                  <div class="col-md-8">
				     <div class="input-icon right">
						<select class="form-control " name="brand">
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
                  <label class="col-md-4 control-label">Share Secret</label>
                  <div class="col-md-8">
                     <div class="input-icon right">
                        <i class="fa fa-info-circle tooltips" data-original-title="Secret" data-container="body"></i>
                        <input type="password" class="form-control" name="nas_secret"> 
                     </div>
                  </div>
               </div>
			   <div class="form-group">
                  <label class="col-md-4 control-label">Confirm Share Secret</label>
                  <div class="col-md-8">
                     <div class="input-icon right">
                        <i class="fa fa-info-circle tooltips" data-original-title="IP Address" data-container="body"></i>
                        <input type="password" class="form-control" name="nas_secret_cfm"> 
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
                     <button type="submit" value="submit" class="btn blue">Create</button>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
 </div>
</div>