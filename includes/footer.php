    <div class="sticky-footer bg-light">
        <div class="conatiner my-auto">
            <div class="copyright my-auto text-center text-capitalize">
                <span> &copy; online-bus-ticket-system <?php echo date('Y'); ?> </span>
            </div>
        </div>
    </div>
    
   <script>
      function printTicket(){
         
         var myTicket = window.open('', '_blank', 'height=700 width=750');
         myTicket.document.write(document.getElementById('print_ticket').innerHTML);

         myTicket.print()
         myTicket.close();
      }
   </script>
    <!-- scrpts -->
    <script src = "assets/js/car-spare-part.js"></script>
    <script src="assets/js/jquery-1.10.2"></script>
      <!-- jQuery library -->
      <script src = "https://code.jquery.com/jquery-3.2.1.slim.min.js" 
         integrity =" sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
         crossorigin = "anonymous">
      </script>
      
      <!-- Popper -->
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
         integrity = "sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
         crossorigin = "anonymous">
      </script>
      
      <!-- Latest compiled and minified Bootstrap JavaScript -->
      <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
         integrity = "sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
         crossorigin =" anonymous">
      </script>
      <!-- Bootstrap CSS -->
   </body>
</html>