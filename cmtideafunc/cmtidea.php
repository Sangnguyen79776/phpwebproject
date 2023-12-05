<?php
  include '../connect/dbconnect.php';
$connect = "mysql:host=$DATABASE_HOST;dbname=$DATABASE_NAME;charset=utf8mb4";?>
<html>

<head>
    <style>
        body {
            font-size: 20px;
            margin-left: 3%;
        }

        h2 {
            text-align: center;
            margin-top: 3%;
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
    </style>
</head>

<body>
    <div>
        <h2>Comment Idea Page </h2>
        <img src="../img/picture4.png">
        <form action="cmtidea.php" method="post">
            <p>What have you thought about the quality of our features and blogs?</p>
            <textarea name="feedback_info" rows="8" cols="40"></textarea><br>
            <label for="mode">Anoymous:</label>
            <select name="mode" >
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select><br>
            <input type="submit" name="submit" value="Submit">
          
            <?php
            $error = array();
            if (isset($_REQUEST['submit'])) {
                $mode=$_POST['mode'];
                if($mode=='No'){
                $count = 1;

                $txt_ = mysqli_real_escape_string($con, $_POST['feedback_info']);
                if (empty($txt_)) {
                    array_push($error, "feedback_info  is required");
                }
                if (count($error) != 0) {
                    print_r($error);
                    echo '<br>';
                    echo '<div style="color:red;text-transform:uppercase;background-color:orange;text-align:center;"><b>Something went wrong!.....Failed to submit a comment </b></div>';
                } else {
                    $ins_query = "INSERT INTO comment(feedback_info) VALUES('$txt_')";
                    mysqli_query($con, $ins_query) or die(mysqli_connect_error());
                    echo '<div style="color:olive;text-transform:uppercase;background-color:orange;text-align:center;"><b>Give a comment successfully </b></div>';


                }
            }else{
                $txt_ = mysqli_real_escape_string($con, $_POST['feedback_info']);
                $ins = "SELECT accu_id,username FROM comment INNER JOIN acc ON comment.accu_id=acc.id ";

               $kqins= mysqli_query($con, $ins) ;
               while ($row = mysqli_fetch_assoc($kqins)) {
                $accu_id = $row['accu_id'] .$row['username']?: 'Anonymous';
                echo"You have selected $mode for activate private mode<br> ";
                echo "Unkown";
                $addcmt="INSERT INTO comment(feedback_info,accu_id) VALUES('$txt_','$accu_id')";
                mysqli_query($con, $addcmt) or die(mysqli_connect_error());
            }
            }
  
        }
            ?>
            <?php
    $q=date('H:i:a');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
$mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug=3;
        $mail->isSMTP(); // Set mailer to use SMTP
        // Other necessary configuration settings for the SMTP server
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
    
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->Username = 'sangntgch190109@fpt.edu.vn';
        $mail->Password = 'yvxi bfyl wezz vaxe'; 
        $mail->setFrom('sangntgch190109@fpt.edu.vn', 'Comment notification submit');
        $mail->addAddress('sangntgch190109@fpt.edu.vn', 'Staff');
        
        $mail->isHTML(true);
        $mail->Subject = 'New Comment Submission';
        $mail->Body = "A new comment has been submitted for review. Here is the comment information:feeback info : $txt_ 
        <br>Information of commenter :$accu_id<br> The time of submission : $q";
       
        $mail->send();
        echo 'Email has been sent successfully';
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
try {
    $pdo = new PDO($connect, $DATABASE_USER, $DATABASE_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
        </form>
    </div>
</body>

</html>