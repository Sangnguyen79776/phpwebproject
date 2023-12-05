<?php
session_start();
// If the user is not logged in redirect to the login page...
include '../connect/dbconnect.php';

$stmt = $con->prepare("SELECT username,password,role,email FROM acc WHERE id = ? AND role='staff'");
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($username, $password, $role, $email);
$stmt->fetch();
$stmt->close();
?>
<html>

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script script script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
    body {
        background-image: url("picture3.jpg");
        background-repeat: no-repeat;
        background-size: 100%;
    }

    h2 {
        text-align: center;
        margin-top: 3%;
        font-size: 50px;
    }

    table {
        border: none;
        width: 100%;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
        font-size: 25px;
        color: black;
    }

    #a {
        width: 90%;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    p {
        font-size: 25px;
    }
    .well-sm{
                background-color:rgb(153, 204, 255)
;
                color: black;           }
    .w3-bar {
                color: rgb(255, 255, 255);
                font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
            }
             .top-nav-index {
 background-color:rgb(87, 6, 140) ;        color: rgb(255, 255, 255);
        font-size: 18px;
        padding: 15px 15px;
        font-weight: bold;
        font-family:'Times New Roman', Times, serif
            }
    </style>
</head>

<div>
	<h2>Staff Profile</h2>
    <div class=top-nav-index >
<a href="staff.php">Back To Staff HomePage</a>            
            
          
          
        </div>
    <p  class="well well-sm" > Your account details are below:</p>

    <table class="table table-hover" width="100%" border="1" style="border-collapse:collapse;">
        <tr>
            <td>Your Account ID</td>
            <td id="a">
                <?= $_SESSION['user_id'] ?>
            </td>
        </tr>
        <tr>
            <td>Username:</td>
            <td id="a">
                <?= $_SESSION['username'] ?>
            </td>
        </tr>
        <tr>
            <td>Password:</td>
            <td id="a">
                <?= $_SESSION['password'] ?>
            </td>
        </tr>
        <tr>
            <td>Role:</td>
            <td id="a">
                <?= $_SESSION['role'] ?>
            </td>
        </tr>
    </table>
</div>
</body>

</html>