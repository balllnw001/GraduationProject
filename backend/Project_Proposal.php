<?php include('head.php')?>

<body class="sb-nav-fixed">
<?php include('navbar.php')?>
    <div id="layoutSidenav">
    <?php include('menu.php')?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">ตรวจสอบยื่นข้อเสนอโครงงาน</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ตารางตรวจสอบยื่นข้อเสนอโครงงาน</li>
                    </ol>
                    <?php 
                    if($_SESSION["Status"]=="T"){  
                    include('connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                    //2. query ข้อมูลจากตาราง tb_admin:
                    $f = $_SESSION["User_ID"];                    
                    $query = "SELECT A.Username,P.P_id,S.Username,CONCAT(S.Prename,' ', S.Firstname,' ',S.Lastname) AS S_Name,
                    P.P_name_th,P.P_name_eng,P.P_year,CONCAT(A.Prename,A.Firstname,' ',A.Lastname) AS A_Name,
                    P.P_loding_1,P.P_loding_2,P.P_loding_3,P.P_loding_4,P.P_loding_5,P.P_status,PT.Pt_name FROM project AS P
                    INNER JOIN admin AS A ON P.A_ID = A.A_ID
                    INNER JOIN student AS S ON P.S_ID = S.S_ID
                    INNER JOIN project_type AS PT ON P.Pt_id = PT.Pt_id
                    WHERE A.Username = '$f'
                    " or die;
                    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                    $result = mysqli_query($conn, $query);?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> ตารางข้อมูลความก้าวหน้าโครงงาน
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table styled-table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr align="center">
                                        <th>รหัสนักศึกษา</th>
                                        <th>ชื่อ-สกุล</th>
                                        <th width="200">ชื่อโครงงาน</th>
                                        <th>ปีการศึกษา</th>
                                        <th>อาจารย์ที่ปรึกษา</th>
                                        <!-- <th width="50">บทที่ 1</th>
                                        <th width="50">บทที่ 2</th>
                                        <th width="50">บทที่ 3</th>
                                        <th width="50">บทที่ 4</th>
                                        <th width="50">บทที่ 5</th> -->
                                        <!-- <th>ติดตามหลักฐาน เอกสาร Word</th>
                                        <th>ติดตามหลักฐาน เอกสาร PDF</th>
                                        <th>ติดตามหลักฐาน ไฟล์งาน</th>
                                        <th>ติดตามหลักฐาน รูปเล่นสมบูรณ์</th>
                                        <th>อับโหลดโครงงาน</th> -->
                                        <th>สถานะ</th>
                                        <!-- <th>ประเภทโครงงาน</th> -->
                                        <th>Action</th>
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
                                        <td><?php
                                                if ($row["P_status"] == "0")
                                                {echo "<font color=#FFCC00>รออนุมัติ</font>";} 
                                                elseif ($row["P_status"] == "1")
                                                {echo "<font color=#FF0000>ไม่อนุมัติ</font>";} 
                                                elseif ($row["P_status"] == "2")
                                                {echo "<font color=#7cfc00>อนุมัติ</font>";}
                                                elseif ($row["P_status"] == "x")
                                                {echo "<font color=FF0000>ยกเลิก</font>";} 
                                                ?></td>
                                        <td>
                                            <a type="button" class="btn btn-warning" href="page/update/update_project_proposal.php?ID=<?php echo $row["P_id"]?>&P_status=2">อนุมัติ</a>
                                            <a type="button" class="btn btn-info" href="page/update/update_project_proposal.php?ID=<?php echo $row["P_id"]?>&P_status=1">ไม่อนุมัติ</a>
                                            <!-- <a type="button" class="btn btn-danger" href="page/delete/delete_project_proposal.php?ID=<?php echo $row["P_id"];?>">ยกเลิก</a> -->
                                            <a href="JavaScript:if(confirm('คุณต้องการลบข้อมูลโครงงาน ?')==true){window.location='page/delete/delete_project_proposal.php?ID=<?php echo $row["P_id"];?>';}" class="btn btn-danger" type="button">ยกเลิก<i class="material-icons"></i></a>
                                        </td>
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
                    $query = "SELECT A.Username,P.P_id,S.Username,CONCAT(S.Prename,' ', S.Firstname,' ',S.Lastname) AS S_Name,
                    P.P_name_th,P.P_name_eng,P.P_year,CONCAT(A.Prename,A.Firstname,' ',A.Lastname) AS A_Name,
                    P.P_loding_1,P.P_loding_2,P.P_loding_3,P.P_loding_4,P.P_loding_5,P.P_status,PT.Pt_name FROM project AS P
                    INNER JOIN admin AS A ON P.A_ID = A.A_ID
                    INNER JOIN student AS S ON P.S_ID = S.S_ID
                    INNER JOIN project_type AS PT ON P.Pt_id = PT.Pt_id
                    " or die;
                    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                    $result = mysqli_query($conn, $query);?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> ตารางข้อมูลความก้าวหน้าโครงงาน
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table styled-table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr align="center">
                                        <th>รหัสนักศึกษา</th>
                                        <th>ชื่อ-สกุล</th>
                                        <th width="200">ชื่อโครงงาน</th>
                                        <th>ปีการศึกษา</th>
                                        <th>อาจารย์ที่ปรึกษา</th>
                                        <!-- <th>ติดตามหลักฐาน เอกสาร Word</th>
                                        <th>ติดตามหลักฐาน เอกสาร PDF</th>
                                        <th>ติดตามหลักฐาน ไฟล์งาน</th>
                                        <th>ติดตามหลักฐาน รูปเล่นสมบูรณ์</th>
                                        <th>อับโหลดโครงงาน</th> -->
                                        <th>สถานะ</th>
                                        <!-- <th>ประเภทโครงงาน</th> -->
                                        <th>Action</th>
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
                                        <td>
                                            <a type="button" class="btn btn-warning" href="page/update/update_project_proposal.php?ID=<?php echo $row["P_id"]?>&P_status=2">อนุมัติ</a>
                                            <a type="button" class="btn btn-info" href="JavaScript:if(confirm('คุณต้องการเปลี่ยนสถานะเป็น ไม่อนุมัติหรือไม่ ?')==true){window.location='page/update/update_project_proposal.php?ID=<?php echo $row["P_id"]?>&P_status=1'}">ไม่อนุมัติ</a>
                                            <a href="JavaScript:if(confirm('คุณต้องการลบข้อมูลโครงงาน ?')==true){window.location='page/delete/delete_project_proposal.php?ID=<?php echo $row["P_id"];?>';}" class="btn btn-danger" type="button">ยกเลิก<i class="material-icons"></i></a>
                                            <!-- <a href="JavaScript:if(confirm('คุณต้องการลบข้อมูลนักศึกษา ?')==true){window.location='page/delete/delete_project_proposal.php?ID=<?php echo $row["P_id"];?>';}" class="delete" title="Delete" data-toggle="tooltip"><img src="img/delete.png" height="20px"><i class="material-icons"></i></a> -->
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