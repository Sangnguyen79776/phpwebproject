<?php
session_start();
include '../connect/dbconnect.php';
$id = $_REQUEST['id'];
$query = "SELECT * from categories where id='" . $id . "'";
$status = mysqli_query($con, $query) or die(mysqli_connect_error());
$row = mysqli_fetch_assoc($status);

?>
<html>

<head>
    <style>
        body {
            font-size: 20px;
            margin-left: 27%;
        }

        h2 {
            margin-left: 10%;
            margin-top: 3%;
            font-size: 50px;
        }

        img {
            position: absolute;
            left: 0px;
            top: 0px;
            z-index: -1;
            border-radius: 20%;
            width: 100%;
        }

        label {
            margin-top: 3%;
            font-size: 26px;
        }

        input,
        select {
            width: 350px;
            height: 50px;
            border-radius: 5px;
        }

        #a {
            width: 60px;
            height: 40px;
            border-radius: 5px;
        }

        label {
            margin-left: 2%;
        }
    </style>
</head>

<body>
    <h2>Edit Category Information</h2>

    <?php

    if (isset($_POST['new']) && $_POST['new'] == 1) {
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $description = $_REQUEST['description'];

        $check = "SELECT *FROM categories where name='$name' OR description ='$description' ";
        $v_c = mysqli_query($con, $check);
        $notify = mysqli_fetch_assoc($v_c);
        if ($notify) {
            if ($notify['name'] === $name) {
                echo '<p style="text-align:center;text-transform:uppercase;color:red">(ERROR MSG) The category name has already exist!...... To update the new category information , please enter the new category name </p>';
            }
            if ($notify['description'] === $description) {
                echo "the description is $description has already used..... Please enter a new description";
            }
        } else {

            $modify = "UPDATE categories set 
            name='" . $name . "', description='" . $description . "'where id='" . $id . "'";

            mysqli_query($con, $modify) or die(mysqli_connect_error());
            header('location:viewlistofcategories.php');
            // $info = "Category Information Updated Successfully. </div></br>  
            // <a href='viewlistofcategories.php'>Details of Updated Category Information </a>";
            // echo '<p style="color:#FF0000;">' . $info . '</p>';
        }
    } else {

        ?>
        <img src="../img/picture2.jpg" alt="">
        <form action="editcat.php" method="post">
            <input type="hidden" name="new" value="1" />
            <label for="name">Category Name </label>
            <input name="id" type="hidden" value="<?php echo $row['id']; ?>" />
            <p><input type="text" name="name" placeholder="Enter the category name here........." required
                    value="<?php echo $row['name']; ?>" /></p>
            <label for="description">Category description</label>
            <p><input type="text" name="description" style="height:300px;"placeholder="Enter idea description here..." required
                    value="<?php echo $row['description']; ?>"></p>

            <input id="a" type="submit" name="submit" value="Submit">
        <?php } ?>
    </form>
</body>

</html>