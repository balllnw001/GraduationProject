<div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" >
                <div class="sb-sidenav-menu">
                    <div class="nav">
                    <div class="sb-sidenav-menu-heading"></div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fa fa-home"></i></div>
                            หน้าหลัก
                        </a>
                        <div class="sb-sidenav-menu-heading">จัดการข้อมูลเบื้องต้น</div>
                        <a class="nav-link" href="student.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                            ข้อมูลนักศึกษา
                        </a>
                        <?php
                        // echo '<pre>';
                        // print_r($_SESSION);
                        // echo '</pre>';
                            if($_SESSION["Status"]=="A"){ 
                                
                          ?>
                        <a class="nav-link" href="admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                            ข้อมูลอาจารย์ที่ปรึกษา
                        </a>
                        <?php }?>
                        <a class="nav-link" href="project.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                            ข้อมูลโครงงาน
                        </a>
                        <a class="nav-link" href="project_type.php">
                            <div class="sb-nav-link-icon"><i class="fa fa-clone"></i></div>
                            ข้อมูลประเภทโครงงาน
                        </a>
                        <?php 
                        if($_SESSION["Status"]=="A"){ 
                        ?>
                        <div class="sb-sidenav-menu-heading">ยื่นคำร้อง</div>
                        <a class="nav-link" href="Project_Proposal.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            อนุมัติข้อเสนอโครงงาน
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            ยื่นคำร้องขอสอบ
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link" href="exam_project.php">
                            <div class="sb-nav-link-icon"></div>
                            อนุมัติขอสอบ
                                 </a> 
                                 <a class="nav-link" href="final_project.php">
                                    <div class="sb-nav-link-icon"></div>
                                        ผลการสอบ
                                 </a> 
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">ติดตามความก้าวหน้า</div>
                        <a class="nav-link" href="loding_project.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            ติดตามความก้าวหน้า
                        </a>   
                        <a class="nav-link" href="trace_project.php">
                            <div class="sb-nav-link-icon"><i class="fa fa-book"></i></div>
                            ติดตามหลักฐาน
                        </a>       
                        
                        
                        <?php } ?>
                        <?php
                        // echo '<pre>';
                        // print_r($_SESSION);
                        // echo '</pre>';
                            if($_SESSION["Status"]=="T"){ 
                                
                          ?>
                        <div class="sb-sidenav-menu-heading">ยื่นคำร้อง</div>
                        <a class="nav-link" href="Project_Proposal.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            ยื่นข้อเสนอโครงงาน
                        </a>
                        <div class="sb-sidenav-menu-heading">ติดตามความก้าวหน้า</div>
                        <a class="nav-link" href="loding_project.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            ติดตามความก้าวหน้า
                        </a> 
                        

                        
                    
                        <?php } ?>
                        <div class="sb-sidenav-menu-heading">ข้อมูล เอกสารโครงงาน</div>
                        <a class="nav-link" href="https://drive.google.com/drive/u/1/folders/1uM3Qj2GyooTonhLWUcYGgQCIWtdFlOj5">
                            <div class="sb-nav-link-icon"><i class="far fa-file-alt"></i></div>
                            Google Drive
                        </a>
                        <?php
                        // echo '<pre>';
                        // print_r($_SESSION);
                        // echo '</pre>';
                            if($_SESSION["Status"]=="A"){ 
                                
                          ?>
                        <!-- <div class="sb-sidenav-menu-heading">ตารางข้อมูล</div>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            ตารางนักศึกษา
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            ตารางอาจารย์ที่ปรึกษา
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            ตารางโครงงาน
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            ตารางประเภทโครงงาน
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            ตารางยื่นคำร้องขอสอบ
                        </a> -->
                        <?php } ?>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <!-- <div class="small">Logged in as:</div> -->
                    <a href="http://www.softengthai.com/">Software Engineer Lpru</a>
                </div>
            </nav>
        </div>