<?php
session_start();
include '../connect/dbconnect.php';
$id=$_REQUEST['id'];
$query = "SELECT * from ideas where id='".$id."'"; 
$status = mysqli_query($con, $query) or die ( mysqli_connect_error());
$row = mysqli_fetch_assoc($status);

?>
<html >
    <head>  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
   ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: rgb(87, 6, 140) ;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #ffffff;
}.idea-no {
  width: 900px;
  height: 100px;
  border: 1px solid blue;
  box-sizing: border-box;  border-radius: 25px;

} * {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: rgb(230, 0, 0);
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-weight: bold;
  float: right;
}

input[type=submit]:hover {
  background-color: rgb(230, 0, 0);
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
  padding: 5px 5px;
  margin-left: 8px;
}

.col-65 {
  float: left;
  width: 65%;
  margin-top: 6px;
  padding:5px 5px;
}

/* Clear floats after the columns */
.row::after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-65, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
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
}
h3{
    font-weight: bold;
}
  </style>
    </head>

    <body>
       <div>
 <ul>
           

         <li><a href="adminhomepage.php"><i style="font-size:18px; padding:0px 6px" class="fa">&#xf0a8;</i>Admin HOME</a></li>

  <li><a href="adminprofile.php">Profile</a></li>
  <li><a href="createanewacc.php">Create a new account </a></li>
  <li><a href="eventmanagemnet.php">Event management Homepage</a></li>
 

 
</ul>
       <div>
        
        <?php 
      
        if(isset($_POST['new']) && $_POST['new']==1){
            $id=$_REQUEST['id'];
            $title=$_REQUEST['title'];
            $explanation=$_REQUEST['explanation'];
            $category_id=$_REQUEST['category_id'];
            $check ="SELECT *FROM ideas where title='$title' OR explanation ='$explanation' ";
            $v_c=mysqli_query($con,$check);
            $notify=mysqli_fetch_assoc($v_c);
           if($notify){
            if($notify['title']===$title){
                echo'<p style="text-align:center;text-transform:uppercase;color:red">(ERROR MSG) The idea title has already exist!...... To update the new idea information , please enter the new idea title </p>';
            }
            if($notify['explanation']===$explanation){
                echo"the explanation is $explanation has already used..... Please enter a new explanation";
           }
        }else{
           
            $modify="UPDATE ideas set 
            title='".$title."', explanation='".$explanation."',category_id='".$category_id."'where id='".$id."'";
             
    mysqli_query($con, $modify) or die(mysqli_connect_error());
          header('location:Viewidea.php');}
            }else {
       
        
        
        
        ?>  <div class="container ">
            <h3><i class="fa fa-edit" style="font-size:28px;padding:10px 10px;color:red"></i>EDIT IDEA
</h3>
    <form action="editidea.php" method="post">
            <input type="hidden" name="new" value="1"/>
         <div class="row">
    <div class="col-25"> <label for="title">Idea title </label></div>
    <div class="col-65">    <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
        <p><input type="text" name="title" placeholder="Enter the idea title here........." required value="<?php echo $row['title'];?>" /></p></div></div>
        <div class="row">
    <div class="col-25"> <label for="explanation">User explantion</label></div><div class="col-65">
        <p><input type="text" name="explanation"  placeholder="Enter idea explanation here..." required value="<?php echo $row['explanation'];?>"></p></div></div>
     <div class="row">
    <div class="col-25">   <label for="category_id">Idea category_id  </label></div>
       <div class="col-65"> <p><input type="number" name="category_id"  placeholder="Enter cat_id here..." min="1" max ="3"required value="<?php echo $row['category_id'];?>"></p></div></div>
     

        
        
        
        
        
        <input type="submit" name="submit"value="Submit">
        <?php } ?>
</form></div>
    </body>
</html>