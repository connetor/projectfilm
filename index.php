<?php
      require'class.php';
      session_start();
  if(isset($_SESSION['id_show'])){            
        if(isset($_SESSION['worker'])){
          $chk=1;
        $id = $_SESSION['id_show'];
      $obj = new Dataphp();
      $obj->workerinformation($id);
      $data = mysqli_fetch_assoc($obj->workerinformation);
        }
        else
        {
          $chk=0;
      $id = $_SESSION['id_show'];

      $obj = new Dataphp();
      $obj->memberinformation($id);

      $data = mysqli_fetch_assoc($obj->memberinformation);
        }     

  }



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>www.fixit.in.th เว็บบริการช่างที่ดีที่สุดสำหรับคุณ</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
  <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300|Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" type="text/css" href="css/signup.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBByyBDNSJkKYkmnXRBsELBjH_VfombtE"></script>
  <!-- =======================================================
    Theme Name: Bethany
    Theme URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->

</head>

<body onload="initialize()">
  <!--header-->
  <header class="main-header" id="header">
    <div class="bg-color">
      <!--nav-->
      <nav class="nav navbar-default navbar-fixed-top">
        <div class="container">
          <div class="col-md-12">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mynavbar" aria-expanded="false"
                aria-controls="navbar" style="width : 10%">
                <span class="fa fa-bars"></span>
              </button>
              <a href="index.html" class="navbar-brand">FIXIT</a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="mynavbar">
              <ul class="nav navbar-nav">
                <li class="active">
                  <a href="#header">หน้าหลัก</a>
                </li>
                <li>
                  <a href="#feature">ค้นหาช่าง</a>
                </li>
                <li>
                  <a href="#portfolio">รีวิวช่าง</a>
                </li>           
              <li>
                <?php
                if(isset($id)){
                    if($chk==1){
                      echo "<a class='btn btn-primary dropdown-toggle'  data-toggle='dropdown'>"
                      .$data['Fname']."&nbsp&nbsp".$data['Lname'].
                      "<span class='caret'></span></a>";
                      echo "<ul  class='dropdown-menu'>";
                      echo "<li><a href = 'worker-form/html' class='linkuser' >";                
                      echo "หน้าผู้ใช้</a></li>";
                      echo "<li><a href = 'del_session.php' class='linkuser' >";                
                      echo "ออกจากระบบ</a></li>";
                      echo "</ul>";
                  }
                    else{
                      echo "<a class='btn btn-primary dropdown-toggle'  data-toggle='dropdown'>"
                      .$data['Fname']."&nbsp&nbsp".$data['Lname'].
                      "<span class='caret'></span></a>";
                      echo "<ul  class='dropdown-menu'>";
                      echo "<li><a href = 'user-form/html' class='linkuser' >";                
                      echo "หน้าผู้ใช้</a></li>";
                      echo "<li><a href = 'del_session.php' class='linkuser' >";                
                      echo "ออกจากระบบ</a></li>";
                      echo "</ul>";
                  }
                  
                 
                }
                else
                {
                  echo " 
                  <a href='#contact'>Login/SignUp</a> ";
                }

                ?>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <!--/ nav-->
      <div class="container text-center">
        <div class="wrapper wow fadeInUp delay-05s">
          <h2 class="top-title">เว็บไซต์สำหรับหาช่างทั่วประเทศไทย</h2>
          <h3 class="title">FIXIT</h3>
          <h4 class="sub-title">เว็บหาช่างที่ดีที่สุดสำหรับคุณ</h4>
         
        </div>
      </div>
    </div>
  </header>
  <!--/ header-->
  <!---->
  <section id="cta-1">
    <div class="container">
      <div class="row">
        <div class="cta-info text-center">

          <h2 class="head-title black">สมัครเป็นช่างประจำเว็บไซต์</h2>

          <hr class="botm-line">
          <p class="sec-para black">คุณสามารถร่วมเป็นส่วนหนึ่งกับเราได้ โดยการสมัครสมาชิกเป็นช่างที่คุณถนัดที่สุดและรอรับงานจากเว็บของเราได้เลย</p>
          <h3>
            <a href="#contact" class="btn btn-success">สมัครสมาชิก</a>
          </h3>
        </div>
      </div>

    </div>
  </section>
  <!---->
  <!---->
  <section id="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3 wow fadeInLeft delay-05s">
          <div class="section-title">
            <h2 class="head-title">ประเภทของช่าง</h2>
            <hr class="botm-line">
            <p class="sec-para">คุณสามารถเลือกช่างให้ตรงกับงานของคุณในราคาที่คุณต้องการ ไม่ว่าจะเป็น งานก่อสร้าง ประปา ไฟฟ้า ยานยนต์ สื่อสาร
              อิเล็คทรอนิกส์
            </p>
          </div>
        </div>
        <div class="col-md-9">
          <div class="col-md-6 wow fadeInRight delay-02s">
            <div class="">
              <center>
                <img src="img/electric.png" height="100" width="100" alt="" class="img-responsive">
              </center>
            </div>
            <div class="icon-text">
              <h3 class="txt-tl">
                <a href="search.php?type=1&page=1">ไฟฟ้า</a>
              </h3>
              <p class="txt-para">เปลี่ยนหลอดไฟ เดินสายไฟ ติดตั้งอุปกรณ์ไฟฟ้า วงจรไฟฟ้าต่างๆ</p>
            </div>
          </div>
          <div class="col-md-6 wow fadeInRight delay-02s">
            <div class="">
              <center>
                <img src="img/papa.png" height="100" width="100" alt="" class="img-responsive">
              </center>
            </div>
            <div class="icon-text">
              <h3 class="txt-tl">
                <a href="search.php?type=2&page=1">ประปา</a>
              </h3>
              <p class="txt-para">เดินท่อน้ำ เปลี่ยนก๊อกน้ำ ต่อเติม/ซ่อมแซมเกี่ยวกับประปา</p>
            </div>
          </div>
          <div class="col-md-6 wow fadeInRight delay-04s">
            <div class="">
              <center>
                <img src="img/building.png" height="100" width="100" alt="" class="img-responsive">
              </center>
            </div>
            <div class="icon-text">
              <h3 class="txt-tl">
                <a href="search.php?type=3&page=1">ก่อสร้าง</a>
              </h3>
              <p class="txt-para">ต่อเติมบ้าน ซ่อมบ้าน ทำหลังคา ปูพื้นใหม่</p>
            </div>
          </div>
          <div class="col-md-6 wow fadeInRight delay-04s">
            <div class="">
              <center>
                <img src="img/car.png" height="100" width="100" alt="" class="img-responsive">
              </center>
            </div>
            <div class="icon-text">
              <h3 class="txt-tl">
                <a href="search.php?type=4&page=1">ยานพาหนะ</a>
              </h3>
              <p class="txt-para">ซ่อมรถยนต์ จักรยานยนต์ แต่งรถ/ต่อเติม</p>
            </div>
          </div>
          <div class="col-md-6 wow fadeInRight delay-06s">
            <div class="">
              <center>
                <img src="img/Communication.png" height="100" width="100" alt="" class="img-responsive">
              </center>
            </div>
            <div class="icon-text">
              <h3 class="txt-tl">
                <a href="search.php?type=5&page=1">สื่อสาร</a>
              </h3>
              <p class="txt-para">จัดการเดินสายโทรศัพท์ เคเบิ้ลทีวี ติดตั้งจานดาวเทียม</p>
            </div>
          </div>
          <div class="col-md-6 wow fadeInRight delay-06s">
            <div class="">
              <center>
                <img src="img/elect.png" height="100" width="100" alt="" class="img-responsive">
              </center>
            </div>
            <div class="icon-text">
              <h3 class="txt-tl">
                <a href="search.php?type=6&page=1">อิเล็คทรอนิกส์</a>
              </h3>
              <p class="txt-para">วงจรอิเล็คทรอนิกส์ วงจรอัตโนมัติต่างๆ หลอด LED</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!---->
  <section class="section-padding parallax bg-image-2 section wow fadeIn delay-08s" id="cta-2">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="cta-txt">
            <h3>สมัครสมาชิก</h3>
            <p>เพื่อค้นหาช่างตามประเภทงานที่คุณต้องการและยังสามารถรีวิวช่างที่คุณจ้างไปได้</p>
          </div>
        </div>
        <div class="col-md-4 text-center">
          <a href="#contact" class="btn btn-submit">สมัครสมาชิก</a>
          
        </div>
      </div>
    </div>
  </section>
  <!---->
  <!---->
  <section class="section-padding wow fadeInUp delay-02s" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-12">
          <div class="section-title">
            <h2 class="head-title">รีวิวช่าง</h2>
            <hr class="botm-line">
            <p class="sec-para">ช่างแต่ละคนจะมีคะแนนเรทติ้งจากการทำงาน โดยรีวิวจากผู้ว่าจ้างจริงๆ ทำให้คุณสามารถเลือกช่างที่มีคะแนนเรทติ้งสูงๆได้</p>
          </div>
        </div>
        <div class="col-md-9 col-sm-12" id="review">
        <div id="map-canvas" style="width: 100%; height: 100%"></div>
          <div class="col-md-4 col-sm-6 padding-right-zero">
            <div class="portfolio-box design">
              <img src="img/port01.jpg" alt="" class="img-responsive"> ประเภทช่าง : ไฟฟ้า
              <br> คะแนนเรทติ้ง : 0/5
            </div>
          </div>
          <div class="col-md-4 col-sm-6 padding-right-zero">
            <div class="portfolio-box design">
              <img src="img/port02.jpg" alt="" class="img-responsive"> ประเภทช่าง : ประปา
              <br> คะแนนเรทติ้ง : 0/5
            </div>
          </div>
          <div class="col-md-4 col-sm-6 padding-right-zero">
            <div class="portfolio-box design">
              <img src="img/port03.jpg" alt="" class="img-responsive"> ประเภทช่าง : ก่อสร้าง
              <br> คะแนนเรทติ้ง : 0/5
            </div>
          </div>
          <div class="col-md-4 col-sm-6 padding-right-zero">
            <div class="portfolio-box design">
              <img src="img/port04.jpg" alt="" class="img-responsive"> ประเภทช่าง : ยานพาหนะ
              <br> คะแนนเรทติ้ง : 0/5
            </div>
          </div>
          <div class="col-md-4 col-sm-6 padding-right-zero">
            <div class="portfolio-box design">
              <img src="img/port05.jpg" alt="" class="img-responsive"> ประเภทช่าง : สื่อสาร
              <br> คะแนนเรทติ้ง : 0/5
            </div>
          </div>
          <div class="col-md-4 col-sm-6 padding-right-zero">
            <div class="portfolio-box design">
              <img src="img/port06.jpg" alt="" class="img-responsive"> ประเภทช่าง : อิเล็คทรอนิกส์
              <br> คะแนนเรทติ้ง : 0/5
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!---->
  <!---->
  <section class="section-padding wow fadeInUp delay-05s" id="contact">
    <div class="container" style="margin-top: -3%;">
      <div class="row white">
        <div class="col-md-8 col-sm-12">
          <div class="section-title">
            <h2 class="head-title black">Login หรือ สมัครเป็นช่างประจำเว็บไซต์</h2>
            <hr class="botm-line">
            <p class="sec-para black">คุณสามารถร่วมเป็นส่วนหนึ่งกับเราได้ โดยการสมัครสมาชิกเป็นช่างที่คุณถนัดที่สุดและรอรับงานจากเว็บของเราได้เลย</p>
          </div>
        </div>
        <div class="col-md-12 col-sm-12">
          <div class="col-md-4 col-sm-6" style="padding-left:0px;">
            <h3 class="cont-title">Login</h3>
            <!--/<div id="sendmessage">Your message has been sent. Thank you!</div>-->
            <div id="errormessage"></div>
            <div class="contact-info">
              <form action="" method="post" role="form" class="contactForm" id="data_login" onsubmit="page_login()">
                <div class="form-group">
                  <input type="text" name="id_login" class="form-control" id="id_login" placeholder="ไอดีผู้ใช้งาน" data-rule="minlen64" data-msg="Please enter at least 6 chars"
                  />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="pw_login" id="pw_login" placeholder="รหัสผ่าน" data-rule="minlen64" data-msg="Please enter at least 6 chars"
                  />
                  <div class="validation"></div>
                </div>
                <button type="submit" class="btn btn-send" id="login">เข้าสู่ระบบ</button>
              </form>
            </div>

          </div>
          <div class="col-md-4 col-sm-6">
            <h3 class="cont-title">สมัครสมาชิก</h3>
            <div class="location-info">
              <div class="form-group">
                <input type="text" name="signup_id" id="signup_id" data-toggle="tooltip" title="ใช้ได้เฉพาะตัวอักษร a-z, A-Z, 0-9 ความยาวระหว่าง 6 - 16 ตัวอักษร"
                  class="form-control" placeholder="ไอดีผู้ใช้งาน" data-rule="minlen64" data-msg="Please enter at least 6 chars"
                />
                <div class="validation"></div>
              </div>

              <div class="form-group">
                <input type="password" class="form-control" data-toggle="tooltip" title="ใช้ได้เฉพาะตัวอักษร a-z, A-Z, 0-9 ความยาวระหว่าง 6 - 16 ตัวอักษร"
                  name="signup_pw" id="signup_pw" placeholder="รหัสผ่าน" data-rule="minlen64" data-msg="Please enter at least 6 chars"
                />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" data-toggle="tooltip" title="example@gmail.com" name="signup_email" id="signup_email"
                  placeholder="อีเมลล์" data-rule="email" data-msg="Please enter at least 6 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" data-toggle="tooltip" title="หมายเลขโทรศัพท์ 10 หลัก" name="signup_tel" id="signup_tel"
                  placeholder="เบอร์โทรศัพท์" data-rule="email" data-msg="Please enter at least 6 chars" />
                <div class="validation"></div>
              </div>

              <button onclick="document.getElementById('id01').style.display='block'" id="signup_btn" class="btn btn-send">สมัครสมาชิก</button>
            </div>
          </div>
          <div class="col-md-4">
            <div class="contact-icon-container hidden-md hidden-sm hidden-xs">
              <span aria-hidden="true" class="fa fa-envelope-o"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!---->
  <!---->
  <footer class="" id="footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-7 footer-copyright">
          © FIXED - All rights reserved
          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Bethany
            -->
            Designed by
            <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>

      </div>
    </div>
  </footer>

  <div id="id01" class="modal" >
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">สมัครเป็นช่างประจำ FIXED</span>
<div class="modal-content">

    <div class="modal-body">
        <form  id="new_data" method="post" name="form1">
            <div style = "margin-left: 10%;margin-right: 15%" >
                <div class="row">
                
                 
              <h1>สมัครสมาชิก</h1>
              <p>กรุณากรอกข้อมูลให้ครบ เพื่อให้ขั้นตอนในการสมัครสมาชิกสำเร็จด้วย</p>
              <hr style="width: 60%; margin-left: -5% ">
              
              <div class="col-md-12">
                  <input type="radio" name="type" value="1" id="regis" checked onclick="member()"> สมาชิก   
                  <input type="radio" name="type" value="2" id="regis1" onclick="worker()"> ช่าง
              </div>
              <br><br>
            
              <div >
              <label>
                <b>ไอดีเข้าใช้งาน</b>
              </label>
              
              <input type="text" name="form_id" id="form_id"  data-toggle="tooltip" title="ใช้ได้เฉพาะตัวอักษร a-z, A-Z, 0-9 ความยาวระหว่าง 6 - 16 ตัวอักษร"
                class="form-control" placeholder="ไอดีผู้ใช้งาน" data-rule="minlen64"  />
              <label for="psw">
                <b>รหัสผ่าน</b>
              </label>
              <input type="password" class="form-control"  data-toggle="tooltip" title="ใช้ได้เฉพาะตัวอักษร a-z, A-Z, 0-9 ความยาวระหว่าง 6 - 16 ตัวอักษร"
                name="form_pw" id="form_pw" placeholder="รหัสผ่าน" data-rule="minlen64" 
              />
              <label for="psw">
                  <b>ยืนยันรหัสผ่าน</b>
                </label>
                <input type="password" class="form-control"  data-toggle="tooltip" 
                  name="repass" id="repass" placeholder="รหัสผ่าน" data-rule="minlen64" 
                />
              <label for="psw-repeat">
                <b>อีเมลล์</b>
              </label>
              <input type="text" class="form-control"  data-toggle="tooltip" title="example@gmail.com" name="form_email" id="form_email"
                placeholder="อีเมลล์"   />
              <label for="psw-repeat">
                <b>เบอร์โทรศัพท์</b>
              </label>
              <input type="text" class="form-control"  data-toggle="tooltip" title="หมายเลขโทรศัพท์ 10 หลัก" name="form_tel" id="form_tel"
                placeholder="เบอร์โทรศัพท์"  data-msg="Please enter at least 6 chars" />
              <label for="psw-repeat">
                <b>ชื่อ</b>
              </label>
              <input type="text" class="form-control"  data-toggle="tooltip" title="ชื่อจริง" name="form_fname" id="form_fname" placeholder="ชื่อจริง"
                  />
              <label for="psw-repeat">
                <b>นามสกุล</b>
              </label>
              <input type="text" class="form-control"  data-toggle="tooltip" title="นามสกุล" name="form_lname" id="form_lname" placeholder="นามสกุล"
                  />
              <label for="psw-repeat">
                <b>เพศ</b>
              </label>
              <div class="titlefont"></div>
              <input type="radio" name="gender" value="m" id="gender-male" />
              <label for="gender-male">ชาย</label>
              <input type="radio" name="gender" value="f" id="gender-female" />
              <label for="gender-female">หญิง</label>
              <br>
      
              <label for="psw-repeat" style="margin-top:1%;">
                <b>วันเกิด</b>
              </label>
              <input type="date" name="bday" id="datePicker" >
              <p class="getDate"></p> 
      
              <label >
                  <b>ที่อยู่</b>
                </label>
              <div class="col-md-12">
                <textarea name="addr" class="form-control" rows="5" ></textarea>
              </div>
              <br>
              <span id="workonly"></span>
            </div>
      
              <div class="clearfix col-md-12 " style="margin-top: 30px; ">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <button type="button" id="submit_addnew" onclick="return chkpass()" class="cancelbtn" style="background-color:green;">Sign Up</button>
              </div>
            </div>
            </div>
          </form>
      </div>
</div>

   
  </div>
  

  <!---->
  <!--contact ends-->
  <!-- <script src="js/jquery.min.js"></script> -->
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/wow.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>
  <script>
    $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip();
      
    });
    $('#signup_btn').click(()=>{
      $('#form_id').val($('#signup_id').val()); 
      $('#form_pw').val($('#signup_pw').val()); 
      $('#form_email').val($('#signup_email').val()); 
      $('#form_tel').val($('#signup_tel').val()); 
    });
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>
  <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
  <script src="data_js_5.js" ></script>

  <script>
function initialize() {
	var mapOptions = {
		zoom: 8,
		center: new google.maps.LatLng(-34.397, 150.644)
	};

	var map = new google.maps.Map(document.getElementById('map-canvas'),
		mapOptions);
}

    function chkpass(){

      if($('#form_pw').val() !=$('#repass').val())
	{
		alert('Confirm Password Not Match');
		$('#repass').focus();		
		return false;
	}	else{
    if($("#regis").is(':checked')){
      add_newmember();
    }else{
     add_newworker();
    }
   
  }
   
  }
    
  

  </script>
</body>


</html>