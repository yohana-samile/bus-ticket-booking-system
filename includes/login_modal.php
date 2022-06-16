<!-- add login modal -->
<div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="#login_modal" aria-hiden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg">
            <p class="text-center modal-title text-white" id="edit_vehacle">use the provided creditials to login</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
            </button>
            </div>
            <div class="card-body">
                <form class="form" role="form" method="post" action="login_action.php">
                <?php
                    if(isset($_GET['key'])):
                    endif;
                    require_once('includes/messages.php');
                ?>
                <div class="form-group">
                    <input type="email" name="username" class="form-control" placeholder="Enter Your Username">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter Your Password">
                </div>
                <div class="form-group">
                    <input type="submit" name="log_me_in" class="form-control bg" value="Login">
                    <p class="text-white my-2">|<a href="register_me.php">not yet registered</a></p>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>