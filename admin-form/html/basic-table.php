<?php
    require'../../class.php';
    require'../../pagination/pagination.php';
    $obj = new Dataphp();
    $link = $obj->re_login();

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
    <title>Ample Admin Template - The Ultimate Multipurpose admin template</title>
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
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="index.html">
                        <!-- Logo icon image, you can use font-icon also -->
                        <b>
                            <!--This is dark logo icon-->
                            <img src="../plugins/images/admin-logo.png" alt="home" class="dark-logo" />
                            <!--This is light logo icon-->
                            <img src="../plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
                        </b>
                        <!-- Logo text image you can use text also -->
                        <span class="hidden-xs">
                            <!--This is dark logo text-->
                            <img src="../plugins/images/admin-text.png" alt="home" class="dark-logo" />
                            <!--This is light logo text-->
                            <img src="../plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
                        </span>
                    </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control">
                            <a href="">
                                <i class="fa fa-search"></i>
                            </a>
                        </form>
                    </li>
                    <li>
                        <a class="profile-pic" href="#">
                            <img src="../plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle">
                            <b class="hidden-xs">Steave</b>
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
                        <a href="index.html" class="waves-effect">
                            <i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>หน้าหลัก</a>
                    </li>

                    <li>
                        <a href="basic-table.php" class="waves-effect">
                            <i class="fa fa-table fa-fw" aria-hidden="true"></i>จัดการสมาชิก/ช่าง</a>
                    </li>
                    <li>
                        <a href="promotion.html" class="waves-effect">
                            <i class="fa fa-percent fa-fw" aria-hidden="true"></i>โปรโมชั่น/ข่าวสาว</a>
                    </li>
                    <li>
                        <a href="price.html" class="waves-effect">
                            <i class="fa fa-money fa-fw" aria-hidden="true"></i>ค่าบริการ</a>
                    </li>
                    <li>
                        <a href="fontawesome.html" class="waves-effect">
                            <i class="fa fa-font fa-fw" aria-hidden="true"></i>Icons</a>
                    </li>
                    <li>
                        <a href="map-google.html" class="waves-effect">
                            <i class="fa fa-globe fa-fw" aria-hidden="true"></i>Google Map</a>
                    </li>
                    <li>
                        <a href="blank.html" class="waves-effect">
                            <i class="fa fa-columns fa-fw" aria-hidden="true"></i>Blank Page</a>
                    </li>
                    <li>
                        <a href="404.html" class="waves-effect">
                            <i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>Error 404</a>
                    </li>
                </ul>
                <div class="center p-20">

                </div>
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
                        <h4 class="page-title">จัดการสมาชิก</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li>
                                <a href="#">Dashboard</a>
                            </li>
                            <li class="active">Basic Table</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">จัดการสมาชิก เพิ่ม/ลบ/แก้ไข</h3>
                            <select class="form-control" id="select_type">
                                <option value="" selected>กรุณาเลือกหมวดหมู่</option>
                                <option value="1">สมาชิก</option>
                                <option value="2">ช่าง</option>
                                <option value="3">ผู้ดูแลระบบ</option>
                            </select>
                            <p class="text-muted">
                                <input id="name_search" class="form-control" placeholder="ค้นหาสมาชิก" />
                            </p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>อันดับ</th>
                                            <th>ชื่อ</th>
                                            <th>นามสกุล</th>
                                            <th>เบอร์โทร</th>
                                            <th>ตำแหน่ง</th>

                                        </tr>
                                    </thead>
                                    <tbody id="body">
    <?php

        if ($_GET['group']==2) {
             $sql = "SELECT `Worker_ID`, `Fname`, `Lname`, `TypeID`, `Extention`, `IsConfirm`,`Phone` FROM `workerinformation`";

        $data_set = page_query($link, $sql, 10);

        while ($data_table = mysqli_fetch_assoc($data_set)) {
            echo '<tr>
                    <td>'.$data_table['Worker_ID'].'</td>
                    <td>
                    <a href="profile.php?id='.$data_table['Worker_ID'].'" class="waves-effect">'.$data_table['Fname'].'</a>
                    </td>
                    <td>'.$data_table['Lname'].'</td>
                    <td>'.$data_table['Phone'].'</td>
                    <td>'.$obj->return_type($data_table['TypeID']).'</td>
                    <td>
                    <button class="btn btn-danger" onclick="del('.$data_table['Worker_ID'].')">ลบ</button>';
                    if ($data_table['IsConfirm']!=NULL&&$data_table['IsConfirm']==1) {
                        echo '<button class="btn btn-info" onclick="UnIsConfirm('.$data_table['Worker_ID'].')">ยกเลิก</button>';
                    }
                    else if ($data_table['IsConfirm']==NULL||$data_table['IsConfirm']==0){
                        echo '<button class="btn btn-success" onclick="IsConfirm('.$data_table['Worker_ID'].')">ยืนยัน</button>';
                    }
                    echo ' </td></tr>';
            }
        }  
        if ($_GET['group']==1) {
             $sql = "SELECT `Member_ID`, `Fname`, `Lname` , `Phone` FROM `memberinformation`";

        $data_set = page_query($link, $sql, 10);

        while ($data_table = mysqli_fetch_assoc($data_set)) {
            echo '<tr>
                    <td>'.$data_table['Member_ID'].'</td>
                    <td>
                    <a href="profile.php?id='.$data_table['Member_ID'].'" class="waves-effect">'.$data_table['Fname'].'</a>
                    </td>
                    <td>'.$data_table['Lname'].'</td>
                    <td>'.$data_table['Phone'].'</td>
                    <td>สมาชิก</td>
                    <td>';
                    echo ' </td></tr>';
            }
        }  
    ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                         <center>
                         <?php
                            page_link_border("solid","1px","#ABB2B9");
                            page_border_radius("5px");
                            page_link_bg_color("#17202A","#ABB2B9");
                            page_link_font("12px","true","false","false");
                            page_link_color("#FFFFFF");
                            page_echo_pagenums(5,"true","true");
                         ?>
                         </center>
                    </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com</footer>
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
        function IsConfirm(id) {
            $.ajax({
                url:'IsConfirm.php',
                type:'post',
                data:{data:id},
                success:function(res){
                    location.reload();
                }
            })
        }

        function UnIsConfirm(id) {
            $.ajax({
                url:'UnIsConfirm.php',
                type:'post',
                data:{data:id},
                success:function(res){
                    location.reload();
                }
            })
        }

        function del(id){
            $.ajax({
                url:'del_data.php',
                type:'post',
                data:{data:id},
                success:function(res){
                    location.reload();
                }
            })
        }

        var url = new URL(window.location.href);
        var c = url.searchParams.get("group");
        $('#select_type').val(c);

        $('#select_type').change(function(){
            var type = $('#select_type').val();
            window.location.href ='basic-table.php?page=1&group='+type;
        });

        $(document).on('input', "#name_search", function () {
            var txtEntered = false;
            if ($(this).val() !== "") {
                txtEntered = true;
            }

            if (txtEntered) {
                var data_search = $('#name_search').val();
                $.ajax({
                    url:'search_name.php',
                    type:'post',
                    data:{data_set:true},
                    success:function(res){
                        $('#body').load('search_name.php?name='+data_search+'&group='+c);
                    }
                });
            }
        });
    </script>
</body>

</html>