<?php
session_start();
?>
<html>
    <head>
    <title>Ideas </title>
     <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
  
             .top-nav-index {
    background-color:rgb(87, 6, 140) ;
        color: rgb(255, 255, 255);
        font-size: 26px;
        padding: 10px 10px;
        font-weight: bold;
            }
            
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color:#ffffff;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
    .nav:hover {
background-color:#f5e7fe; padding:10px 10px   }
.nav{
    padding: 10px 10px;
}input[type=submit] {
    color: rgb(230, 0, 0);
  padding: 4px 8px;
  border: none;
  border-radius: 2px;
  font-weight: bold;
  cursor: pointer;
  font-size: 12px;
} input[type=text], select {
  width: 80%;
  padding: 12px 10px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  font-size: 12px;
}
.col-sm-8{
    background-color:#f9ecf9 ;
}
  </style></head>

    <body>      

    <div class="top-nav-index"><a href="staff.php" style="color:#ffffff"><i class="fa fa-toggle-left"></i>
STAFF </a>
</div>
 
    <div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs" style="background-color:#ffffff; color:white"><i class="fa fa-navicon" style="font-size:16px; color:rgb(87,6,140); padding:10px "></i>

      <ul class="nav" style="font-weight: bold;" >

         <li><a href="ideamanagementhomepage.php" style="color:rgb(87, 6, 140)">IDEA HOME</a></li>

  <li><a href="filterideabycategory.php" style="color:rgb(87, 6, 140)">IDEA OF CATEGORY</a></li>
  <li><a href="filterideabyevent.php" style="color:rgb(87, 6, 140)">IDEA OF EVENT</a></li>
  <li><a href="createidea.php" style="color:rgb(87, 6, 140)">NEW IDEA</a></li>

 

  <li><a href="ideav.php"style="color:rgb(87, 6, 140)">IDEAS List</a></li>
  <li><a href="postideawithpdffile.php" style="color:rgb(87, 6, 140)">FILE</a></li>

 
      </ul><br>
    </div>
    <br>

      <div class="col-sm-9">
           <div class="row">
        <div class="col-sm-8">
          <div class="well" style="background-color: #f5e7fe;border-color: #f9ecf9;">

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