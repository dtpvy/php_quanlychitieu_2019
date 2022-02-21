<?php 
  GLOBAL $err;
   if(session_status() == PHP_SESSION_NONE){
      session_start();
  }
  if (isset($_POST['pigname']) && isset($_POST['sotien']) && isset($_POST['batdau'])  
    && isset($_POST['ketthuc'])) {
    $check = 1;
    include('connect.php');
    $pig = $_POST['pigname'];
    $mon = $_POST['sotien'];
    $bd = $_POST['batdau'];
    $kt = $_POST['ketthuc'];
    $user = $_SESSION['username'];
    if ($pig == NULL || $mon == NULL || $bd == NULL || $kt == NULL) {
      echo "<script>alert('Chưa nhập đầy đủ thông tin');</script>";
    } 
    else if (strtotime($bd) > strtotime($kt)) echo "<script>alert('Ngày bắt đầu và kết thúc không hợp lệ');</script>";
    else {
      $sql = "SELECT * FROM pig WHERE username = '$user' AND pigname = '$pig'";
      $result = $connect -> query($sql);
      if (mysqli_num_rows($result) > 0) echo "<script>alert('Tên heo đã tồn tại');</script>";
      else {
        $sql = "INSERT INTO pig (username, pigname, start, end, muctieu)         
        VALUES ('$user', '$pig', '$bd', '$kt', '$mon')";
        if ($connect->query($sql) == TRUE) {
          echo "<script>alert('Tạo heo thành công');</script>";
        }
      }
    }
  }

  if (isset($_POST['pigname1']) && isset($_POST['sotien1']) && isset($_POST['noidung'])) {
    include('connect.php');
    $check = 1;
    $pig = $_POST['pigname1'];
    $mon = $_POST['sotien1'];
    $nd = $_POST['noidung'];
    $da = date("Y-m-d");
    $user = $_SESSION['username'];
    if ($pig == NULL || $mon == NULL || $nd == NULL) {
      echo "<script>alert('Chưa nhập đầy đủ thông tin');</script>";
    } 
    else {
      $sql = "SELECT * FROM pig WHERE username = '$user' AND pigname = '$pig'";
      $result = $connect -> query($sql);
      if (mysqli_num_rows($result) == 0) echo "<script>alert('Tên heo không tồn tại');</script>";
      else {
        $row = mysqli_fetch_array($result);
        if (strtotime($da) > strtotime($row['end'])) echo "<script>alert('Heo đã đập rồi. Tạo heo mới thôi!');</script>";
        else {
          $sql = "INSERT INTO sotay (username, sotien, noidung, day, pigname)         
          VALUES ('$user', '$mon', '$nd', '$da', '$pig')";
          if ($connect->query($sql) == TRUE) {
            echo "<script>alert('Tạo ghi chú thành công');</script>";
          }
        }
      }
    }
  }

  if (isset($_POST['npedit'])) {
    include('connect.php');
    $pig = $_POST['npedit'];
    $np = $_POST['npnedit'];
    $user = $_SESSION['username'];
    if ($pig == NULL) {
      echo "<script>alert('Chưa nhập đầy đủ thông tin');</script>";
    } else {
      $sql = "SELECT * FROM pig WHERE username = '$user' AND pigname = '$pig'";
      $result = $connect -> query($sql);
      if (mysqli_num_rows($result) > 0) echo "<script>alert('Tên heo đã tồn tại');</script>";
      else {
        $sql = "UPDATE `sotay` SET `pigname`= '$pig' WHERE username = '$user' AND pigname = '$np'";
        $result = $connect -> query($sql);
        $sql = "UPDATE `pig` SET `pigname`= '$pig' WHERE username = '$user' AND pigname = '$np'";
        $result = $connect -> query($sql);         
        echo "<script>alert('Chỉnh sửa thành công');</script>";
      }
    }
  }

?>

