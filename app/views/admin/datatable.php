
<div class="row">
   <div class="col-md-12">
   <h1 class="page-title"> GSMS
                        <small>Guest Social Media System</small>
                    </h1>
					
					<div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="index.html">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span><?php echo $subject?></span>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true"> Actions
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>
                                        <a href="#">
                                            <i class="icon-bell"></i> Action</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-shield"></i> Another action</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-user"></i> Something else here</a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-bag"></i> Separated link</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
   
      <div class="portlet light ">
         <div class="portlet-title">
            <div class="caption font-dark">
			   <div class="form-group">
                     <div class="col-md-4">
                        <a class="btn green btn-outline" href="#daterangepicker_modal" data-toggle="modal"> Date Filter
                        <i class="fa fa-calendar"></i>
                        </a>
                     </div>
                  </div>
            </div>
            <div class="tools"> 
            </div>
         </div>
         <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover" id="sample_1">
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
<div id="daterangepicker_modal" class="modal fade" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Daterange Picker in Modal</h4>
         </div>
         <div class="modal-body">
            <form action="#" class="form-horizontal">
               <div class="form-group">
                  <label class="control-label col-md-4">Default Date Ranges</label>
                  <div class="col-md-8">
                     <div class="input-group input-large" id="defaultrange_modal">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                        <button class="btn default date-range-toggle" type="button">
                        <i class="fa fa-calendar"></i>
                        </button>
                        </span>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">Close</button>
            <button class="btn green btn-primary" data-dismiss="modal">Save changes</button>
         </div>
      </div>
   </div>
</div>

