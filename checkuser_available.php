<?php
    include_once('functions.php');
    $usernamecheck = new db_con();
    
    $uname=$_POST['username'];
    $sql=$usernamecheck->usernamevailble($uname);

    $num=mysqli_num_rows($sql);
    //ถ้ามีidซ้ำกันก้จะทำให้ปุ่มregisterเป็นdisbled
    if($num>0){
        echo "<span style='color:red;'>Username alerdy associated with anotther account.</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>"; 
    }else{
        echo "<span style='color:gree;'>Username available for registration.</span>";
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }

?>