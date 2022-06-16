<?php session_start();
    require_once('includes/messages.php'); 
    $title = "online-ticket-system";
?>
<html>
    <head>
        <link rel = "stylesheet" href = "assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/ocsp.css">
        <title><?php echo $title; ?></title>
    </head>

    <style type="text/css">
        img{height: 260px;}
        .card{height: 330px;}
        p{
            height: 42px;
        }
        .image img{
            width: 100%;
            height: 75%;
        }
        a{
            text-decoration: none;
        }
        .book_now{
            position:absolute;
            margin-top: -320px;
            align-items: center;
        }
    </style>
    <body>
      <div class = "container bg-primary col-md-12" style="width: 100%;">
         <nav class = "navbar navbar-expand-sm bg-primary navbar-dark">
            <a class = "navbar-brand text-capitalize" href = "index.php"><i class="fa fa-car"></i> online-bus-ticket-system</a>
            <button class = "navbar-toggler" type = "button" data-toggle = "collapse" 
               data-target = "#navbarNavDropdown" aria-controls = "navbarNavDropdown" 
               aria-expanded = "false" aria-label = "Toggle navigation">
               
               <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class = "collapse navbar-collapse text-light" id = "navbarNavDropdown">
               <ul class = "navbar-nav">
                  <li class = "nav-item active">
                     <a class = "nav-link" href = "index.php">Home 
                        <span class = "sr-only">(current)</span>
                     </a>
                  </li>

                  <!-- login modal -->
                  <li class = "nav-item">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="modal fade" id="contact">
                                 <div class="modal-dialog">
                                    <div class="modal-content">
                                       <div class="modal-header bg-primary">
                                          <h2 class="modal-title text-white text-center text-capitalize">Sent Text To Contact Us</h2>
                                          <button class="btn btn-default" data-dismiss="modal">&times;</button>
                                       </div>
                                       <div class="modal-body">
                                           <form action="post" method="user_login_action.php" class="form" role="form">
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-control" placeholder="enter your email" required>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" name="customer_message" placeholder="enter your message" row="12" col="12" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" name="contact" class="bg-primary my-3 form-control text-center text-white" value="send text">
                                                </div>
                                            </form>
                                       </div>
                                       <div class="modal-footer">
                                          <button class="btn btn-danger" data-dismiss="modal">close</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <p class ="nav-link" data-toggle="modal" data-target="#contact" style="color:white; cursor:pointer">Contanct Us</p>
                        </div>
                     </div>
                  </li>
                  <!-- end of contanct modal -->

                  <!-- login modal -->
                  <li class = "nav-item">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="modal fade" id="my">
                                 <div class="modal-dialog">
                                    <div class="modal-content">
                                       <div class="modal-header bg-primary">
                                          <h2 class="modal-title text-white text-center text-capitalize">Fill Form Below To Login</h2>
                                          <button class="btn btn-default" data-dismiss="modal">&times;</button>
                                       </div>
                                       <div class="modal-body">
                                           <form method="post" action="user_login_action.php" class="form" role="form">
                                                <div class="form-group">
                                                    <input type="text" name="username" class="form-control" placeholder="enter username" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control" placeholder="enter password" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" name="user_login" class="bg-primary my-3 form-control text-center text-white" value="login">
                                                </div>
                                            </form>
                                       </div>
                                       <div class="modal-footer">
                                          <button class="btn btn-danger" data-dismiss="modal">close</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <p class ="nav-link" data-toggle="modal" data-target="#my" style="color:white; cursor:pointer">Login</p>
                        </div>
                     </div>
                  </li>
                  <!-- end of login modal -->
               </ul>
            </div>
         </nav>
      </div>
    <hr>