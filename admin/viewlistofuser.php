<?php
session_start();
// If the user is not logged in redirect to the login page...

include '../connect/dbconnect.php';
$stmt = $con->prepare("SELECT fullname,email,department FROM user WHERE id = ? ");
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($fullname, $email, $department);
$stmt->fetch();
$stmt->close();
?>
<html>

<head><meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> List of user Page</title></head>
        <style>
        thead{
                font-weight: bold;
                text-align: center;
               }
               .header{
    font-size: 24px;
    font-weight: bold;
    background-color:rgb(87, 6, 140) ;
    margin-top: 0;
padding: 40px 40px;    width: 100%;
    color: white;
    text-align: center;
    font-family: monospace;
    margin-bottom: 20px;
}
tr,td{
    padding:10px 10px;
    font-size:18px;
  
}
body{
    background-image:url('../img/picture3.jpg');
   
}   
           </style>
</head>

<body>

    <body>
        <div>
            <a href="adminhomepage.php">Admin homepage </a>
            <div class="header"> <h1> List of User details are below: </h1></div>
          
        </div>
        <table width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th><strong>S.No</strong></th>
                    <th><strong>User fullname</strong></th>
                    <th><strong>User email </strong></th>
                    <th><strong>User department </strong></th>
                    <th><strong>User username </strong></th>
                    <th><strong>User email</strong></th>
                    <th><strong>Role of User</strong></th>
                    <th><strong>User account password</strong></th>
                </tr>
            </thead>
            <tbody>

                <?php
                $count = 1;
                $test = "SELECT u.fullname, u.email, u.department,a.username ,a.password,a.email,a.role
    FROM user AS u
    JOIN acc AS a ON u.id = a.id";
                $back = mysqli_query($con, $test);
                while ($row = mysqli_fetch_assoc($back)) { ?>

                <tr>
                    <td id="a">
                        <?php echo $count; ?>
                    </td>
                    <td id="a">
                        <?php echo $row["fullname"]; ?>
                    </td>
                    <td id="a">
                        <?php echo $row["email"]; ?>
                    </td>
                    <td id="a">
                        <?php echo $row["department"]; ?>
                    </td>
                    <td id="a">
                        <?php echo $row["username"]; ?>
                    </td>
                    <td id="a">
                        <?php echo $row["email"]; ?>
                    </td>
                    <td id="a">
                        <?php echo $row["role"]; ?>
                    </td>
                    <td id="a">
                        <?php echo $row["password"]; ?>
                    </td>
                </tr>
                <?php $count++;
                } ?>

            </tbody>
        </table>

        </div>
    </body>

</html>