<div class="portlet light bordered">
   <div class="portlet-title">
      <div class="caption">
         <i class="icon-equalizer"></i>
         <span class="caption-subject bold uppercase">Picture uploaded manage</span>
         <span class="caption-helper">Picture uploaded manage</span>
      </div>
   </div>
   <div class="portlet-body form">
   
     <div class="row">
     <?php $i=0; foreach($pic as $data)
     { ?>
     
  		<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" imageid="<?php echo $i ?>">
  			<p><img class="img-rounded" src="<?php echo base_url()?>uploads/<?php echo $data ?>" style="width: 100%" alt="Image"></p>

  			<p class="text-center">URL: <?php echo base_url().'/'.$data?></p>
			<a href="<?php echo base_url().'/'.$data?>" class="btn btn-primary btn-fill" type="button"><i class="fa fa-copy"></i> Copy URL</a>
			<a href="<?php echo base_url("admin/pic_del/".$data)?>" class="btn btn-danger btn-fill" type="button"><i class="fa fa-trash-o"></i> Delete</a>
			

  		</div>

  	<?php $i++;
     }?>
  		
  		
  		
  	</div>
 </div>
</div>

<div class="portlet light bordered">
   <div class="portlet-title">
      <div class="caption">
         <i class="icon-equalizer font-red-sunglo"></i>
         <span class="caption-subject bold uppercase">Image Upload</span>
         <span class="caption-helper"></span>
      </div>
   </div>
   <div class="portlet-body form">
      <!-- BEGIN FORM-->
      <?php echo form_open_multipart("Admin/pic_save",'class="form-horizontal"');?>
      <div class="form-body">
         
		 
		 <div class="row">
			<div class="form-group ">
				<label class="control-label col-md-3">Image Upload</label>
				<div class="col-md-9">
        <p class="text-danger"><?php echo $error_msg; ?></p>
					<div class="fileinput fileinput-new" data-provides="fileinput">
						<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> </div>
						<div>
							<span class="btn red btn-outline btn-file">
							<span class="fileinput-new"> Select image </span>
							<span class="fileinput-exists"> Change </span>
							<input type="file" name="pic"> </span>

							<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
						</div>
					</div>
					</div>
			</div>
		 </div>		 
        
      <div class="form-actions">
         <div class="row">
            <div class="col-md-offset-3 col-md-4">
               <button type="submit" class="btn green" value="upload">Submit</button>
               <a href="<?php echo base_url("admin/uploaded_pic")?>" class="btn btn-default btn-fill" type="button">Cancel</a>
            </div>
         </div>
      </div>
      <?php form_close(); ?>
      <!-- END FORM-->
 </div>
</div>
</div>
