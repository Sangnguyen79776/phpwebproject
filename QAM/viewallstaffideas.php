
<html>
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
                 .well-sm{
                background-color:rgb(153, 204, 255);
                color: black;           }
                .idea{
                    padding: 10px;
                }
             
               #rcorners2{
                display:grid;
                grid-template-columns: 1fr;
                border:1px solid black;
               }
               p{
                padding-left:20px;
               }
               #rcorners2{
               margin:20px 20px;
              
               }
               .w3-bar {
                color: rgb(255, 255, 255);
                font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
            }
             .top-nav-index {
             
        background-color:lightcoral ;        
        color: rgb(255, 255, 255);
        font-size: 18px;
        padding: 15px 15px;
        font-weight: bold;
        font-family:'Times New Roman', Times, serif
             }
             p>a{
                color:blue;
             }
             .top-nav-index>a:hover{
                display: block;
            text-align: center;
            padding: 20px 20px;
            text-decoration: none;
            font-size: 20px;
            background-color: lightblue;
        
             }
        </style>
    </head>
<body>
<div  class=top-nav-index>
    <a href="qamanagerhomepage.php">Go back to QAM homepage</a><br>
    <a href="sortideabydate.php">Sort idea by date</a><br>
    <a href="filterideabydepartment.php">Filter idea by department</a><br>
    <form action="downloadzipf.php" method="post">
  
    <input type="submit" name="download" value="download with zip file">

    </form>
    <form action="downloadcsv.php" method="post">
  
  <input type="submit" name="download" value="download with csv file">

  </form>
  </div>
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
    
<div class="well well-sm"> List of Ideas:</div>
<div>
    <?php
    $count=1;
    $sel_query="SELECT * FROM ideas  ORDER BY id desc;";
    $result = mysqli_query($con,$sel_query);
    while($row = mysqli_fetch_assoc($result)) { ?>
    <div id="rcorners2"  ></div>
    <p> <a><i class="glyphicon glyphicon-list" style="font-size:16px;  color:black; padding: 6px 4px; "></i></a>Number:<?php echo $count; ?></p>
           
          <p class="title-idea" href="#">Title: <?php echo $row["title"]; ?></p>

  
    <p >Explanation:<?php echo $row["explanation"]; ?></p>
    
    <p >Category_id: <?php echo $row["category_id"];?></p>
    <p >Ideas event id: <?php echo $row["ie_id"];?></p>
    <p>Option:
    <a  href='../commentfunc/viewcmt.php?id=<?php echo $row["id"]; ?>'>View comment </a>
    </p>
   
    
    
    <?php $count++; } ?>