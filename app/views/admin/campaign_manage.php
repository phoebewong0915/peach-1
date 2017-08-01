<div class="row">
   <div class="col-md-12">
      <div class="row">
         <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light portlet-fit ">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-settings"></i>
                     <span class="caption-subject sbold uppercase">Campaign Management</span>
                  </div>
               </div>
               <div class="portlet-body">
                  <div class="table-toolbar">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="btn-group">
                              <a class="btn blue-hkt" data-toggle="modal" href="<?php echo base_url('/campaign/campaign_add') ?>"> Add New
                              <i class="fa fa-plus"></i>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                     <thead>
                        <tr>
                           <th> Campaign Name </th>
                           <th> Campaign Period </th>
                           <th> Action </th>
                        </tr>
                     </thead>
                     <?php echo $this->session->flashdata('msg'); ?>
                     <tbody>
                        <?php foreach ($campaign_data as $data){ ?>
                        <tr class="odd gradeX">
                           <td> <?php echo $data->campaign_name; ?> </td>
                           <td>
                              <?php echo $data->from_campaign_period;?>
                              <?php echo ' to '; ?>
                              <?php echo $data->to_campaign_period; ?>
                           </td>
                           <td>
                              <a href="<?php echo base_url("campaign/campaign_edit/")?><?php echo $data->campaign_id?>" class="btn btn-outline btn-circle btn-sm blue" >Edit</a>
                              <a href="<?php echo base_url('campaign/load/'.$data->campaign_id); ?>" target="_blank" class="btn btn-outline btn-circle btn-sm blue-hkt" >Preview</a>
                              <a href="<?php echo base_url("campaign/campaign_delete/")?><?php echo $data->campaign_id?>" class="btn btn-outline btn-circle btn-sm red" onclick="return confirm('Are you sure you want to delete?');">Delete</a>
                           </td>
                        </tr>
                        <?php }?>
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
         </div>
      </div>
   </div>
</div>