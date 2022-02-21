<?php 
  //session_start();
  if (isset($_SESSION['username']) == 0) {
    header('Location: home.php');
    exit;
  }
  date_default_timezone_set("Asia/Ho_Chi_Minh");
  GLOBAL $datee;
  $datee = getdate();
  //echo "string";
?>

<!DOCTYPE html>
<html>
<head>
  <style>
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
      background-color: #337ab7;
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
  <?php 
    include('connect.php');
    $user = $_SESSION['username'];
    $sql = "SELECT * FROM sotay WHERE username = '$user'";
    $result = $connect->query($sql);
    if ($result->num_rows > 0) {
      $tongtien = 0;
      echo '
      <div style="height: 300px; overflow-x: auto; overflow-y: auto;">
        <table id="bangso" align="center" >
          <tr>
            <th class="cot1">Tên heo</th>
            <th class="cot3">Ngày</th>
            <th class="cot2">Số tiền</th>
            <th class="cot5">Nội dung</th> '; 
            while ($row = $result->fetch_assoc()) {
              echo '<tr>';
              echo '<td>';
              echo $row['pigname'];
              echo '</td>';
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
          echo '
          </tr>
        </table>
      </div> ';
    }
  ?>
</body>
</html>
