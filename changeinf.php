<?php 
  GLOBAL $err;

  session_start();
  if (isset($_SESSION['username']) == 0) {
    header('Location: welcome.php');
    exit;
  }
  include('capnhatthongtin.php');

?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Đăng kí</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <style type="text/css">
  	body {
  		background: url(img/bia.png);
 		background-attachment: fixed;
  	}

    .cl {
      background: #efefef;
    }

    .button {
      margin-left: 25%;
      width: 50%;
    }

    .container {
      border: 1px solid #e5e5e5;
      background: white;
      padding-bottom: 25px;
      margin-top: 70px;
      margin-bottom: 50px;
      width: 500px;
    }

    @media screen and (max-width: 1000px) {
      .button {
        margin-left: 15%;
        width: 70%;
      }
    }


    @media screen and (max-width: 600px) {
      .container {
        border: 1px solid #e5e5e5;
        background: white;
        padding-bottom: 25px;
        margin-top: 70px;
        width: 80%;
      }
      /*.content {
        width: 90%;
        margin-left: 5%
      }*/
      h2 {
        font-size: 24px;
      }
    }

    @media screen and (max-width: 275px) {
      .container {
        width: 95%;
      }
      .button, #inputUser, #inputEmail{
        font-size: 13px;
      }
      .button{
        margin-left: 10%;
        width: 80%;
      }
      .content {
        width: 98%;
        margin-left: 1%
      }
      h2 {
        font-size: 22px;
      }
    }

  </style>
  <script>
    $(document).ready(function(){
      $("#cn").hide();
      $("#click1").click(function(){
        $("#cn").toggle();
      });          
    });
  </script>
</head>
<body>
  <div>
  <div class="container" style="padding-bottom: 20px; background-image: url(img/backgr.gif); ">
    <div class="center content" style="margin-top: 20px; ">
           
    	<div id="tt">
        <div align="center">
          <img src="img/iconun.svg" width="35%">
     	  <h4><b><?php echo '<text>'.$_SESSION['username'] ."</text>";?></b></h4>
     	  </div>
        <b>Họ tên</b> <br>  <?php echo '<text class="form-control cl">'.$_SESSION['fullname'] ."</text>";?>
        <b>Email</b> <br>  <?php echo '<text class="form-control cl">'.$_SESSION['email'] ."</text>";?>
        <b>Số điện thoại</b> <br>  <?php echo '<text class="form-control cl">'.$_SESSION['phone'] ."</text>";?>
        <div align="center">
          <button id="click1" type="button" class="btn btn-success" style="margin-top: 10px;">Cập nhật</button>
          <a href="home.php"><button type="button" class="btn btn-primary" style="margin-top: 10px;">Quay về trang chủ</button></a>
        </div>
      </div>
      <div id="cn">
        <form method="post">
          <div align="center">
            <h4><b>CẬP NHẬT THÔNG TIN</b></h4>
          </div>
          <b>Mật khẩu <text style="color: red;">*</text> </b>  <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
          <b>Họ tên</b>   <input type="text" class="form-control" name="fullname" placeholder="Họ tên">
          <b>Mật khẩu mới</b>  <input type="password" class="form-control" name="newpassword" placeholder="Mật khẩu mới">
          <b>Nhập lại mật khẩu</b>  <input type="password" class="form-control" name="renewpassword" placeholder="Nhập lại mật khẩu">
          <b>Email</b>        <input type="email" class="form-control" name="email" placeholder="Email">
          <b>Số điện thoại</b>  <input type="tel" class="form-control" name="phone" pattern="[0-9]{4}[0-9]{3}[0-9]{3}" placeholder="xxxx-xxx-xxx">
          <p style="text-align: center; color: red;">
            <?php
              if ($err == 3) echo "<script>alert('Vui lòng nhập đầu đủ thông tin');</script>";
              if ($err == 2) echo "<script>alert('Nhập thông tin cập nhật sai');</script>";
              if ($err == 1) echo "<script>alert('Nhập mật khẩu sai');</script>";
              if ($err == 4) echo "<script>alert('Lỗi kết nối');</script>";
              if ($err == 5) echo "<script>alert('Cập nhật thành công');</script>";
              if ($err == 6) echo "<script>alert('Thông tin cập nhật đã tồn tại');</script>";
            ?>
          </p>
          <div align="center">
            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Cập nhật</button>
          </div>
        </form>
      </div>
    </div> 
  </div> <!-- /container -->

  
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>

