<?php require_once('includes/sidebar.php'); 
    require_once('../includes/config.php');
?>
<div class="main_container">
    <h3 class="border-left-primary h-100 py-2 text-capitalize">Welcome Dear: <?php echo $_SESSION['user_details']['full_name']; ?> </h3>
        <div class="row">
            <!-- cards -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="col mr-2">  
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <h4 class="text-xs text-primary font-bold-weight text-uppercase mb-1">Registered Staff</h4>
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> 
                                        <?php
                                            if($connection):
                                                $staff_record =mysqli_query($connection, "SELECT * FROM `user` ");
                                                $result = mysqli_num_rows($staff_record); ?>
                                                <span class="count"><?php echo $result; ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>    
                        </div>    
                    </div>    
                </div>    
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="col mr-2">  
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="text-xs text-primary font-bold-weight text-uppercase mb-1">Tickets Booked Today</div>
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> 
                                        <?php
                                            $date = date('Y-m-d');
                                            if($connection):
                                                $ticket_record =mysqli_query($connection, "SELECT * FROM `booked` where time_booked = '$date' ");
                                                $data = mysqli_num_rows($ticket_record); ?>
                                                <span class="count"><?php echo $data; ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>    
                        </div>    
                    </div>    
                </div>    
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="col mr-2">  
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="text-xs text-primary font-bold-weight text-uppercase mb-1>">Route Available</div>
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> 
                                        <?php
                                            $date = date('Y-m-d');
                                            if($connection):
                                                $route_record =mysqli_query($connection, "SELECT * FROM `route` ");
                                                $route_data = mysqli_num_rows($route_record); ?>
                                                <span class="count"> <?php echo $route_data; ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>    
                        </div>    
                    </div>    
                </div>    
            </div>
        </div>
    </div>
<?php require_once('includes/footer.php'); ?>