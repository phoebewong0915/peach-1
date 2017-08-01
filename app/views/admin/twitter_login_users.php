<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Twitter User Selection</h4>
                <p class="category">User Sorting</p>
            </div>
             <div class="content table-responsive table-full-width">
                <table id="datatable-buttons" class="table table-hover table-striped">

                <thead>
                        <tr>Selection</th>
                    </thead>
                    <tbody>

                            <tr>
                                <td>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                        <label>Mac</label>
                                        <input class="form-control" type="text">
                                        </div>
                                    </div>
                                 </td>

                                <td>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                        <label>Udername</label>
                                        <input class="form-control" type="text">
                                        </div>
                                    </div>
                                 </td>

                                <td>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                        <label>Screen Name</label>
                                        <input class="form-control" type="text">
                                        </div>
                                    </div>
                                 </td>

                            </tr>

                            <tr>

                                <td>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                        <label>PLocation</label>
                                        <input class="form-control" type="text">
                                        </div>
                                    </div>
                                 </td>


                                <td> 
                                 <div class="col-md-6">          
                                    <div class="form-group ">
                                        <label for="data[language_id]" class="control-label col-lg-4">Registration Period</label>
                                            <select class="form-control"  style="width:200px">
                                            <option value="1">Today</option>
                                            <option value="2">Last 7 Days</option>
                                            <option value="3">Last 30 Days</option>
                                            <option value="4">Last 60 Days</option>
                                            <option value="5" selected="">Select</option>
                                        </select>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                  <div class="col-md-12">
                                   <input class="btn btn-danger btn-fill" type="submit" value="Submit">
                                   <a href="" class="btn btn-default btn-fill" type="button">Cancel</a>
                                  </div>                                                                                    
                                </td>
                            </tr>   

                    </tbody>


                    </table>


            </div>
        </div>
    </div>
</div>




<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Twitter User List</h4>
                <p class="category">All Twitter User summary</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table id="datatable-buttons" class="table table-hover table-striped">

                    <thead>
                        <tr>
                                <th>Mac</th>
                                <th>Twitter ID</th>
                                <th>Username</th>                                   
                                <th>Screen Name</th>
                                <th>Location</th>
                                <th>Discription</th>
                                <th>Profile Picture</th>
                                <th>Registration Time</th>

                        </tr>
                    </thead>
                    <?php echo $this->session->flashdata('msg'); ?>

                    <tbody>
                        <?php foreach ($user_data as $data){ ?>

                                        <tr>

                                            <td>
                                                <?php echo $data->mac; ?>
                                            </td>
                                            <td>
                                                <?php echo $data->tw_id; ?>
                                            </td>
                                            <td>
                                                <?php echo $data->name; ?>
                                            </td>
                                            <td>
                                                <?php echo $data->screen_name; ?>
                                            </td>
                                            <td>
                                                <?php echo $data->location; ?>
                                            </td>
                                            <td>
                                                <?php echo $data->description; ?>
                                            </td>

                                            <td>
                                                <img src="<?php echo $data->profile_image_url; ?>" alt="HTML5 Icon" width='100'>
                                            </td>

                                             <td> <?php date_default_timezone_set('Asia/Hong_Kong'); echo date('Y-m-d-H-i-s', $data->reg_time) ?>
                                              </td>
                                      
                                            
                                            
                                          
                                        </tr>

                        <?php }?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>