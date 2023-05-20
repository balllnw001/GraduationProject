<?php include('head.php')?>

<body class="sb-nav-fixed">
<?php include('navbar.php')?>
    <div id="layoutSidenav">
    <?php include('menu.php')?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">ตรวจสอบผลการสอบ</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ตารางผลการสอบ</li>
                    </ol>
                    <?php 
                    if($_SESSION["Status"]=="T"){  
                    include('connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                    //2. query ข้อมูลจากตาราง tb_admin:
                    $f = $_SESSION["User_ID"];                    
                    $query = "SELECT EX.Pro_id,EX.P_id,P.P_name_th,P.P_status,EX.Pro_id_g1,EX.Pro_id_g2,EX.Pro_date_custom,EX.Pro_time_final,EX.Pro_final
                    CONCAT(S.Prename,' ', S.Firstname,' ',S.Lastname) AS S_Name 
                    FROM submit_an_examination_request_assess_evidence as EX
                    INNER JOIN project AS P ON EX.P_id = P.P_id
                    INNER JOIN student AS S ON P.S_ID = S.S_ID
                    " or die;
                    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                    $result = mysqli_query($conn, $query);?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> ตารางผลการสอบ
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table styled-table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr align="center">
                                        <th>รหัสยื่นคำร้องขอสอบ</th>
                                        <th>นักศึกษาที่ยื่น</th>
                                        <th>ชื่อโครงงาน</th>
                                        <th>กรรมการคนที่ 1</th>
                                        <th>กรรมการคนที่ 2</th>
                                        <th>วันที่กำหนดสอบ</th>
                                        <th>เวลากำหนดสอบ</th>
                                        <!-- <th>ปีการศึกษา</th>
                                        <th>อาจารย์ที่ปรึกษา</th> -->
                                        <!-- <th>ติดตามหลักฐาน เอกสาร Word</th>
                                        <th>ติดตามหลักฐาน เอกสาร PDF</th>
                                        <th>ติดตามหลักฐาน ไฟล์งาน</th>
                                        <th>ติดตามหลักฐาน รูปเล่นสมบูรณ์</th>
                                        <th>อับโหลดโครงงาน</th> -->
                                        <!-- <th>สถานะ</th> -->
                                        <!-- <th>ประเภทโครงงาน</th> -->
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($row = mysqli_fetch_array($result)){?>
                                    <tr align="center" >
                                        <td><?php echo $row["Pro_id"]; ?></td>
                                        <td><?php echo $row["S_Name"]; ?></td>
                                        <td><?php echo $row["P_name_th"]; ?></td>
                                        <td><?php echo $row["Pro_id_g1"]; ?></td>
                                        <td><?php echo $row["Pro_id_g2"]; ?></td>
                                        <td><?php echo $row["Pro_date_custom"]; ?></td>
                                        <td><?php echo $row["Pro_time_final"]; ?></td>
                                        <!-- <td><?php
                                                if ($row["P_status"] == "0")
                                                {echo "<font color=orange>รออนุมัติ</font>";} 
                                                elseif ($row["P_status"] == "1")
                                                {echo "<font color=red>ไม่อนุมัติ</font>";} 
                                                elseif ($row["P_status"] == "2")
                                                {echo "<font color=#7cfc00>อนุมัติ</font>";}
                                                elseif ($row["P_status"] == "x")
                                                {echo "<font color=red>ยกเลิก</font>";} 
                                                ?></td> -->
                                            <a type="button" class="btn btn-warning" href="page/edit/edit_exam_project.php?ID=<?php echo $row["P_id"]?>">อนุมัติ</a>
                                            <!-- <a type="button" class="btn btn-info" href="page/update/update_project_proposal.php?ID=<?php echo $row["P_id"]?>&P_status=1">ไม่อนุมัติ</a> -->
                                            <a type="button" class="btn btn-danger" href="#">ยกเลิก</a>
                                            <!-- <a href="page/edit/edit_project_proposal.php?ID=<?php echo $row["P_id"]?>&S=<?php echo $row["P_status"]?>" class="edit" title="Edit" data-toggle="tooltip"><img src="img/edit.png" height="20px"><i class="material-icons"></i></a>
                                            <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='page/delete/delete_student_db.php?ID=<?php echo $row["S_ID"];?>';}" class="delete" title="Delete" data-toggle="tooltip"><img src="img/delete.png" height="20px"><i class="material-icons"></i></a> -->
                                        </td>
                                        <!-- <td><?php echo $row["Pt_name"]; ?></td> -->
                                    </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <?php 
                    if($_SESSION["Status"]=="A"){  
                    include('connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                    //2. query ข้อมูลจากตาราง tb_admin:
                    $f = $_SESSION["User_ID"];                    
                    $query = "SELECT EX.Pro_id,EX.P_id,P.P_name_th,P.P_status,
                    EX.Pro_id_g1,EX.Pro_id_g2,EX.Pro_date_custom,EX.Pro_time_final,EX.Pro_final,
                    CONCAT(S.Prename,' ', S.Firstname,' ',S.Lastname) AS S_Name FROM submit_an_examination_request_assess_evidence as EX
                    INNER JOIN project AS P ON EX.P_id = P.P_id
                    INNER JOIN student AS S ON P.S_ID = S.S_ID
                    " or die;
                    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                    $result = mysqli_query($conn, $query);?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> ตารางผลการสอบ
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table styled-table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr align="center">
                                        <th>รหัสยื่นคำร้องขอสอบ</th>
                                        <th>นักศึกษาที่ยื่น</th>
                                        <th>ชื่อโครงงาน</th>
                                        <th>กรรมการคนที่ 1</th>
                                        <th>กรรมการคนที่ 2</th>
                                        <th>วันที่กำหนดสอบ</th>
                                        <th>เวลากำหนดสอบ</th>
                                        <th>ผลการสอบ</th>
                                        <!-- <th>ปีการศึกษา</th>
                                        <th>อาจารย์ที่ปรึกษา</th> -->
                                        <!-- <th>ติดตามหลักฐาน เอกสาร Word</th>
                                        <th>ติดตามหลักฐาน เอกสาร PDF</th>
                                        <th>ติดตามหลักฐาน ไฟล์งาน</th>
                                        <th>ติดตามหลักฐาน รูปเล่นสมบูรณ์</th>
                                        <th>อับโหลดโครงงาน</th> -->
                                        <!-- <th>สถานะ</th> -->
                                        <!-- <th>ประเภทโครงงาน</th> -->
                                        <th Width="150">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($row = mysqli_fetch_array($result)){?>
                                    <tr align="center" >
                                        <td><?php echo $row["Pro_id"]; ?></td>
                                        <td><?php echo $row["S_Name"]; ?></td>
                                        <td><?php echo $row["P_name_th"]; ?></td>
                                        <td><?php echo $row["Pro_id_g1"]; ?></td>
                                        <td><?php echo $row["Pro_id_g2"]; ?></td>
                                        <td><?php echo $row["Pro_date_custom"]; ?></td>
                                        <td><?php echo $row["Pro_time_final"]; ?></td>
                                        <!-- <td><?php echo $row["Pro_final"]; ?></td> -->
                                        <td><?php
                                                if ($row["Pro_final"] == "0")
                                                {echo "<font color=orange>รออนุมัติ</font>";} 
                                                elseif ($row["Pro_final"] == "1")
                                                {echo "<font color=red>ไม่ผ่าน</font>";} 
                                                elseif ($row["Pro_final"] == "2")
                                                {echo "<font color=#7cfc00>ผ่าน</font>";}
                                                elseif ($row["Pro_final"] == "x")
                                                {echo "<font color=red>ยกเลิก</font>";} 
                                                ?></td>
                                        <td>
                                            <a type="button" class="btn btn-success" href="page/update/update_exam_project.php?ID=<?php echo $row["Pro_id"]?>&Pro_final=2">ผ่าน</a>
                                            <a type="button" class="btn btn-danger" href="page/update/update_exam_project.php?ID=<?php echo $row["Pro_id"]?>&Pro_final=1">ไม่ผ่าน</a>
                                            <!-- <a type="button" class="btn btn-danger" href="#">ยกเลิก</a> -->
                                            <!-- <a href="page/edit/edit_project_proposal.php?ID=<?php echo $row["P_id"]?>&S=<?php echo $row["P_status"]?>" class="edit" title="Edit" data-toggle="tooltip"><img src="img/edit.png" height="20px"><i class="material-icons"></i></a>
                                            <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='page/delete/delete_student_db.php?ID=<?php echo $row["S_ID"];?>';}" class="delete" title="Delete" data-toggle="tooltip"><img src="img/delete.png" height="20px"><i class="material-icons"></i></a> -->
                                        </td>
                                        <!-- <td><?php echo $row["Pt_name"]; ?></td> -->
                                    </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php }?>
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

</html>