<!DOCTYPE html>
<html>
<head>
  <style>
    #bangso1 {
      width: 94%;

      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      align-content: center;
      

    }

    #bangso1 td, #bangso1 th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    #bangso1 tr:nth-child(even){background-color: #f2f2f2;}

    #bangso1 tr:hover {background-color: #ddd;}

    #bangso1 th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #ff6666;
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

  </style>
</head>
<body>
<!--   <?php
  echo '  
  <div style="color: #ff9999; font-size: 28px" align="center">
    dd/mm/yyyy - dd/mm/yyyy <br>
    Tổng số tiền heo <i>công chúa</i> đã tiết kiệm là: 1,000/1,000 VND
  </div>
  <div id="re" style="height: 300px; overflow-x: auto; overflow-y: auto;">
    <table id="bangso" align="center">
      <thead>
        <tr>
          <th style="width: 15%">Ngày</th>
          <th style="width: 20%">Số tiền</th>
          <th style="width: 45%;">Nội dung tiết kiệm</th>
        </tr>
      </thead>
    </table>
  </div>';
  ?> -->
  <?php 
    if (isset($_GET['namepig'])) {
      if(session_status() == PHP_SESSION_NONE){
        session_start();
      }
      $np = $_GET['namepig'];
      include('connect.php');
      $user = $_SESSION['username'];
      $sql = "SELECT * FROM sotay WHERE username = '$user' AND pigname = '$np'";
      $result = $connect->query($sql);
      $tongtien = 0;
      while ($row = $result->fetch_assoc()) {
        $tongtien += $row['sotien'];
      }
      $sql = "SELECT * FROM pig WHERE username = '$user' AND pigname = '$np'";
      $res = $connect->query($sql);
      $row = mysqli_fetch_array($res);
    
      $tien = $row['muctieu'];
      $ngaybatdau = date_format(date_create($row['start']),"d/m/Y");
      $ngayketthuc= date_format(date_create($row['end']),"d/m/Y");
      
      $ch = "";
      if ($tongtien >= $tien) $ch = "&#10004;";
      echo '<div style="color: #ff9999; font-size: 28px" align="center">'.$ngaybatdau.' - '.$ngayketthuc;
      echo '  <b style="color: #4CAF50">'.$ch."</b><br>";
      echo "Tổng số tiền heo <i><b>".$np."</b></i> đã tiết kiệm là: ".$tongtien.'/'.$tien.'VND</div>';
      
      $sql = "SELECT * FROM sotay WHERE username = '$user' AND pigname = '$np'";
      $result = $connect->query($sql);
      $cnt = 0;
      $tongtien = 0;
      if (mysqli_num_rows($result) > 0) {
        echo '  
        <div style="height: 300px; overflow-x: auto; overflow-y: auto;">
          <table id="bangso1" align="center">
            <thead>
              <tr>
                <th style="width: 15%">Ngày</th>
                <th style="width: 20%">Số tiền</th>
                <th style="width: 45%;">Nội dung tiết kiệm</th>
              </tr>';            
        while ($row = $result->fetch_assoc()) {
          echo '<tr>';
          echo '<td>';
          echo date_format(date_create($row['day']),"d/m/Y");
          echo '</td>';
          echo '<td style="text-align: right;">';
          echo number_format($row['sotien']);
          echo '</td>';
          echo '<td>';
          echo $row['noidung'];
          echo '</td>';
          echo '</tr>';
        }
        echo '</thead>
            </table>
          </div>';
      }
    }
  ?> 
  
</body>
</html>