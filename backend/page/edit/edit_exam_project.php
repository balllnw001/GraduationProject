<?php include('../head.php')?>
<body class="sb-nav-fixed">
<?php include('../navbar.php')?>
    <div id="layoutSidenav">
    <?php include('../menu.php')?>
        <div id="layoutSidenav_content">
        <main>
                <div class="container-fluid">
                    <h1 class="mt-4">กำหนดสอบ</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../../index.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active"><a href="../../exam_project.php">ตารางข้อมูลอนุมัติขอสอบ</a></li>
                        <li class="breadcrumb-item active">กำหนดสอบ</li>
                    </ol>
                    <?php
                    // echo '<pre>';
                    // print_r($_REQUEST);
                    // echo '</pre>';
                                //1. เชื่อมต่อ database:
                                include('../../connection.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                        //2. query ข้อมูลจากตาราง:
                        $project_id = $_REQUEST["ID"];

                        $sql = "SELECT EX.Pro_id,P.P_id,S.Username,CONCAT(S.Prename,' ', S.Firstname,' ',S.Lastname) AS S_Name,
                        P.P_name_th,EX.Pro_final
                        FROM submit_an_examination_request_assess_evidence AS EX
                        INNER JOIN project AS P ON EX.P_id =P.P_id
                        INNER JOIN student AS S ON P.S_ID = S.S_ID
                        WHERE EX.Pro_id = '$project_id'
                        ";
                        $result = mysqli_query($conn, $sql) ;
                        $row = mysqli_fetch_array($result);
                        extract($row);
                    ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i> แบบฟอร์มกำหนดสอบ
                        </div>
                        <form  name="edit_exam_project" action="edit_exam_project_db.php" method="POST" class="form-horizontal">
                        <input type="hidden" name="ID" value="<?=$Pro_id;?>">
                            <input type="hidden" id="Pro_final" name="Pro_final" value="<?=$Pro_final;?>">
                        </br>
                            <div class="form-group">
                                <div class="col-sm-5" align="left">
                                ชื่อโครงงานที่ยื่อขอสอบ :
                                    <input  readonly="readonly" name="P_name_th" type="text" value="<?=$P_name_th;?>" required class="form-control" id="P_name_th" placeholder="ชื่อโครงงานภาษาไทย" pattern="^[ กขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรฤลฦวศษสหฬอฮฯะัาำิีึืฺุูเแโใไๅๆ็่้๊๋์]+$" title="ภาษาไทยเท่านั้น" minlength="5" maxlength="100"  />
                                </div>
                            </div> 
                            <div class="form-group">
                                <div class="col-sm-5" align="left">
                                กรรมการคนที่ 1 :
                                    <input name="Pro_id_g1" type="text" required class="form-control" id="Pro_id_g1" placeholder="ชื่อ-นามสกุล กรรมการ คนที่ 1" pattern="^[A-Za-z0-9กขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรฤลฦวศษสหฬอฮฯะัาำิีึืฺุูเแโใไๅๆ็่้๊๋์]+$" title="ภาษาไทยเท่านั้น" minlength="6" maxlength="6"  />
                                </div>
                            </div> 
                            <div class="form-group">
                                <div class="col-sm-5" align="left">
                                กรรมการคนที่ 2 :
                                    <input  name="Pro_id_g2" type="text" required class="form-control" id="Pro_id_g2" placeholder="ชื่อ-นามสกุล กรรมการ คนที่ 2" pattern="^[A-Za-z0-9กขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรฤลฦวศษสหฬอฮฯะัาำิีึืฺุูเแโใไๅๆ็่้๊๋์]+$" title="ภาษาไทยเท่านั้น" minlength="6" maxlength="6"  />
                                </div>
                            </div> 
                            <div class="form-group">
                                <div class="col-sm-5" align="left">
                                กำหนดวันที่กำหนดสอบ :
                                    <input  name="Pro_date_custom" type="date" required class="form-control" id="Pro_date_custom"  pattern="^[0-9]+$" title="เฉพาะตัวเลข" minlength="5" maxlength="100"  />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-5" align="left">
                                เวลากำหนดสอบ :
                                    <input  name="Pro_time_final" type="time" required class="form-control" id="Pro_time_final"  pattern="^[0-9]+$" title="เฉพาะตัวเลข" minlength="5" maxlength="100"  />
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
<?php include('../script.php')?> 
</body>
