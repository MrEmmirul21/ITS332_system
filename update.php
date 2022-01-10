<?php
session_start();
include("connection.php");
if(!isset($_SESSION['userlogged']) || $_SESSION['userlogged'] !=1)
{
    header("Location: index.php");
}
if(!isset($_SESSION['studentno']))
{
    $studentno = $_SESSION['studentno'];
    $sql = "SELECT * FROM students s LEFT JOIN programs p ON s.programcode = p.programcode WHERE s.studentno = '".$studentno."'";
    $qry = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($qry);
    
    if($row>0)
    {
        $d = mysqli_fetch_assoc($qry);
        $studentname = $d['studentname'];
        $programcode = isset($d['programcode']) ? $d['programcode']: '';
        $programname = isset($d['programname']) ? $d['programname']: '';
    }
}
?>
<html>
<body>
    <table border="1">
    <tr>
        <td colspan="3">Welcome <?php echo $_SESSION['studentname']; ?>[<a href="plogout.php">Logout</a>]</td>
    </tr>
    <tr>
        <td colspan="3">Access type: <?php echo $_SESSION['userlevelname'];?></td>
    </tr>
    </table>
    <br />
    <table border="1" width="1000">
    <tr>
        <td width="100"><a href="dashboard.php">Menu</a></td>
        <td width="900" rowspan="3">
            <form id="register" name="register" method="post" action="pupdate.php">
                <table border="1">
                    <tr>
                        <td>Student No:</td>
                        <td><input type="text" name="studno" id="studno" value="<?php echo $_SESSION['studentno']; ?>" readonly> </td>
                    </tr>
                    <tr>
                        <td>Student name:</td>
                        <td><input type="text" name="studname" value="<?php echo $_SESSION['studentname']; ?>" required/></td>
                    </tr>
                    <tr>
                        <td>Programme code:</td>
                        <td>
                            <select name="progcode" id="progcode" required>
                                <?php
                                $sqlProgram = "SELECT * FROM programs ORDER BY programcode ASC";
                                $qryProgram = mysqli_query($conn,$sqlProgram);
                                $rowProgram = mysqli_num_rows($qry);
                                
                                if($rowProgram>0)
                                {
                                    while($dProgram = mysqli_fetch_assoc($qryProgram))
                                    {
                                        if ($programcode == $d['programcode'])
                                            echo "option value='".$dProgram['programcode']."' selected>".$dProgram['programname']."</option>";
                                        else
                                            echo "<option value='".$dProgram['programcode']."'>".$dProgram['programname']."</option";
                                    }
                                 }
                                 ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="btnupdate" id="btnupdate" value="Update" class="btn btn-info" /></td>
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
    if($_SESSION['userlevelid']==2)
    { ?>
        <tr> <td><a href="program.php">Program</a></td></tr> <?php
    } ?>    
    </table>
</body>
</html>