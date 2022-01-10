<?php
include("connection.php");

function checkStudentNo($conn, $studno)
{
    $found = false;
    $sql = "SELECT studentno FROM students WHERE studentno = '".$studno."'";
    $qry = mysqli_query($conn,$sql); //performs a query against a db
    $row = mysqli_num_rows($qry);    
    
    if($row > 0)
    { 
        $row = true; 
    }  
    return $found;   
}
//these data retrieve from the register.php
$studno = $_POST['studno'];
$studname = $_POST['studname'];
$studpasssword = $_POST['pass1'];
$userlevelid = 1;

//to check whether student no is already exist or not
if (checkStudentNo($conn, $studno)==true)          //if exist
{
    echo "<script language = 'javascript'>alert('Student no is already exist.');window location ='register.php'</script>";
}
else                                               //if not exist
{
    $sql = "INSERT INTO students (studentno,userlevelid,studentname,studentpassword) VALUES ('".$studno."',".$userlevelid.",'".$studname."','".md5($studpasssword)."')";
    
    //echo $sql; 
    mysqli_query($conn,$sql);//pass the query to the db
    echo"<script language='javascript'>alert('Registration is success,');window.location='index.php';</script>";
}
?>