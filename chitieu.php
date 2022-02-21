<?php 
  GLOBAL $errr;
  //if (isset($_POST[''])) echo "22";;
  if (isset($_POST['note']) && isset($_POST['notemoney']) && isset($_POST['ghichu'])) {
    include('connect.php');
    $da = date("Y-m-d");
    $kind = $_POST['note'];
    $mon = $_POST['notemoney'];
    $nd = $_POST['ghichu'];
    $user = $_SESSION['username'];
    //echo $user."   ". $da;
    if ($da == NULL || $kind == NULL || $mon == NULL || $nd == NULL) {
      echo "<script>alert('Vui lòng nhập đầu đủ thông tin');</script>";;
    } 
    else {
      $sql = "SELECT * FROM `chitieu` WHERE username='$user' AND 1";
      $id = mysqli_num_rows($connect -> query($sql)) + 1;
      $sql = "INSERT INTO chitieu (id, username, ngay, thuvschi, tien, ghichu)         
      VALUES ('$id', '$user', '$da', '$kind', '$mon', '$nd')";
      if ($connect->query($sql) === TRUE) {
         echo "<script>alert('Tạo note thành công');</script>";
      }
    }
  }
  
?>