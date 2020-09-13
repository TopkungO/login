<?php
include_once('functions.php');
$userdata = new db_con();

if (isset($_POST['submit'])) { //เมื่อกดsubmitจะเรียกใช้งานฟั่งชั่น registration ที่function.php
    $fname = $_POST['fullname'];
    $uname = $_POST['username'];
    $uemail = $_POST['email'];
    $password = $_POST['password'];

    $sql = $userdata->registration($fname, $uname, $uemail, $password);
    //ตรวจสอบว่าฟั่งชั่นทำหรือไม ถ้าทำแล้วจะมีข้อความขึ้นและไปหน้าsigin.php
    if ($sql) {
        echo "<script>alert('register Successful!');</script>";
        echo "<script>window.location.href='sigin.php'</script>";
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>

<body>
    <div class="container">
        <h1 class="mt-5">register page</h1>
        <form method="post">

            <div class="form-group">
                <label for="fullname">fullname</label>
                <input type="text" class="form-control" id="fullname" name="fullname">
            </div>
            <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" class="form-control" id="username" name="username" onblur="checkusername(this.value)">
                <span id="usernameavailable"></span>
            </div>
            <div class="form-group">
                <label for="Email">email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" name="submit" id="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    <!--เรียกใช้ajaxเพื่อส่งค่าไปที่checkuser_available.php เพื่อตรวจสอบว่ามีชื่อซ่ำในฐานข้อมูลหรือไม-->
    <script>
        function checkusername(val) {
            $.ajax({
                type: 'POST',
                url: 'checkuser_available.php',
                data: 'username='+val,
                success: function(data) {
                    $('#usernameavailable').html(data);
                }
            });
        }
    </script>

</body>

</html>