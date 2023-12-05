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
        <title> Staff PROFILE</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            .w3-bar {
                color: rgb(255, 255, 255);
                font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
            }
             .top-nav-index {
    background-color:rgb(87, 6, 140) ;
        color: rgb(255, 255, 255);
        font-size: 28px;
        padding: 10px 15px;
        font-weight: bold;
        font-family:'Times New Roman', Times, serif
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
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
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
      font-size: 20px;
    font-weight: bold;
    background-color:rgb(124, 8, 196);
margin:auto;padding: 40px 40px;    width: 80%;
    color: white;
    text-align: center;
    font-family: monospace;
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
$info = "QAC Account Updated Successfully. </br></br>
<a href='viewlistofqacoordinator.php'>Details of Updated QAC account information  </a>";
echo '<p style="color:#FF0000;">'.$info.'</p>';}
}else {
    
    
    
    
    ?>
     
           <body ><div class="top-nav-index">QAC account </div>
    <div class="w3-bar" style="background-color:#CA8CE9;float:right;">
            <a href="adminhomepage.php" class="w3-bar-item w3-button">HOME</a>

            
            
            
          
            <div class="w3-dropdown-hover">
                <button class="w3-button">PORTFOLIO</button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a href="viewlistofqacoordinator.php" class="w3-bar-item w3-button">View All QAC Account</a>
                    <a href="adminprofile.php" class="w3-bar-item w3-button">Profile</a>
                    <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
                </div>
            </div>

        </div>
<br></br>
<br><br>
    <div class="from-group">
        <div class="container ">
    <div >
        <form action="editqacoordinatoracc.php" method="post">
            <h3>EDIT QAC ACCOUNT</h3>
            <div class="row">
    <div class="col-25"><label for="username">Username </label></div>
        <div class="col-75">
            <input type="hidden" name="new" value="1"/>
        <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
        <p><input type="text" name="username" placeholder="Enter Name" required value="<?php echo $row['username'];?>" /></p></div></div>
<div class="row">
    <div class="col-25">
        <label for="password">Password </label></div>
        <div class="col-75">
        <p><input type="password" name="password" style="height:200px;" placeholder="Enter Password here......" 
required value="<?php echo $row['password'];?>" /></p>
<label for="email">Email </label>
<p><input type="text" name="email " placeholder="Enter QAC account email:" required value="<?php echo $row['email'];?>" /></p></div></div>

<div class="row">
    <div class="col-25">
        <label for="role">Role:</label></div>
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
</select></div></div>
<input name="submit" type="submit" value="Update" style="background-color:red;" /> 
          
        </form>
        <?php } ?>
        </div>
        </div>
    </body>
</html>