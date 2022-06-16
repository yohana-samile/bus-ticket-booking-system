<!-- add booking modal -->
<div class="modal fade" id="new_bus" tabindex="-1" role="dialog" aria-labelledby="#new_bus" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <p class="text-center modal-title text-white" id="edit_vehacle">Register New Bus</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
            </button>
            </div>
            <div class="card-body">
                <form class="form" role="form" method="post" action="addition.php">
                    <div class="form-group">
                        <input type="text" name="bus_plate_no" placeholder="Enter Bus plate_no" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="bus_name" placeholder="Enter Bus name" class="form-control">
                    </div>
                    <div class="form-group">
                        <?php
                            $user = $_SESSION['user_details']['user_id'];
                            $record = $connection->query("SELECT * FROM user where user_id = '$user' ");
                            $data = mysqli_num_rows($record);
                                if($data >=1){ 
                                    $data = mysqli_fetch_array($record); ?>
                                    <input type="number" value="<?php echo $data['user_id']; ?>" required hidden name="added_by" placeholder="added_by" class="form-control">
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="add_new_bus" class="form-control text-white bg-primary" value="Register Bus">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- new route -->
<div class="modal fade" id="new_route" tabindex="-1" role="dialog" aria-labelledby="#new_route" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <p class="text-center modal-title text-white" id="edit_vehacle">Register New Bus</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
            </button>
            </div>
            <div class="card-body">
                <form class="form" role="form" method="post" action="addition.php">
                    <div class="form-group">
                        <input type="text" name="route_from" placeholder="Enter Route From" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="route_to" placeholder="Enter Route To" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="departure_time">Estimated Arrival Time</label>
                        <input type="datetime-local" name="departure_time" id="departure_time" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="arrival_time">Estimated Arrival Time</label>
                        <input type="datetime-local" name="arrival_time" id="arrival_time" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <?php
                            $user = $_SESSION['user_details']['user_id'];
                            $record = $connection->query("SELECT * FROM user where user_id = '$user' ");
                            $data = mysqli_num_rows($record);
                                if($data >=1){ 
                                    $data = mysqli_fetch_array($record); ?>
                                    <input type="number" value="<?php echo $data['user_id']; ?>" required hidden name="added_by" placeholder="added_by" class="form-control">
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <input type="date" name="date_created" hidden placeholder="Enter date_created" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="add_new_route" class="form-control text-white bg-primary" value="Register Bus">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- new schedule -->
<div class="modal fade" id="new_schedule" tabindex="-1" role="dialog" aria-labelledby="#new_schedule" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <p class="text-center modal-title text-white" id="edit_vehacle">Register New Schedule</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
            </button>
            </div>
            <div class="card-body">
                <form class="form" role="form" method="post" action="addition.php">
                    <div class="form-group">
                        <?php
                            $record = $connection->query("SELECT * FROM bus where status = '1' ");
                            $data = mysqli_num_rows($record); ?>
                            <select name="bus_name" class="form-control" required>
                                <option hidden>Select Bus Name</option>
                                    <?php while($data = mysqli_fetch_array($record)):
                                        if($data >=1){ ?>
                                            <option value="<?php echo $data['bus_id']; ?>"><?php echo $data['bus_name']; ?></option>
                                    <?php }
                                    endwhile; ?>
                            </select>

                    </div>
                    <div class="form-group">
                        <?php
                        $record = $connection->query("SELECT * FROM route");
                        $data = mysqli_num_rows($record); ?>
                        <select name="route_location" class="form-control" required>
                            <option hidden>Select Bus Start Point</option>
                            <?php while($data = mysqli_fetch_array($record)):
                                if($data >=1){ ?>
                                    <option value="<?php echo $data['route_id']; ?>"><span class="text-primary"> FROM</span> <?php echo $data['route_from']; ?> <span class="text-primary"> TO</span> <?php echo $data['route_to']; ?></option>
                            <?php }
                            endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        </label for="price">price</label>
                        <input type="number" name="price" id="price" placeholder="Enter cost" required class="form-control">
                    </div>
                    <div class="form-group">
                        </label for="availability">availability</label>
                        <input type="number" name="availability" id="availability" placeholder="Enter Bus Total Seat" required class="form-control">
                    </div>
                    <div class="form-group">
                        </label for="estimated_time_arrival_time">Enter Estimated Arrival Time</label>
                        <input type="datetime-local" required name="estimated_time_arrival_time" id="estimated_time_arrival_time" placeholder="time start" class="form-control">
                    </div>
                    <div class="form-group">
                        </label for="time_start">Enter Departure Time</label>
                        <input type="datetime-local" name="time_start" id="time_start" placeholder="Enter time_start " class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="new_schedule" class="form-control text-white bg-primary" value="Save data">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>