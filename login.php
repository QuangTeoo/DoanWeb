<?php 
    if(session_id() === '' )
      session_start();
    if (isset($_GET["logout"]))
      unset($_SESSION["maThuthu"]);
    if (isset($_POST["username"])) {
      require"./conn.php";
      require"./func.php";
      $username = $_POST['username'];
      $password = $_POST['password'];
      $result = getThuThu($conn,$username);
      mysqli_close($conn);
      if(isset($result) && password_verify($password, $result['matKhau'])) {
          $_SESSION["maThuthu"] = $_POST["username"];
          $_SESSION["tenThuThu"] = $result["tenThuthu"];
          header("Location: index.php");
          exit();
        } else {
?>
          <script>alert("Sai mật khẩu hoặc Tài khoản. Vui lòng nhập lại!")</script>
<?php 
        }
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