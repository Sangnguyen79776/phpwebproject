<?php
  include '../connect/dbconnect.php';
$sql = "SELECT * FROM ideas ORDER BY orderdate ASC";
$result = $con->query($sql);

// Check if any rows are returned
if ($result->num_rows > 0) {
    echo"<h2>This is your sorted idea selected by date:</h2>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
    
        // Display the data as per your requirement
        echo "<div style='border:1px solid black; border-radius:10px 10px 10px 10px;padding:10px 10px;width:50%;margin:20px 20px '>";
        echo" <p>Idea id : " . $row["id"]."</p> ";
        echo" <p >Idea title: " . $row["title"]."</p> ";
        echo" <p>Idea explanation : " . $row["explanation"]."</p> ";
        echo" <p>Idea date : " . $row["orderdate"]."</p> ";
        echo "</div>";
    }
} else {
    echo "0 results";
}

$con->close();
?>
<html>
    <head>
        <style>
            div>p{
                padding:10px 10px;
             
            }
            h2{
                text-align: center;
            }
        </style>
    </head>
</html>