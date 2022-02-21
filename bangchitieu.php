<!DOCTYPE html>
<html>
<head>
    <script>tinymce.init({selector: '#mytextarea1'});
  </script>
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
      background-color: #4CAF50;
      color: white;
    }

  </style>
</head>
<body>
	<?php
      if(session_status() == PHP_SESSION_NONE){
          session_start();
      }
      GLOBAL $check;
      $check = 1;
	  	include('connect.php');
	  	GLOBAL $errr;
      include('update.php');
      include('delete.php');
      echo $errr;
	  	$user = $_SESSION['username'];
      $sql = "SELECT * FROM chitieu WHERE username = '$user'";
	  	$result = $connect->query($sql);
	  	if ($result->num_rows == 0) $check = 0;
	?>

  <?php if ($check == 1) {
    echo '
    <h3 style="color: #4CAF50; text-align: center;">NHẬT KÍ THU CHI</h3>
  	<div id="re" style="height: 300px; overflow-x: auto; overflow-y: auto;">
      <table id="bangso" align="center">
        <thead>
          <tr>
            <th style="width: 15%">Ngày</th>
            <th style="width: 5%">Loại</th>
            <th style="width: 20%">Số tiền</th>
            <th style="width: 45%;">Ghi chú</th>
            <th></th>
          </tr>
        </thead> '; 
      	$cnt = 0;
      	while ($row = $result->fetch_assoc()) {
        	echo '<tr>';
          	echo '<td>';
          	echo date_format(date_create($row['ngay']),"d/m/Y");
          	echo '</td>';
          	echo '<td>';
          	echo $row['thuvschi'];
          	echo '</td>';
          	echo '<td style="text-align: right;">';
          	echo number_format($row['tien']);
          	echo '</td>';
          	echo '<td>';
          	echo $row['ghichu'];
          	echo '</td>';
            echo '<td style="text-align: right">';
            echo '<text style="color: #4CAF50; margin-left: 10%;" class="delete" data-toggle="modal" data-target="#myModal1">Xóa';
            echo '<text style="display: none">'.$row['id'].'</text></text>';
            echo '<text style="color: #4CAF50; margin-left: 10%;" class="update" data-toggle="modal" data-target="#myModal">Chỉnh sửa';
            echo '<text style="display: none">'.$row['id'].'</text></text>';
            echo '</td>';
        	echo '</tr>';
            
          $x = $row['ngay'];
          $y = $row['thuvschi'];
          $z = $row['tien'];
          $zz = $row['ghichu'];
          $zzz = $row['id'];
          ++$cnt;
          $ngay[$cnt] = $x;
          $ngayy[$cnt] = date_format(date_create($row['ngay']),"d/m/Y");
          $thuchi[$cnt] = $y;
          $tien[$cnt] = $z;
          $ghichu[$cnt] = $zz;
          $idd[$cnt] = $zzz;
        }
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        GLOBAL $date;
        $dd = getdate();
        $bieudothangvsthang = $dd['mon'];
        $bieudothangvsnam = $dd['year'];
        $bieudonam = $dd['year'];
        if (isset($_POST['kiemtrathang'])) {
          $bieudothangvsthang = date_format(date_create($_POST['kiemtrathang']),"m");
          $bieudothangvsnam = date_format(date_create($_POST['kiemtrathang']),"Y");
        } 
        if (isset($_POST['yearr'])) $bieudonam = date_format(date_create($_POST['yearr']),"Y");
        echo '
      </table>
    </div>';
  } ?>

  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">XÓA NOTE</h4>
        </div>
        <div class="modal-body">
          <form style="margin-top: 10px;" method="post" >
            <input type="text" style="display: none" class="form-control" name="id" id="id"> 
            <h4>Bạn có muốn xóa note này hay không?</h4> 
            <div class="modal-footer">
              <button type="submit" class="btn btn-default">Xóa</button>
            </div>
          </form>
          
        </div>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">CHỈNH SỬA NOTE</h4>
        </div>
        <div class="modal-body">
          <form style="margin-top: 10px;" method="post" >
            <input type="text" style="display: none" class="form-control" name="id1" id="id1"> 
            <b>Ngày</b>  <input type="date" min="2019-01-01" max="today" class="form-control" name="date1"> 
            <div align="center" style="margin-top: 10px;">
              <input type="radio" name="note1" value="thu" checked "> Thu 
              <input style="margin-left: 30%;" type="radio" name="note1" value="chi"> Chi
            </div>
            <b>Số tiền</b>  <input class="form-control" style="margin-bottom: 5px;" type="number" min="0" name="notemoney1"> 
            <b>Ghi chú</b> <textarea id="mytextarea1" name="ghichu1"> </textarea> 
            <div class="modal-footer">
              <button type="submit" class="btn btn-default">Gửi</button>
            </div>
          </form>
          
        </div>
      </div>
      
    </div>
  </div>

  <div id="id"></div>

  <script>
    $(".delete").click(function () {
      var del = $(this).text();
      var n = del.length - 3; 
      del = del.substr(3, n);
      $("input#id").attr("value", del);
    });

    $(".update").click(function () {
      var id = $(this).text();
      var n = id.length - 9; 
      id = id.substr(9, n);

      $("input#id1").attr("value", id);
    });
  </script>

</body>
</html>