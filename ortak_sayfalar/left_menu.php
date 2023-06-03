<ul class="sidebar-menu" data-widget="tree">


    <li><a href="index.php"><i class="fa fa-home"></i> Home Page </a></li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-user"></i>
            <span>Members</span>
            <span class="pull-right-container">
              <i class="fa fa-angel-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <?php if(isset($_SESSION['login']) == "true" and ($_SESSION['authority']) >= ($_SESSION['super_admin']) ) { ?>
            <li><a href="register.php"><i class="fa fa-edit"></i> Add Member </a></li>
            <?php } ?>
            <li><a href="member_list.php"><i class="fa fa-list"></i> Members List </a></li>
        </ul>
    </li>


    <li class="treeview">
        <a href="#">
            <i class="fa fa-edit"></i> <span>Books</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <?php if(isset($_SESSION['login']) == "true" and ($_SESSION['authority']) >= ($_SESSION['super_admin']) ) { ?>
            <li><a href="add_book.php"><i class="fa fa-book"></i> Add Book </a></li>
            <?php } ?>
            <li><a href="book_list.php"><i class="fa fa-list"></i> Books </a></li>

        </ul>
    </li>

    </li>


    <li class="treeview">
        <a href="#">
            <i class="fa fa-table"></i> <span> Lists </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>

    <ul class="treeview-menu">
        <?php if(isset($_SESSION['login']) == 'true') { ?>
        <li><a href="my_library.php?member_id=<?php echo $_SESSION['member_id']; ?>&komut=read"><i class="fa fa-list"></i> My Library </a> </li>
        <?php } ?>
        <li><a href="fav_books.php?komut=favbooks"><i class="fa fa-list"></i> Favorite Books </a></li>
    </ul>
    </li>

    <?php if(isset($_SESSION['login']) == "true") { ?>

    <li><a href="log_out.php"><i class="glyphicon glyphicon-log-out"></i> Logout </a></li>
    <?php } ELSE { ?>
    <li><a href="log_in.php"><i class="fa fa-key"></i> Login </a></li>
    <?php } ?>

</ul>

