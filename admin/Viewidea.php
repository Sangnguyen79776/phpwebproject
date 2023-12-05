<?php
session_start();
include '../connect/dbconnect.php';
$stmt = $con->prepare("SELECT title,explanation,category_id ,ie_id FROM ideas WHERE id = ? ");
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($title, $explanation,$category_id,$ie_id);
$stmt->fetch();
$stmt->close();

?>
<html>
    <head>
       
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> All ideas List</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
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
            .searchidea{
                font-size: 14px;
                text-align: center;
            }
            .well-sm{
                background-color:rgb(153, 204, 255)
;
                color: black;           }
                .idea{
                    padding: 10px;
                }
               thead{
                font-weight: bold;
                text-align: center;
               }
               #rcorners2{
                margin:20px 20px;
                border:1px solid black;
               }
              p{
                padding:10px 10px 10px 10px;
              
               }
               p>a{
                padding-left:10px;
               }
               
        </style>

    </head>
<body>
   
    <div>
        <div class=top-nav-index >
<a href="adminhomepage.php">Back To Idea HomePage</a>            
            
          
          
        </div>
    </div>

<div class='idea'>


      <div class="well well-sm">List Of Ideas:</div>

</div> 

<div>
   

               <table width="100%" border="1" style="border-collapse:collapse;height:300px;padding:10px 10px 10px 10px;;">
               <thead>
<tr>
<th ><strong>S.No</strong></th>
<th><strong>Idea title</strong></th>
<th><strong>Idea explanation</strong></th>
<th><strong>Idea category_id</strong></th>
<th><strong>Idea ideaevent_id</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>

</tr>

               </thead>
<tbody>
<?php
$count=1;
$sel_query="SELECT * FROM ideas ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td style="background-color:lightblue;"><?php echo $count; ?></td>
<td style="background-color:lightblue;"><?php echo $row["title"]; ?></td>
<td style="background-color:lightblue;"><?php echo $row["explanation"]; ?></td>
<td style="background-color:lightblue;"><?php echo $row["category_id"]; ?></td>
<td style="background-color:lightblue;"><?php echo $row["ie_id"]; ?></td>



<td style="background-color:red;">
<a href="adminupdateI.php?id=<?php echo $row["id"]; ?>">Edit</a>

</td>
<td style="background-color:red;">
<a href="removeI.php?id=<?php echo $row["id"]; ?>">Delete</a>

</td>

</tr>
<?php $count++; } ?>
</table>
  

       


 
         </div>
       
</body>
</html>