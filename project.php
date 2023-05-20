<?php session_start(); 
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';


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
    <div class="page-heading slide-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>ติดตามโครงงาน</h4>
              <h2>ติดตามโครงงาน</h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="best-features about-features">
      <div class="Container">
        <div class="column">
          <div class="col-md-auto">
            <div class="section-heading">
            <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <?php
                    // echo '<pre>';
                    // print_r($_GET);
                    // echo '</pre>';
                                //1. เชื่อมต่อ database:
                                include('backend/connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                                //2. query ข้อมูลจากตาราง tb_admin:
                                $query = "SELECT P.P_id,S.Username,CONCAT(S.Prename,' ', S.Firstname,' ',S.Lastname) AS S_Name,
                                P.P_name_th,P.P_year,CONCAT(A.Prename,A.Firstname,' ',A.Lastname) AS A_Name,
                                P.P_loding_1,P.P_loding_2,P.P_loding_3,P.P_loding_4,P.P_loding_5,P.P_status,PT.Pt_name,EX.Pro_date_custom,
                                P.P_upload,P.P_upload_pdf
                                FROM project AS P
                                INNER JOIN admin AS A ON P.A_ID = A.A_ID
                                INNER JOIN student AS S ON P.S_ID = S.S_ID
                                INNER JOIN project_type AS PT ON P.Pt_id = PT.Pt_id
                                LEFT JOIN submit_an_examination_request_assess_evidence AS EX ON P.P_id = EX.P_id
                                WHERE P.P_status = '2'
                                " or die;
                                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                                $result = mysqli_query($conn, $query);
                                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                    ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> ตารางติดตามโครงงาน
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="styled-table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>รหัสนักศึกษา</th>
                                        <th>ชื่อ-สกุล</th>
                                        <th width="300">ชื่อโครงงาน</th>
                                        <th>ปีการศึกษา</th>
                                        <th>อาจารย์ที่ปรึกษา</th>
                                        <th width="60">ข้อเสนอ</th>
                                        <th>บทที่ 1</th>
                                        <th>บทที่ 2</th>
                                        <th>บทที่ 3</th>
                                        <th>บทที่ 4</th>
                                        <th>บทที่ 5</th>
                                        <!-- <th>ติดตามหลักฐาน เอกสาร Word</th>
                                        <th>ติดตามหลักฐาน เอกสาร PDF</th>
                                        <th>ติดตามหลักฐาน ไฟล์งาน</th>
                                        <th>ติดตามหลักฐาน รูปเล่นสมบูรณ์</th>
                                        <th>อับโหลดโครงงาน</th> -->
                                        <!-- <th>สถานะ</th> -->
                                        <th width="60">เผยแพร่</th>
                                        <th>กำหนดสอบ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($row = mysqli_fetch_array($result)){?>
                                    <tr align="center" >
                                        <td><?php echo $row["Username"]; ?></td>
                                        <td><?php echo $row["S_Name"]; ?></td>
                                        <td><?php echo $row["P_name_th"]; ?></td>
                                        <td><?php echo $row["P_year"]; ?></td>
                                        <td><?php echo $row["A_Name"];?></td>
                                        <td>
                                        <?php   
                                            if ($row["P_upload_pdf"] >= 1){
                                                echo "<a href='page/fileupload/" . $row["P_upload_pdf"] . "'> <img src='img/report.png' height='50px'> </a> </a>";
                                            } else {
                                                echo "<a><img src='img/x.png' height='50px'></a>";
                                            }
                                            ?>
                                        </td>
                                        <td><?php
                                                if ($row["P_loding_1"] == "0")
                                                {echo "<font color=red>ยังไม่ส่ง</font>";} 
                                                elseif ($row["P_loding_1"] == "1")
                                                {echo "<font color=orange>ไม่สมบูรณ์</font>";} 
                                                elseif ($row["P_loding_1"] == "2")
                                                {echo "<font color=green>สมบูรณ์</font>";} 
                                                ?></td>
                                        <td><?php
                                                if ($row["P_loding_2"] == "0")
                                                {echo "<font color=red>ยังไม่ส่ง</font>";} 
                                                elseif ($row["P_loding_2"] == "1")
                                                {echo "<font color=orange>ไม่สมบูรณ์</font>";} 
                                                elseif ($row["P_loding_2"] == "2")
                                                {echo "<font color=green>สมบูรณ์</font>";} 
                                                ?></td>
                                        <td><?php
                                                if ($row["P_loding_3"] == "0")
                                                {echo "<font color=red>ยังไม่ส่ง</font>";} 
                                                elseif ($row["P_loding_3"] == "1")
                                                {echo "<font color=orange>ไม่สมบูรณ์</font>";} 
                                                elseif ($row["P_loding_3"] == "2")
                                                {echo "<font color=green>สมบูรณ์</font>";} 
                                                ?></td>
                                        <td><?php
                                                if ($row["P_loding_4"] == "0")
                                                {echo "<font color=red>ยังไม่ส่ง</font>";} 
                                                elseif ($row["P_loding_4"] == "1")
                                                {echo "<font color=orange>ไม่สมบูรณ์</font>";} 
                                                elseif ($row["P_loding_4"] == "2")
                                                {echo "<font color=green>สมบูรณ์</font>";} 
                                                ?></td>
                                        <td><?php
                                                if ($row["P_loding_5"] == "0")
                                                {echo "<font color=red>ยังไม่ส่ง</font>";} 
                                                elseif ($row["P_loding_5"] == "1")
                                                {echo "<font color=orange>ไม่สมบูรณ์</font>";} 
                                                elseif ($row["P_loding_5"] == "2")
                                                {echo "<font color=green>สมบูรณ์</font>";} 
                                                ?></td>
                                        <td width="60"><?php   
                                            if ($row["P_upload"] >= 1){
                                                echo "<a href='backend/page/upload/fileupload/" . $row["P_upload"] . "'> <img src='img/report.png' height='50px'> </a> </a>";
                                            } else {
                                                echo "<a><img src='img/x.png' height='50px'></a>";
                                            }
                                            ?>
                                        </td>
                                        <!-- <td width="60"><a href="backend/page/upload/fileupload/<?php echo $row["P_upload"];?>"><img src="img/report.png" height="50px"></i></a></td></td> -->
                                        <td><?php echo $row["Pro_date_custom"]; ?></td>
                                        
                                        <!-- <td><?php echo $row["Pt_name"]; ?></td> -->
                                    </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
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