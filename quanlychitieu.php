<?php 
  session_start();
  if (isset($_SESSION['username']) == 0) {
    header('Location: home.php');
    exit;
  }
  date_default_timezone_set("Asia/Ho_Chi_Minh");
  GLOBAL $date;
  $date = getdate();
  include('chitieu.php');
?>

<!doctype html>
<html>
<head>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Quản lý chi tiêu</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=3i25wzpm4ykrd43xem10l9z9qx8rj676er2n87z8255vp79v"></script>

  <script>tinymce.init({
    selector: '#mytextarea'
  });
  </script>
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
  <script src="bootstrap-3.4.0-dist/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <style type="text/css">
    header {
      margin-bottom: 20px;
    }

    .inp {
      margin-left: 45px; 
      height: 30px; 
      border-radius: 5px;
      border: 1px solid black;
      padding: 5px;
      width: 95%;
    }

    .content {
      margin: 30px 50px 30px 50px;
    }

    .tablesotay {
      width: 100%;
      padding: 30px;
      margin-top: 10px;
      padding-top: 10px;
      border: 2px solid #c0c0c0; 
      border-radius: 10px;

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
    
    .container {
      width: 50%;
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
    }

    @media screen and (max-width: 767px) {
      .fix {
        margin-bottom: 10px;
      }
    }
  </style>

  <script type="text/javascript">
    $(document).ready(function(){
      $("#cn2").hide();
      $("#cn3").hide();
      $("#c1").click(function(){
        $("#cn1").show();
        $("#cn2").hide();
        $("#cn3").hide();
      });

      $("#c2").click(function(){
        $("#cn2").show();
        $("#cn1").hide();
        $("#cn3").hide();
      });
      $("#c3").click(function(){
        $("#cn3").show();
        $("#cn1").hide();
        $("#cn2").hide();
      });
    });
  </script>
</head>
<body>
  <header>
    <h1 class="hdh1">HỆ THỐNG QUẢN LÝ THU CHI</h1>
    <nav class="navbar navbar-inverse navbar-top" style="padding-right: 10px; font-size: 16px;">
      <a class="navbar-brand" href="home.php">HOME</a>
      <a href="changeinf.php" ><img src="img/iconun.svg" class="img" id="icon" align="right" style="margin-left: 10px"></a>
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
          <li><a href="sotay.php">Sổ Tay Tiết Tiệm</a></li>
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
    <button class="btn btn-primary fix" id="c1">Tạo note</button>
    <button class="btn btn-primary fix" id="c2">Thống kê tháng</button>
    <button class="btn btn-primary fix" id="c3">Thống kê năm</button>
  </div>
  
  

  <div id="cn1" class="container" style="margin-bottom: 40px">
    <div class="tablesotay">
      <form style="margin-top: 10px;" method="post">
        <h3><b> <div style="text-align: center;"> TẠO NOTE </div></b></h3>
        <?php 
          echo '<b style="margin-top: 20px;">Ngày </b>'. '<div class="form-control" style:>'.
          $date['mday']."/".$date['mon']."/".$date['year']."</div>";
        ?>  
        <div align="center" style="margin-top: 10px;">
          <input type="radio" name="note" value="thu" checked "> Thu 
          <input style="margin-left: 30%;" type="radio" name="note" value="chi"> Chi
        </div>
        <b>Số tiền</b>  <input min="0" class="form-control" style="margin-bottom: 5px;" type="number" name="notemoney"> 
        <b>Ghi chú</b> <textarea id="mytextarea" name="ghichu"> </textarea> 
        <p style="text-align: center; color: red; margin: 10px;">
          <?php  
            if ($errr == 3) echo "Chưa nhập đầy đủ thông tin";
          ?>
        </p>
        <div align="center" >
          <input type="submit" class="btn btn-success" value="Gửi"></div>
      </form>
    </div>
  </div>
    


  <div id="cn2" >
    <form method="post">
      <h3> <div style="text-align: center;"> Tra cứu biểu đồ tháng </div> </h3>
      <div align="center"> <b>Tháng: </b> <input type="month" name="kiemtrathang" required> </div>
      <div align="center" style="margin-bottom: 50px; margin-top: 20px">
        <input type="submit" class="btn btn-success" name="Tìm kiếm">
      </div>
    </form>
    <div class="chart-container" style="position: relative; width: 100%; height: 100%">
       <canvas id="myChart"></canvas>
       
    </div>
    <h3> <div id = "thang" style="text-align: center;"></div> </h3>
  </div>

  <div id="cn3" >
    <form method="post">
      <h3> <div style="text-align: center;"> Tra cứu biểu đồ năm </div> </h3>
      <div align="center" style="margin-bottom: 20px"> <b>Năm: </b> <input type="month" name="yearr"> </div>
      <div align="center" style="margin-bottom: 50px">
        <input type="submit" class="btn btn-success" name="Tìm kiếm">
      </div>
    </form>
    <div class="chart-container" style="position: relative; width: 100%; height: 100%">
       <canvas id="myyChartt"></canvas>
    </div>
    <h3> <div id = "nam" style="text-align: center;"></div> </h3>
  </div>

  <?php include('bangchitieu.php') ?>
  <script>
    var n = "<?php echo $cnt ?>";
    var thoigian = <?php echo '["' . implode('", "', $ngay) . '"]' ?>;
    var kindd = <?php echo '["' . implode('", "', $thuchi) . '"]' ?>;
    var money = <?php echo '["' . implode('", "', $tien) . '"]' ?>;
    var note = <?php echo '["' . implode('", "', $ghichu) . '"]' ?>;
    var timee = <?php echo '["' . implode('", "', $ngayy) . '"]' ?>;
    var id = <?php echo '["' . implode('", "', $idd) . '"]' ?>;
    var bang = "";


    var bdthang_thang = "<?php echo $bieudothangvsthang ?>";
    var bdthang_nam = "<?php echo $bieudothangvsnam ?>";
    var bdnam = "<?php echo $bieudonam ?>";

    var i; var text = "";
    var x = 0;
    var athu = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    var achi = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    var thangnaythu = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    var thangnaychi = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    var day;
    var res = "";
    var x = athu[0];
    x+=2;
    res+= x + "<br>";
    var bieuthang = "Tháng ";
    bieuthang+= bdthang_thang + " Năm " + bdthang_nam; 
    document.getElementById("thang").innerHTML = bieuthang;
    var bieunam = "Năm ";
    bieunam+= bdnam;
    document.getElementById("nam").innerHTML = bieunam;
    var ans = 0;
    for (i = 0; i < n; ++i) {
      var dd = Date.parse(thoigian[i]);
      var ddd = new Date(dd);
      var month = ddd.getMonth();
      var year = ddd.getFullYear();
      day = ddd.getDate();
      console.log(month);
      console.log(year);
      console.log(day);
      console.log(money[i]);
      if (kindd[i] == 'thu') {
        var x = parseInt(money[i]);
        if (year == bdnam) {
          athu[month] += x;  
        }
        if ((month == bdthang_thang-1) && (year == bdthang_nam)) {
          thangnaythu[day-1]+= x;
        }
        //if (isNAN(athu[month])) res +="**";
      }
      else {
        var x = parseInt(money[i]);
        if (year == bdnam) {
          achi[month]+= x;
        }
        if ((month == bdthang_thang-1) && (year == bdthang_nam)) {
          thangnaychi[day-1]+= x;  
        }
      }
      res += day + "<br>";
    }
  </script>
  <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ['Ngày 1', 'Ngày 2', 'Ngày 3','Ngày 4','Ngày 5','Ngày 6','Ngày 7','Ngày 8','Ngày 9','Ngày 10','Ngày 11','Ngày 12','Ngày 13','Ngày 14','Ngày 15','Ngày 16','Ngày 17','Ngày 18','Ngày 19','Ngày 20','Ngày 21','Ngày 22','Ngày 23','Ngày 24','Ngày 25','Ngày 26','Ngày 27','Ngày 28','Ngày 29','Ngày 30','Ngày 31',],
            datasets: [{
                label: 'Tổng thu',
                backgroundColor: 'rgba(0, 128, 128, 0.3)',
                borderColor: 'rgba(0, 128, 128, 0.7)',
                data: thangnaythu
            }, {
                label: 'Tổng chi',
                backgroundColor: 'rgba(0, 128, 128, 0.7)',
                borderColor: 'rgba(0, 128, 128, 1)',
                data: thangnaychi
            }
            ]
        },

        // Configuration options go here
        options: {}
    });
  </script>

  <div>
    <script>
      var ctx = document.getElementById('myyChartt').getContext('2d');
      var chart = new Chart(ctx, {
        // The type of chart we want to create
          type: 'line',

          // The data for our dataset
          data: {
              labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
              datasets: [{
                  label: 'Tổng thu',
                  backgroundColor: 'rgba(0, 128, 128, 0.3)',
                  borderColor: 'rgba(0, 128, 128, 0.7)',
                  data: athu
              }, {
                  label: 'Tổng chi',
                  backgroundColor: 'rgba(0, 128, 128, 0.7)',
                  borderColor: 'rgba(0, 128, 128, 1)',
                  data: achi
              }
              ]
          },

          // Configuration options go here
          options: {}
      });
    </script>
  </div>

 

  <footer class="footer" aline="center">
    <div style="padding-top: 5px; border-top: 1px solid #c0c0c0; margin-left: 20%; margin-right: 20%;">
    </div>  
    <i>Thiết kế bởi</i> <b>Đỗ Thụy Phương Vy</b> <i>&</i> <b>Trương Huỳnh Đại Long</b> 
  </footer>
  
</body>
</html>
