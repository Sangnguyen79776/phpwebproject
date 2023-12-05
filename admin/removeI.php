    <?php
    include '../connect/dbconnect.php';
    $id=$_REQUEST['id'];
    $del="DELETE FROM ideas where id=$id  ";
    mysqli_query($con,$del) or die(mysqli_connect_error());
    header("location:Viewidea.php");
    ?>