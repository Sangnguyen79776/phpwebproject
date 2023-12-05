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
    <style>
        .from-group{
            text-align: center;
            background-image: url('../img/picture3.jpg');
        }
        input{
            padding:10px 10px;
        }
        select{
            padding:10px 10px;
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
         
    $check="SELECT *FROM acc where  username='$username' OR password='$password'" ;
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
$info = "QAM Account Updated Successfully. </br></br>
<a href='viewlistofqamanager.php'>Details of Updated QAM account information  </a>";
echo '<p style="color:#FF0000;">'.$info.'</p>';}
}else {
    
    
    
    
    ?>
       <body >
    <div class="from-group">

    <div >
        <form action="editqamanageracc.php" method="post">
            <input type="hidden" name="new" value="1"/>
        <label for="username">Username </label>
        <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
        <p><input type="text" name="username" placeholder="Enter Name" required value="<?php echo $row['username'];?>" /></p>
        <label for="password">Password </label>
        <p><input type="password" name="password" style="height:200px;" placeholder="Enter Password here......" 
required value="<?php echo $row['password'];?>" /></p>
<label for="email">Email </label>
<p><input type="text" name="email " placeholder="Enter QAM account email:" required value="<?php echo $row['email'];?>" /></p>
<label name="role" >Role</label>
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
</select>
<p><input name="submit" type="submit" value="Update" /></p> 
          
        </form>
        <?php } ?>
        </div>
        </div>
    </body>
</html>