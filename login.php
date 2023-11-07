<?php 
    if (isset($_POST["username"])) {
      session_start();
      require"./conn.php";
      require"./func.php";
      $Username = $_POST['username'];
      $Password = $_POST['password'];
      $result = getpassThuThu($conn,$Username);
      mysqli_close($conn);
      if(isset($result)&& password_verify($Password, $result['password']))
          if(session_id()=== '' )
              session_start();
          $_SESSION["username"] =$_POST["username"];
          header("Location:index.php");
          exit();
      }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/register_login.css">
  <title>Document</title>
</head>

<body>
  <div class="form-main">
    <h1>Thủ thư đăng nhập</h1>
    <form method="post">
      <label for="username">Tên đăng nhập</label>
      <input type="text" name="username" id="username" placeholder="Nhập số điện thoại/email" required>
      <label for="password">Mật khẩu</label>
      <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" required>
      <div class="submit-btn">
        <button type="submit">Đăng nhập</button>
      </div>
    </form>
  </div>
</body>

</html>