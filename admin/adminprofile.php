    <?php
    session_start();
    // If the user is not logged in redirect to the login page...

include '../connect/dbconnect.php';

    $stmt = $con->prepare("SELECT username,password,role,email FROM acc WHERE id = ? AND role='admin'");
    // In this case we can use the account ID to get the account info.
    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $stmt->bind_result($username, $password, $role, $email);
    $stmt->fetch();
    $stmt->close();
    ?>
    <html>

    <head>
        <style>
        body {
            background-image: url("../img/picture3.jpg");
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
        </style>
    </head>

    <div>
        <h2>Admin Profile</h2>
        <a href="adminhomepage.php"> Back to Admin homepage </a>
        <p> Your account details are below:</p>

        <table width="100%" border="1" style="border-collapse:collapse;">
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

                