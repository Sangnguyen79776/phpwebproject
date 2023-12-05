<html>

<head>
    <h2>Filter List of Account (role name)</h2>
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
            margin-left: 3%;
        }

        h2 {
            text-align: center;
            margin-top: 3%;
            font-size: 40px;
        }

        label {
            font-size: 25px;
        }

        input {
            width: 300px;
            height: 40px;
            border-radius: 5px;
        }

        label {
            font-size: 40px;
        }

        #b {
            width: 50px;
            height: 40px;
            border-radius: 5px;
        }
    </style>
</head>
<div>
    <form action="filterlistofacc.php" method="post">
        <img src="../img/picture4.png">
        <div>
            <label for="role">Role</label>
            <select name="role" style="width:200px;height:50px;padding-top:10px ;">
                <option value="staff">Staff</option>
                <option value="admin">Admin</option>
                <option value="QAmanager">QAmanager</option>
                <option value="QAcoordinator">QAcoordinator</option>
            </select>
            <input id="b" type="submit" name="filter" value="Filter">
        </div>
        <?php
        session_start();
 
include "../connect/dbconnect.php";

        if (isset($_REQUEST['filter'])) {
            $role = $_POST['role'];
            $query = "SELECT * FROM acc WHERE role = '$role'";
            $result = $con->query($query);

            // Display the filtered results
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<h2>List of account by role name here:</h2>";
                    echo "Username: " . $row["username"] . "<br>";
                    echo "Email: " . $row["email"] . "<br>";
                    echo "Role: " . $row["role"] . "<br><br>";
                }
            } else {
                echo "No accounts found for the selected role.";
            }
        }
        ?>
    </form>
</div>

</html>