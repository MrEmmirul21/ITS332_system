<?php
include("connection.php");

function checkProgramCode($conn,$progcode)
{
    $found = false;
    $sql = "SELECT programcode FROM programs WHERE programcode='".$progcode."'";
    $qry = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($qry);
    
    if($row > 0)
    {
        $found = true;
    }
    return $found;
}

$progcode = strtoupper($_POST['progcode']);
$progname = $_POST['progname'];

if (checkProgramCode($conn,$progcode)==true)
{
    echo "<script language='javascript'>alert('Program code has been used.');window.location='program.php';</script>";
}
else
{
    $sql = "INSERT INTO programs (programcode,programname) VALUES ('".$progcode."','".$progname."')";
    mysqli_query($conn,$sql);
    echo "<script language='javascript'>alert('Program has been saved.');window.location='dashboard.php';</script>";
}
?>
