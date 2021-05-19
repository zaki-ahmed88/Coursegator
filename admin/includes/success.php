
<?php 

    if(isset($_SESSION['success'])){?>
    <div class="alert alert-success">
        <?= $_SESSION['success']; ?>
        <?php unset($_SESSION['success']) ?>
    </div>
        
    <?php } ?>