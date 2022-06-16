<!-- add booking modal -->
<div class="modal fade" id="book_new_ticket" tabindex="-1" role="dialog" aria-labelledby="#book_new_ticket" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <p class="text-center modal-title text-white" id="edit_vehacle">Bus Booking Ticket System</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
            </button>
            </div>
            <div class="card-body">
                <form class="form" role="form" method="post" action="booking.php">
                    <?php
                        if(isset($_GET['key'])):
                        endif;
                        require_once('includes/messages.php');
                        require_once('includes/config.php');
                    ?>

                    <div class="form-group">
                        <?php
                            $get_route_record = $connection->query("SELECT * FROM route");
                            $bookin_data = mysqli_num_rows($get_route_record); ?>

                            <label for="Departure">Arrival</label>
                            <select name="route_location" class="form-control" required>
                                <option hidden>Choose Route Arrival</option>
                                <?php while($bookin_data = mysqli_fetch_array($get_route_record)):
                                    if($bookin_data >=1){ ?>
                                        <option value="<?php echo $bookin_data['route_id'] ?>"> FROM..<?php echo $bookin_data['route_from'] ?> TO..<?php echo $bookin_data['route_to'] ?></option>
                                    <?php }
                                endwhile; ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <input type="date" name="date_booked" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit_my_booking" class="form-control text-white bg-primary" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- booking step 2 -->
<!-- add booking modal -->
<div class="modal fade" id="booking_step_two" tabindex="-1" role="dialog" aria-labelledby="#booking_step_two" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <p class="text-center modal-title text-white" id="edit_vehacle">Bus Booking Ticket System</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
            </button>
            </div>
            <div class="card-body">
                <?php
                    $get_id = $connection->query("SELECT booed_id FROM `booked` ORDER BY created_time DESC");
                    $row = mysqli_num_rows($get_id);
                    if($row >0){
                        $row = mysqli_fetch_array($get_id);
                        $result = $row['booed_id']; ?>
                        <form class="form" role="form" method="post" action="booking.php?booed_id=<?php echo $result = $row['booed_id']; ?>">
                            <div class="form-group">
                                <select class="form-control" name="bus_type" required>
                                    <option hidden>Choose Bus Type</option>
                                    <option value="luxiary">Luxiary</option>
                                    <option value="not luxiary">Not Luxiary</option>
                                </select>
                            </div>
                                <?php
                                    $date = date("Y-m-d");

                                    $get_seat_record = $connection->query("SELECT seat_booked, time_booked FROM `booked` where time_booked = '$date' ");
                                    $seat_data =mysqli_num_rows($get_seat_record);
                                    if($seat_data == 30){ ?>
                                        <div class="my-3">
                                            <h4 class="text-danger">No Space Available For this Data Of Travel</h4>
                                        </div>
                                <?php } else{ ?>
                                            <div class="form-group">
                                                <select class="form-control" name="seat_booked" required>
                                                    <option hidden>Choose seat</option>
                                                    <option value="1">1-W</option>
                                                    <option value="2">2-W</option>
                                                    <option value="3">3-W</option>
                                                    <option value="4">4-W</option>
                                                    <option value="5">5-W</option>
                                                    <option value="6">6-W</option>
                                                    <option value="7">7-W</option>
                                                    <option value="8">8-W</option>
                                                    <option value="9">9-W</option>
                                                    <option value="10">9-W</option>
                                                    <option value="12">10-W</option>
                                                    <option value="13">10-W</option>
                                                    <option value="14">10-W</option>
                                                    <option value="15">10-W</option>
                                                
                                                </select>
                                            </div>
                                <?php } ?>
                            <div class="form-group">
                                <input type="submit" name="booking_step_two" class="form-control text-white bg-primary" value="Submit">
                            </div>
                        </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


<!-- booking_step_three -->
<!-- add booking modal -->
<div class="modal fade" id="booking_step_three" tabindex="-1" role="dialog" aria-labelledby="#booking_step_three<?php echo $_GET['key'];?>" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <p class="text-center modal-title text-white" id="edit_vehacle">Bus Booking Ticket System</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
            </button>
            </div>
            <div class="card-body">
                <?php
                    $get_id_step_3 = $connection->query("SELECT * FROM `booked` ORDER BY created_time DESC");
                    $row_data = mysqli_num_rows($get_id_step_3);
                    if($row_data >0){
                        $row_data = mysqli_fetch_array($get_id_step_3);
                        $row_data['booed_id']; 
                ?>
                <form class="form" role="form" method="post" action="booking.php?step_3_booed_id=<?php echo $row_data['booed_id']; ?>">
                    <?php
                        if($row_data['bus_type'] = "luxiary"){ ?>
                            <div class="form-group">
                                <input type="number" value="30000" readonly name="transpost_cost" class="form-control">
                            </div>
                        <?php }
                        else{ ?>
                            <div class="form-group">
                                <input type="number" value="40000" readonly name="transpost_cost" class="form-control">
                            </div>
                    <?php } ?>
                    <div class="form-group">
                        <input type="submit" name="booking_step_three" class="form-control text-white bg-primary" value="Submit Cost">
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


<!-- final step -->
<!-- add booking modal -->
<div class="modal fade" id="last_step" tabindex="-1" role="dialog" aria-labelledby="#last_step" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <p class="text-center modal-title text-white" id="edit_vehacle">Bus Booking Ticket System</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
            </button>
            </div>
            <div class="card-body">
                <?php
                    $last_step_record = $connection->query("SELECT * FROM `booked` ORDER BY created_time DESC");
                    $last_step_data = mysqli_num_rows($last_step_record);
                    if($last_step_data >0){
                        $last_step_data = mysqli_fetch_array($last_step_record);
                        $last_step_data['booed_id']; 
                ?>
                <form class="form" role="form" method="post" action="booking.php?last_step=<?php echo $row_data['booed_id']; ?>">
                    <div class="form-group">
                        <input type="text" name="customer_name" placeholder="Enter Your Full Name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="customer_phone_number" placeholder="Enter Your Phone Number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="last_step" class="form-control text-white bg-primary" value="Submit Details">
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
