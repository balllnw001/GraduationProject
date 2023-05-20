<div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
<header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <h2 style="padding-left:200px">Software<em>Engineer</em></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto" style="padding-Right:200px">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home
                  <span class="sr-only">(current)</span>
                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="project.php">ติดตามโครงงาน</a>
                        </li>
                        

                            <?php
                            if (isset($_SESSION['User_ID'])) {
                   
                          ?>
                        <li class="nav-item">
                            <a class="nav-link" href="add_project.php">เสนอโครงงาน</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="file_project.php">ส่งเอกสารโครงงาน</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="submit_project_evidence.php">ยื่นหลักฐานโครงงาน</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="exam_project.php">ยื่นคำร้องขอสอบ</a>
                        </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <?php echo $_SESSION["User"]; ?>
                            </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <!-- <a class="dropdown-item" href="#">Action</a><br>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div> -->
                                        <a class="dropdown-item" href="logout.php">logout</a>
                                    </div>
                                </li>
                                <?php }else { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php">Login</a>
                                </li>
                                <?php } ?>

                    </ul>
                </div>
            </div>
        </nav>
    </header>