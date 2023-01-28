<?php
include("connection.php");

$studno = $_POST['studentno'];
$studname = $_POST['studentname'];
$progcode = $_POST['programcode'];

if($studname == "")
{
    echo "<script language='javascript'>alert('Please enter student name.');window.location='update.php';</script>"; 
}
else 
{
    $sql = "UPDATE students SET studentname = '".$studname."', programcode = '".$progcode."' WHERE studentno = '".$studno."'";
    mysqli_query($conn,$sql);
    echo "<script language='javascript'>alert('Student Profile has been updated.');window.location='dashdoard.php';</script>";
}
?>
