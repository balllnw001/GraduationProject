<?php include('head.php')?>
<body class="sb-nav-fixed">
<?php include('navbar.php')?>
    <div id="layoutSidenav">
    <?php include('menu.php')?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">ข้อมูลโครงงาน</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ตารางข้อมูลโครงงาน</li>
                    </ol>
                    <!-- <ol class="mb-4">
                    <a type="button" class="btn btn-primary" href="page/add/add_project.php">เพิ่มข้อมูลโครงงาน</a>
                    </ol> -->
                    <?php
                    // echo '<pre>';
                    // print_r($_GET);
                    // echo '</pre>';
                                //1. เชื่อมต่อ database:
                                include('connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                                //2. query ข้อมูลจากตาราง tb_admin:
                                $query = "SELECT S.S_ID,A.A_ID,P.P_id,S.Username,CONCAT(S.Prename,' ', S.Firstname,' ',S.Lastname) AS S_Name,
                                P.P_name_th,P.P_name_eng,P.P_year,CONCAT(A.Prename,A.Firstname,' ',A.Lastname) AS A_Name,
                                P.P_loding_1,P.P_loding_2,P.P_loding_3,P.P_loding_4,P.P_loding_5,P.P_status,PT.Pt_id,PT.Pt_name FROM project AS P
                                INNER JOIN admin AS A ON P.A_ID = A.A_ID
                                INNER JOIN student AS S ON P.S_ID = S.S_ID
                                INNER JOIN project_type AS PT ON P.Pt_id = PT.Pt_id
                                WHERE P_status = '2';
                                " or die;
                                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                                $result = mysqli_query($conn, $query);
                                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                    ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> ตารางข้อมูลโครงงาน
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table styled-table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr align="center">
                                        <th width="80">รหัสโครงงาน</th>
                                        <th>ผู้จัดทำ</th>
                                        <th>ชื่อโครงงาน ภาษาไทย</th>
                                        <th>ชื่อโครงงาน อังกฤษ</th>
                                        <th>ปีการศึกษา</th>
                                        <!-- <th>ติดตามโครงงาน บทที่ 1</th>
                                        <th>ติดตามโครงงาน บทที่ 2</th>
                                        <th>ติดตามโครงงาน บทที่ 3</th>
                                        <th>ติดตามโครงงาน บทที่ 4</th>
                                        <th>ติดตามโครงงาน บทที่ 5</th>
                                        <th>ติดตามหลักฐาน เอกสาร Word</th>
                                        <th>ติดตามหลักฐาน เอกสาร PDF</th>
                                        <th>ติดตามหลักฐาน ไฟล์งาน</th>
                                        <th>ติดตามหลักฐาน รูปเล่นสมบูรณ์</th>
                                        <th>อับโหลดโครงงาน</th> -->
                                        <!-- <th>สถานะ</th> -->
                                        <th>ประเภทโครงงาน</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($row = mysqli_fetch_array($result)){?>
                                    <tr align="center">
                                        <td><?php echo $row["P_id"]; ?></td>
                                        <td><?php echo $row["S_Name"]; ?></td>
                                        <td><?php echo $row["P_name_th"]; ?></td>
                                        <td><?php echo $row["P_name_eng"]; ?></td>
                                        <td><?php echo $row["P_year"]; ?></td>
                                        <td><?php echo $row["Pt_name"]; ?></td>
                                        <!-- <td>
                                            <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                            <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='member_form_del_db.php?ID=<?php echo $row["ID"];?>';}"><button class="button3">ลบ</button></a>
                                            <a href="page/edit/edit_project.php?&ID=<?php echo $row["P_id"];?>" class="edit" title="Edit" data-toggle="tooltip"><img src="img/edit.png" height="20px"><i class="material-icons"></i></a>
                                            <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='member_form_del_db.php?ID=<?php echo $row["ID"];?>;}" class="delete" title="Delete" data-toggle="tooltip"><img src="img/delete.png" height="20px"><i class="material-icons"></i></a>
                                        </td> -->
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
<?php include('script.php')?>
</body>
