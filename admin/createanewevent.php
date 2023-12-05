<?php
    include '../connect/dbconnect.php';
$query = "SELECT ename, deadline,idease_id 
          FROM ideasevent 
          WHERE deadline > CURDATE()";
$result = mysqli_query($con, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "The event have avaiable :<br>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Event: " . $row['ename'] . "<br>";
            echo "Deadline: " . $row['deadline'] . "<br>";
            echo "<a href='createidea.php?event=" . $row['ename'] . "'>Submit Idea</a>";
            echo "<hr>";
        }
    } else {
        echo "No event avaiable right now .";
    }
} else {
    echo "SQL query error: " . mysqli_error($con);
}

$sql = "SELECT DISTINCT idease_id,title FROM ideasevent INNER JOIN  ideas on ideasevent.idease_id=ideas.id";
$result = $con->query($sql);
$eventI = array();
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
    $eventI[] = $row['idease_id'].$row['title'];
}
}

// Handle form submission to filter ideas based on event
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idease_id'])) {
$selectedI = $_POST['idease_id'];
$sql = "SELECT * FROM ideasevent WHERE idease_id = '$selectedI'";
$result = $con->query($sql);
$ideaselection = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $ideaselection[] = $row;
    }
}
}
?>
<html>

<head>
    <h2>Create a new Event Page </h2>
    <style>
        body {
            font-size: 20px;
            margin-left: 3%;
        }

        h2 {
            text-align: left;
            margin-top: 3%;
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

        label {
            margin-top: 3%;
            font-size: 26px;
        }

        input {
            width: 350px;
            height: 50px;
            border-radius: 5px;
        }

        #a {
            width: 150px;
            height: 50px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div>
        <img src="../img/picture2.jpg">
        <form action="createanewevent.php" method="post">
            <label for="ename">Name</label><br><b>
                <input type="text" class="form-control" name="ename" placeholder="Enter a event name ..." />
    </div>
    <div class="from-group">
        <label for="deadline">Deadline</label><br><br>
        <input type="date" class="form-control" name="deadline" placeholder="Enter a event deadline ..." />
    </div><br>
    <div class="from-group">
    <label for="idease_id">Select a idea :</label>
        <select id="idease" name="idease_id" style="padding:10px 10px;">
            <?php
            foreach ($eventI as $idease) {
                echo "<option value='".$idease."'>".$idease."</option>";
            }
            ?>
        </select><br>
        <input id="a" type="submit" name="add" value="Add">
        <?php
        if (isset($_POST['add'])) {
            $ename = $_POST['ename'];
            $deadline = $_POST['deadline'];
            $idease_id = $_POST['idease_id'];
            $db_add = "INSERT INTO ideasevent (ename, deadline, idease_id) VALUES ('$ename', '$deadline', '$idease_id')";
            $kq = mysqli_query($con, $db_add);
            if ($kq) {
                echo "Add a new event succesfully .";
                echo "<br>";
            } else {
                echo "failed to add a new event" . mysqli_error($con);
            }
            $query = "SELECT * FROM ideasevent WHERE idease_id = '$idease_id' ";
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "Event name: " . $row['ename'] . "<br>";
                    echo "Event deadline: " . $row['deadline'] . "<br>";
                    echo "<hr>";
                }
            } else {
                echo "Dont have any event in that list.";
            }
        }
        ?>
    </div>
    </form>
    </div>
</body>

</html>