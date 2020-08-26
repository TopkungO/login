<?php
session_start();
include_once('functions.php');
$userdata = new db_con();
if (isset($_POST['login'])) {
    $uname = $_POST['username'];
    $password = $_POST['password'];
    //ส่งค่าuname password ไป
    $result = $userdata->sigin($uname, $password);
    $num = mysqli_fetch_array($result);
    //ตรวจว่าid ว่าnum>0ไม เพื่อจะเข้าสู่ระบบ
    if ($num > 0) {
        $_SESSION['id'] = $num['id'];
        $_SESSION['fname'] = $num['fullname'];
        echo "<script>alert('login Successful!');</script>";
        echo "<script>window.location.href='welcome.php'</script>";
    } else {
        echo "<script>alert('something went wrong! please try again');</script>";
        echo "<script>window.location.href='sigin.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <h1 class="mt-5">login page</h1>
        <form method="post">

            <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" class="form-control" id="username" name="username">
                <span id="usernamevailble"></span>
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
    </div>

</body>

</html>