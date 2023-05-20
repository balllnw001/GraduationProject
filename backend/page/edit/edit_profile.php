<?php include('../head.php')?>
<body class="sb-nav-fixed">
    <?php include('../navbar.php')?>
    <div id="layoutSidenav">
    <?php include('../menu.php')?>
        <div id="layoutSidenav_content">
        <main><?php
            // echo '<pre>';
            // print_r($_REQUEST);
            // echo '</pre>';
            ?>
                <div class="container-fluid">
                    <h1 class="mt-4">แก้ไข Profile</h1>
                    <!-- <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">โปรไฟล์</li>
                    </ol> -->
                    <?php 
                    // echo '<pre>';
                    // print_r($_REQUEST);
                    // echo '</pre>';
                    include('../../connection.php');
                    $f = $_SESSION["User_ID"];
                    $query = "SELECT A_ID,Username,Password,CONCAT(Prename,' ',Firstname,' ',Lastname) AS S_Name
                    FROM admin 
                    WHERE Username = '$f';
                    " or die;
                    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($result);
                        extract($row);
                    ?>
                    
                    <div class="wrapper">
    <div class="left">
    <?php if($_SESSION["Status"]=="T"){?>
        <img src="../../img/admin1.png" alt="user" width="200">
        <?php }?>
        <?php if($_SESSION["Status"]=="A"){?>
        <img src="../../img/admin2.png" alt="user" width="200">
        <?php }?>
        <h4><?php echo $_SESSION["User"];?></h4>
         <!-- <p>UI Developer</p> -->
    </div>
    <form  name="edit_profile" action="edit_profile_db.php" method="POST" class="form-horizontal">
    <input type="hidden" name="ID" value="<?=$A_ID;?>">
    <div class="right">
        <div class="info">
            <h3>เปลี่ยน Username หรือ Password</h3>
            <div class="info_data">
                <div class="form-group">
                            <div class="col-sm-100" align="left">
                            Username :
                                <input  name="Username" type="text" required class="form-control" id="Username" value="<?=$Username;?>" placeholder="Username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="6" maxlength="6"  />
                                เฉพาะ A-Z หรือ 0-9 จำนวน 6 ตัวเท่านั้น   
                            </div>
                        </div> 
                 <div class="data">
                 <div class="form-group">
                            <div class="col-sm-9" align="left">
                            Password :
                                <input  name="Password" type="password" required class="form-control" id="Password" value="<?=$Password;?>" placeholder="Password" pattern="^[a-zA-Z0-9]+$" minlength="6" maxlength="6" />
                            เฉพาะ A-Z หรือ 0-9 จำนวน 6 ตัวเท่านั้น    
                            </div>
                            </div>
              </div>
            </div>
        </div>
      <?php 
      if($_SESSION["Status"]=="T"){
        include('../../connection.php');
        $f = $_SESSION["User_ID"];
        $query = "SELECT A.A_ID,A.Username,A.Status,COUNT('P_id') as project
        FROM project AS P
        INNER JOIN admin AS A ON P.A_ID = A.A_ID
        WHERE A.Username = '$f'and A.Status = 'T';
                    " or die;
                    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                    $result = mysqli_query($conn, $query);
          ?>
      <!-- <div class="projects">
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
        </div> -->
        <?php }}?>
      
        <!-- <div class="">
            <ul>
              <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          </ul>
      </div> -->
    </div>
    <div class="form-group">
                            <div align="center">
                                <button type="submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-ok"></span> ยืนยัน  </button>
                                <input type=button onClick='window.history.back()' class="btn btn-primary" value='กลับ'>
                            </div>     
                        </div>
    </form>
</div>
                </div>
            </main>
        </div>
    </div>
<?php include('../script.php')?>
</body>