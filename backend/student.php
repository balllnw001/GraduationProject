<?php include('head.php')?>

<body class="sb-nav-fixed">
    <?php include('navbar.php')?>
    <div id="layoutSidenav">
    <?php include('menu.php')?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">ข้อมูลนักศึกษา</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active">ตารางข้อมูลนักศึกษา</li>
                    </ol>
                    <!-- <ol class="mb-4">
                    <a type="button" class="btn btn-primary" href="page/add/add_student.php">เพิ่มข้อมูลนักศึกษา</a>
                    </ol> -->
                    <?php
                    if($_SESSION["Status"]=="T"){ ?> 
                    <ol class="mb-4">
                    <a type="button" class="btn btn-primary" href="page/add/add_student.php">เพิ่มข้อมูลนักศึกษา</a>
                    </ol>
                    <?php
                    // echo '<pre>';
                    // print_r($_GET);
                    // echo '</pre>';
                                //1. เชื่อมต่อ database:
                                include('connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                                //2. query ข้อมูลจากตาราง tb_admin:
                                $query = "SELECT * FROM student ORDER BY S_ID ASC" or die;
                                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                                $result = mysqli_query($conn, $query);
                                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                    ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> ตารางข้อมูลนักศึกษา
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table styled-table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr align="center">
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Prename</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>      
                                        <th>Status</th>
                                        <th>ที่เก็บโครงงาน</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($row = mysqli_fetch_array($result)){?>
                                    <tr align="center">
                                        <td><?php echo $row["S_ID"]; ?></td>
                                        <td><?php echo $row["Username"]; ?></td>
                                        <td><?php echo $row["Password"]; ?></td>
                                        <td><?php echo $row["Prename"]; ?></td>
                                        <td><?php echo $row["Firstname"]; ?></td>
                                        <td><?php echo $row["Lastname"]; ?></td>
                                        <td><?php echo $row["Status"]; ?></td>
                                        <td><a href="<?php echo $row["Upload"]; ?>"><?php echo $row["Upload"]; ?></a></td>
                                        <td>
                                            
                                            <a href="page/edit/edit_student.php?ID=<?php echo $row["S_ID"];?>" class="edit" title="Edit" data-toggle="tooltip"><img src="img/edit.png" height="20px"><i class="material-icons"></i></a>
                                            <a href="JavaScript:if(confirm('คุณต้องการลบข้อมูลนักศึกษา ?')==true){window.location='page/delete/delete_student_db.php?ID=<?php echo $row["S_ID"];?>';}" class="delete" title="Delete" data-toggle="tooltip"><img src="img/delete.png" height="20px"><i class="material-icons"></i></a>
                                        </td>
                                    </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php
                    if($_SESSION["Status"]=="A"){ ?> 
                    <ol class="mb-4">
                    <a type="button" class="btn btn-primary" href="page/add/add_student.php">เพิ่มข้อมูลนักศึกษา</a>
                    </ol>
                    <?php
                    // echo '<pre>';
                    // print_r($_GET);
                    // echo '</pre>';
                                //1. เชื่อมต่อ database:
                                include('connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                                //2. query ข้อมูลจากตาราง tb_admin:
                                $query = "SELECT * FROM student ORDER BY S_ID ASC" or die;
                                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                                $result = mysqli_query($conn, $query);
                                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                    ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> ตารางข้อมูลนักศึกษา
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table styled-table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr align="center">
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Prename</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>      
                                        <th>Status</th>
                                        <th>ที่เก็บโครงงาน</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($row = mysqli_fetch_array($result)){?>
                                    <tr align="center">
                                        <td><?php echo $row["S_ID"]; ?></td>
                                        <td><?php echo $row["Username"]; ?></td>
                                        <td><?php echo $row["Password"]; ?></td>
                                        <td><?php echo $row["Prename"]; ?></td>
                                        <td><?php echo $row["Firstname"]; ?></td>
                                        <td><?php echo $row["Lastname"]; ?></td>
                                        <td><?php echo $row["Status"]; ?></td>
                                        <td><a href="<?php echo $row["Upload"]; ?>"><?php echo $row["Upload"]; ?></a></td>
                                        <td>
                                            <!-- <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a> -->
                                            <!-- <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='member_form_del_db.php?ID=<?php echo $row["ID"];?>';}"><button class="button3">ลบ</button></a> -->
                                            <a href="page/edit/edit_student.php?ID=<?php echo $row["S_ID"];?>" class="edit" title="Edit" data-toggle="tooltip"><img src="img/edit.png" height="20px"><i class="material-icons"></i></a>
                                            <a href="JavaScript:if(confirm('คุณต้องการลบข้อมูลนักศึกษา ?')==true){window.location='page/delete/delete_student_db.php?ID=<?php echo $row["S_ID"];?>';}" class="delete" title="Delete" data-toggle="tooltip"><img src="img/delete.png" height="20px"><i class="material-icons"></i></a>
                                        </td>
                                    </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
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