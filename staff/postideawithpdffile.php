
<?php

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
<html>
    <head>
    <head> <meta charset="utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
       <meta name='viewport' content='width=device-width, initial-scale=1'>
 <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <style>
            input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
 input[type=number], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
 input[type=file], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 10%;
  background-color: rgb(230, 0, 0);
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}


input[type=submit]:hover {
  background-color: rgb(230, 0, 0);
}
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
}
div {
  border-radius: 5px;
  background-color: rgb(245, 231, 254);
  padding: 20px;
}
h2{font-weight: bold;}</style>
    </head>
    </head>
    <body>
    <ul>
            <li><a href="staff.php"><i class="glyphicon glyphicon-user" style="color:white;"></i>
</a></li>

         <li><a href="ideamanagementhomepage.php">IDEA HOME</a></li>

  <li><a href="filterideabycategory.php">IDEA OF CATEGORY</a></li>
  <li><a href="filterideabyevent.php">IDEA OF EVENT</a></li>
  <li><a href="createidea.php">NEW IDEA</a></li>
  <li><a href="ideav.php">IDEAS</a></li>
  <li><a href="postideawithpdffile.php">FILE</a></li>

 
</ul>
        <div>
            <h2>UPLOAD PDF FILE OF IDEA</h2>
        <embed src="<?php echo $pdf[0]?>" type="application/pdf"/>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
           
                <label for="title">Title:</label><br>
                <input type="text" name="title" id="title" required><br>
                <label for="category_id">Select a Category:</label>
        <select id="category" name="category_id" required>
            <?php
    
            foreach ($categories as $category) {
                
                
                echo "<option value='".$category."'>".$category."</option>";
           
               
                
            }

            ?>
        </select><br>
                <label for="explanation">Explantion:</label><br>
                <textarea name="explanation" id="explanation" required rows="4" cols="45"></textarea><br><br>
                
                <label for="file">Upload PDF File:<i class='glyphicon glyphicon-paperclip' style='font-size:16px;color:red'></i>
</label><br>
                <input id="file" type="file" name="file" id="file">
            
                <div class="b">
                <label for="termsandc"> Terms & Conditions:</label><input type="radio"  value="I agreed"required>I Agreed <br>
                    <input id="a" type="submit" value="Submit" name="post">
                   
                </div>

    <?php
        session_start();
     
      
        if(isset($_REQUEST['post'])){
        $title = $_POST['title'];
        $explanation = $_POST['explanation'];
        $category_id= $_POST['category_id'];
       
       
        $targetDir = 'uploads/';
        $targetFile = $targetDir . basename($_FILES['file']['name']);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }
    
    // Set the appropriate permissions for file uploads
    chmod($targetDir, 0755);
// Check if the file is a PDF
        if ($fileType !== 'pdf') {
        echo "Only PDF files are allowed.";
        $uploadOk = 0;
    }

// Move the uploaded file
        if ($uploadOk) {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
        // Store the idea information in the database
        $filePath = $targetFile;
        $filePath = $con->real_escape_string($filePath);
        // Write a database insert query and execute it
        // ...
        $db_add = "INSERT INTO ideas (title, explanation, category_id,file_path) VALUES ('$title', '$explanation', '$category_id','$filePath')";
        $kq=mysqli_query($con,$db_add);
        echo "Idea submitted successfully.";
    
        }
       
        
       
        } else {
        echo "Error uploading the file.";
        }
    }


    
   

    
    
    ?>
</form>
        </div>
    </body>
</html>
