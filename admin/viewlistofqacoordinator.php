<?php
session_start();
// If the user is not logged in redirect to the login page...

include '../connect/dbconnect.php';
$stmt = $con->prepare("SELECT username,password,role,email FROM acc WHERE id = ? AND role='QAcoordinator'");
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($fullname, $password, $role, $email);
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
<div class="menu">
    <a href="adminhomepage.php">Admin homepage </a>
    <img src="../img/picture4.png">
    </div>
    <h1> List of QaCoordinator account details are below:</h1>

<table width="100%" border="1" style="border-collapse:collapse;">
    <thead>
        <tr>
            <th><strong>S.No</strong></th>
            <th><strong>QaCoordinator username</strong></th>
            <th><strong>QaCoordinator password </strong></th>

            <th><strong>Role of QaCoordinator</strong></th>
            <th><strong> QaCoordinator email</strong></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        $sel_query = "SELECT * FROM acc WHERE role='QAcoordinator' ORDER BY id desc;";
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
                <?php echo $row["password"]; ?>
            </td>

            <td id="a">
                <?php echo $row["role"]; ?>
            </td>
            <td id="a">
                <?php echo $row["email"]; ?>
            </td>
            <td><a href="editqacoordinatoracc.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
            <td><a href="deleteqacoordinatoracc.php?id=<?php echo $row["id"]; ?>">Delete</a></td>


        </tr>
        <?php $count++;
        } ?>
    </tbody>

    </div>
    </body>

</html>