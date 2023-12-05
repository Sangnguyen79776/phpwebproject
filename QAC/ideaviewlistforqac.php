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
        <title> List of staff ideas Page</title>
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
             p>a{
                color:blue;
             }
               #rcorners2{
                    border:1px solid black;
                    margin:20px 20px;
               }
               p{
                padding-left:20px;
               }
        </style>

    </head>
<body>
   
    <div>
        <div class=top-nav-index >
<a href="qacoordinatorhomepage.php">Back To QAC HomePage</a>            
            
          
          
        </div>
    </div>

<div class='idea'>

  

      <div class="well well-sm">List Of Ideas:</div>

</div> 

<div>
    <?php
    $count=1;
    $sel_query="SELECT  *FROM ideas   ORDER BY id desc;";
    $result = mysqli_query($con,$sel_query);
    while($row = mysqli_fetch_assoc($result)) { ?>
    <div id="rcorners2"  ></div>
    <p> <a><i class="glyphicon glyphicon-list" style="font-size:16px;  color:black; padding: 6px 4px; "></i></a>Number:<?php echo $count; ?></p>
           
        <p class="title-idea" href="#">Title: <?php echo $row["title"]; ?></p>

 
    <p >Explanation:<?php echo $row["explanation"]; ?></p>
    
    <p >Category_id: <?php echo $row["category_id"]?></p>
    <p >Ideas event id: <?php echo $row["ie_id"];?></p>
   
    <p >Option:
    <a href='../cmtideafunc/cmtidea.php?id=<?php echo $row["id"]; ?>'>Write a comment for idea </a>
    </p>
    <p>Option:
        <a href='../commentfunc/viewcmt.php?id=<?php echo $row["id"]; ?>'>View comment  </a></p>
        
    
    
    <?php $count++; } ?>


       


  
         </div>
       