<?php 
  if (isset($_POST['note1']) && isset($_POST['notemoney1']) && isset($_POST['ghichu1']) && isset($_POST['date1']) && isset($_POST['id1'])){
    $da = $_POST['date1'];
    $kind = $_POST['note1'];
    $mon = $_POST['notemoney1'];
    $nd = $_POST['ghichu1'];
    if(session_status() == PHP_SESSION_NONE){
      session_start();
    }
    $user = $_SESSION['username'];
    $id = $_POST['id1'];
    if ($da == NULL || $kind == NULL || $mon == NULL || $nd == NULL || $id == NULL) {
      $errr = "<script>alert('Vui lòng nhập đầu đủ thông tin');</script>";
    } 
    else {
      $sql = "UPDATE `chitieu` SET ngay='$da' ,thuvschi= '$kind', tien = $mon, ghichu = '$nd' WHERE username='$user' AND id='$id'";
      if ($connect->query($sql) === TRUE) {
        $errr = "<script>alert('Chỉnh sửa thành công');</script>";
      }

    }
  }
  
?>