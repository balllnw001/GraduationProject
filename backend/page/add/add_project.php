<?php include('../head.php')?>
<body class="sb-nav-fixed">
    <?php include('../navbar.php')?>
    <div id="layoutSidenav">
    <?php include('../menu.php')?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">ยื่นข้อเสนอโครงงาน</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../../index.php">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active"><a href="../../student.php">ตารางข้อมูลโครงงาน</a></li>
                        <li class="breadcrumb-item active">ยื่นข้อเสนอโครงงาน</li>
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
                            <i class="fas fa-table mr-1"></i> แบบฟอร์มยื่นข้อเสนอโครงงาน
                        </div>
                        <form  name="add_project" action="add_project_db.php" method="POST" class="form-horizontal">
                        </br>
                            <div class="form-group">
                                <div class="col-sm-5" align="left">
                                ชื่อโครงงานภาษาไทย :
                                    <input  name="P_name_th" type="text" required class="form-control" id="P_name_th" placeholder="ชื่อโครงงานภาษาไทย" pattern="^[กขฃคฅฆงจฉชซฌญฎฏฐฑฒณดตถทธนบปผฝพฟภมยรฤลฦวศษสหฬอฮฯะัาำิีึืฺุูเแโใไๅๆ็่้๊๋์]+$" title="ภาษาไทยเท่านั้น" minlength="10" maxlength="100"  />
                                </div>
                            </div> 
                                <div class="form-group">
                                <div class="col-sm-5" align="left">
                                ชื่อโครงงานภาษาอังกฤษ :
                                    <input  name="P_name_eng" type="text" required class="form-control" id="P_name_eng" placeholder="ชื่อโครงงานภาษาอังกฤษ" pattern="^[a-zA-Z0-9]+$" minlength="10" maxlength="100" />
                                </div>
                                </div>
                                <div class="form-group">
                            <div class="col-sm-5" align="left">
                                <form id="A_ID" name="A_ID" method="post" action="<?php echo $PHP_SELF; ?>">  
                                อาจารย์ที่ปรึกษา :  
                                    <select class="form-control" Emp Name='NEW'>  
                                    <option value="">--- กรุณาเลือกอาจารย์ที่ปรึกษา ---</option>  
                                    <?php
                                    // include('../../connection.php');
                                    $strSQL = "SELECT * FROM admin ORDER BY A_id ASC";
                                    $objQuery = mysqli_query($conn,$strSQL);
                                    while($objResuut = mysqli_fetch_array($objQuery))
                                    {
                                    ?>
                                    <option value="<?php echo $objResuut["A_id"];?>"><?php echo $objResuut["Prename"]." ".$objResuut["Firstname"]." ".$objResuut["Lastname"];?></option>
                                    <?php
                                    }
                                    ?> 
                                    </select>  
                                </form>
                            </div>
                            </div>
                                <div class="form-group">
                                <div class="col-sm-5" align="left">
                                รหัสนักศึกษา :
                                <input  name="S_ID" type="text" required class="form-control" id="S_ID" value="<?=$S_ID;?>"placeholder="รหัสนักศึกษา" pattern="^[a-zA-Z0-9]+$" title="" minlength="11" maxlength="11"/>
                            </div>
                            </div>
                                <div class="form-group">
                                <div class="col-sm-5" align="left">
                                ปีการศึกษา :
                                    <input  name="P_year" type="text" class="form-control" id="P_year"   placeholder="ปีการศึกษา"pattern="^[0-9]+$" minlength="4" maxlength="4"/>
                                </div>
                                </div>
                                <div class="form-group">
                                <div class="col-sm-5" align="left">
                                สถานะ<br/>
                                <input name="status" type="checkbox" class="css_data_item" id="status" value="0" checked />ยังไม่ส่ง<br/>
                                <input name="status" type="checkbox" class="css_data_item" id="status" value="1" />ไม่สมบูรณ์<br/>
                                <input name="status" type="checkbox" class="css_data_item" id="status" value="2" />ยกเลิก<br/>                        
                                </div>
                                </div>
                                <div class="form-group">
                                <div class="col-sm-5" align="left">
                                <form id="Pt_id" name="Pt_id" method="post" action="<?php echo $PHP_SELF; ?>">  
                                    ประเภทโครงงาน :  
                                    <select class="form-control" Emp Name='NEW'>  
                                    <option value="">--- กรุณาเลือกประเภทโครงงาน ---</option>  
                                    <?php
                                    echo '<pre>';
                                    print_r($objResuut);
                                    echo '</pre>';
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
                                </form>
                                </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-5" align="right">
                                        <button type="submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-ok"></span> สมัครข้อมูลนักศึกษา </button>
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>    
    <script type="text/javascript">  
    $(function(){        
        
        $(".css_data_item").click(function(){  // เมื่อคลิก checkbox  ใดๆ  
            if($(this).prop("checked")==true){ // ตรวจสอบ property  การ ของ   
                var indexObj=$(this).index(".css_data_item"); //   
                $(".css_data_item").not(":eq("+indexObj+")").prop( "checked", false ); // ยกเลิกการคลิก รายการอื่น  
            }  
        });  
    
        $("#form_checkbox1").submit(function(){ // เมื่อมีการส่งข้อมูลฟอร์ม  
            if($(".css_data_item:checked").length==0){ // ถ้าไม่มีการเลือก checkbox ใดๆ เลย  
                alert("NO");  
                return false;     
            }  
        });     
            
    });  
    </script> 
<?php include('../script.php')?>
</body>

</html>