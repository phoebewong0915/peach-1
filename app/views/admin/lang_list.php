<div class="row">
   <div class="col-md-12">
      <div class="row">
         <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light portlet-fit ">
               <div class="portlet-title">
                  <div class="caption">
                     <i class="icon-settings"></i>
                     <span class="caption-subject sbold uppercase">Languages Management</span>
                  </div>
               </div>
               <div class="portlet-body">
                  <div class="table-toolbar">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="btn-group">
                              <a class="btn green"  href="<?php echo base_url('Language/lang_adding')?>"> Add New
                              <i class="fa fa-plus"></i>
                              </a>
                              <!-- <br><br>
                              <a class="btn green"  href="http://172.16.200.135/guest/index.php/admin/lang_change"> Change Default Language
                              <i class="fa fa-gear"></i>
                              </a> -->
                           </div>
                        </div>
                     </div>
                  </div>
                  <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                     <thead>
                        <tr>
                           <th> Language </th>
						   <th> Display Name </th>
                           <th> Language Code </th>
                           <th> Is Default </th>
                            <th> Action </th>
                        </tr>
                     </thead>
                     <?php echo $this->session->flashdata('msg'); ?>
                     <tbody>
                        <?php foreach ($lang_data as $data){ ?>
                        <tr class="odd gradeX">
                           <td> <?php echo $data->lang; ?> </td>
						   <td> <?php echo $data->lang_text; ?> </td>
                           <td> <?php echo $data->lang_code; ?> </td>
                           <td> <?php if ($data->is_default == 1){echo "Yes";}else{echo "No";}; ?> </td>
                           <td>
                              <?php if($data->lang_code != "en")
									{
										echo '<a href="'.base_url("language/lang_edit").'/'.$data->id.'" class="btn btn-outline btn-circle btn-sm green" >Edit</a>';
										echo '<a href="'.base_url("language/lang_delete").'/'.$data->id.'" class="btn btn-outline btn-circle btn-sm red" onclick="return confirm("Are you sure you want to delete?");">Delete</a>';
									}
							  ?>
						   </td>
                        </tr>
                        <?php }?>
                     </tbody>
                  </table>

               </div>
            </div>                                          
         </div>
      </div>
   </div>
</div>