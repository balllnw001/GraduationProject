<?php include('head.php')?>
<body class="sb-nav-fixed">
<?php include('navbar.php')?>
    <div id="layoutSidenav">
    <?php include('menu.php')?>
        <div id="layoutSidenav_content">
            <main><?php
            // echo '<pre>';
            // print_r($_REQUEST);
            // echo '</pre>';
            ?>
                <div class="container-fluid">
                    <h1 class="mt-4">Profile <?php echo $_SESSION["User"]; ?></h1>
                    <!-- <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">โปรไฟล์</li>
                    </ol> -->
                    <?php 
                    // echo '<pre>';
                    // print_r($_REQUEST);
                    // echo '</pre>';
                    include('connection.php');
                    $f = $_SESSION["User_ID"];
                    $query = "SELECT A_ID,Username,Password,CONCAT(Prename,' ',Firstname,' ',Lastname) AS S_Name
                    FROM admin 
                    WHERE Username = '$f';
                    " or die;
                    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                    $result = mysqli_query($conn, $query);
                    ?>
                    
                    <div class="wrapper">
    <div class="left">
    <?php if($_SESSION["Status"]=="T"){?>
        <img src="img/admin1.png" alt="user" width="200">
        <?php }?>
        <?php if($_SESSION["Status"]=="A"){?>
        <img src="img/admin2.png" alt="user" width="200">
        <?php }?>
        <h4><?php echo $_SESSION["User"];?></h4>
         <!-- <p>UI Developer</p> -->
    </div>
    <div class="right">
        <div class="info">
            <h3>ข้อมูลเบื้องต้น</h3>
            <div class="info_data">
            <?php while($row = mysqli_fetch_array($result)){?>
                 <div class="data">
                    <h4>Username</h4>
                    <p><?php echo $row["Username"];?></p>
                 </div>
                 <div class="data">
                   <h4>Password</h4>
                    <p><?php echo $row["Password"];?></p>
              </div>
              <?php }?>
            </div>
        </div>
      <?php 
      if($_SESSION["Status"]=="T"){
        include('connection.php');
        $f = $_SESSION["User_ID"];
        $query = "SELECT A.A_ID,A.Username,A.Status,COUNT('P_id') as project
        FROM project AS P
        INNER JOIN admin AS A ON P.A_ID = A.A_ID
        WHERE A.Username = '$f'and A.Status = 'T';
                    " or die;
                    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                    $result = mysqli_query($conn, $query);
          ?>
      <div class="projects">
            <h3>Projects</h3>
            <div class="projects_data">
            <?php while($row = mysqli_fetch_array($result)){?>
                 <div class="data">
                    <h4>ดูแลโครงงานทั้งหมด</h4>
                    <p><?php echo $row["project"]; ?> โครงงาน</p>
                 </div>
                 <div class="data">
                   <h4>สถานะ</h4>
                    <p><?php echo $row["Status"]; ?>(อาจารย์)</p>
              </div>
            </div>
        </div>
        <?php }}?>
      
        <!-- <div class="">
            <ul>
              <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          </ul>
      </div> -->
      <div align="center">
          <a class="btn btn-warning" type="button" href="page/edit/edit_profile.php?ID<?php echo $_SESSION["User_ID"]; ?>">แก้ไขข้อมูล</a>
      </div>
    </div>
</div>
                </div>
            </main>
            <!-- <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a> &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer> -->
        </div>
    </div>
<?php include('script.php')?>
</body>
