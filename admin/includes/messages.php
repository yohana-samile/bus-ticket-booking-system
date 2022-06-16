<?php if(isset($_SESSION['error'])) : ?>
    <div class="alert alert-danger">
        <strong>Error</strong> : <?php echo htmlentities($_SESSION['error']); ?> 
    </div>
<?php endif; unset($_SESSION['error']) ?>

<?php if(isset($_SESSION['success'])) : ?>
    <div class="alert alert-success">
        <strong>Success</strong> : <?php echo htmlentities($_SESSION['success']); ?> 
    </div>
<?php endif; unset($_SESSION['success']) ?>

<?php if(isset($_SESSION['warning'])) : ?>
    <div class="alert alert-warning">
        <strong>Warning</strong> : <?php echo htmlentities($_SESSION['warning']); ?> 
    </div>
<?php endif; unset($_SESSION['warning']) ?>