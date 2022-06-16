<?php require_once('includes/sidebar.php'); ?>
<?php require_once('includes/messages.php'); ?>
<h3 class="text-center text-capitalize">Sold Ticket Chart</h3>
<div class="row animated--grow-in">
    <div class="col-xl-12">
        <div class="card card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div></div>
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
                        <th>ticket number</th>
                        <th>customer_name</th>
                        <th>customer phone number</th>
                        <th>from</th>
                        <th>to</th>
                        <th>bus seat type</th>
                        <th>transport cost</th>
                        <th>time_booked</th>
                        <th>seat_booked</th>
                        <th>status</th>
                        <th>status2</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sn = 1;
                            $booking_records = $connection->query("SELECT booked.*, route.* FROM booked, route where booked.route_location = route.route_id ");
                            $booking_data = mysqli_num_rows($booking_records);
                            while($booking_data = mysqli_fetch_array($booking_records)):
                                if($booking_data > 0): ?>
                                    <tr>
                                        <td><?php echo $sn++; ?> </td>
                                        <td><?php echo $booking_data['booed_id'] + 1234; ?> </td>
                                        <td><?php echo $booking_data['customer_name']; ?> </td>
                                        <td><?php echo $booking_data['customer_phone_number']; ?> </td>
                                        <td><?php echo $booking_data['route_from']; ?> </td>
                                        <td><?php echo $booking_data['route_to']; ?> </td>
                                        <td><?php echo $booking_data['bus_type']; ?> </td>
                                        <td><?php echo $booking_data['transpost_cost']; ?> </td>
                                        <td><?php echo $booking_data['time_booked']; ?> </td>
                                        <td><?php echo $booking_data['seat_booked']; ?> </td>
                                        <td>
                                            <?php
                                                if($booking_data['status'] == 0){
                                                    echo "not paid";
                                                }
                                                else{
                                                    echo "paid";
                                                } 
                                            ?>
                                        </td>
                                        <td><?php echo $booking_data['status2']; ?> </td>
                                        <td> <a href="">edit</a> </td>
                                    </tr>
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