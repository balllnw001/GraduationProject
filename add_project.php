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
    <div class="page-heading about-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>เสนอโครงงาน</h4>
              <h2>เสนอโครงงาน</h2>
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
              <h2>แบบฟอร์มยื่นเสนอโครงงาน</h2>
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
                        <form  name="add_project" action="page/add_project_db.php" method="POST" enctype="multipart/form-data" class="form-horizontal" name="upfile" id="upfile">
                        </br>
                            <div class="form-group">
                                <div class="col-sm-7" align="left">
                                ชื่อโครงงานภาษาไทย :
                                    <input  name="P_name_th" type="text" required class="form-control" id="P_name_th" placeholder="ชื่อโครงงานภาษาไทย" pattern="^[ กขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรฤลฦวศษสหฬอฮฯะัาำิีึืฺุูเแโใไๅๆ็่้๊๋์0-9]+$" title="ภาษาไทยเท่านั้น" minlength="5" maxlength="100"  />
                                </div>
                            </div> 
                                <div class="form-group">
                                <div class="col-sm-7" align="left">
                                ชื่อโครงงานภาษาอังกฤษ :
                                    <input  name="P_name_eng" type="text" required class="form-control" id="P_name_eng" placeholder="ชื่อโครงงานภาษาอังกฤษ" pattern="^[ a-zA-Z0-9]+$" minlength="5" maxlength="100" />
                                </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-5" align="left">
                                อาจารย์ที่ปรึกษา :  
                                    <select required class="form-control" Emp Name='A_ID'>  
                                    <option value="">--- กรุณาเลือกอาจารย์ที่ปรึกษา ---</option>  
                                    <?php
                                    // include('../../connection.php');
                                    $strSQL = "SELECT * FROM admin WHERE Status='T' ORDER BY A_ID ASC";
                                    $objQuery = mysqli_query($conn,$strSQL);
                                    while($objResuut = mysqli_fetch_array($objQuery))
                                    {
                                    ?>
                                    <option value="<?php echo $objResuut["A_ID"];?>"><?php echo $objResuut["Prename"]." ".$objResuut["Firstname"]." ".$objResuut["Lastname"];?></option>
                                    <?php
                                    }
                                    ?> 
                                    </select>  
                                </div>
                                </div>
                                
                                <input type="hidden" id="User_ID" name="User_ID" value="<?php echo $_SESSION["Student_ID"]; ?>">
                                <?php 
                                date_default_timezone_set('Asia/Bangkok');
                                $year=(date("Y")+543);
                                ?>
                                <div class="form-group">
                                <div class="col-sm-5" align="left">
                                ปีการศึกษา :
                                    <input  readonly="readonly" name="P_year" value="<?php echo $year ?>" type="text" required class="form-control" id="P_year" placeholder="ปีการศึกษา" pattern="^[0-9]+$" minlength="4" maxlength="4" />
                                </div>
                                </div>
                                <!-- <div class="form-group">
                                <div class="col-sm-5" align="left">
                                สถานะ<br/>
                                <input name="status" type="checkbox" class="css_data_item" id="status" value="0" checked /> ยังไม่ส่ง<br/>
                                <input name="status" type="checkbox" class="css_data_item" id="status" value="1" /> ไม่สมบูรณ์<br/>
                                <input name="status" type="checkbox" class="css_data_item" id="status" value="2" /> ยกเลิก<br/>                        
                                </div>
                                </div> -->
                                <div class="form-group">
                                <div class="col-sm-5" align="left">
                                    ประเภทโครงงาน :  
                                    <select required class="form-control" Emp Name='Pt_id'>  
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
                                <div class="form-group">
                                <div class="col-sm-5" align="left">
                                    <tr>
                                        <td align="center" bgcolor="#EDEDED">ข้อเสนอโครงงาน</td>
                                        <td bgcolor="#EDEDED"><label>
                                            <input type="file" name="P_upload_pdf" id="P_upload_pdf"  required="required" accept="application/pdf"/>
                                        </label></td>
                                    </tr>
                                </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-5" align="right">
                                        <button type="submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-ok"></span> ยืนยัน </button>
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
          <div>
              <main>

                    <?php
                    // echo '<pre>';
                    // print_r($_SESSION);
                    // echo '</pre>';
                    $f = $_SESSION["User_ID"];
                                //1. เชื่อมต่อ database:
                                include('backend/connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                                //2. query ข้อมูลจากตาราง tb_admin:
                                $query = "SELECT P.P_id,S.Username,CONCAT(S.Prename,' ', S.Firstname,' ',S.Lastname) AS S_Name,
                                P.P_name_th,P.P_name_eng,P.P_year,CONCAT(A.Prename,A.Firstname,' ',A.Lastname) AS A_Name,
                                P.P_loding_1,P.P_loding_2,P.P_loding_3,P.P_loding_4,P.P_loding_5,P.P_status,PT.Pt_name,EX.Pro_final FROM project AS P
                                INNER JOIN admin AS A ON P.A_ID = A.A_ID
                                INNER JOIN student AS S ON P.S_ID = S.S_ID
                                INNER JOIN project_type AS PT ON P.Pt_id = PT.Pt_id
                                LEFT JOIN submit_an_examination_request_assess_evidence AS EX ON P.P_id = EX.P_id
                                WHERE S.Username = '$f'
                                " or die;
                                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                                $result = mysqli_query($conn, $query);
                                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                    ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> โครงงานของฉัน
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="styled-table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <!-- <th>ผู้รับผิดชอบ</th> -->
                                        <th>ชื่อโครงงานภาษาอังกฤษ</th>
                                        <th>ชื่อโครงงานภาษาอังกฤษ</th>
                                        <th>ปีการศึกษา</th>
                                        <th>ประเภทโครงงาน</th>
                                        <th>สถานะ</th>
                                        <th width="50">ผลการสอบ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($row = mysqli_fetch_array($result)){?>
                                    <tr align="center" >
                                        <td><?php echo $row["P_id"]; ?></td>
                                        <!-- <td><?php echo $row["S_Name"]; ?></td> -->
                                        <td><?php echo $row["P_name_th"]; ?></td>
                                        <td><?php echo $row["P_name_eng"]; ?></td>
                                        <td><?php echo $row["P_year"]; ?></td>
                                        <td><?php echo $row["Pt_name"]; ?></td>
                                        <td><?php
                                                if ($row["P_status"] == "0")
                                                {echo "<font color=orange>รออนุมัติ</font>";} 
                                                elseif ($row["P_status"] == "1")
                                                {echo "<font color=red>ไม่อนุมัติ</font>";} 
                                                elseif ($row["P_status"] == "2")
                                                {echo "<font color=#7cfc00>อนุมัติ</font>";}
                                                elseif ($row["P_status"] == "x")
                                                {echo "<font color=red>ยกเลิก</font>";} 
                                                ?></td>
                                        <td><?php
                                                if ($row["Pro_final"] == "0")
                                                {echo "<font color=orange>รอผล</font>";} 
                                                elseif ($row["Pro_final"] == "1")
                                                {echo "<font color=red>ไม่ผ่าน</font>";} 
                                                elseif ($row["Pro_final"] == "2")
                                                {echo "<font color=#7cfc00>ผ่าน</font>";}
                                                ?></td>
                                    </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
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