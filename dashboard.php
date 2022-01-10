<?php
session_start();
if(!isset($_SESSION['userlogged']) || $_SESSION['userlogged'] != 1)
   {
       header("Location: index.php");
   }
?>
<html>
<body>
    <table border="1">
        <tr> 
            <td colspan="3">Welcome<?php echo $_SESSION['studentname']; ?> [<a href = "plogout.php">Logout</a>]
            </td>
        </tr>
        <tr>
            <td colspan="3">Access Type: <?php echo $_SESSION['userlevelname'];?></td>
        </tr>
    </table>
        <br/>
    <table border="1" width="1000">
        <tr>
            <td width = "100"> <a href="dashboard.php">Menu</a> </td>
            <td width = "900" rowspan="3">//display important and summary data. Usually we use graphic and distinct colour scheme to show the data</td>
        </tr>
        <tr>
            <td><a href="profile.php">Profile</a></td>
        </tr>
        <tr>
            <td><a href="list.php">List</a></td>   
        </tr>
            <?php 
            if($_SESSION['userlevelid'] == 2){ 
            ?>
        <tr>
            <td><a href="program.php">Program</a></td>
        </tr>
            <?php } ?>
    </table>
</body>
</html>