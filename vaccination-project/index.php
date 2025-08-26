<?php
include("config.php");

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['role'] = $row['role'];

        if($row['role'] == 'admin'){
            header("Location: admin/dashboard.php");
        } elseif($row['role'] == 'parent'){
            header("Location: parent/dashboard.php");
        } elseif($row['role'] == 'hospital'){
            header("Location: hospital/dashboard.php");
        }
    } else {
        echo "Invalid Login!";
    }
}
?>

<form method="post">
  <input type="text" name="email" placeholder="Email"><br>
  <input type="password" name="password" placeholder="Password"><br>
  <button type="submit" name="login">Login</button>
</form>
