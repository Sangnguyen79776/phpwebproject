<?php
session_start();
include '../connect/dbconnect.php';
$stmt = $con->prepare("SELECT ename,deadline,idease_id FROM ideasevent WHERE id = ? ");
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($ename, $deadline, $idease_id);
$stmt->fetch();
$stmt->close();

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

    h1 {
        font-size: 50px;
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
    }
    </style>
</head>

<body>
    <div class="menu">
        <a href="adminhomepage.php">Go back to admin homepage</a>
        <a href="createanewevent.php">Create a new event </a>
        <img src="../img/picture4.png">
        </div>
        <h1> List of Event:</h1>
    

    <table width="100%" border="1" style="border-collapse:collapse;">
        <thead>
            <tr>
                <th><strong>S.No</strong></th>
                <th><strong>Event name</strong></th>
                <th><strong>Event deadline </strong></th>
                <th><strong>Event idease_id</strong></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            $sel_query = "SELECT * FROM ideasevent  ORDER BY id desc;";
            $result = mysqli_query($con, $sel_query);
            while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td id="a">
                    <?php echo $count; ?>
                </td>
                <td id="a">
                    <?php echo $row["ename"]; ?>
                </td>
                <td id="a">
                    <?php echo $row["deadline"]; ?>
                </td>
                <td id="a">
                    <?php echo $row["idease_id"]; ?>
                </td>
                <td id="a">
                    <a href="editevent.php?id=<?php echo $row["id"]; ?>">Edit</a>
                </td>
                <td id="a">
                    <a href="deleteevent.php?id=<?php echo $row["id"]; ?>">Delete</a>
                </td>
            </tr>
            <?php $count++;
            } ?>
        </tbody>

        </div>
</body>

</html>
</div>