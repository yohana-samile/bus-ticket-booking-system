<?php require_once('includes/sidebar.php'); ?>
<?php require_once('includes/messages.php'); ?>
<h3 class="text-center text-capitalize">Routes Records In Your Company</h3>
<div class="row animated--grow-in">
    <div class="col-xl-12">
        <div class="card card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div></div>
                    <button class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm" data-toggle="modal"
                        data-target="#new_route">Add New Route <i class="fa fa-plus fa-sm"></i>
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
                        <th>Route From</th>
                        <th>Route To</th>
                        <th>Departure Time</th>
                        <th>Arrival Time</th>
                        <th>added_by</th>
                        <th>date_created</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sn = 1;
                            $booking_records = $connection->query("SELECT route.*, user.* FROM route, user ");
                            $booking_data = mysqli_num_rows($booking_records);
                            while($booking_data = mysqli_fetch_array($booking_records)):
                                if($booking_data > 0): ?>
                                    <tr>
                                        <td><?php echo $sn++; ?> </td>
                                        <td><?php echo $booking_data['route_from']; ?> </td>
                                        <td><?php echo $booking_data['route_to']; ?> </td>
                                        <td><?php echo $booking_data['departure_time']; ?> </td>
                                        <td><?php echo $booking_data['arrival_time']; ?> </td>
                                        <td><?php echo $booking_data['full_name']; ?> </td>
                                        <td><?php echo $booking_data['date_created']; ?> </td>

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