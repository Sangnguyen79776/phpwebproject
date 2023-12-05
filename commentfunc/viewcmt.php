<?php
session_start();
include '../connect/dbconnect.php';
$stmt = $con->prepare("SELECT feedback_info,accu_id FROM comment WHERE id = ? ");
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($feedback_info, $accu_id);
$stmt->fetch();
$stmt->close();

?>
<html>
    <head>
       <h2>View comment Form</h2>
       <style>
            h2{
                text-align: center;
            }
            tr,td{
                padding:10px 10px;
            }
            body{
                background-image: url('../img/picture2.jpg');
            }
       </style>
    </head>
    <body>
    <table width="100%" border="1" style="border-collapse:collapse;">
                <thead>
<tr>
<th ><strong>S.No</strong></th>
<th><strong>Comment </strong></th>
<th><strong>Account id from staff </strong></th>





</tr>
                </thead>
<tbody>
<?php
$count=1;
$sel_query="SELECT * FROM comment  ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td ><?php echo $count; ?></td>
<td ><?php echo $row["feedback_info"]; ?></td>
<td ><?php echo $row["accu_id"]; ?></td>





</tr>
<?php $count++; } ?>
</tbody>
    </body>
<body>
<div>