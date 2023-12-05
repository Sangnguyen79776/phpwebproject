<html>
    <head>
        <style>
            h2 {
        text-align: center;
        font-size: 100px;
        color: black;
    }

    img {
        position: absolute;
        left: 0px;
        top: 0px;
        z-index: -1;
        border-radius: 50%;
        width: 100%;
        opacity: 1;
    }

    body {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: whitesmoke;
    }

    li {
        text-align: center;
    }

    li a {
        display: block;
        color: #121212;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover {
        background-color: whitesmoke;
    }
        </style>
    </head>
    <body>
    <h2> Category Management </h2>
    <img src="../img/picture3.jpg">
    <li><a href="createanewcat.php">Create new Category</a></li>
    <li><a href="viewlistofcategories.php"> List of Categories</a></li>
    <li><a href="qamanagerhomepage.php">Back to QAmanager Homepage </a></li>
    </body>
</html>