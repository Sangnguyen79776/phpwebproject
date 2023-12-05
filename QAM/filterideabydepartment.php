<?php
    session_start();
    include 'dbconnect.php';  include '../connect/dbconnect.php';

    $sql = "SELECT DISTINCT ideasdepartment,name FROM ideas INNER JOIN  department on ideas.ideasdepartment=department.id";
    $result = $con->query($sql);
    $department = array();
    if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $department[] = $row['ideasdepartment'].$row['name'];
    }
}

// Handle form submission to filter ideas based on event
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ideasdepartment'])) {
    $selectedDepartment = $_POST['ideasdepartment'];
    $sql = "SELECT * FROM ideas WHERE ideasdepartment = '$selectedDepartment'";
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
<style>
    img {
        position: absolute;
        left: 0px;
        top: 0px;
        z-index: -1;
        border-radius: 50%;
        width: 100%;
        opacity: 0.7;
    }
    body{
        font-size: 20px;
    }
    button, select{
        width: 45px;
        height: 30px;
    }
    h1{
        text-align:center;
    }
</style>
</head>
<body>
    <h1>Filter Ideas by Department</h1>
    <img src="../img/picture4.png">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="ideasdepartment">Select a department to filter idea:</label>
        <select id="ideasdepartment" name="ideasdepartment">
            <?php
            foreach ($department as $ideasdepartment) {
                echo "<option value='".$ideasdepartment."'>".$ideasdepartment."</option>";
            }
            ?>
        </select>
        <button type="submit">Filter</button>
    </form>

    <?php
    if (isset($filteredIdeas)) {
        echo "<h2>Ideas in selected department : ".$selectedDepartment."</h2>";
        if (!empty($filteredIdeas)) {
            foreach ($filteredIdeas as $idea) {
                // Display the filtered ideas
                echo "<p>Title: " . $idea['title'] . "<br> - Explanation: " . $idea['explanation'] . "<br> - Idea department: " . $idea['ideasdepartment'] . "</p>";
            }
        } else {
            echo "No ideas found in the selected event.";
        }
    }
    ?>

</body>
</html>
