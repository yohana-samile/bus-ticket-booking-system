<?php
    require_once('includes/navbar.php');
    if(isset($_GET['key'])):
    endif;
?>
<div class="image">
    <img class="img-thumbnail" src="image/Diesel_product_bussim18_960x497-2-960x497-99e029aa01139046a3595f4fd32aada3009f4a6a.jpg" alt="online-bus-ticket-system">
</div><br>

<a class="book_now btn btn-primary text-center" href="" data-toggle="modal" data-target="#book_new_ticket"> Book Now </a>

<?php include('includes/footer.php'); ?>
<?php include('book_new_ticket.php'); ?>