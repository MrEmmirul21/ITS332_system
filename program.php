<?php
session_start();
include("connection.php");
if(!isset($_SESSION['userlogged']) || $_SESSION['userlogged']!=1)
{
    header("Location: index.php");
}
?>
<html>
<body>
    <table border="1">
    <tr>
        <td colspan="3">Welcome <?php echo $_SESSION['studentname']; ?>[<a href="plogout.php">Logout</a>]</td>
    </tr>
    <tr>
        <td colspan="3">Access Type: <?php echo $_SESSION['userlevelname'];?></td>
    </tr>
    </table>
    <br />
    <table border="1" width="1000">
    <tr>
        <td width="100"><a href="dashboard.php">Menu</a></td>
        <td width="900" rowspan="3">
            <form id="register" name="register" method="post" action="pprogram.php">
                <table border="1">
                    <tr>
                        <td>Program code:</td>
                        <td><input type="text" name ="progcode" id="progcode" required/></td>
                    </tr>
                    <tr>
                        <td>Program Name:</td>
                        <td><input type="text" name="progname" id="progname" required/></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="btnsave" id="btnsave" value="Save" class="btn btn-info"/></td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
    <tr>
        <td><a href="profile.php">Profile</a></td>
    </tr>
    <tr>
        <td><a href="list.php">List</a></td>
    </tr>
        <?php
        if ($_SESSION['userlevelid'] == 2)
        { ?>
            <tr> <td><a href="program.php">Program</a></td></tr><?php
        } ?>       
    </table>
</body>
</html>