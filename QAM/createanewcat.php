<?php
session_start();
include '../connect/dbconnect.php';


if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $query = "INSERT INTO categories (name, description) VALUES ('$name', '$description')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "Add new category successfully.";
    } else {
        echo "Failed to add: " . mysqli_error($con);
    }
}


?>
<html>

<head>
    <style>
    body {
        font-size: 20px;
        margin-left: 3%;
    }
    div{
        text-align: center;
    }
    h2 {
        text-align: center;
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
    </style>
</head>

<body>
    <div>
        <img src="picture2.jpg">
        <a href="qamanagerhomepage.php">Back to QAmanager Homepage </a>
        <h2>Create new Categories </h2>
        <form action="createanewcat.php" method="post">

            <label for="name">Name</label><br><br>
            <input type="text" class="form-control" name="name" placeholder="Enter a category name ..." />
            <br><br>
            <div class="from-group">
                <label for="description">Description</label><br><br>
                <input type="text" class="form-control" name="description"
                    placeholder="Enter a category description ..." />
            </div>
            <br>
            <input id="a" type="submit" name="add" value="Add">
        </form>
    </div>
</body>

</html>