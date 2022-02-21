<?php 
  session_start();
  if (isset($_SESSION['username']) == 0) {
    header('Location: welcome.php');
    exit;
  }
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trang chủ</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <style type="text/css">
    header {
      margin-bottom: 40px;
    }

    .img {
      margin: 0; 
      width: 40px; 
      height: 40px; 
      margin-top: 4px;
      float: right;
    }

    .img2 {
      margin-right: 20px;
    }

    .hdh1 {
      width: 100%;
      color: #02A676; 
      font-weight: bold; 
      padding-left: 30px; 
    }
    
    .content {
      width: 65%;
      padding-left: 60px;
      font-size: 16px;
    }

    .panel-heading {
      font-size: 30px;
    }

    .footer {
      text-align: center;
      clear: both;
    }

    a:visited {
      color: white;
    }

    a:hover {
      text-decoration: none;
    }

    @media screen and (max-width: 600px) {
      .hdh1 {
        padding-left: 20px;
        font-size: 210%;
      }
      .content {
        padding-left: 30px;
      }

     header {
        margin-bottom: 30px;
      }
    }
    @media screen and (max-width: 1000px) {
      .content {
        width: 95%;
      }

      .img2 {
        width: 0px;
        height: 0px;
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
        padding-left: 10px;
      }

      .panel-heading {
        height: 50px;
        font-size: 24px;
      }

      .panel-body{
        font-size: 14px;
      }
    }

    @media screen and (max-width: 200px) {
      .fix {
        margin-bottom: 10px;
      }
    }
  </style>
</head>
<body>
  <header>
    <h1 class="hdh1">HỆ THỐNG QUẢN LÝ THU CHI</h1>
    <nav class="navbar navbar-inverse navbar-top" style="padding-right: 10px; font-size: 16px;">
      <a class="navbar-brand" href="">HOME</a>
      <a href="changeinf.php"><img src="img/iconun.svg" class="img" id="icon" align="right" style="margin-left: 10px"></a>
      <div class="navbar-header" >
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="quanlychitieu.php">Quản Lý Chi Tiêu</a></li>
          <li><a href="sotay.php">Sổ Tay Tiết Kiệm</a></li>
        </ul>
        <div class="navbar-form navbar-right">
          <a href="dangxuat.php"><button type="submit" class="btn btn-success" ><?php echo $_SESSION['fullname']; ?></button></a>
        </div>
      </div>
      
    </nav>
  </header>

  <div class="content">
    <div class="panel panel-default col-md-12" style="padding: 0px;">
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

  </div>
  <img src="img/background.png" align="right" class="img2" >
  
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
