<?php require_once('includes/sidebar.php'); ?>
<?php require_once('includes/messages.php'); ?>
<h3 class="text-center text-capitalize">Buses Records In Your Company</h3>
<div class="row animated--grow-in">
    <div class="col-xl-12">
        <div class="card card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div></div>
                    <button class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm" data-toggle="modal"
                        data-target="#new_bus">Add New Bus <i class="fa fa-plus fa-sm"></i>
                    </button>
            </div>
            <?php
                if(isset($_GET['key'])):
                endif;
            ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover dt-responsive display nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>bus_plate_no</th>
                        <th>bus name</th>
                        <th>class</th>
                        <th>added_by</th>
                        <th>status</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sn = 1;
                            $booking_records = $connection->query("SELECT bus.*, user.* FROM bus, user ");
                            $booking_data = mysqli_num_rows($booking_records);
                            while($booking_data = mysqli_fetch_array($booking_records)):
                                if($booking_data > 0): ?>
                                    <tr>
                                        <td><?php echo $sn++; ?> </td>
                                        <td><?php echo $booking_data['bus_plate_no']; ?> </td>
                                        <td><?php echo $booking_data['bus_name']; ?> </td>
                                        <td><?php echo $booking_data['type']; ?> </td>
                                        <td><?php echo $booking_data['full_name']; ?> </td>
                                        <td>
                                            <?php
                                                if($booking_data['status'] == 0){
                                                    echo "unactive";
                                                }
                                                else{
                                                    echo "active";
                                                }
                                            ?> 
                                        </td>
                                        <td>
                                            <form action="addition.php?bus_id=<?php echo $booking_data['bus_id']; ?>" method="post">
                                                <div class="form-group">
                                                    <input type="text" name="" value="1" hidden required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-primary" name="activate_car" value="activate">
                                                </div>
                                            </form>
                                        </td>

                                <?php endif;
                            endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php require_once('includes/footer.php'); ?>
    <?php require_once('modal/new_bus.php'); ?>
</div>