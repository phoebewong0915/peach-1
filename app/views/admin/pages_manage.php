<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light portlet-fit ">
          <div class="portlet-title">
            <div class="caption">
              <i class="icon-settings"></i>
              <span class="caption-subject sbold uppercase">Web Auth.</span>
            </div>
          </div>
          <div class="portlet-body">
            <div class="table-toolbar">
              <div class="row">
                <div class="col-md-6">
                  <div class="btn-group">
                    <a class="btn blue-hkt" data-toggle="modal" href="<?php echo base_url('/pages/edit') ?>"> Add New
                    <i class="fa fa-plus"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
              <thead>
                <tr>
                  <th> Page Name </th>
                  <th> Theme </th>
                  <th> Edit </th>
                  <th> New Language </th>
				  <th> </th>
                </tr>
              </thead>
              <?php echo $this->session->flashdata('msg'); ?>
              <tbody>
                <?php foreach ($pages as $page){ ?>
                <tr class="odd gradeX">
                  <td> <?php echo $page->page_name; ?> </td>
                  <td>
                    <?php echo $page->theme; ?>
                  </td>
                  <td> 
                    <?php foreach ($lang[$page->page_id] as $language)
						  {
							echo '<a href="'.base_url("pages/edit/").''.$page->page_id.'/'.$language->lang_code.'" class="btn btn-outline btn-circle btn-sm blue-hkt" >'.$language->lang_text.'</a>';
						  }
                    ?>
				  </td>
                  <td> 
					<?php
						  echo '<div class="btn-group">
									<a class="btn btn-outline btn-circle btn-sm blue-hkt" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="true"> Add Language
                                        <i class="fa fa-plus"></i>
                                    </a><ul class="dropdown-menu pull-right">';
									  foreach ($lang_available[$page->page_id] as $new_language)
										{
											echo '
													<li>
													  <a href="'.base_url("pages/lang_add").'/'.$page->page_id.'/'.$new_language->lang_code.'">Create ('.$new_language->lang_text.')</a>
											     	</li>
												 
												 ';
										}
                          echo ' </ul></div>';
					?>
                  </td>
                  <td>
                    <a href="<?php echo base_url('pages/load/'.$page->page_name); ?>" target="_blank" class="btn btn-outline btn-circle btn-sm blue-hkt" >Preview</a>
                    <a href="<?php echo base_url("pages/delete/")?><?php echo $page->page_id?>" class="btn btn-outline btn-circle btn-sm red" onclick="return confirm('Are you sure you want to delete?');">Delete</a>
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