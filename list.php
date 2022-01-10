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
        $programmecode = isset($d['programmecode']) ? $d['programmecode'] : '';
        $programmename = isset($d['programmename']) ? $d['programmename'] : '';
    }
}
?>
<html>
<body>
    <table border="1">
    <tr>
        <td colspan="3">Welcome <?php echo $_SESSION['studentname'];?> [<a href="plogout.php">Logout</a>]</td>
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
            <table  border="1" width="900">
                <tr>
                    <th>No.</th>
                    <th>Student no</th>
                    <th>Name</th>
                    <th>Programme Code</th>
                    <th>Programme Name</th>
                    <th>Action</th>
                </tr>
                <?php
                include("connection.php");
                $sql = "SELECT * FROM students s LEFT JOIN programs p ON s.programcode = p.programcode";
                $qry = mysqli_query($conn,$sql);
                $row = mysqli_num_rows($qry);
                
                if($row>0)
                {
                    $counter=1;
                    while($d = mysqli_fetch_assoc($qry))
                    { ?>
                    <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo $d['studentno']; ?></td>
                        <td><?php echo $d['studentname']; ?></td>
                        <td><?php echo $d['programcode']; ?></td>
                        <td><?php echo $d['programname']; ?></td>
                        <td>
                        <?php 
                        if ($_SESSION['studentno'] == $d['studentno']) 
                        { ?>
                            <a href="update.php?no= <?php echo $d['studentno']; ?>">Update</a><?php 
                        } ?>    
                        </td>
                    </tr><?php $counter++;
                    }
                } ?>
            </table>
        </td>
    </tr>
    <tr>
        <td><a href="profile.php">Profile</a></td>
    </tr>
    <tr>    
        <td><a href="list.php">List</a></td>
    </tr>
    <?php 
    if($_SESSION['userlevelid']==2){
    ?>
        <tr> <td><a href="program.php"></a></td></tr><?php
    }
    ?>  
    </table>
</body>
</html>