<!--
<div class="table-container">
                                            
                                            <div id="datatable_ajax_wrapper" class="dataTables_wrapper dataTables_extended_wrapper no-footer"><div class="row"><div class="col-md-8 col-sm-12"><div class="dataTables_paginate paging_bootstrap_extended" id="datatable_ajax_paginate"><div class="pagination-panel"> Page <a href="#" class="btn btn-sm default prev"><i class="fa fa-angle-left"></i></a><input type="text" class="pagination-panel-input form-control input-sm input-inline input-mini" maxlenght="5" style="text-align:center; margin: 0 5px;"><a href="#" class="btn btn-sm default next"><i class="fa fa-angle-right"></i></a> of <span class="pagination-panel-total">18</span></div></div><div class="dataTables_length" id="datatable_ajax_length"><label><span class="seperator">|</span>View <select name="datatable_ajax_length" aria-controls="datatable_ajax" class="form-control input-xs input-sm input-inline"><option value="10">10</option><option value="20">20</option><option value="50">50</option><option value="100">100</option><option value="150">150</option><option value="-1">All</option></select> records</label></div><div class="dataTables_info" id="datatable_ajax_info" role="status" aria-live="polite"><span class="seperator">|</span>Found total 178 records</div></div><div class="col-md-4 col-sm-12"><div class="table-group-actions pull-right">
                                                <span></span>
                                                <select class="table-group-action-input form-control input-inline input-small input-sm">
                                                    <option value="">Select...</option>
                                                    <option value="Cancel">Cancel</option>
                                                    <option value="Cancel">Hold</option>
                                                    <option value="Cancel">On Hold</option>
                                                    <option value="Close">Close</option>
                                                </select>
                                                <button class="btn btn-sm green table-group-action-submit">
                                                    <i class="fa fa-check"></i> Submit</button>
                                            </div></div></div><div class="table-responsive"><table class="table table-striped table-bordered table-hover table-checkable dataTable no-footer" id="datatable_ajax" aria-describedby="datatable_ajax_info" role="grid">
                                                <thead>
                                                    <tr role="row" class="heading"><th width="2%" class="sorting_disabled" rowspan="1" colspan="1">
                                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                                <input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes">
                                                                <span></span>
                                                            </label>
                                                        </th><th width="5%" class="sorting_disabled" rowspan="1" colspan="1"> Record&nbsp;# </th><th width="15%" class="sorting_disabled" rowspan="1" colspan="1"> Date </th><th width="200" class="sorting_disabled" rowspan="1" colspan="1"> Customer </th><th width="10%" class="sorting_disabled" rowspan="1" colspan="1"> Ship&nbsp;To </th><th width="10%" class="sorting_disabled" rowspan="1" colspan="1"> Price </th><th width="10%" class="sorting_disabled" rowspan="1" colspan="1"> Amount </th><th width="10%" class="sorting_disabled" rowspan="1" colspan="1"> Status </th><th width="10%" class="sorting_disabled" rowspan="1" colspan="1"> Actions </th></tr>
                                                    <tr role="row" class="filter"><td rowspan="1" colspan="1"> </td><td rowspan="1" colspan="1">
                                                            <input type="text" class="form-control form-filter input-sm" name="order_id"> </td><td rowspan="1" colspan="1">
                                                            <div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                                                                <input type="text" class="form-control form-filter input-sm" readonly="" name="order_date_from" placeholder="From">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-sm default" type="button">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                                                                <input type="text" class="form-control form-filter input-sm" readonly="" name="order_date_to" placeholder="To">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-sm default" type="button">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </td><td rowspan="1" colspan="1">
                                                            <input type="text" class="form-control form-filter input-sm" name="order_customer_name"> </td><td rowspan="1" colspan="1">
                                                            <input type="text" class="form-control form-filter input-sm" name="order_ship_to"> </td><td rowspan="1" colspan="1">
                                                            <div class="margin-bottom-5">
                                                                <input type="text" class="form-control form-filter input-sm" name="order_price_from" placeholder="From"> </div>
                                                            <input type="text" class="form-control form-filter input-sm" name="order_price_to" placeholder="To"> </td><td rowspan="1" colspan="1">
                                                            <div class="margin-bottom-5">
                                                                <input type="text" class="form-control form-filter input-sm margin-bottom-5 clearfix" name="order_quantity_from" placeholder="From"> </div>
                                                            <input type="text" class="form-control form-filter input-sm" name="order_quantity_to" placeholder="To"> </td><td rowspan="1" colspan="1">
                                                            <select name="order_status" class="form-control form-filter input-sm">
                                                                <option value="">Select...</option>
                                                                <option value="pending">Pending</option>
                                                                <option value="closed">Closed</option>
                                                                <option value="hold">On Hold</option>
                                                                <option value="fraud">Fraud</option>
                                                            </select>
                                                        </td><td rowspan="1" colspan="1">
                                                            <div class="margin-bottom-5">
                                                                <button class="btn btn-sm green btn-outline filter-submit margin-bottom">
                                                                    <i class="fa fa-search"></i> Search</button>
                                                            </div>
                                                            <button class="btn btn-sm red btn-outline filter-cancel">
                                                                <i class="fa fa-times"></i> Reset</button>
                                                        </td></tr>
                                                </thead>
                                                <tbody> <tr role="row" class="odd"><td><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input name="id[]" type="checkbox" class="checkboxes" value="11"><span></span></label></td><td>11</td><td>12/09/2013</td><td>Jhon Doe</td><td>Jhon Doe</td><td>450.60$</td><td>7</td><td><span class="label label-sm label-info">Closed</span></td><td><a href="javascript:;" class="btn btn-sm btn-outline grey-salsa"><i class="fa fa-search"></i> View</a></td></tr><tr role="row" class="even"><td><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input name="id[]" type="checkbox" class="checkboxes" value="12"><span></span></label></td><td>12</td><td>12/09/2013</td><td>Jhon Doe</td><td>Jhon Doe</td><td>450.60$</td><td>5</td><td><span class="label label-sm label-success">Pending</span></td><td><a href="javascript:;" class="btn btn-sm btn-outline grey-salsa"><i class="fa fa-search"></i> View</a></td></tr><tr role="row" class="odd"><td><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input name="id[]" type="checkbox" class="checkboxes" value="13"><span></span></label></td><td>13</td><td>12/09/2013</td><td>Jhon Doe</td><td>Jhon Doe</td><td>450.60$</td><td>7</td><td><span class="label label-sm label-danger">On Hold</span></td><td><a href="javascript:;" class="btn btn-sm btn-outline grey-salsa"><i class="fa fa-search"></i> View</a></td></tr><tr role="row" class="even"><td><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input name="id[]" type="checkbox" class="checkboxes" value="14"><span></span></label></td><td>14</td><td>12/09/2013</td><td>Jhon Doe</td><td>Jhon Doe</td><td>450.60$</td><td>9</td><td><span class="label label-sm label-success">Pending</span></td><td><a href="javascript:;" class="btn btn-sm btn-outline grey-salsa"><i class="fa fa-search"></i> View</a></td></tr><tr role="row" class="odd"><td><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input name="id[]" type="checkbox" class="checkboxes" value="15"><span></span></label></td><td>15</td><td>12/09/2013</td><td>Jhon Doe</td><td>Jhon Doe</td><td>450.60$</td><td>3</td><td><span class="label label-sm label-info">Closed</span></td><td><a href="javascript:;" class="btn btn-sm btn-outline grey-salsa"><i class="fa fa-search"></i> View</a></td></tr><tr role="row" class="even"><td><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input name="id[]" type="checkbox" class="checkboxes" value="16"><span></span></label></td><td>16</td><td>12/09/2013</td><td>Jhon Doe</td><td>Jhon Doe</td><td>450.60$</td><td>5</td><td><span class="label label-sm label-danger">On Hold</span></td><td><a href="javascript:;" class="btn btn-sm btn-outline grey-salsa"><i class="fa fa-search"></i> View</a></td></tr><tr role="row" class="odd"><td><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input name="id[]" type="checkbox" class="checkboxes" value="17"><span></span></label></td><td>17</td><td>12/09/2013</td><td>Jhon Doe</td><td>Jhon Doe</td><td>450.60$</td><td>2</td><td><span class="label label-sm label-danger">On Hold</span></td><td><a href="javascript:;" class="btn btn-sm btn-outline grey-salsa"><i class="fa fa-search"></i> View</a></td></tr><tr role="row" class="even"><td><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input name="id[]" type="checkbox" class="checkboxes" value="18"><span></span></label></td><td>18</td><td>12/09/2013</td><td>Jhon Doe</td><td>Jhon Doe</td><td>450.60$</td><td>9</td><td><span class="label label-sm label-success">Pending</span></td><td><a href="javascript:;" class="btn btn-sm btn-outline grey-salsa"><i class="fa fa-search"></i> View</a></td></tr><tr role="row" class="odd"><td><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input name="id[]" type="checkbox" class="checkboxes" value="19"><span></span></label></td><td>19</td><td>12/09/2013</td><td>Jhon Doe</td><td>Jhon Doe</td><td>450.60$</td><td>7</td><td><span class="label label-sm label-danger">On Hold</span></td><td><a href="javascript:;" class="btn btn-sm btn-outline grey-salsa"><i class="fa fa-search"></i> View</a></td></tr><tr role="row" class="even"><td><label class="mt-checkbox mt-checkbox-single mt-checkbox-outline"><input name="id[]" type="checkbox" class="checkboxes" value="20"><span></span></label></td><td>20</td><td>12/09/2013</td><td>Jhon Doe</td><td>Jhon Doe</td><td>450.60$</td><td>3</td><td><span class="label label-sm label-info">Closed</span></td><td><a href="javascript:;" class="btn btn-sm btn-outline grey-salsa"><i class="fa fa-search"></i> View</a></td></tr></tbody>
                                            </table></div><div class="row"><div class="col-md-8 col-sm-12"><div class="dataTables_paginate paging_bootstrap_extended"><div class="pagination-panel"> Page <a href="#" class="btn btn-sm default prev"><i class="fa fa-angle-left"></i></a><input type="text" class="pagination-panel-input form-control input-sm input-inline input-mini" maxlenght="5" style="text-align:center; margin: 0 5px;"><a href="#" class="btn btn-sm default next"><i class="fa fa-angle-right"></i></a> of <span class="pagination-panel-total">18</span></div></div><div class="dataTables_length"><label><span class="seperator">|</span>View <select name="datatable_ajax_length" aria-controls="datatable_ajax" class="form-control input-xs input-sm input-inline"><option value="10">10</option><option value="20">20</option><option value="50">50</option><option value="100">100</option><option value="150">150</option><option value="-1">All</option></select> records</label></div><div class="dataTables_info"><span class="seperator">|</span>Found total 178 records</div></div><div class="col-md-4 col-sm-12"></div></div></div>
                                        </div>
										
										-->