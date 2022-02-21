<?php 
  GLOBAL $err;
  if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['repassword']) && isset($_POST['fullname'])  
    && isset($_POST['email']) && isset($_POST['phone'])) {
    include('connect.php');
    $u = $_POST['username'];
    $p = $_POST['password'];
    $rp = $_POST['repassword'];
    $fn = $_POST['fullname'];
    $e = $_POST['email'];
    $ph = $_POST['phone'];

    if ($u == NULL || $p == NULL || $rp == NULL || $fn == NULL || $p != $rp || $e == NULL || $ph == NULL) {
      $err = 3;
    } else {
      $sql = "SELECT * FROM accounts WHERE username = '$u' OR fullname = '$fn' OR email = '$e' OR phone = '$ph'";
      $result = $connect -> query($sql);
      if (mysqli_num_rows($result) > 0) {
        $err = 1;
      } else {
        $p = md5($p);
        $a = mb_strtolower($a, 'UTF-8');
        $sql = "INSERT INTO `accounts`(`username`, `password`, `fullname`, `email`, `phone`) 
        VALUES ('$u', '$p', '$fn', '$e', '$ph')";
        if ($connect->query($sql) == TRUE) {
          $_SESSION['username'] = $u;
          $_SESSION['password'] = $p;
          $_SESSION['fullname'] = $fn;
          $_SESSION['email'] = $e;
          $_SESSION['phone'] = $ph;
          header('Location: home.php');
          exit;
        } else $err = 2;
      }
    }
  }
  
?>