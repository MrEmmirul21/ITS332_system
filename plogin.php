<?php
include("connection.php");

$studno = mysqli_real_escape_string($conn, $_POST['studno']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT * FROM students s JOIN userlevels u ON u.userlevelid = s.userlevelid WHERE s.studentno = '".$studno."' AND s.studentpassword = '".md5($password)."'";
//echo $sql;
$qry = mysqli_query($conn,$sql);   //to perform the query on mysql
$row = mysqli_num_rows($qry);      

if($row>0)
{
    $r = mysqli_fetch_assoc($qry); //fetches a result row as an associative array
    session_start();
    $_SESSION['userlogged'] = 1;
    $_SESSION['studentno'] = $studno;
    $_SESSION['studentname'] = $r['studentname'];
    
    if ($r['userlevelid'] == "" || $r['userlevelid'] == 2 )
        $_SESSION['userlevelid'] = 2;
    else
        $_SESSION['userlevelid'] = $r['userlevelid'];
    
    $_SESSION['userlevelname'] = $r['userlevelname'];
    
    header("Location: dashboard.php");
}
else //if data is not found in db, it means user does not exist yet.
{
    echo "<script language='javascript'>alert('User does not exist.'); window.location='index.php';</script>";
}
?>