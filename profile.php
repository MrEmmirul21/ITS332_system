<?php
session_start();
if(!isset($_SESSION['userlogged']) || $_SESSION['userlogged'] !=1)
{
    header("Location: index.php");
}
if (isset($_SESSION['studentno']))
{
    include("connection.php");
    $studentno = $_SESSION['studentno'];
    $sql = "SELECT * FROM students s LEFT JOIN programs p ON s.programcode = p.programcode WHERE s.studentno = '".$studentno."'";
    $qry = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($qry);
    
    if ($row>0) 
    {
        $d = mysqli_fetch_assoc($qry);
        $programcode = isset($d['programcode']) ? $d['programcode']:'';
        $programname = isset($d['programcode']) ? $d['programcode']:'';
    }
}
?>
<html>
<body>
    <table border="1">
    <tr>
        <td colspan="3">Welcome <?php echo $_SESSION['studentname'];?>[<a href="plogout.php"]>Logout</a></td>
    </tr>
    <tr>
        <td colspan="3">Acess Type: <?php echo $_SESSION['userlevelname'];?></td>
    </tr>
    </table>
    <br />
    <table border="1" width="1000">
    <tr>
        <td width="1000"><a href="dashboard.php">Menu</a></td>
        <td width="900" rowspan="3">
            Student No  : <?php echo $_SESSION['studentno'];?><br />
            Name        : <?php echo $_SESSION['studentname'];?><br />
            Program Code: <?php echo $programcode; ?> <br />
            Program Name: <?php echo $programname; ?> <br />
        </td>
    </tr>
    <tr>
        <td><a href="profile.php">Profile</a></td>    
    </tr>
    <tr>
        <td><a href="list.php">List</a></td>    
    </tr>
    <?php 
    if($_SESSION['userlevelid'] == 2) 
    { ?> 
    <tr> <td><a href="program.php">Program</a></td></tr><?php 
    } ?>
    </table>
</body>
</html>