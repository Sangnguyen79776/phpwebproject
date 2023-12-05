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
$sql = "SELECT * FROM ideas";
$result = mysqli_query($con, $sql);

// fetch all posts from database
// return them as an associative array called $posts
$ideas = mysqli_fetch_all($result, MYSQLI_ASSOC);

  
?>


   



<?php include('validateaction.php'); ?>

<html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <style>
        .ideacontainer {
  width: 50%;
  margin: 10px auto;
  border: 1px solid #eee;
 
}
.idea {
  width: 90%;
  margin: 20px auto;
  padding: 10px 5px 0px 5px;
  border: 1px solid purple;
}
.idea-info {
  margin: 10px auto 0px;
  padding: 5px;
  border:2px solid grey;
  border-radius: 10px;
}
.fa {
  font-size: 1.0em;
}
.fa-thumbs-down, .fa-thumbs-o-down {
  transform:rotateY(160deg);
}

i {
  color: blue;
}
h2{
    text-align: center;
}
body{
    font-size:18px;
 
}
.idea>div{
    padding:10px 10px;
}

     </style>
    </head>
    <body>
     
  <div style="padding:10px;">
  <form action='ideav.php'method="post">
    <label for="searchidea"><span class="glyphicon glyphicon-search"></span></label>
    <input type="text" name="hastags" placeholder="enter hastags">
    <input type="submit" name="search" value="Search">
        <?php
          if(isset($_POST['search'])){
            $hastags=$_REQUEST['hastags'];
     
            $checkQ = "SELECT * FROM ideas WHERE hastags LIKE '%#%'";
        $backto = $con->query($checkQ);
    
        // Hiển thị kết quả
        if ($backto->num_rows > 0) {
            while($a = $backto->fetch_assoc()) {
                
                echo"You have selected the hastags is $hastags for searching<br>";
                echo"<h3>Here is your finding idea</h3>";
                echo"<div style='border:1px solid black;'>";
                echo "<h4>Idea Name:".$a["title"] . "</h4>";
             
                echo "<h4>Idea explanation:".$a["explanation"] . "</h4>";
              
                echo "<h4>Idea hastags:".$a["hastags"] . "</h4>";
                    echo"</div>";
              
              
            }
        } else {
            echo "No results have found .";
        }
    
           
        }
        
        
        ?>
           <h2>List of idea </h2>
  </div>
        <div class="ideacontainer">
    
    <?php foreach ($ideas as $idea): ?>
        <div class="idea" >
        <div><i class="fa fa-user-circle" style="padding: 5px 5px;"></i>Posted by :<?php echo $_SESSION['username']; ?></div>
      <div>Idea title:<?php echo $idea['title']; ?></div>
      <div>Idea explanation:<?php echo $idea['explanation']; ?></div>
      
      <div class="idea-info">
            <!-- if user likes idea, style button differently -->
        <i <?php if (uservoteLiked($idea['id'])): ?>
                  class="fa fa-thumbs-up like-btn"
          <?php else: ?>
                  class="fa fa-thumbs-o-up like-btn"
          <?php endif ?>
          data-id="<?php echo $idea['id'] ?>"></i>
        <span class="likes"><?php echo getvoteLikes($idea['id']); ?></span>
        
        &nbsp;&nbsp;&nbsp;&nbsp;

            <!-- if user dislikes idea, style button differently -->
        <i 
          <?php if (uservoteDisliked($idea['id'])): ?>
                  class="fa fa-thumbs-down dislike-btn"
          <?php else: ?>
                  class="fa fa-thumbs-o-down dislike-btn"
          <?php endif ?>
          data-id="<?php echo $idea['id'] ?>"></i>
        <span class="dislikes"><?php echo getvoteDislikes($idea['id']); ?></span>
      </div>
      <div>Option :<a style="color:blue" href="editidea.php?id=<?php echo $idea["id"]; ?>">Edit</a></div>
      <div>Option :<a style="color:blue" href="deleteidea.php?id=<?php echo $idea["id"]; ?>">Delete</a></div>
      <div>Option :<a style="color:blue" href='../cmtideafunc/cmtidea.php?id=<?php echo $idea["id"]; ?>'>Write a comment </a></div>
        </div>
   <?php endforeach ?>
   
   </div>
   </form>
  <script src="actionscript.js"></script>
    </body>
</html>


