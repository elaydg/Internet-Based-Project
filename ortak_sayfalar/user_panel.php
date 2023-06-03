<div class="user-panel">
    <div class="pull-left image">

        <?php if(isset($_SESSION['login']) == "true") { ?>
        <img src="images/users/<?php echo $_SESSION['user_pp'];?>" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
        <p><?php echo $_SESSION['user_name'];?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online </a>


        <?php }else { ?>
        <img src="dist/img/defaultprofile.png" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
        <p>Guest Member</p>
        <a href="#"><i class="fa fa-circle text-danger"></i> Offline </a>
        <?php } ?>

    </div>
</div>


