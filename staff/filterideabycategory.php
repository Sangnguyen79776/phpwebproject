<?php
    session_start();
    include '../connect/dbconnect.php';
    $connect = "mysql:host=$DATABASE_HOST;dbname=$DATABASE_NAME;charset=utf8mb4";
    try {
        $pdo = new PDO($connect, $DATABASE_USER, $DATABASE_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    $sql = "SELECT DISTINCT category_id,name FROM ideas INNER JOIN categories on ideas.category_id=categories.id ";
    $result = $con->query($sql);
    $categories = array();
    if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row['category_id'].$row['name'];
       
      
    }
    
}

// Handle form submission to filter ideas based on category
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['category_id'])) {
    $selectedCategory = $_POST['category_id'];
  
    $sql = "SELECT * FROM ideas WHERE category_id = '$selectedCategory'  ";
    $result = $con->query($sql);
    $filteredIdeas = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $filteredIdeas[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ideas Filter</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/"></script>
 <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <style>
 .dropbtn {
  background-color: rgb(87, 6, 140);
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
    background-color:rgb(87, 6, 140) ;  ;
}

.dropdown:hover .dropbtn {
  background-color: rgb(87, 6, 140);
}
             
.top-nav-index {
    background-color:rgb(87, 6, 140) ;
        color: rgb(255, 255, 255);
        font-size: 28px;
        padding: 10px 15px;
        font-weight: bold;
            }
            ul{
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

}
  </style>
</head>

<body>
<div class="nav-bar">
          <div class="dropdown">
                <button class="dropbtn"><a href="staff.php" style="color:#ffffff">HOME</a></button>
            </div>
<div class="dropdown">
                <button class="dropbtn"><a href="ideamanagementhomepage.php " style="color:#ffffff">IDEA HOME</a></button>
            </div>
            <div class="dropdown">
                <button class="dropbtn"><a href="filterideabycategory.php" style="color:#ffffff">IDEA OF CATEGORY</a></button>
            </div>
            <div class="dropdown">
                <button class="dropbtn"><a href="filterideabyevent.php" style="color:#ffffff">IDEA OF EVENT</a></button>
            </div>
            <div class="dropdown">
                <button class="dropbtn"><a href="ideav.php" style="color:#ffffff">IDEAS</a></button>
            </div> <div class="dropdown">
                <button class="dropbtn" ><a href="postideawithpdffile.php" style="color:#ffffff">FILE</a></button>
            </div>
    </div>

      <div>
      <h1>Filter Ideas by Category</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="category_id">Select a Category:</label>
        <select id="category" name="category_id">
            <?php
    
            foreach ($categories as $category) {
                
                
                echo "<option value='".$category."'>".$category."</option>";
           
               
                
            }

            ?>
        </select>
        <button type="submit">Filter</button>
    </form>

    <?php
    if (isset($filteredIdeas)) {
        echo "<h2>Ideas in category: ".$selectedCategory."</h2>";
        if (!empty($filteredIdeas)) {
            foreach ($filteredIdeas as $idea) {
                // Display the filtered ideas
                echo "<p>Title: " . $idea['title'] . "<br> - Explanation: " . $idea['explanation'] . "</p>";
            }
        } else {
            echo "No ideas found in the selected category.";
        }
    }
    ?>
</div>
</body>
</html>