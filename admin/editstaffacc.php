<?php
session_start();


include "../connect/dbconnect.php";


$id=$_REQUEST['id'];
$query = "SELECT * from acc where id='".$id."' "; 
$status = mysqli_query($con, $query) or die ( mysqli_connect_error());
$row = mysqli_fetch_assoc($status);
?>
<html>
      <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Staff Account</title><script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: red;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  font-weight: bold;
}

input[type=submit]:hover {
  background-color: red;
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
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
  padding:5px 5px;
}.col-15 {
  float: left;
  width: 75%;
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
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
h3{
    font-weight: bold;
}     
        </style>
    </head>
    <?php
    $kq="";
    if(isset($_POST['new']) && $_POST['new']==1)
       {
       $id=$_REQUEST['id'];
    $username=$_REQUEST['username'];
    $password=$_REQUEST['password'];
  
    $role=$_REQUEST['role'];
         
    $check="SELECT *FROM acc where  username='$username'  OR password='$password'" ;
    $v_c=mysqli_query($con,$check);
    $notify= mysqli_fetch_assoc($v_c);
        if($notify){
            if($notify['username']===$username){
                echo'<p>The username has already exist, you cannot use this username more!...<br>Please enter again<br></p>';
              $error="Failed to update the user account information";
              echo $error;
             
           
            }
          
        }else{
            $password=md5($password);
    $update="UPDATE acc set
    username='".$username."', password='".$password."',role='".$role."' where id='".$id."'";
    
    
    mysqli_query($con, $update) or die(mysqli_connect_error());
$info = "Staff Account Updated Successfully. </br></br>
<a href='viewlistofstaffaccount.php'>Details of Updated Staff account information  </a>";
echo '<p style="color:#FF0000;">'.$info.'</p>';}
}else {
    
    
    
    
    ?>
       <body >
 <div class="top-nav-index">STAFF accounts form</div>
 <div class="nav-bar">
          <div class="dropdown">
                <button class="dropbtn"><a href="adminhomepage.php" style="color:#ffffff"><i style="font-size:18px; padding:0px 6px" class="fa">&#xf0a8;</i>HOME</a></button>
            </div>
       
            <div class="dropdown">
             <button class="dropbtn">PORTFOLIO</button>
                <div class="dropdown-content">
                    <a href="adminprofile.php" >PROFILE</a>
                    <a href="logout.php" >LOG OUT</a>
                </div>
            </div>

        </div>
     



    <div class="from-group">
        <div class="container ">
    <div >
        <form action="editstaffacc.php" method="post">
            <h3><i class="fa fa-id-card" style="font-size:26px;padding:10px 10px;color:rgb(87, 6, 140)"></i>EDIT STAFF ACCOUNT
</h3>
            <div class="row">
    <div class="col-25"><label for="username">Username </label></div>
        <div class="col-75">

            <input type="hidden" name="new" value="1"/>
        
        <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
        <p><input type="text" name="username" placeholder="Enter Name" required value="<?php echo $row['username'];?>" /></p></div></div>
<div class="row">
    <div class="col-25">
        <label for="password">Password </label></div>  <div class="col-75">

        <p><input type="password" name="password"  placeholder="Enter Password here......" 
required value="<?php echo $row['password'];?>" /></p></div></div>

<div class="row">
    <div class="col-25">
<label for="email">Email </label>
</div> 
<div class="col-75">
<p><input type="text" name="email " placeholder="Enter staff account email:" required value="<?php echo $row['email'];?>" /></p>
</div>
</div>
<div class="row">
    <div class="col-25">
        <label for ="role">Role:</label></div>
        <div class="col-15">
<select id="role" name="role">
                            <option value="admin">
                            Admin 
                            </option>
                            <option value="staff">
                            Staff 
                            </option>
                            <option value="QAmanager">
                            QAmanager 
                            </option>
                            <option value="QAcoordinator">
                            QAcoordinator
                            </option>
</select></div>
</div>
<p><input name="submit" type="submit" value="Update" /></p> 
          
        </form>
        <?php } ?>
        </div>
        </div>
        <br>
        <br>
    </body>
</html>