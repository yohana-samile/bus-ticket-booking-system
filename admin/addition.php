<?php
    // adding of new bus
    session_start();
    require_once('../includes/config.php');
    if(isset($_POST['add_new_bus'])){
        $bus_plate_no = $_POST['bus_plate_no'];
        $bus_name = $_POST['bus_name'];
        $added_by = $_POST['added_by'];

    // INSERT INTO `user` (`user_id`, `full_name`, `phone_no`, `username`, `password`, `status`, `date_registered`) VALUES (NULL, 'yohana samile', '0620350083', 'samile', '1234', '1', current_timestamp());
        $add_bus = $connection->query("INSERT INTO `bus` VALUES (null, '$bus_plate_no', '$bus_name', '$added_by', '0')");
        if($add_bus){
            $_SESSION['success'] = "New Bus Added Successful";
            header('location:bus.php?key=success');
        }
        else{
            $_SESSION['fail'] = "Sorry Something Went Wrong. Please Try Again";
            header('location:bus.php?key=fail');
        }
    }


    // activate car
    if(isset($_POST['activate_car'])){
        echo $status = $_GET['bus_id'];
        $car_activate = $connection->query("UPDATE `bus` SET `status` = '1' WHERE `bus`.`bus_id` = '$status' ");
        if($car_activate){
            $_SESSION['success'] = "One Bus Activated Successful";
            header('location:bus.php?key=success');
        }
        else{
            $_SESSION['fail'] = "Sorry Something Went Wrong. Please Try Again";
            header('location:bus.php?key=fail');
        }
    }

    // new route // activate car
    if(isset($_POST['add_new_route'])){
        $route_from = $_POST['route_from'];
        $route_to = $_POST['route_to'];
        $departure_time = $_POST['departure_time'];
        $arrival_time = $_POST['arrival_time'];
        $added_by = $_POST['added_by'];
        $date_created = $_POST['date_created'];
        $add_route = $connection->query("INSERT INTO `route` VALUES (null, '$route_from', '$route_to', '$departure_time', '$arrival_time', '$added_by', current_timestamp())");
        if($add_route){
            $_SESSION['success'] = "One Route Added Successful";
            header('location:route.php?key=success');
        }
        else{
            $_SESSION['fail'] = "Sorry Something Went Wrong. Please Try Again";
            header('location:route.php?key=fail');
        }
    }


    // schdule update
    if(isset($_POST['new_schedule'])){
        $bus_name = $_POST['bus_name'];
        $route_location = $_POST['route_location'];
        $price = $_POST['price'];
        $availability = $_POST['availability'];
        $estimated_time_arrival_time = $_POST['estimated_time_arrival_time'];
        $time_start = $_POST['time_start'];
        $add_route = $connection->query("INSERT INTO `schedule_list` VALUES (null, '$bus_name', '$route_location', '$price', '$availability', '$estimated_time_arrival_time', '$time_start')");
        if($add_route){
            $_SESSION['success'] = "Schedule Updated Successful";
            header('location:schedule.php?key=success');
        }
        else{
            $_SESSION['fail'] = "Sorry Something Went Wrong. Please Try Again";
            header('location:schedule.php?key=fail');
        }
    }

?>