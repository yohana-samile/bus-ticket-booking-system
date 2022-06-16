<?php require_once('includes/navbar.php'); ?>
<?php require_once('includes/config.php'); ?>
<?php require_once('includes/messages.php'); ?>
<?php $result = $_GET['key']; ?>
<h3 class="text-center text-capitalize">This is your booking page</h3>
<div class="row animated--grow-in">
    <div class="col-xl-12">
        <div class="card card-body">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div></div>
                <?php
                    $get_id = $connection->query("SELECT * FROM `booked` ORDER BY created_time DESC");
                    $row = mysqli_num_rows($get_id);
                    if($row >0){
                        $row = mysqli_fetch_array($get_id);
                        if($row['seat_booked'] == 0 and $row['transpost_cost'] == 0){ ?>
                            <button class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm" data-toggle="modal"
                                data-target="#booking_step_two">Continue Finish Your Booking <i class="fa fa-plus fa-sm"></i>
                            </button>
                       <?php }
                       elseif($row['seat_booked'] != 0 and $row['transpost_cost'] == 0){ ?>
                            <button class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm" data-toggle="modal"
                                data-target="#booking_step_three">Continue With Another Step <i class="fa fa-plus fa-sm"></i>
                            </button>
                       <?php }
                        //    if($row['transpost_cost'] >=30000) 
                        elseif($row['transpost_cost'] >=30000 and $row['customer_name'] =="undefined yet"){ ?>
                            <button class="d-none d-sm-inline-block btn btn-primary btn-sm shadow-sm" data-toggle="modal"
                                data-target="#last_step">Confirm Last Step <i class="fa fa-plus fa-sm"></i>
                            </button>
                    <?php } 
                    elseif($row['customer_name'] !="undefined yet"){ ?>
                        <button class="d-none d-sm-inline-block btn-sm shadow-sm" data-toggle="modal"
                            >Now You Can Print Your Ticket in button below</i>
                        </button>
                <?php }
                
                }?>
                    
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
                        <th>route from</th>
                        <th>route to</th>
                        <th>Date Travel</th>
                        <th>booking Confirmation</th>
                        <th>Bus Seat Type</th>
                        <th>Seat Number</th>
                        <th>Transport Cost</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sn = 1;
                            $booking_records = $connection->query("SELECT route.*, booked.* FROM route,booked where booked.route_location = route.route_id and booed_id = '$result' ORDER BY `booked`.`created_time` DESC");
                            $booking_data = mysqli_num_rows($booking_records);
                            if($booking_data > 0):
                                $booking_data = mysqli_fetch_array($booking_records)
                                ?>
                                <tr class="text-capitalize">
                                    <td><?php echo $sn++; ?> </td>
                                    <td><?php echo $booking_data['route_from']; ?> Bus Teminal</td>
                                    <td><?php echo $booking_data['route_to']; ?> Bus Teminal</td>
                                    <td><?php echo $booking_data['time_booked']; ?> </td>
                                    <td>
                                        <?php if($booking_data['status2'] == "not finish"){ ?>
                                            <div  class="btn btn-warning font-weight">
                                                <?php echo "not finish"; ?>
                                            </div>
                                        <?php }
                                        else{ ?>
                                            <div class="text-primary">
                                                <?php echo $booking_data['status2']; ?>
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php
                                            if($booking_data['bus_type'] = "luxiary"){
                                                echo "luxiary";
                                            }
                                            else{
                                                echo "not luxiary";
                                            }
                                        ?> 
                                    </td>

                                    <td>
                                        <?php
                                            if($booking_data['seat_booked'] == 0){
                                                // echo "luxiary";
                                            }
                                            else{
                                                echo $booking_data['seat_booked'];
                                            }
                                        ?> 
                                    </td>
                                    <td>
                                        <?php
                                            if($booking_data['transpost_cost'] == 0){
                                                // echo "luxiary";
                                            }
                                            else{
                                                echo $booking_data['transpost_cost'];
                                            }
                                        ?> 
                                    </td>
                                    <td>
                                        <?php
                                            if($booking_data['customer_name'] == "undefined yet"){
                                                if($booking_data['status'] == 0){
                                                    echo "not Paid";
                                                }
                                            }
                                            else{ ?>
                                                <a href="" class="btn btn-primary" onclick="printTicket()">Print Ticket <i class="fa fa-print"></i></a>
                                        <?php } ?>
                                    </td>

                                </tr>
                            <?php endif;
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
                $get_seat_record = $connection->query("SELECT * FROM `schedule_list` ");
                $seat_data =mysqli_num_rows($get_seat_record); 
                        while($seat_data = mysqli_fetch_array($get_seat_record)): 
                            if($seat_data >0):
                                $seat_data['availability'];
                            ?>
                                <div class="my-3">
                                    <h4 class="">Bus Capacity = <?php echo $seat_data['availability']; ?> Total Of Seat</h4>
                                </div>
                    <?php endif;
                    endwhile;
            ?>
            <p class="text-warning"><b>Do Not Close Page Until You Print Your Ticket</b></p>

        </div>
    </div>
    



<!-- booking ticket -->
<!-- print_ticket -->
<!-- add booking modal -->
<?php
    $check_ticket = $connection->query("SELECT * FROM booked ORDER BY created_time DESC");
    $obtained_ticket = mysqli_num_rows($check_ticket);
    if($obtained_ticket >0){
        $obtained_ticket = mysqli_fetch_array($check_ticket);
        if($obtained_ticket['customer_name'] == "undefined yet"){
            echo "ticket on progress. Thank You......";
        }
        else{
            ?>
                <div id="print_ticket">
                    <div class="container">
                        <div class="jumbotron text-center">
                            <div class="border-left-primary">
                                <!-- <div class="card col-md-12"> -->
                                    <h4 class="text-center"><i class="fa fa-car"></i> Buss Name: <span class="text-center"> BM Luxiary Coach</h4>
                                    <?php
                                        $ticket_record = $connection->query("SELECT booked.*,  route.* FROM booked, route where booked.route_location =  route. route_id  ORDER BY created_time DESC");
                                        $ticket_data = mysqli_num_rows($ticket_record);
                                        if($ticket_data >0){
                                            $ticket_data = mysqli_fetch_array($ticket_record);
                                            $ticket_data['booed_id']; ?>
                                            <ul class="list-group">
                                                <li class="list-group-item">Ticket Reference Number: <span class="text-center"> <?php echo $ticket_data['booed_id'] + 1234; ?></li>
                                                <li class="list-group-item">Full Name: <span class="text-center"> <?php echo $ticket_data['customer_name']; ?></li>
                                                <li class="list-group-item">Phone Number: <span class="text-center"> <?php echo $ticket_data['customer_phone_number']; ?></li>
                                                <li class="list-group-item">Seat Number: <span class="text-center"> <?php echo $ticket_data['seat_booked']; ?></li>
                                                <li class="list-group-item">Seat Type: <span class="text-center"> <?php echo $ticket_data['bus_type']; ?></li>
                                                <li class="list-group-item">Total Paid: <span class="text-center"> <?php echo $ticket_data['transpost_cost']; ?></li>
                                                <li class="list-group-item">Departure Time: <span class="text-center"> <?php echo $ticket_data['departure_time']; ?></li>
                                                <li class="list-group-item">Estemated Arrival Time: <span class="text-center"> <?php echo $ticket_data['arrival_time']; ?></li>
                                                <li class="list-group-item">From: <?php echo $ticket_data['route_from']; ?> bus teminal<span class="text-center text-primary"> To </span><?php echo $ticket_data['route_to']; ?> bus teminal</li>
                                            </ul>
                                    <?php } ?>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>
    <?php } } ?>




    <!-- footer includes -->
    <div hidden>
        <?php require_once('includes/footer.php'); ?>
    </div>

    <?php require_once('book_new_ticket.php'); ?>
</div>