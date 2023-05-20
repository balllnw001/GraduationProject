<?php include('../head.php')?>
<body class="sb-nav-fixed">
<?php include('../navbar.php')?>
    <div id="layoutSidenav">
    <?php include('../menu.php')?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">แก้ไขข้อมูลนักศึกษา</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../../index.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active"><a href="../../student.php">ตารางข้อมูลนักศึกษา</a></li>
                        <li class="breadcrumb-item active">แก้ไขข้อมูลนักศึกษา</li>
                    </ol>
                    <?php
                        // echo '<pre>';
                        // print_r($_REQUEST);
                        // echo '</pre>';
                        //1. เชื่อมต่อ database:
                        include('../../connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                        $student_id = $_REQUEST["ID"];
                        //2. query ข้อมูลจากตาราง:
                        $sql = "SELECT * FROM student WHERE S_ID='$student_id' ";
                        $result = mysqli_query($conn, $sql) ;
                        $row = mysqli_fetch_array($result);
                        extract($row);
                    ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> แบบฟอร์มแก้ไขข้อมูลนักศึกษา
                        </div>
                        </br>
                        <form  name="edit_student" action="edit_student_db.php" method="POST" class="form-horizontal">
                            <input type="hidden" name="ID" value="<?=$S_ID;?>">
                            <div class="form-group">
                            <div class="col-sm-5" align="left">
                            Username :
                                <input  name="Username" type="text" required class="form-control" id="Username" value="<?=$Username;?>" placeholder="Username" pattern="^[0-9]+$" title="ตัวเลขเท่านั้น" minlength="11" maxlength="11"  />
                            ตัวอย่าง รหัสนักศึกษา 61122660111
                            </div>
                            </div> 
                            <div class="form-group">
                            <div class="col-sm-5" align="left">
                            Password :
                                <input  name="Password" type="password" required class="form-control" id="Password" value="<?=$Password;?>" placeholder="Password" pattern="^[0-9]+$" minlength="6" maxlength="6" />
                            ตัวอย่าง 27/06/2543 ใส่เป็น 270642
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="col-sm-5" align="left">
                            คำนำหน้า :
                                <input  name="Prename" type="text" required class="form-control" id="Prename" value="<?=$Prename;?>" placeholder="คำนำหน้า" pattern="^[กขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรฤลฦวศษสหฬอฮฯะัาำิีึืฺุูเแโใไๅๆ็่้๊๋์]+$" title="ภาษาอังกฤษหรือภาษาไทยเท่านั้น" minlength="2"/>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="col-sm-5" align="left">
                            ชื่อ :
                                <input  name="Firstname" type="text" required class="form-control" id="Firstname" value="<?=$Firstname;?>" placeholder="ชื่อ" pattern="^[กขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรฤลฦวศษสหฬอฮฯะัาำิีึืฺุูเแโใไๅๆ็่้๊๋์]+$" minlength="2"/>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="col-sm-5" align="left">
                            นามสกุล :
                                <input  name="Lastname" type="text" required class="form-control" id="Lastname"   value="<?=$Lastname;?>" placeholder="นามสกุล" pattern="^[กขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรฤลฦวศษสหฬอฮฯะัาำิีึืฺุูเแโใไๅๆ็่้๊๋์]+$" />
                            </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-5" align="left">
                                ที่เก็บข้อมูลโครงงาน(Google Drive) :
                                    <input  name="Upload" type="text" required class="form-control" value="<?=$Upload;?>" id="Upload" title="" placeholder="Url :"/>
                                </div>
                                </div>
                            
                        <div class="form-group">
                            <div class="col-sm-5" align="right">
                                <button type="submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-ok"></span> ยืนยันแก้ไขข้อมูลนักศึกษา  </button>
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

</html>