<nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #0080FE;"> 
        <a class="navbar-brand" href="index.php"><h4>Software Engineer</h4> </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <!-- <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div> -->
            <font color="#FFFFFF">เข้าสู่ระบบล่าสุดเมื่อ <?php echo date("วันที่ j เดือนที่ n ปี ค.ศ. Y");?></font>
            
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link" href="profile.php?ID=<?php echo $_SESSION["User_ID"];?>"><font color="#FFFFFF"><i class="fas fa-user"></i>&ensp;<?php echo $_SESSION["User"];?></font></a>
                <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" >Profile</a>
                    <a class="dropdown-item" href="#!">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../logout.php">Logout</a>
                </div> -->
            </li>
        </ul>
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="btn btn-danger" href="../logout.php"><font color="#FFFFFF">Logout</font></a>
            </li>
        </ul>
    </nav>