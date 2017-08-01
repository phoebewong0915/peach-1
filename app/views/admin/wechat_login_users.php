<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">WeChat User List</h4>
                <p class="category">All WeChat User summary</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table id="datatable-buttons" class="table table-hover table-striped">

                    <thead>
                        <tr>
                                <th>Mac</th>
                                <th>Wechat Image</th>
                                <th>Nickname</th>                                   
                                <th>Gender</th>
                                <th>Country</th>
                                <th>Province</th>
                                <th>City</th>
                                <th>Locale</th>
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
                                                <img src="<?php echo $data->wc_image; ?>" alt="HTML5 Icon" width='100' >
                                            </td>
                                            <td>
                                                <?php echo $data->wc_nickname; ?>
                                            </td>
                                           
                                            <td>
                                                <?php echo $data->wc_gender; ?>
                                            </td>
                                            
                                            <td>
                                                <?php echo $data->wc_country; ?>
                                            </td>
                                            
                                            <td>
                                                <?php echo $data->wc_province; ?>
                                            </td>
                                            
                                            <td>
                                                <?php echo $data->wc_city; ?>
                                            </td>
                                            
                                            <td>
                                                <?php echo $data->wc_locale; ?>
                                            </td>

                                            <td> <?php date_default_timezone_set('Asia/Hong_Kong'); echo date('Y-m-d-H:i:s', $data->reg_time) ?>
                                            </td>
                                          
                                        </tr>

                        <?php }?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
	 