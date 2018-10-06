<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      <link rel="stylesheet" href="styleregis.css">

  
</head>
<body>
<div class="container">


  <form action="insert_user.php" method="post" enctype="multipart/form-data" name="frm">
    <div class="row">
      <h4> Account </h4>    
      <div class="input-group input-group-icon ">
      <div class="tooltip"> <div class="titlefont">User </div><input type="text" name="user"data-toggle="tooltip" data-placement="top" pattern="[a-zA-Z0-9]{1,16}">
        <div class="input-icon"><i class="fa fa-user"></i></div>
       <span class="tooltiptext">ใช้ได้เฉพาะตัวอักษร a-z, A-Z, 0-9 ความยาวระหว่าง 6 - 16 ตัวอักษร</span>
     
      </div>      
      </div>
      <div class="input-group input-group-icon">
        <div  class="titlefont">Password </div><input type="password" id="pwd" name="password" data-toggle="tooltip" data-placement="top" pattern="[a-zA-Z0-9]{1,16}" >
         <div class="input-icon"><i class="fa fa-key"></i></div>
      

        <img src="img/icon/password.png"  id="eye" > 
      </div>
    </div>

    <hr >

    <div class="row">  
        <h4>Personal Information</h4>

        <div class="input-group input-group-icon">
          <div class="tooltip"><div  class="titlefont">First Name </div> <input type="text" name="fname" data-toggle="tooltip" data-placement="top" >
          <div class="input-icon"><i class="fa fa-keyboard-o"></i></div>
          <span class="tooltiptext">กรอกชื่อจริง</span>
        </div>
        </div>
         <div class="input-group input-group-icon">
          <div class="tooltip"><div  class="titlefont">Last Name </div> <input type="text" name="lname" data-toggle="tooltip" data-placement="top" >
          <div class="input-icon"><i class="fa fa-keyboard-o"></i></div>
          <span class="tooltiptext">กรอกนามสกุล</span>
        </div>
        </div>
          <div class="input-group input-group-icon">
          <div class="tooltip"><div class="titlefont">Telephone </div> <input type="text" name="tel" maxlength="10" data-toggle="tooltip" data-placement="top" >
          <div class="input-icon"><i class="fa fa-mobile-phone"></i></div>
          <span class="tooltiptext">หมายเลขโทรศัพท์ 10 หลัก</span>
        </div>
        </div>
         <div class="input-group input-group-icon">
          <div class="tooltip"><div  class="titlefont">E-mail </div> <input type="text" name="email" data-toggle="tooltip" data-placement="top" >
          <div class="input-icon"><i class="fa fa-envelope"></i></div>
          <span class="tooltiptext">example@mail.com</span>
        </div>
        </div>
    </div> 

        <div class="input-group">
          <div  class="titlefont">Gender </div>
          <input type="radio" name="gender" value="m" id="gender-male"/> 
          <label for="gender-male">Male</label>
          <input type="radio" name="gender" value="f" id="gender-female"/>
          <label for="gender-female">Female</label>          
        </div>
        <div class="input-group ">
          <div  class="titlefont">Birthdate </div>
          <select name="day">
            <option >Day</option>
            <?php
            for($d=1;$d<=31;$d++){
            echo "<option value='$d'>$d</option>";
           }
            ?>
          </select>

          <select name="month">
            <option >Month</option>
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
          </select>

          <select name="year">
            <option>Year</option>
            <?php
            for($i=1940;$i<=2010;$i++){
            echo "<option value='$i'>$i</option>";
           }
            ?>
          </select>
        </div>

      <div class="input-group ">
      <div  class="titlefont">Address </div>
      <textarea name="address" ></textarea>     
    </div>

    <div class="input-group ">
    <input class="input-file" id="my-file" type="file" name="picture">
    <label tabindex="0" for="my-file" class="input-file-trigger">Select a Profile ...</label>
      <p class="file-return"></p>
    </div>
    <div class="input-group ">
    <button class="button button1"> <i class="fa fa-chevron-circle-left"></i> ย้อนกลับ </button>  
    <button class="button button1">สมัครสมาชิก <i class="fa fa-chevron-circle-right"></i></button>  
    </div>




  </form>
</div>
    <script  src="js/registerjs.js"></script>
    <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

<script>
function show() {
    var p = document.getElementById('pwd');
    p.setAttribute('type', 'text');
}
function hide() {
    var p = document.getElementById('pwd');
    p.setAttribute('type', 'password');
}
var pwShown = 0;
document.getElementById("eye").addEventListener("click", function () {
    if (pwShown == 0) {
        pwShown = 1;
        show();
    } else {
        pwShown = 0;
        hide();
    }
}, 
false);
</script>




</body>

</html>