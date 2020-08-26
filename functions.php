<?php
    define('db_Server','localhost');
    define('db_user','root');
    define('db_pass','');
    define('db_name','register_oop');

    class db_con{
        function __construct()
        {   //เชื่อมกับฐานข้อมูล
            $conn =mysqli_connect(db_Server,db_user,db_pass,db_name);
            $this->dbcon=$conn;
            //ถ้าerrorจะแสดงข้อความ
            if(mysqli_connect_error()){
                echo "Failed to connect to MYsql:" .mysqli_connect_error();
            }
        }//ดูข้อมูลในฐานข้อมูลว่ามีซำ้หันหรือไม
        public function usernamevailble($uname){
            $checkuser=mysqli_query($this->dbcon,"SELECT username FROM tbleuser WHERE username='$uname'");
            return $checkuser;
        }//เพิ่มข้อมูลในฐานข้อมูล
        public function registration($fname,$uname,$uemail,$password){
            $reg=mysqli_query($this->dbcon,"INSERT INTO tbleuser(fullname,username,useremail,password) 
            value('$fname','$uname','$uemail','$password')");
            return $reg;
        }//ตรวจสอบเวลาsigingว่าid password ตรงหรือไม
        public function sigin($uname,$password){
            $siginquery =mysqli_query($this->dbcon,"SELECT id,fullname FROM tbleuser WHERE username='$uname' AND password='$password'");
            return $siginquery;

        }
    }

?>