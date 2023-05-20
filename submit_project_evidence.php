<?php session_start(); 
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

// เช็คว่า User ได้ผ่านการ Login มาหรือไม่ (ถ้าไม่ได้ Login มาให้ส่งต่อไปหน้าไหนก็ใส่ URL ลงไปครับ ตรงตำแหน่ง login.php)
if (!isset($_SESSION["User_ID"])) {
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include('head.php')?>

<body>
    <!-- ***** Preloader Start ***** -->
    <!-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div> -->
    <!-- ***** Preloader End ***** -->

    <!-- Header -->

    <?php include('menu_top.php')?>

    <!-- Page Content -->
    <div class="page-heading submit_project header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>ยื่นหลักฐานโครงงาน</h4>
              <h2>ยื่นหลักฐานโครงงาน</h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="best-features about-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>แบบฟอร์มยื่นหลักฐานโครงงาน</h2>
            </div>
          </div>
          <div class="col-md-12">
            <div class="section-heading">
            <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <!-- <h1 class="mt-4">ยื่นข้อเสนอโครงงาน</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../../index.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active"><a href="../../student.php">ตารางข้อมูลโครงงาน</a></li>
                        <li class="breadcrumb-item active">ยื่นข้อเสนอโครงงาน</li>
                    </ol> -->
                    <?php
                    // echo '<pre>';
                    // print_r($_SESSION);
                    // echo '</pre>';
                                //1. เชื่อมต่อ database:
                                include('backend/connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                    ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> แบบฟอร์มยื่นข้อเสนอโครงงาน
                        </div>
                        <form  name="add_project" action="upload.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        </br>
                            <div class="form-group">
                                <!-- <div class="form-group">
                                    <div class="col-sm-5" align="left">
                                โครงงาน :  
                                    <select required class="form-control" Emp Name='A_ID'>  
                                    <option value="">--- กรุณาเลือกโครงงานที่ต้องการยื่นหลักฐาน ---</option>  
                                    <?php
                                    // include('../../connection.php');
                                    $f = $_SESSION["User_ID"];
                                    $strSQL = "SELECT P_id,Username,P_name_th 
                                    FROM project 
                                    INNER JOIN student
                                    ON project.S_ID = student.S_ID
                                    WHERE Username = '$f'";
                                    $objQuery = mysqli_query($conn,$strSQL);
                                    while($objResuut = mysqli_fetch_array($objQuery))
                                    {
                                    ?>
                                    <option value="<?php echo $objResuut["P_id"];?>"><?php echo $objResuut["P_name_th"];?></option>
                                    <?php
                                    }
                                    ?> 
                                    </select>  
                                </div>
                                </div> -->
                                <input type="hidden" id="User_ID" name="User_ID" value="<?php echo $_SESSION["User_ID"]; ?>">
                                <div class="form-group">
                                <div class="col-sm-5" align="left">
                                    <label>Uploading Files</label>
                                    <!-- <input required  type="file" name="fileupload" id="fileupload" multiple="multiple" /> -->
                                    <input required type="file" name="upload" id="upload" />
                                    
                                </div>
                                </div>
                                <div class="form-group">
                                <div class="col-sm-10" align="left">
                                * กรุณาตั้งชื่อไฟล์ เป็นรหัสนักศึกษาตามด้วยชื่องานที่ต้องการยื่น เช่น 6112266001 บทที่ 1
                                </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-5" align="right">
                                        <button type="submit" value="Submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-ok"></span> ยืนยัน </button>
                                        <input type=button onClick='window.history.back()' class="btn btn-primary" value='กลับ'>
                                        <!-- <input type="button" value="กลับหน้าหลัก" name="home" onclick="goBack()">
                                    <input name="Back" type="button" value=" Back"onClick="jascript:history.go(-1)">  -->
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
    </div>
</div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <p>Software Engineer &reg; 2021 Sahatchai Somiya - Design: <a rel="nofollow noopener" href="http://www.softengthai.com/" target="_blank">เว็บสาขา</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


<?php include('script.php')?>


</body>

</html>