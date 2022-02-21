<?php 
  session_start();
  if (isset($_SESSION['username']) == 0) {
    header('Location: home.php');
    exit;
  }
  date_default_timezone_set("Asia/Ho_Chi_Minh");
  GLOBAL $date, $check, $err;
  $date = getdate(); 
  include('newpig.php');
  // if ($check == 1) {
  //     $check = 0;
  //    // echo $err;
  //     header('Location: sotay.php');
  // }
?>

<!doctype html>
<html>
<head>
  <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=3i25wzpm4ykrd43xem10l9z9qx8rj676er2n87z8255vp79v"></script>

  <script>tinymce.init({selector: '#mytextarea'});</script>
  <script>tinymce.init({selector: '#mytextarea1'});</script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sổ tay tiết kiệm</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <style type="text/css">
    header {
      margin-bottom: 40px;
    }

    .form-control {
      border: 1px solid #c0c0c0;
    }

    .content {
      margin: 30px 50px 30px 50px;
    }

    .img {
      margin: 0; 
      width: 40px; 
      height: 40px; 
      margin-top: 4px;
      float: right;
    }

    .hdh1 {
      width: 100%;
      color: #02A676; 
      font-weight: bold; 
      padding-left: 30px; 
    }
    
    .container {
      width: 65%;
    }

    .panel-heading {
      font-size: 30px;
    }
    .tablesotay {
      width: 600px;
      /*right: 30px;*/
      
      padding: 30px;
      padding-top: 10px;
      border: 2px solid #c0c0c0; 
      border-radius: 10px;
      float: center;

    }
    #bangso {
      width: 94%;

      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      align-content: center;
      

    }

    #bangso td, #bangso th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #bangso tr:nth-child(even){background-color: #f2f2f2;}

    #bangso tr:hover {background-color: #ddd;}

    #bangso th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }

    

    th.cot1 {
      width: 13%;
    }
    th.cot2 {
      width: 13%;
    }
    th.cot3, th.cot4  {
      width: 12%;
    }
   
    th.cot5 {
      width: 50%;
    }

    th {
      position: sticky; 
    }


    a:visited {
      color: white;
  }

    a:hover {
        text-decoration: none;
    }

    .footer {
      text-align: center;
      clear: both;
    }


    @media screen and (max-width: 1200px) {
      .img2 {
        width: 0px;
        height: 0px;
      }
    }

    @media screen and (max-width: 1000px) {
      .container {
        width: 60%;
      }

      .tablesotay {
        width: 100%;
      }
    }

    @media screen and (max-width: 600px) {
      .hdh1 {
        padding-left: 20px;
        font-size: 210%;
      }

      .container {
        width: 95%;
      }

      .content {
        margin: 30px 30px 30px 30px;
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
  <script type="text/javascript">
    $(document).ready(function(){
      $("#f2").hide();
      $("#c1").click(function(){
        $("#f1").show();
        $("#f2").hide();
      });
      $("#c2").click(function(){
        $("#f2").show();
        $("#f1").hide();
      });
    });
  </script>
</head>
<body>
   <header>
    <h1 class="hdh1">HỆ THỐNG QUẢN LÝ THU CHI</h1>
    <nav class="navbar navbar-inverse navbar-top" style="padding-right: 10px; font-size: 16px;">
      <a class="navbar-brand" href="home.php">HOME</a>
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
  <img src="img/background.png" align="right" class="img2">

  <div class="content">
    <h3>
      <?php 
        echo $date['weekday']." ".$date['mday']." /".$date['mon']."/ ".$date['year']."<br>";
      ?>
    </h3>
    <h4>
      <?php
        include('connect.php');
        $sql = "SELECT * FROM danhngon ORDER BY RAND() LIMIT 1";
        $result = $connect -> query($sql);
        $row = mysqli_fetch_array($result);
        echo '"'.$row['caunoi'].'"<br>'.'<b>'.$row['tacgia'].'</b>';
      ?>
    </h4>
    <button class="btn btn-primary fix" id="c1">Tạo heo</button>
    <button class="btn btn-primary fix" id="c2">Tạo ghi chú</button>
  </div>

  <div class="container" align="center" id="f1">
    <form class="tablesotay" method="post" style="text-align: left;">
      <h3 class="form-signin-heading" style="text-align: center; color: #ff6666; font-weight: bold;">TẠO HEO</h3>
      <b>Tên heo</b> <input type="text" class="form-control" name="pigname"  maxlength="20"placeholder="Tên heo(20)">
      <b>Mục tiêu tiết kiệm</b>  <input type="number" min="0" class="form-control" name="sotien" placeholder="Mục tiêu tiết kiệm">
      <b>Ngày bắt đầu tiết kiệm</b>  <input type="date" min="2019-01-01" class="form-control" name="batdau">
      <b>Ngày kết thúc tiết kiệm</b>  <input type="date" min="2019-01-01" class="form-control" name="ketthuc">
      <div align="center">
        <button class="btn btn-danger btn-block button" type="submit" style="margin-top: 15px; width: 100px;">Tạo heo</button>
      </div>
    </form>
  </div> 

  <div class="container" align="center" id="f2">
    <form class="tablesotay" method="post" style="text-align: left;">
      <h3 class="form-signin-heading" style="text-align: center; color: #337ab7; font-weight: bold;">GHI CHÚ TIẾT KIỆM</h3>
      <b>Tên heo</b> <input id="pigname1" type="text" class="form-control" name="pigname1" placeholder="Tên heo">
      <b>Số tiền tiết kiệm</b>  <input type="number" min="0" class="form-control" name="sotien1" placeholder="Số tiền">
      <?php 
        echo '<b style="margin-top: 20px;">Ngày </b>'. '<div class="form-control" style:>'.
        $date['mday']."/".$date['mon']."/".$date['year']."</div>";
      ?>
      <b> Nội dung tiết kiệm </b>
        <textarea id = "mytextarea1" name="noidung"> </textarea>
      <div align="center">
        <button class="btn btn-primary btn-block button" type="submit" style="margin-top: 15px; width: 100px;">Tạo ghi chú</button>  
      </div>
    </form>
  </div> 

  <div class="container" style="margin:20px; width: 80%; margin-left: 10%; overflow-x: auto; overflow-y: auto; text-align: center;">
    <?php 
      include('connect.php');
      $user = $_SESSION['username'];
      $sql = "SELECT * FROM pig WHERE username = '$user'";
      $result = $connect->query($sql);
      $cnt = 0;
      echo '<h3 style="color: #ff9999;"><b>Số heo của bạn là: '.$result->num_rows."</b></h3><br>";
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<div class="col-md-3" >';
          echo '<div onclick = "myFunction(this)"> <img src="img/pig.svg" style="width: 150px;">'.'<b style="font-size: 18px;"><br>';
          echo  '<div>'.$row['pigname'].'</div></div>'."</b>";
          echo '<div class="edit"><text data-toggle="modal" data-target="#myedit" style="font-size: 10px;">Đổi tên heo&#9997;</text>'.'<text style="display: none">'.$row['pigname'].'</text></div>';
          echo "</div>";
        }
      }
  
    ?>
  </div>
  
  <div class="modal fade" id="myedit" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          <form style="margin-top: 10px;" method="post">
            <input type="text" style="display: none;" class="form-control" name="npnedit" id="npnedit"> 
            <input type="text" class="form-control" name="npedit" id="npedit"> 
            <div class="modal-footer" align="center">
              <button type="submit" class="btn btn-default">Đổi tên</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="result"></div>

  <script type="text/javascript">
    function myFunction(tenheo) {
      var namepig = $(tenheo).find("div").text();
      $("input#pigname1").attr("value", namepig);
      $.get("bangheo.php", {namepig: namepig}, function(data) {
        $(".result").html(data);
      })
    }

    $(".edit").click(function () {
      var np = $(this).text();
      var n = np.length - 12;
      np = np.substr(12, n);
      $("input#npedit").attr("value", np);
      $("input#npnedit").attr("value", np);
    });
  </script>

 
  <div id="nhatki" style="margin-top: 20px; margin-bottom: 20px;">
    <h3 style="color: #337ab7; text-align: center;">NHẬT KÍ TIẾT KIỆM</h3>
    <?php  
      include('bangsotay.php');
    ?>
  </div>

  <footer class="footer" aline="center">
    <div style="padding-top: 5px; border-top: 1px solid #c0c0c0; margin-left: 20%; margin-right: 20%;">
    </div>  
    <i>Thiết kế bởi</i> <b>Đỗ Thụy Phương Vy</b> <i>&</i> <b>Trương Huỳnh Đại Long</b> 
  </footer> 
</body>
</html>
