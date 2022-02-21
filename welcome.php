<?php 
  GLOBAL $err;
  session_start();
  if (isset($_SESSION['username'])) {
    header('Location: home.php');
    exit;
  }
  include('dangnhap.php');
  include('dangki.php');
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trang chủ</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <style type="text/css">
    header {
      margin-bottom: 40px;
    }

    .hdh1 {
      width: 100%;
      color: #02A676; 
      font-weight: bold; 
      padding-left: 30px; 
    }
    
    .content {
      margin-left: 50px;
      font-size: 16px;
    }

    .dangki {
      width: 25%;
      position: absolute;
      right: 30px;
      padding: 30px;
      padding-top: 10px;
      border: 2px solid #c0c0c0; 
      border-radius: 10px;
    }

    .panel-heading {
      font-size: 30px;
    }

    .footer {
      text-align: center;
      clear: both;
    }

    @media screen and (min-width: 1200px) {
      .footer {
        margin-right: 300px;
      }
    }

    @media screen and (max-width: 1000px) {
      .dangki {
        width: 60%;
        margin-left: 20%;
        padding: 10px;
        border: 0px;
        border-top: 2px solid #c0c0c0; 
        border-radius: 0px;
        position: static;

      }

      .content {
        margin-right: 50px;
      }
    }

    @media screen and (max-width: 600px) {
      .hdh1 {
        padding-left: 20px;
        font-size: 210%;
      }

      header {
        margin-bottom: 30px;
      }
    }

    @media screen and (max-width: 470px) {
      .hdh1 {
        padding-left: 20px;
        font-size: 150%;
      }

    @media screen and (max-width: 400px) {
      header {
        margin-bottom: 0px;
      }

      .content {
        margin-left: 20px;
        margin-right: 20px;
      }

      .panel-heading {
        height: 50px;
        font-size: 24px;
      }

      .panel-body{
        font-size: 14px;
      }

      .dangki {
        width: 80%;
        margin-left: 10%;
      }
    }

  </style>
</head>
<body>
  <header>
    <div align="right">
      <h1 class="hdh1" style="text-align: left;">HỆ THỐNG QUẢN LÝ THU CHI</h1>
      <text style="color: red;">
        <?php  
          if ($err2 == 3) echo "<script>alert('Chưa nhập đầu đủ thông tin');</script>";
          if ($err2 == 2) echo "<script>alert('Tài khoản hoặc mật khẩu sai');</script>";
        ?>
      </text>
    </div>
    <nav class="navbar navbar-inverse navbar-top" style="padding-right: 20px; font-size: 16px;">
      <div>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">HOME</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" style="padding-right: 0px;" method="post">
            <div class="form-group">
              <input type="text" placeholder="Tên đăng nhập" class="form-control" name="taikhoan">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Mật Khẩu" class="form-control" name="matkhau">
            </div>
            <button type="submit" class="btn btn-success">Đăng nhập</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
  </header>

  
  <div class="panel panel-default col-md-8 content" style="padding: 0px;">
    <div class="panel-heading">
      <text>Hướng dẫn</text>
    </div> 
    <div class="panel-body" style="text-align: justify;">
      <p>
        Để sử dụng các tính năng các bạn hãy đăng nhập vào hệ thống nhé! <br>
        Nếu bạn chưa có tài khoản, bạn có thể đăng kí tại form đăng kí trong trang chủ hoặc đăng kí qua link "<b><a target="_blank" href="https://htqlthuchichtin1720.000webhostapp.com/formdangki.php" style="color: #0099ff;">formdangki</a></b>". <br>
        Ấn vào icon user trên thanh menu để cập nhật thông tin. <br>
        Ấn vào nút xanh kế bên icon user để đăng xuất. <br>
        Nếu bạn quên mật khẩu xin liên hệ với admin qua địa chỉ emai dtpvy0202@gmail.com hoặc thdailong@gmail.com <br>
      </p>
      <p>
      -Chức năng quản lý chi tiêu sẽ giúp bạn ghi lại những ghi chú thu và chi vào ngày hiện tại và được ghi thành dạng bảng ở dưới cùng của trang. Ngoài ra bạn còn có thể trực tiếp chỉnh sửa hoặc xóa các ghi chú thu chi trên bẳng bằng cách click vào chữ  “Xóa”, “Chỉnh sửa” nằm ở cột ngoài cùng bên phải. Bạn còn có thể xem biểu đồ thu chi của các tháng và các năm để theo dõi quá trình chi tiêu của mình.
      </p>
      <p>
      -Chức năng sổ tay tiết kiệm có tác dụng cho bạn biết về những con heo tiết kiệm và nhật ký tiết kiệm của bạn. Con heo tiết kiệm cho biết mục đích, mục tiêu, thời hạn tiết kiệm. Để theo dõi quá trình cũng như tiến độ tiết kiệm của từng con heo, bạn chỉ cần click vào tên con heo mà bạn muốn xem. Nhật ký tiết kiệm cho bạn biết cả quá trình tiết kiệm.
      </p>
    </div>
  </div>

  <div class="dangki" align="center" style="text-align: left; margin-bottom: 20px;">
    <form method="post">
      <h2 class="form-signin-heading" style="text-align: center; color: #337ab7; font-weight: bold;">ĐĂNG KÍ</h2>
      <b>Tên đăng nhập</b> <input type="text" class="form-control" name="username" placeholder="Tên đăng kí">
      <b>Mật khẩu</b>      <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
      <b>Nhập lại mật khẩu</b>      <input type="password" class="form-control" name="repassword" placeholder="Mật khẩu">
      <b>Họ tên</b>        <input type="text" class="form-control" name="fullname" placeholder="Họ tên">
      <b>Email</b>        <input type="email" class="form-control" name="email" placeholder="Email">
      <b>Số điện thoại</b>  <input type="tel" class="form-control" name="phone" pattern="[0-9]{4}[0-9]{3}[0-9]{3}" placeholder="xxxx-xxx-xxx">
      <p style="text-align: center; color: red; margin: 5px;">
        <?php  
          if ($err == 3) echo "Chưa nhập đầu đủ thông tin hoặc nhập sai";
          if ($err == 2) echo "Lỗi kết nối";
          if ($err == 1) echo "Tài khoản đã tồn tại";
        ?>
      </p>
      <div align="center" style="margin-top: 15px;" >
        <button class="btn btn-primary btn-block button" type="submit" style="width: 40%;">Đăng kí</button>
      </div>
    </form>
  </div> 
    
  <footer class="footer" aline="center">
    <div style="padding-top: 5px; border-top: 1px solid #c0c0c0; margin-left: 20%; margin-right: 20%;">
    </div>  
    <i>Thiết kế bởi</i> <b>Đỗ Thụy Phương Vy</b> <i>&</i> <b>Trương Huỳnh Đại Long</b> 
  </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="bootstrap-3.4.0-dist/js/bootstrap.min.js"></script>
</body>
</html>
