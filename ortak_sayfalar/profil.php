
<li class="dropdown user user-menu">


            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                <?php if(isset($_SESSION['login']) == "true") { ?>
                <img src="images/users/<?php echo $_SESSION['user_pp'];?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $_SESSION['user_name'];?></span>

            <?php }else { ?>
                <img src="dist/img/defaultprofile.png" class="user-image" alt="User Image">
                <span class="hidden-xs"> Guest </span>
                <?php } ?>

            </a>


            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">

            <?php if(isset($_SESSION['login']) == "true") { ?>
                <img src="images/users/<?php echo $_SESSION['user_pp'];?>" class="img-circle" alt="User Image">
                <p>
                    <?php echo $_SESSION['user_name'];?>
                    <small> Logged in </small>
                </p>


            <?php }else { ?>
                <img src="dist/img/defaultprofile.png" class="img-circle" alt="User Image">
                <p>
                  Guest Member
                  <small> Not Logged In </small>
                </p>
            <?php } ?>

              </li>
              <!-- Menu Body -->
                <li class="user-body">
                    <div class="row">
                        <div class="col-xs-4 text-center">
                            <a href="#">Followers</a>
                        </div>

                        <div class="col-xs-4 text-center">
                            <a href="#">Friends</a>
                        </div>
                    </div>
                    <!-- /.row -->
                </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>