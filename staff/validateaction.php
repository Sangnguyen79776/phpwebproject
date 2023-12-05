<?php
    include '../connect/dbconnect.php';

if (isset($_POST['action'])) {
    $idea_id = $_POST['idea_id'];
    $user_id=$_SESSION['user_id'];
    $action = $_POST['action'];
  
    switch ($action) {
          case 'like':
           $db_query="INSERT INTO likes_dislikes (user_id, idea_id, like_status) 
                     VALUES ($user_id, $idea_id, 'like') 
                     ON DUPLICATE KEY UPDATE like_status='like'";
                     
           break;
          case 'dislike':
            $db_query="INSERT INTO likes_dislikes (user_id, idea_id, like_status) 
            VALUES ($user_id, $idea_id, 'dislike') 
                     ON DUPLICATE KEY UPDATE like_status='dislike'";
           break;
          case 'unlike':
                $db_query="DELETE FROM likes_dislikes WHERE user_id=$user_id AND idea_id=$idea_id";
                break;
          case 'undislike':
            $db_query="DELETE FROM likes_dislikes WHERE user_id=$user_id AND idea_id=$idea_id";
        break;
          default:
                  break;
    }
  
    // execute query to effect changes in the database ...
    mysqli_query($con, $db_query);
    echo getcountRating($idea_id);
    exit(0);
  }
  function getvoteLikes($id)
{
  global $con;
  $db_query = "SELECT COUNT(*) FROM likes_dislikes 
                  WHERE idea_id = $id AND like_status='like'";
  $returnquery = mysqli_query($con, $db_query);
  $numofreturn = mysqli_fetch_array($returnquery);
  return $numofreturn[0];
}

// Get total number of dislikes for a particular post
function getvoteDislikes($id)
{
  global $con;
  $db_query = "SELECT COUNT(*) FROM likes_dislikes 
                  WHERE idea_id = $id AND like_status='dislike'";
  $returnquery = mysqli_query($con, $db_query);
  $numofreturn = mysqli_fetch_array($returnquery);
  return $numofreturn[0];
}

// Get total number of likes and dislikes for a particular post
function getcountRating($id)
{
  global $con;
  $countRating = array();
  $likes_dbquery = "SELECT COUNT(*) FROM likes_dislikes WHERE idea_id = $id AND like_status='like'";
  $dislikes_dbquery = "SELECT COUNT(*) FROM likes_dislikes 
                                        WHERE idea_id = $id AND like_status='dislike'";
  $likes_result = mysqli_query($con, $likes_dbquery);
  $dislikes_result = mysqli_query($con, $dislikes_dbquery);
  $likesnum = mysqli_fetch_array($likes_result);
  $dislikesnum = mysqli_fetch_array($dislikes_result);
  $countRating = [
        'likes' => $likesnum[0],
        'dislikes' => $dislikesnum[0]
  ];
  return json_encode($countRating);
}

// Check if user already likes post or not
function uservoteLiked($idea_id)
{
  global $con;
  global $user_id;
  $db_query = "SELECT * FROM likes_dislikes WHERE user_id='$user_id' 
                  AND idea_id='$idea_id' AND like_status='like'";
  $votedcheck = mysqli_query($con, $db_query);
  if (mysqli_num_rows($votedcheck) > 0) {
        return true;
  }else{
        return false;
  }
}

// Check if user already dislikes post or not
function uservoteDisliked($idea_id)
{
  global $con;
  global $user_id;
  $db_query = "SELECT * FROM likes_dislikes WHERE user_id='$user_id' 
                  AND idea_id='$idea_id' AND like_status='dislike'";
  $votedcheck = mysqli_query($con, $db_query);
  if (mysqli_num_rows($votedcheck) > 0) {
        return true;
  }else{
        return false;
  }
}
  ?>