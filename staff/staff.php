<?php
    include '../connect/dbconnect.php';
session_start();
if(isset($_POST['Signin'])){
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$kq=mysqli_query($con,"SELECT *FROM staff where role='staff'");
$row=mysqli_fetch_array($kq);
if($row){
   
    $_SESSION['login']= $row['role'];
    if(!$_SESSION['login']) {
        header("Location:home.php");
    }
    if($_SESSION['login'] && $_SESSION['login']=='staff') {
        header("Location:staff.php");
 
    }
}
}
?>


<html>
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Staff Page</title><script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
           .dropbtn {
  background-color: rgb(108, 7, 171);
  color: #ffffff;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  
display: inline-block;}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 190px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: rgb(108, 7, 171);;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  font-weight: bold;
}
.nav-bar{
    background-color:rgb(108, 7, 171) ;  ;
}

.dropdown-content a:hover {background-color:#f5e7fe
; }

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: rgb(108, 7, 171);
}
             .top-nav-index {
    background-color:rgb(87, 6, 140) ;
        color: rgb(255, 255, 255);
        font-size: 28px;
        padding: 10px 15px;
        font-weight: bold;
            }
#rcorners2 {
  border-radius: 40px 40px 40px 40px;
  background: #f5e7fe
;
  padding: 10px 10px; 
  width: 800px;
  height:200px; 
  margin: auto;
  margin-top: 10px;
}input[type=submit] {
  background-color: rgb(230, 0, 0);
  color: white;
  padding: 8px 19px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  height: 45px;
  cursor: pointer;
  font-size: 12px;
} input[type=text], select {
  width: 90%;
  padding: 12px 10px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
.title-idea{
    font-weight: bold;
}.column {
  float: left;
  padding: 5px;
}

/* Left and right column */
.column.side {
  width: 25%;
}

/* Middle column */
.column.middle {
  width: 50%; border-radius: 40px 40px 40px 40px;
  background: #f5e7fe
;
  padding: 10px 10px; 
  height:200px; 
  margin: auto;
  margin-top: 10px;
}

/* Clear floats after the columns */
.row::after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column.side, .column.middle {
    width: 100%;
  }
}
h6{

 margin-left: 6px ;
  border-left:6px outset blueviolet ;
}/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  padding: 15px;
}

/* Clear floats after the columns */
.row::after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width:600px) {
  .column {
    width: 100%;
  }
}
        </style>

    <body>
    <div class="top-nav-index">STAFF <a href='../checklog/logout.php'><i class="fa fa-sign-out" style="float:right;font-size: 28px; "> </i></a>
</div>

         <div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs" style="background-color:#ffffff; color:white"><i class="fa fa-navicon" style="font-size:16px; color:rgb(87,6,140); padding:10px "></i>

      <ul class="nav" style="font-weight: bold;" >
        <li><a href="staff.php" style="color:rgb(87, 6, 140)">NEWS FEED<i class="fa fa-newspaper-o" style="padding: 5px 5px;"></i>

</a></li>
                <li><a href="staff.php" style="color:rgb(87, 6, 140)">MESSAGES<i class="fa fa-comment" style="padding: 5px 5px;"></i>
</a></li>

       

        <li> 
                    <a href="ideamanagementhomepage.php" style="color:rgb(87, 6, 140)">IDEAS <i class="fa fa-lightbulb-o" style="padding: 5px 5px;"></i>
</a></li>
        <li><a href="postideawithpdffile.php" style="color:rgb(87, 6, 140)">DOCUMENTS<i class="fa fa-folder" style="padding: 5px 5px;"></i></a></li>
        <li>  <a href="staffprofile.php" style="color:rgb(87, 6, 140)" >PROFILE<i class="fa fa-user-circle" style="padding: 5px 5px;"></i></a></li>
      </ul><br>
    </div>
    <br>

      <div class="col-sm-9">
           <div class="row">
        <div class="col-sm-8">
          <div class="well" style="background-color: #f9ecf9;border-color: #f9ecf9;">

       <div class="user-block"> 
        <span><i class="fa fa-user-circle" style="padding: 5px 5px;"></i>
        Posted by:  <!-- hien thi username -->
                               </span>
                           </div>
                             <div class="idea-block">  
                                <span><i class="fa fa-star"></i>
                                <a>Idea title:</a><br></span>
                              <span>  <a>Idea Explanation:</a>
                                   </span>
</div>
<div class="thumb-block">
    <span>
        <a>
        <!-- Tong so like -->
        <i class="glyphicon glyphicon-thumbs-up" style="font-size:13px;  color:black; padding: 6px 4px;" ></i>
    </a>
</span>
    <span>
        <a>
        <!-- Tong so dislike -->
        <i class="glyphicon glyphicon-thumbs-down" style="font-size:13px;  color:black; padding: 6px 4px;" ></i>
    </a>
</span>
</div>
<div class="cmt-block">
    <span>
        <a>
        <!-- Tong so comments -->
      <i class='fa fa-comment'style="font-size:13px;  color:black; padding: 6px 4px; "></i>
    </a>
</span>

           
<input type="text" id="cmt" name="comments" placeholder="Write Comments" required>    
<input type="submit" value="POST" name="post" >
</div>
        </div>
    </div>
        <div class="col-sm-4">
          <div class="well">
            <div class="idea-top">
<table class="table table-hover" style="font-size:11px;"><h6 style="text-align: left; font-weight: bold; font-size:14px"><i class='fa fa-line-chart' style='font-size:18px;color:red; padding:4px 4px;'></i>TOP IDEAS </h6> 
    <thead>
      <tr>
       <th>No</th> 
       <th>Idea Title</th>
        <th><i class="fa fa-eye"></i>
</th>

      </tr>
    </thead>
    <tbody>

</tbody>
  </table></div>
          </div>
        </div>
      </div>
    </body>
    
</html>