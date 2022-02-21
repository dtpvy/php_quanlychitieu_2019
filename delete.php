<?php
  include('connect.php');
  if (isset($_POST['id'])) {
    $id = $_POST['id'];
    if(session_status() == PHP_SESSION_NONE){
      session_start();
    }
    $u = $_SESSION['username'];
    $sql = "DELETE FROM `chitieu` WHERE id = '$id'";
    $result = $connect -> query($sql);
    $sql = "SELECT * FROM `chitieu` WHERE username='$u' AND 1";
    $r = mysqli_num_rows($connect -> query($sql));
    for ($i=$id; $i <= $r; $i++) { 
      $cnt = $i + 1;
      $connect->query("UPDATE `chitieu` SET `id`='$i' WHERE username='$u' AND id ='$cnt'");
    }
    echo "<script>alert('Xóa thành công');</script>";
  }
?>