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
				<a href="index.html"></a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <span><?php echo $subject?></span>
            </li>
         </ul>
         <div class="page-toolbar">
            <div class="btn-group pull-right">
               <button type="button" class="btn btn-fit-height blue dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true"> Import
               <i class="fa fa-angle-down"></i>
               </button>
               <ul class="dropdown-menu pull-right" role="menu">
                  <li>
                     <a href="#">
                     <i class="icon-upload"></i> CSV </a>
                  </li>
				  <li>
                     <a href="#">
                     <i class="icon-upload"></i> XML </a>
                  </li>

               </ul>
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
                     <span class="caption-subject sbold uppercase"><?php echo $subject?></span><small>Total : <?php echo $total; ?> found</small>
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