<?php

session_start();
// If the user is not logged in redirect to the login page...

include '../connect/dbconnect.php';

$stmt = $con->prepare("SELECT username,email,password,role FROM acc WHERE id = ? AND role='QAmanager'");
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($username, $email, $password, $role);
$stmt->fetch();
$stmt->close();
?>
<html>

<head>
    <style>
    h1 {
        font-size: 50px;
    }

    img {
        position: absolute;
        left: 0px;
        top: 0px;
        z-index: -1;
        border-radius: 50%;
        width: 100%;
        opacity: 0.7;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th,
    #a,
    a {
        text-align: center;
    }
    .menu>a{
        text-decoration: none;
        font-size:18px;
        background-color: lightblue;
        padding:10px 10px;
        margin-top:10px;
    }
    </style>
</head>
<body>
<div class ="menu">
    <a href="adminhomepage.php">Admin homepage </a>
    <img src="../img/picture4.png">
    </div>

    <h1> List of QA manager details are below: </h1>
    

<table width="100%" border="1" style="border-collapse:collapse;">
    <thead>
        <tr>
            <th><strong>S.No</strong></th>
            <th><strong>QaManger username</strong></th>
            <th><strong>QaManager email</strong></th>
            <th><strong>QaManager password </strong></th>

            <th><strong>Role of QaManager</strong></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        $sel_query = "SELECT * FROM acc WHERE role ='QAmanager'ORDER BY id desc ";
        $result = mysqli_query($con, $sel_query);
        while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td id="a">
                <?php echo $count; ?>
            </td>
            <td id="a">
                <?php echo $row["username"]; ?>
            </td>
            <td id="a">
                <?php echo $row["email"]; ?>
            </td>
            <td id="a">
                <?php echo $row["password"]; ?>
            </td>
            <td id="a">
                <?php echo $row["role"]; ?>
            </td>
            <td><a href="editqamanageracc.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
            <td><a href="deleteqamanageracc.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
        </tr>
        <?php $count++;
        } ?>
    </tbody>

    </div>
    </body>

</html>