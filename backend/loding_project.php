<?php include('head.php')?>

<body class="sb-nav-fixed">
<?php include('navbar.php')?>
    <div id="layoutSidenav">
    <?php include('menu.php')?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">ติดตามความก้าวหน้าโครงงาน</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ตารางข้อมูลความก้าวหน้าโครงงาน</li>
                    </ol>
                    <!-- <ol class="mb-4">
                    <a type="button" class="btn btn-primary" href="page/add/add_project.php">เพิ่มข้อมูลโครงงาน</a>
                    </ol> -->
                    <?php
                    if($_SESSION["Status"]=="T"){ 
                    
                    // echo '<pre>';
                    // print_r($_SESSION);
                    // echo '</pre>';
                    $f = $_SESSION["User_ID"];
                                //1. เชื่อมต่อ database:
                                include('connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                                //2. query ข้อมูลจากตาราง tb_admin:

                                $query = "SELECT A.Username,P.P_id,S.Username,CONCAT(S.Prename,' ', S.Firstname,' ',S.Lastname) AS S_Name,
                                P.P_name_th,P.P_name_eng,P.P_year,CONCAT(A.Prename,A.Firstname,' ',A.Lastname) AS A_Name,
                                P.P_loding_1,P.P_loding_2,P.P_loding_3,P.P_loding_4,P.P_loding_5,P.P_status,PT.Pt_name,EX.Pro_final
                                FROM project AS P
                                INNER JOIN admin AS A ON P.A_ID = A.A_ID
                                INNER JOIN student AS S ON P.S_ID = S.S_ID
                                INNER JOIN project_type AS PT ON P.Pt_id = PT.Pt_id
                                LEFT JOIN submit_an_examination_request_assess_evidence AS EX ON P.P_id = EX.P_id
                                WHERE A.Username = '$f'and P.P_status = '2'
                                " or die;
                                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                                $result = mysqli_query($conn, $query);
                                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                    ?>
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
                                                if ($row["P_loding_1"] == "0")
                                                {echo "<font color=#FF0000>ยังไม่ส่ง</font>";} 
                                                elseif ($row["P_loding_1"] == "1")
                                                {echo "<font color=#FFCC00>ไม่สมบูรณ์</font>";} 
                                                elseif ($row["P_loding_1"] == "2")
                                                {echo "<font color=#7cfc00>สมบูรณ์</font>";} 
                                                ?></td>
                                        <td><?php
                                                if ($row["P_loding_2"] == "0")
                                                {echo "<font color=#FF0000>ยังไม่ส่ง</font>";} 
                                                elseif ($row["P_loding_2"] == "1")
                                                {echo "<font color=#FFCC00>ไม่สมบูรณ์</font>";} 
                                                elseif ($row["P_loding_2"] == "2")
                                                {echo "<font color=#7cfc00>สมบูรณ์</font>";} 
                                                ?></td>
                                        <td><?php
                                                if ($row["P_loding_3"] == "0")
                                                {echo "<font color=#FF0000>ยังไม่ส่ง</font>";} 
                                                elseif ($row["P_loding_3"] == "1")
                                                {echo "<font color=#FFCC00>ไม่สมบูรณ์</font>";} 
                                                elseif ($row["P_loding_3"] == "2")
                                                {echo "<font color=#7cfc00>สมบูรณ์</font>";} 
                                                ?></td>
                                        <td><?php
                                                if ($row["P_loding_4"] == "0")
                                                {echo "<font color=#FF0000>ยังไม่ส่ง</font>";} 
                                                elseif ($row["P_loding_4"] == "1")
                                                {echo "<font color=#FFCC00>ไม่สมบูรณ์</font>";} 
                                                elseif ($row["P_loding_4"] == "2")
                                                {echo "<font color=#7cfc00>สมบูรณ์</font>";} 
                                                ?></td>
                                        <td><?php
                                                if ($row["P_loding_5"] == "0")
                                                {echo "<font color=#FF0000>ยังไม่ส่ง</font>";} 
                                                elseif ($row["P_loding_5"] == "1")
                                                {echo "<font color=#FFCC00>ไม่สมบูรณ์</font>";} 
                                                elseif ($row["P_loding_5"] == "2")
                                                {echo "<font color=#7cfc00>สมบูรณ์</font>";} 
                                                ?></td>
                                        <!-- <td><?php
                                                if ($row["P_status"] == "0")
                                                {echo "<font color=#FF0000>ยังไม่ส่ง</font>";} 
                                                elseif ($row["P_status"] == "1")
                                                {echo "<font color=#FFCC00>ไม่สมบูรณ์</font>";} 
                                                elseif ($row["P_status"] == "2")
                                                {echo "<font color=#7cfc00>สมบูรณ์</font>";} 
                                                elseif ($row["P_status"] == "x")
                                                {echo "<font color=#FF0000>ยกเลิก</font>";} 
                                                ?></td> -->
                                        <!-- <td><?php echo $row["Pt_name"]; ?></td> -->
                                        <td width="60"><?php   
                                            if ($row["Pro_final"] == 2){
                                                echo "<font color=green>สอบผ่าน</font>";
                                                echo "<a href='#" . "> <img src='img/edit.png' height='25px'> </a> </a>";
                                                echo "<a href='#" . "> <img src='img/delete.png' height='25px'> </a> </a>";
                                            } else {
                                                echo "<a href='page/edit/edit_loding_project.php?ID=" . $row["P_id"] . "&IN1=" . $row["P_loding_1"] . "&IN2=" . $row["P_loding_2"] . "&IN3=" . $row["P_loding_3"] . "&IN4=" . $row["P_loding_4"] . "&IN5=" . $row["P_loding_5"] ."'> <img src='img/edit.png' height='25px'> </a> </a>";
                                                // echo "<a href='page/delete/delete_loding_project.php?ID=" . $row["P_id"]."'> <img src='img/delete.png' height='25px'> </a> </a>";
                                            }
                                            ?>
                                        </td>
                                        <!-- <td><?php echo $row["Pt_name"]; ?></td> -->
                                    </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php } 
                    else if ($_SESSION["Status"]=="A"){

                    include('connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                    //2. query ข้อมูลจากตาราง tb_admin:

                    $query = "SELECT A.Username,P.P_id,S.Username,CONCAT(S.Prename,' ', S.Firstname,' ',S.Lastname) AS S_Name,
                    P.P_name_th,P.P_name_eng,P.P_year,CONCAT(A.Prename,A.Firstname,' ',A.Lastname) AS A_Name,
                    P.P_loding_1,P.P_loding_2,P.P_loding_3,P.P_loding_4,P.P_loding_5,P.P_status,PT.Pt_name,EX.Pro_final
                    FROM project AS P
                    INNER JOIN admin AS A ON P.A_ID = A.A_ID
                    INNER JOIN student AS S ON P.S_ID = S.S_ID
                    INNER JOIN project_type AS PT ON P.Pt_id = PT.Pt_id
                    LEFT JOIN submit_an_examination_request_assess_evidence AS EX ON P.P_id = EX.P_id
                    WHERE P_status = '2';
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
                                        <th width="50">บทที่ 1</th>
                                        <th width="50">บทที่ 2</th>
                                        <th width="50">บทที่ 3</th>
                                        <th width="50">บทที่ 4</th>
                                        <th width="50">บทที่ 5</th>
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
                                        <td><?php echo $row["Username"]; ?></td>
                                        <td><?php echo $row["S_Name"]; ?></td>
                                        <td><?php echo $row["P_name_th"]; ?></td>
                                        <td><?php echo $row["P_year"]; ?></td>
                                        <td><?php echo $row["A_Name"];?></td>
                                        <td><?php
                                                if ($row["P_loding_1"] == "0")
                                                {echo "<font color=#FF0000>ยังไม่ส่ง</font>";} 
                                                elseif ($row["P_loding_1"] == "1")
                                                {echo "<font color=#FFCC00>ไม่สมบูรณ์</font>";} 
                                                elseif ($row["P_loding_1"] == "2")
                                                {echo "<font color=#7cfc00>สมบูรณ์</font>";} 
                                                ?></td>
                                        <td><?php
                                                if ($row["P_loding_2"] == "0")
                                                {echo "<font color=#FF0000>ยังไม่ส่ง</font>";} 
                                                elseif ($row["P_loding_2"] == "1")
                                                {echo "<font color=#FFCC00>ไม่สมบูรณ์</font>";} 
                                                elseif ($row["P_loding_2"] == "2")
                                                {echo "<font color=#7cfc00>สมบูรณ์</font>";} 
                                                ?></td>
                                        <td><?php
                                                if ($row["P_loding_3"] == "0")
                                                {echo "<font color=#FF0000>ยังไม่ส่ง</font>";} 
                                                elseif ($row["P_loding_3"] == "1")
                                                {echo "<font color=#FFCC00>ไม่สมบูรณ์</font>";} 
                                                elseif ($row["P_loding_3"] == "2")
                                                {echo "<font color=#7cfc00>สมบูรณ์</font>";} 
                                                ?></td>
                                        <td><?php
                                                if ($row["P_loding_4"] == "0")
                                                {echo "<font color=#FF0000>ยังไม่ส่ง</font>";} 
                                                elseif ($row["P_loding_4"] == "1")
                                                {echo "<font color=#FFCC00>ไม่สมบูรณ์</font>";} 
                                                elseif ($row["P_loding_4"] == "2")
                                                {echo "<font color=#7cfc00>สมบูรณ์</font>";} 
                                                ?></td>
                                        <td><?php
                                                if ($row["P_loding_5"] == "0")
                                                {echo "<font color=#FF0000>ยังไม่ส่ง</font>";} 
                                                elseif ($row["P_loding_5"] == "1")
                                                {echo "<font color=#FFCC00>ไม่สมบูรณ์</font>";} 
                                                elseif ($row["P_loding_5"] == "2")
                                                {echo "<font color=#7cfc00>สมบูรณ์</font>";} 
                                                ?></td>
                                        <!-- <td><?php
                                                if ($row["P_status"] == "0")
                                                {echo "<font color=#FFCC00>รออนุมัติ</font>";} 
                                                elseif ($row["P_status"] == "1")
                                                {echo "<font color=#FF0000>ไม่อนุมัติ</font>";} 
                                                elseif ($row["P_status"] == "2")
                                                {echo "<font color=#7cfc00>อนุมัติ</font>";}
                                                elseif ($row["P_status"] == "x")
                                                {echo "<font color=#FF0000>ยกเลิก</font>";} 
                                                ?></td> -->
                                        <!-- <td><?php echo $row["Pt_name"]; ?></td> -->
                                        <!-- <td>
                                            <a href="page/edit/edit_loding_project.php?ID=<?php echo $row["P_id"]?>&IN1=<?php echo $row["P_loding_1"]?>&IN2=<?php echo $row["P_loding_2"]?>&IN3=<?php echo $row["P_loding_3"]?>&IN4=<?php echo $row["P_loding_4"]?>&IN5=<?php echo $row["P_loding_5"]?>" class="edit" title="Edit" data-toggle="tooltip"><img src="img/edit.png" height="20px"><i class="material-icons"></i></a>
                                            <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='page/delete/delete_student_db.php?ID=<?php echo $row["S_ID"];?>';}" class="delete" title="Delete" data-toggle="tooltip"><img src="img/delete.png" height="20px"><i class="material-icons"></i></a>
                                        </td> -->

                                        <td width="60"><?php   
                                            if ($row["Pro_final"] == 2){
                                                echo "<font color=green>สอบผ่าน</font>";
                                                echo "<a href='#" . "> <img src='img/edit.png' height='25px'> </a> </a>";
                                                echo "<a href='#" . "> <img src='img/delete.png' height='25px'> </a> </a>";
                                            } else {
                                                echo "<a href='page/edit/edit_loding_project.php?ID=" . $row["P_id"] . "&IN1=" . $row["P_loding_1"] . "&IN2=" . $row["P_loding_2"] . "&IN3=" . $row["P_loding_3"] . "&IN4=" . $row["P_loding_4"] . "&IN5=" . $row["P_loding_5"] ."'> <img src='img/edit.png' height='25px'> </a> </a>";
                                                // echo "<a href='page/delete/delete_loding_project.php?ID=" . $row["P_id"]."'> <img src='img/delete.png' height='25px'> </a> </a>";
                                            }
                                            ?>
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
