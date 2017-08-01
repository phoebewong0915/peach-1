<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Email User List</h4>
                <p class="category">All Email User summary</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table id="datatable-buttons" class="table table-hover table-striped">

                    <thead>
                        <tr>
                                <th>Mac</th>
                                <th>Email</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Reg_Time</th>

                        </tr>
                    </thead>
                    <?php echo $this->session->flashdata('msg'); ?>

                    <tbody>
                        <?php foreach ($user_data as $data){ ?>

                                    <tr>

                                        <td> <?php echo $data->mac; ?> </td>
                                        <td> <?php echo $data->email; ?> </td>
                                        <td> <?php echo $data->fname; ?> </td>
                                        <td> <?php echo $data->lname; ?> </td>
                                        <td> <?php date_default_timezone_set('Asia/Hong_Kong'); echo date('Y-m-d-H-i-s', $data->reg_time) ?> </td>
                                      
                                    </tr>

                        <?php }?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

