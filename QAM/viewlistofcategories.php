<?php
session_start();
// If the user is not logged in redirect to the login page...

include '../connect/dbconnect.php';
$stmt = $con->prepare("SELECT name,description FROM categories WHERE id = ? ");
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($name, $description);
$stmt->fetch();
$stmt->close();
?>
<html>
    <head>
        <style>
            a{
                display: block;
            text-align: center;
            padding: 20px 20px;
            text-decoration: none;
            font-size: 20px;
        
            }
    h2 {
        font-size: 80px;
        text-align: center;
    }

    img {
        position: absolute;
        left: 0px;
        top: 0px;
        z-index: -1;
        border-radius: 50%;
        width: 100%;
        opacity: 0.7;
    }

    body {
        background-color: #b2ffdb;
    }

    table {
        width: 100%;
        height: 50%;
        border: 5px solid black;
        font-size: 20px;
    }

    #a {
        width: 100px;
    }
    </style>
    </head>
<body>
<img src="../img/picture7.jpg">
<div>
<a href="qamanagerhomepage.php">QA manager homepage </a>
		
			
		<h1 > List of category details are below:</h1></div>
				<table width="100%" border="1" style="border-collapse:collapse;">
                <thead>
<tr>
<th ><strong>S.No</strong></th>
<th><strong>Category name</strong></th>
<th><strong>Category description </strong></th>





</tr>
                </thead>
<tbody>
<?php
$count=1;
$sel_query="SELECT * FROM categories  ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td ><?php echo $count; ?></td>
<td ><?php echo $row["name"]; ?></td>
<td ><?php echo $row["description"]; ?></td>
<td><a id="a"href="editcat.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
<td><a  id="a" href="deletecat.php?id=<?php echo $row["id"]; ?>">Delete</a></td>




</tr>
<?php $count++; } ?>
</tbody>

			</div>
</body>
</html>





