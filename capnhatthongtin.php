<?php  
  $epw = 0; $ee = 0; $ef = 0; $eph = 0; $dem = 0;
  include('connect.php');
  if (isset($_POST['password'])+isset($_POST['newpassword'])+isset($_POST['renewpassword'])+isset($_POST['fullname'])+
    isset($_POST['email'])+isset($_POST['phone']) >= 1) {
    $u = $_SESSION['username'];
    $p = $_POST['password'];
    $np = $_POST['newpassword'];
    $rnp = $_POST['renewpassword'];
    $f = $_POST['fullname'];
    $e = $_POST['email'];
    $ph = $_POST['phone'];
    if ($p == NULL && ($p != NULL || $np != NULL || $e != NULL || $ph != NULL || $f != NULL)) $err = 3;
    if ($p != NULL) {
      $sql = "SELECT * FROM accounts WHERE username = '$u'";
      $result = $connect -> query($sql);
      $row = mysqli_fetch_array($result);
      $p = md5($p);
      if ($p != $row['password']) $err = 1;
      else {
        $epw = -1; $ee = -1; $ef = -1; $eph = -1;
        if (!($np == NULL && $rnp == NULL)) {
          $epw = 0; ++$dem;
          if ($np == NULL || $rnp == NULL) {
            $err = 3;
          } else {
            if ($np != $rnp) $err = 2;
            else {
              $epw = 1;
            }
          }
        }
      }

      if ($e != NULL) {
        $ee = 0;  ++$dem;
        if (abs($epw) == 1) {
          $sql1 = "SELECT * FROM accounts WHERE email = '$e'";
          $result1 = $connect -> query($sql1);
          if ($e != $_SESSION['email']) {
            if (mysqli_num_rows($result1) > 0) {
              $err = 6;
              $row = mysqli_fetch_array($result1);
              echo $row['username']. "ascsac".$row['email'];
            }
            else {
              $ee = 1;
            }
          } else $ee = -1;
        }
      }

      if ($f != NULL) {
        $ef = 0;  ++$dem;
        if (abs($epw) + abs($ee) == 2) {
          $sql1 = "SELECT * FROM accounts WHERE fullname = '$f'";
          $result1 = $connect -> query($sql1);
          if ($f != $_SESSION['fullname']) {
            if (mysqli_num_rows($result1) > 0) {
              $err = 6;
              $row = mysqli_fetch_array($result1);
              echo $row['username']. "asascsac";
            }
            else {
              $ef = 1;
            }
          } else $ef = -1;
        }
      }

      if ($ph != NULL) {
        $eph = 0; ++$dem;
        if (abs($epw) + abs($ee) + abs($ef) == 3) {
          $sql1 = "SELECT * FROM accounts WHERE phone = '$ph'";
          $result1 = $connect -> query($sql1);
          if ($ph != $_SESSION['phone']) {
            if (mysqli_num_rows($result1) > 0) {
              $err = 6;
              $row = mysqli_fetch_array($result1);
              echo $row['username']. "ascascascasc";
            }
            else {
              $eph = 1;
            }
          } else $eph = -1;
        }
      }
    }

    if (abs($epw) + abs($ee) + abs($ef) + abs($eph) == 4 && $dem > 0) {
      $err = 5;
      if ($epw == 1) {
        $np = md5($np);
        $sql = "UPDATE accounts SET password = '$np' WHERE username = '$u'";
        $result = $connect -> query($sql);
        if ($result) {
          $_SESSION['password'] = $np;
        }
      }

      if ($ee == 1) {
        $sql = "UPDATE accounts SET email = '$e' WHERE username = '$u'";
        $result = $connect -> query($sql);
        if ($result) {
          $_SESSION['email'] = $e; 
        }
      }

      if ($ef == 1) {
        $sql = "UPDATE accounts SET fullname = '$f' WHERE username = '$u'";
        $result = $connect -> query($sql);
        if ($result) {
          $_SESSION['fullname'] = $f; $err = 5;
        }
      }

      if ($eph == 1) {
        $sql = "UPDATE accounts SET phone = '$ph' WHERE username = '$u'";
        $result = $connect -> query($sql);
        if ($result) {
          $_SESSION['phone'] = $ph; 
        }
      }
    } 
  } 

  
?>

