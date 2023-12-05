<?php


session_start();

// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "itsystem";
$conn = new mysqli($servername, $username, $password, $dbname);

// Hàm xác thực người dùng
function authenticateUser($username, $password)
{
  global $conn;
  $query = "SELECT * FROM acc WHERE username = '$username' AND password = '$password' ";
  $result = $conn->query($query);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];

    $_SESSION['role'] = $row['role'];

    return true;
  }
  return false;
}

// Kiểm tra đăng nhập
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (authenticateUser($username, $password)) {
    if ($_SESSION['role'] == 'staff') {
      header('location:staff/staff.php');
    } elseif ($_SESSION['role'] == 'admin') {
      header('location:admin/adminhomepage.php');
    } elseif ($_SESSION['role'] == 'QAmanager') {
      header('location:QAM/qamanagerhomepage.php');
    } elseif ($_SESSION['role'] == 'QAcoordinator') {
      header('location:QAC/qacoordinatorhomepage.php');
    }
    exit();
  } else {
    $error = "Incorrect username or password ";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Sign in </title>
  <style>
    body {
      text-align: center;
      background-image: url("picture1.jpg");
      background-repeat: no-repeat;
      background-size: 100%;
    }

    .h {
      background-color: white;
      width: 300px;
      margin-left: auto;
      margin-right: auto;
      margin-top: 10%;
      height: 330px;
      color: #0d0d0d;
      border-radius: 5px;
    }

    div {
      margin-top: 10%;
      font-size: 20px;
    }

    input {
      color: #0d0d0d;
      font-size: 20px;
      border-radius: 5px;
    }
  </style>
</head>

<body>
  <div class="h">
    <h2>Sign in </h2>
    <?php if (isset($error)) { ?>
      <div>
        <?php echo $error; ?>
      </div>
    <?php } ?>
    <form method="post" action="">
      <div>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div>
        <input type="submit" name="submit" value="Login">
      </div>
    </form>
  </div>

</body>

</html>