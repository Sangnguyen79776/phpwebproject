<?php
session_start();
include '../connect/dbconnect.php';
$id = $_REQUEST['id'];
$query = "SELECT * from ideasevent where id='" . $id . "'";
$status = mysqli_query($con, $query) or die(mysqli_connect_error());
$row = mysqli_fetch_assoc($status);

?>
<html>

<head>
    <style>
    img {
        position: absolute;
        left: 0px;
        top: 0px;
        z-index: -1;
        border-radius: 50%;
        width: 100%;
        opacity: 0.7;
    }

    body {
        font-size: 20px;
        margin-left: 10%;
    }

    #a {
        width: 55px;
        height: 30px;
        border-radius: 5px;
    }

    h2 {
        text-align: center;
        margin-top: 3%;
    }

    input {
        width: 1000px;
        height: 40px;
    }
    </style>
</head>

<body>
    <h2>Edit Event Information Page</h2>
    <img src="../img/picture4.png">
    <?php

    if (isset($_POST['new']) && $_POST['new'] == 1) {
        $id = $_REQUEST['id'];
        $ename = $_REQUEST['ename'];
        $deadline = $_REQUEST['deadline'];
        $ideaid = $_REQUEST['idease_id'];
        $check = "SELECT *FROM ideasevent where ename='$ename' OR deadline ='$deadline' ";
        $v_c = mysqli_query($con, $check);
        $notify = mysqli_fetch_assoc($v_c);
        if ($notify) {
            if ($notify['ename'] === $ename) {
                echo '<p style="text-align:center;text-transform:uppercase;color:red">(ERROR MSG) The ename  has already exist!...... To update the new event information , please enter the new event name  </p>';
            }
            if ($notify['deadline'] === $deadline) {
                echo "the deadline is $deadline has already in used..... Please enter a new deadline ";
            }
        } else {

            $modify = "UPDATE ideasevent set 
            ename='" . $ename . "', deadline='" . $deadline . "',idease_id='" . $ideaid . "'where id='" . $id . "'";

            mysqli_query($con, $modify) or die(mysqli_connect_error());
            $info = "Event Information Updated Successfully. </div></br>
            <a href='eventmanagemnet.php'>Details of Updated Event Information </a>";
            echo '<p style="color:#FF0000;">' . $info . '</p>';
        }
    } else {
        ?>
    <form action="editevent.php" method="post">
        <input type="hidden" name="new" value="1" />
        <label for="ename">Event name </label>
        <input name="id" type="hidden" value="<?php echo $row['id']; ?>" />
        <p><input type="text" name="ename" placeholder="Enter the event name here........." required
                value="<?php echo $row['ename']; ?>" /></p>
        <label for="deadline">Event deadline</label>
        <p><input type="date" name="deadline" placeholder="Enter event deadline here..." required
                value="<?php echo $row['deadline']; ?>"></p>
        <label for="ideas_id">Ideas link to event </label>
        <p><input type="number" name="idease_id" placeholder="Enter idease_id here..." min="1" max="3" required
                value="<?php echo $row['idease_id']; ?>"></p>
        <input id="a" type="submit" name="submit" value="Submit">
        <?php } ?>
    </form>
</body>

</html>