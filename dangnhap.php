<?php 
  GLOBAL $err2;
  if (isset($_POST['taikhoan']) && isset($_POST['matkhau'])) {
    include('connect.php');
    $u = $_POST['taikhoan'];
    $p = $_POST['matkhau'];
    if ($u == NULL || $p == NULL) {
      $err2 = 3;
    } else {
      $sql = "SELECT * FROM accounts WHERE username = '$u'";
      $result = $connect -> query($sql);

      if (mysqli_num_rows($result) == 0) {
    	$err2 = 2;
      } else {
        $p = md5($p);
        $row = mysqli_fetch_array($result);
        if ($p != $row['password']) {
        	$err2 = 2;
        } else {
        	$_SESSION['username'] = $u;
        	$_SESSION['password'] = $p;
        	$_SESSION['fullname'] = $row['fullname'];
        	$_SESSION['email'] = $row['email'];
        	$_SESSION['phone'] = $row['phone'];
        	header('Location: home.php');
          exit;
      	}
      }
    }
  } 
?>