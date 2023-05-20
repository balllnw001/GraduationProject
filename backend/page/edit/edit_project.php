<?php include('../head.php')?>
<body class="sb-nav-fixed">
    <?php include('../navbar.php')?>
    <div id="layoutSidenav">
    <?php include('../menu.php')?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">แก้ไขข้อมูลโครงงาน</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../../index.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active"><a href="../../project.php">ตารางข้อมูลโครงงาน</a></li>
                        <li class="breadcrumb-item active">แก้ไขข้อมูลโครงงาน</li>
                    </ol>
                    <?php
                        // echo '<pre>';
                        // print_r($_REQUEST);
                        // echo '</pre>';
                        //1. เชื่อมต่อ database:
                        include('../../connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                        $admin_id = $_REQUEST["ID"];
                        //2. query ข้อมูลจากตาราง:
                        $sql = "SELECT * FROM project WHERE P_id='$admin_id' ";
                        $result = mysqli_query($conn, $sql) ;
                        $row = mysqli_fetch_array($result);
                        extract($row);
                    ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> แบบฟอร์มแก้ไขข้อมูลโครงงาน
                        </div>
                        </br>
                        <form  name="edit_project" action="edit_project_db.php" method="POST" class="form-horizontal">
                            <input type="hidden" name="ID" value="<?=$A_ID;?>">
                        <div class="form-group">
                            <div class="col-sm-5" align="left">
                                ชื่อโครงงาน ภาษาไทย :
                                <input  name="P_name_th" type="text" required class="form-control" id="Username" value="<?=$P_name_th;?>" placeholder="Username" pattern="^[กขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรฤลฦวศษสหฬอฮฯะัาำิีึืฺุูเแโใไๅๆ็่้๊๋์0-9]+$" title="ภาษาไทยหรือตัวเลขเท่านั้น" minlength="10" maxlength="255"  />
                            </div>
                        </div> 
                            <div class="form-group">
                            <div class="col-sm-5" align="left">
                                ชื่อโครงงาน ภาษาอังกฤษ :
                                <input  name="P_name_eng" type="text" required class="form-control" id="Password" value="<?=$P_name_eng;?>" placeholder="Password" pattern="^[a-zA-Z0-9 ]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="10" maxlength="255" />
                            </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-5" align="left">
                                    ประเภทโครงงาน :  
                                    <select class="form-control" Emp Name='Pt_id'>  
                                    <option value="">--- กรุณาเลือกประเภทโครงงาน ---</option>  
                                    <?php
                                    // echo '<pre>';
                                    // print_r($objResuut);
                                    // echo '</pre>';
                                    // include('../../connection.php');
                                    $strSQL = "SELECT * FROM project_type ORDER BY Pt_id ASC";
                                    $objQuery = mysqli_query($conn,$strSQL);
                                    while($objResuut = mysqli_fetch_array($objQuery))
                                    {
                                    ?>
                                    <option value="<?php echo $objResuut["Pt_id"];?>"><?php echo $objResuut["Pt_name"];?></option>
                                    <?php
                                    }
                                    ?> 
                                    </select>  
                                </div>
                                </div>
                            <!-- <div class="form-group">
                            <div class="col-sm-5" align="left">
                                <input  name="Firstname" type="text" required class="form-control" id="Firstname" value="<?=$Firstname;?>" placeholder="ชื่อ-สกุล " />
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="col-sm-5" align="left">
                                <input  name="Lastname" type="text" required class="form-control" id="Lastname"   value="<?=$Lastname;?>" placeholder=" อีเมล์ name@hotmail.com" />
                            </div>
                            </div> -->
                            <div class="form-group">
                            
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