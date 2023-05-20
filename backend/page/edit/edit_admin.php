<?php include('../head.php')?>
<body class="sb-nav-fixed">
    <?php include('../navbar.php')?>
    <div id="layoutSidenav">
    <?php include('../menu.php')?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">แก้ไขข้อมูลอาจารย์ที่ปรึกษา</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../../index.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active"><a href="../../admin.php">ตารางข้อมูลอาจารย์ที่ปรึกษา</a></li>
                        <li class="breadcrumb-item active">แก้ไขข้อมูลอาจารย์ที่ปรึกษา</li>
                    </ol>
                    <?php
                        // echo '<pre>';
                        // print_r($_REQUEST);
                        // echo '</pre>';
                        //1. เชื่อมต่อ database:
                        include('../../connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                        $admin_id = $_REQUEST["ID"];
                        //2. query ข้อมูลจากตาราง:
                        $sql = "SELECT * FROM admin WHERE A_ID='$admin_id' ";
                        $result = mysqli_query($conn, $sql) ;
                        $row = mysqli_fetch_array($result);
                        extract($row);
                    ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> แบบฟอร์มแก้ไขข้อมูลอาจารย์ที่ปรึกษา
                        </div>
                        </br>
                        <form  name="edit_admin" action="edit_admin_db.php" method="POST" class="form-horizontal">
                            <input type="hidden" name="ID" value="<?=$A_ID;?>">
                        <div class="form-group">
                            <div class="col-sm-5" align="left">
                            Username :
                                <input  name="Username" type="text" required class="form-control" id="Username" value="<?=$Username;?>" placeholder="Username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="6" maxlength="6"  />
                            ตัวอย่าง รหัสอาจารย์ที่ปรึกษา T00001
                            </div>
                        </div> 
                            <div class="form-group">
                            <div class="col-sm-5" align="left">
                            Password :
                                <input  name="Password" type="password" required class="form-control" id="Password" value="<?=$Password;?>" placeholder="Password" pattern="^[a-zA-Z0-9]+$" minlength="6" maxlength="6" />
                                ตัวอย่าง ******* 6 ตัว
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="col-sm-5" align="left">
                            คำนำหน้า :
                                <input  name="Prename" type="text" required class="form-control" id="Prename" value="<?=$Prename;?>" placeholder="คำนำหน้า" pattern="^[กขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรฤลฦวศษสหฬอฮฯะัาำิีึืฺุูเแโใไๅๆ็่้๊๋์a-zA-Z.]+$" title="ภาษาอังกฤษหรือภาษาไทยเท่านั้น" minlength="2"/>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="col-sm-5" align="left">
                            ชื่อ :
                                <input  name="Firstname" type="text" required class="form-control" id="Firstname" value="<?=$Firstname;?>" placeholder="ชื่อ " pattern="^[กขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรฤลฦวศษสหฬอฮฯะัาำิีึืฺุูเแโใไๅๆ็่้๊๋์a-zA-Z]+$" title="ภาษาอังกฤษหรือภาษาไทยเท่านั้น" minlength="2"/>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="col-sm-5" align="left">
                            นามสกุล :
                                <input  name="Lastname" type="text" required class="form-control" id="Lastname"   value="<?=$Lastname;?>" placeholder=" นามสกุล" pattern="^[กขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรฤลฦวศษสหฬอฮฯะัาำิีึืฺุูเแโใไๅๆ็่้๊๋์a-zA-Z]+$" title="ภาษาอังกฤษหรือภาษาไทยเท่านั้น"/>
                            </div>
                            </div>
                            <div class="form-group">
                            
                        <div class="form-group">
                            <div class="col-sm-5" align="right">
                                <button type="submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-ok"></span> ยืนยันแก้ไขข้อมูลอาจารย์ที่ปรึกษา  </button>
                                <input type=button onClick='window.history.back()' class="btn btn-primary" value='กลับ'>
                            </div>     
                        </div>
                        </form>
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
<?php include('../script.php')?>
</body>