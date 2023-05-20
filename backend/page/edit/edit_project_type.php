<?php include('../head.php')?>
<body class="sb-nav-fixed">
<?php include('../navbar.php')?>
    <div id="layoutSidenav">
    <?php include('../menu.php')?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">แก้ไขข้อมูลประเภทโครงงาน</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../../index.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active"><a href="../../project_type.php">ตารางข้อมูลประเภทโครงงาน</a></li>
                        <li class="breadcrumb-item active">แก้ไขข้อมูลประเภทโครงงาน</li>
                    </ol>
                    <?php
                        // echo '<pre>';
                        // print_r($_REQUEST);
                        // echo '</pre>';
                        //1. เชื่อมต่อ database:
                        include('../../connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                        $admin_id = $_REQUEST["ID"];
                        //2. query ข้อมูลจากตาราง:
                        $sql = "SELECT * FROM project_type WHERE Pt_id='$admin_id' ";
                        $result = mysqli_query($conn, $sql) ;
                        $row = mysqli_fetch_array($result);
                        extract($row);
                    ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> แบบฟอร์มแก้ไขข้อมูลประเภทโครงงาน
                        </div>
                        <form  name="edit_project_type" action="edit_project_type_db.php" method="POST" class="form-horizontal">
                        </br>
                        <input type="hidden" name="ID" value="<?=$Pt_id;?>">
                            <div class="form-group">
                            <div class="col-sm-5" align="left">
                            ชื่อประเภทโครงงาน :
                                <input  name="Pt_name" type="text" required class="form-control" value="<?=$Pt_name;?>" id="Pt_name" placeholder="ชื่อประเภทโครงงาน" pattern="^[ a-zA-Zกขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรฤลฦวศษสหฬอฮฯะัาำิีึืฺุูเแโใไๅๆ็่้๊๋์]+$" title="ภาษาอังกฤษหรือภาษาไทยเท่านั้น" minlength="2"/>
                            </div>
                            </div>
                                <div class="form-group">
                                <div class="col-sm-5" align="left">
                                รายละเอียด(ถ้าไม่มีรายละเอียดกรุณาใส่ - ในช่องว่าง) :
                                    <input  name="Pt_detail" type="text" required class="form-control" id="Pt_detail" value="<?=$Pt_detail;?>" placeholder="รายละเอียด" pattern="^[-a-zA-Z0-9กขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรฤลฦวศษสหฬอฮฯะัาำิีึืฺุูเแโใไๅๆ็่้๊๋์-]+$" title="ภาษาอังกฤษหรือภาษาไทยเท่านั้นหรือตัวเลข ถ้าไม่มีรายละเอียดกรุณาใส่ - ในช่องว่าง" minlength="1"/>
                                </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-5" align="right">
                                        <button type="submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-ok"></span> ยืนยันแก้ไขข้อมูลประเภทโครงงาน </button>
                                        <input type=button onClick='window.history.back()' class="btn btn-primary" value='กลับ'>
                                        <!-- <input type="button" value="กลับหน้าหลัก" name="home" onclick="goBack()">
                                    <input name="Back" type="button" value=" Back"onClick="jascript:history.go(-1)"> -->
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
