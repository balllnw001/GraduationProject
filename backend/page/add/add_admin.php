<?php include('../head.php')?>
<body class="sb-nav-fixed">
    <?php include('../navbar.php')?>
    <div id="layoutSidenav">
    <?php include('../menu.php')?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">เพิ่มข้อมูลอาจารย์ที่ปรึกษา</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../../index.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active"><a href="../../student.php">ตารางข้อมูลอาจารย์ที่ปรึกษา</a></li>
                        <li class="breadcrumb-item active">เพิ่มข้อมูลอาจารย์ที่ปรึกษา</li>
                    </ol>
                    <?php
                    // echo '<pre>';
                    // print_r($_GET);
                    // echo '</pre>';
                                //1. เชื่อมต่อ database:
                                include('../../connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                    ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> แบบฟอร์มเพิ่มข้อมูลอาจารย์ที่ปรึกษา
                        </div>
                        <form  name="add_admin" action="add_admin_db.php?Status=T" method="POST" class="form-horizontal">
                        </br>
                            <div class="form-group">
                                <div class="col-sm-5" align="left">
                                Username :    
                                    <input  name="Username" type="text" required class="form-control" id="username" placeholder="Username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="6" maxlength="6"  />
                                    ตัวอย่าง รหัสอาจารย์ที่ปรึกษา T00001
                                </div>
                            </div> 
                                <div class="form-group">
                                <div class="col-sm-5" align="left">
                                Password :
                                    <input  name="Password" type="password" required class="form-control" id="password" placeholder="Password" pattern="^[0-9]+$" minlength="6" maxlength="6" />
                                    ตัวอย่าง ******* 6 ตัว
                                </div>
                                </div>
                                <div class="form-group">
                            <div class="col-sm-5" align="left">
                                คำนำหน้า :
                                <input  name="Prename" type="text" required class="form-control" id="Prename" placeholder="คำนำหน้า" pattern="^[กขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรฤลฦวศษสหฬอฮฯะัาำิีึืฺุูเแโใไๅๆ็่้๊๋์a-zA-Z.]+$" title="ภาษาอังกฤษหรือภาษาไทยเท่านั้น" minlength="2"/>
                            </div>
                            </div>
                                <div class="form-group">
                                <div class="col-sm-5" align="left">
                                ชื่อ :
                                    <input  name="Firstname" type="text" required class="form-control" id="Firstname" placeholder="ชื่อ " pattern="^[กขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรฤลฦวศษสหฬอฮฯะัาำิีึืฺุูเแโใไๅๆ็่้๊๋์a-zA-Z]+$" title="ภาษาอังกฤษหรือภาษาไทยเท่านั้น" minlength="2"/>
                                </div>
                                </div>
                                <div class="form-group">
                                <div class="col-sm-5" align="left">
                                นามสกุล :
                                    <input  name="Lastname" type="text" class="form-control" id="Lastname" placeholder="นามสกุล" pattern="^[กขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรฤลฦวศษสหฬอฮฯะัาำิีึืฺุูเแโใไๅๆ็่้๊๋์a-zA-Z]+$" title="ภาษาอังกฤษหรือภาษาไทยเท่านั้น"/>
                                </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-5" align="right">
                                        <button type="submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-ok"></span> สมัครข้อมูลอาจารย์ที่ปรึกษา </button>
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