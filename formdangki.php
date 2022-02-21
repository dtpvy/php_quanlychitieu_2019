<?php 
  GLOBAL $err;
  session_start();
  include('dangki.php');
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
  <style type="text/css">
    body {
      background: url(img/bia.png);
    background-attachment: fixed;
    }

    .content {
      width: 80%;
      margin-left: 10%
    }

    .button {
      width: 100px;
    }

    .container {
      border: 1px solid #e5e5e5;
      background: white;
      padding-bottom: 25px;
      margin-top: 70px;
      margin-bottom: 50px;
      width: 430px;
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
</head>
<body style="text-align: center; background-color: #f5f5f5;">

  <div class="container" style="background-image: url(img/anh2.gif);"">
    <div class="center content" >
      <form method="post" style="text-align: left;">
        <h2 class="form-heading" style="text-align: center;">ĐĂNG KÍ</h2>
        <b>Tên đăng nhập</b> <input type="text" class="form-control" name="username" placeholder="Tên đăng nhập">
        <b>Mật khẩu</b>      <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
        <b>Nhập lại mật khẩu</b>      <input type="password" class="form-control" name="repassword" placeholder="Nhập lại mật khẩu">
        <b>Họ tên</b>        <input type="text" class="form-control" name="fullname" placeholder="Họ tên">
        <b>Email</b>        <input type="email" class="form-control" name="email" placeholder="Email">
        <b>Số điện thoại</b>  <input type="tel" class="form-control" name="phone" pattern="[0-9]{4}[0-9]{3}[0-9]{3}" placeholder="xxxx-xxx-xxx">
        <p style="text-align: center; color: red; margin-top: 10px;">
          <?php  
            if ($err == 3) echo "Chưa nhập đầu đủ thông tin hoặc nhập sai";
            if ($err == 2) echo "Lỗi kết nối";
            if ($err == 1) echo "Tài khoản đã tồn tại";
          ?>
        </p>
        <div align="center">
          <button class="btn btn-lg btn-primary btn-block button" type="submit" style="margin-top: 15px;" >Đăng kí</button>
        </div>
        
      </form>
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

