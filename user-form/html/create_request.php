<?php
  session_start();
    require'../../class.php';
    $obj = new Dataphp();
    $obj->workerinformation($_GET['id_worker']);
    $data_worker = mysqli_fetch_assoc($obj->workerinformation);

  
    
        $id = $_SESSION['id_show'];
    
        $obj = new Dataphp();
        $obj->memberinformation($id);
    
        $data = mysqli_fetch_assoc($obj->memberinformation);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>User Profile</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
                <div class="navbar-header">  
                    <!-- /Logo -->
                    <ul class="nav navbar-top-links navbar-right pull-right">
                        
                        <li>
                             <a class="profile-pic" href="#">
                             <img src="<?php echo $data['ProfilePic'] ; ?>" alt="user-img" width="36" class="img-circle">
                             <b class="hidden-xs"><?php echo $data['Fname'] ; echo "&nbsp&nbsp&nbsp". $data['Lname'];?>
                            </b>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-header -->
                <!-- /.navbar-top-links -->
                <!-- /.navbar-static-side -->
            </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3>
                        <span class="fa-fw open-close">
                            <i class="ti-close ti-menu"></i>
                        </span>
                        <span class="hide-menu">Navigation</span>
                    </h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="index.php" class="waves-effect">
                            <i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>หน้าหลัก</a>
                    </li>
                    <li>
                        <a href="edit_profile.php" class="waves-effect">
                            <i class="fa fa-table fa-fw" aria-hidden="true"></i>แก้ไขข้อมูล</a>
                    </li>
                    <li>
                        <a href="history.php" class="waves-effect">
                            <i class="fa fa-bar-chart-o fa-fw" aria-hidden="true"></i>ประวัติการจ้างงาน</a>
                    </li>

                    <li>
                        <a href="customer_request.php" class="waves-effect">
                            <i class="fa fa-bars fa-fw" aria-hidden="true"></i>จัดการงานที่จ้าง</a>
                    </li>
                    <li>
                        <a href="map-google.html" class="waves-effect">
                            <i class="fa fa-globe fa-fw" aria-hidden="true"></i>Google Map</a>
                    </li>                  
                    <li>
                        <a href="../../del_session.php" class="waves-effect">
                        <i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>ออกจากระบบ</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Create Request</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                        <ol class="breadcrumb">
                            <li>
                                <a href="#">Dashboard</a>
                            </li>
                            <li class="active">Create Request</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg">                            
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)">
                                            <img src="<?php echo $data['ProfilePic'] ; ?>" class="thumb-lg img-circle" alt="img">
                                        </a>
                                        <h4 class="text-white"><?php echo $data_worker['Fname']." ".$data_worker['Lname']; ?></h4>
                                        <h5 class="text-white">เรทติ้ง <?php echo $obj->avg_star($_GET['id_worker']); ?>/5</h5>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material" id="data_set" enctype="multipart/form-data">
                          
                                <div class="form-group">
                                    <label class="col-md-12">ชื่องาน</label>
                                    <div class="col-md-12">
                                        <input type="text" name="name" placeholder="กรุณากรอกชื่องาน" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">วันเวลาที่ต้องการเริ่มทำงาน</label>
                                    <div class="col-md-12">
                                        <input type="datetime-local"  class="form-control form-control-line" name="datetime"
                                            > </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">สถานที่ทำงาน</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="พิกัด google map" name="location" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">รายละเอียด</label>
                                    <div class="col-md-12">
                                        <textarea name="detail" class="form-control form-control-line" placeholder="กรุณากรอกรายละเอียดของาน"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">เบอร์โทรติดต่อ</label>
                                    <div class="col-md-12">
                                    <input type="text" placeholder="กรุณากรอกเบอร์โทร ที่ติดต่อได้" name="tel" class="form-control form-control-line" maxlength="10"> </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">รูปของงานที่ต้องทำ</label>
                                    <div class="col-md-12">
                                        <input type="file" name="image[]" multiple="multiple" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">รหัสส่วนลด</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="ใส่ promotion code หากมี"  class="form-control form-control-line" name="promotion"
                                            id="example-email"> </div>
                                </div>
                                <a href="javascript:void(0)" onclick="insert_request(<?php echo $_GET['id_worker'].",".$_GET['id_member']; ?>)" class="btn btn-success">ยืนยัน</a>
                                <a class="btn btn-danger" href="http://localhost/project_web/technician.php">ยกเลิก</a>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script type="text/javascript">
        function insert_request(id_worker,id_member) {
            var formData = new FormData($("#data_set")[0]);  
            formData.append("id_worker", id_worker)
            formData.append("id_member", id_member)
            
        
                    $.ajax({
                        url: 'insert_request.php',
                        type: 'POST',
                        data: formData,
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false
                    }).done(function(data){		
               console.log(data)
                    //  swal("Succcess!", "ส่งคำขอเรียบร้อยแล้ว !", "success").then((value) => {
                    //  window.location.href='index.php';
                    // });
                                });

        }
    
       
    </script>
</body>

</html>