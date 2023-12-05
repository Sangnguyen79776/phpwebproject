<html>

<head>
    <h2>Create an Account</h2>
    <style>
        body {
            font-size: 20px;
            margin-left: 3%;
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
            border-radius: 50%;
            width: 100%;
            opacity: 0.7;
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
            width: 150px;
            height: 50px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include '../connect/dbconnect.php';
    $notify = array();
    if (isset($_REQUEST['accounts'])) {

        // we receive all the input value from the form 
    
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $passwordconfirm = mysqli_real_escape_string($con, $_POST['passwordconfirm']);
        $role = mysqli_real_escape_string($con, $_POST['role']);
        $department = mysqli_real_escape_string($con, $_POST['department']);
        // we validate data by using array_push func 
        if (empty($username)) {
            array_push($notify, "Username is required");
        }

        if (empty($password)) {
            array_push($notify, "Password is required");
        }
        if (empty($role)) {
            array_push($notify, "Role is required");
        }
        if ($password != $passwordconfirm) {
            array_push($notify, "the two password are not match");
        }
        $sql = "SELECT *FROM acc WHERE username='$username'";
        $result = mysqli_query($con, $sql);
        $u = mysqli_fetch_assoc($result);
        if ($u) {
            if ($u['username'] === $username) {
                array_push($notify, "Username already exists");
            }
        }
        if (count($notify) == 0) {
            $password = md5($password); //encrypt the password before saving in the database
    
            $db_query = "INSERT INTO acc (username, password, role,email,department) 
                      VALUES('$username', '$password', '$role','$email','$department')";
            $u_query = mysqli_query($con, $db_query);
            if ($u_query) {
                echo '<div style="color:olive;text-transform:uppercase;background-color:orange;text-align:center;"><b>Register successfully </b></div>';
            } else {

                echo '<div style="color:red;text-transform:uppercase;background-color:orange;text-align:center;"><b>Fail to register </b></div>';
            }
        } else {
            print_r($notify);
            echo '<div style="color:red;text-transform:uppercase;background-color:salmon;text-align:center;"><b>Fail to register </b></div>';
        }
    }
    ?>
    <div>
        <div>
            <div>
                <div>
                    <img src="../img/picture2.jpg">
                    <form action="createanewacc.php" method="post" class="form">

                        <label for="username">Name</label><br>
                        <input type="text" class="form-control" name="username" placeholder="Enter your name ..." />
                </div> <br>
                <div class="from-group">
                    <label for="password">Password</label><br>
                    <input type="password" class="form-control" name="password" placeholder="Enter your password ..." />
                </div> <br>
                <div class="from-group">
                    <label for="passwordconfirm">Comfirm password </label><br>
                    <input type="password" class="form-control" name="passwordconfirm"
                        placeholder="Enter your password ..." />
                </div> <br>
                <div class="from-group">
                    <label for="role">Role</label><br>
                    <select id="role" name="role">
                        <option value="staff">
                            Staff
                        </option>
                        <option value="admin">
                            Admin
                        </option>
                        <option value="QAmanager">QAmanager</option>
                        <option value="QAcoordinator">QAcoordinator</option>
                    </select>
                </div><br>
                <div class="from-group">
                    <label for="department">Department</label><br>
                    <select id="depart" name="department">
                        <option value="IT">
                            IT
                        </option>
                        <option value="business">
                            Teacher
                        </option>
                        
                        <option value="none">
                            None
                        </option>
                    </select>
                </div>
                <div class="from-group">
                    <label for="email">Email</label><br>
                    <input type="text" class="form-control" name="email" placeholder="Enter your email here:  ..."
                        notrequired>
                </div> <br>
                <input id="a" type="submit" id="btn" name="accounts"> </input>
</body>

</html>