<?php
session_start();
?>
<html>
    <head>

        <h2>This is HomePage for QAmanager </h2>
        <style>
            h2 {
            text-align: center;
            font-size: 40px;
            margin-top: 3%;
        }

        img {
            position: absolute;
            left: 0px;
            top: 0px;
            z-index: -1;
            border-radius: 50%;
            width: 100%;
            opacity: 0.8;
        }

        body {
            list-style-type: none;
            overflow: hidden;
        }

        a {
            display: block;
            text-align: center;
            padding: 20px 20px;
            text-decoration: none;
            font-size: 20px;
            float: left;
        }

        a:hover {
            background-color: lightblue;
        }
        </style>
    </head>
    <body>
    <img src="../img/picture2.jpg">
        <a href="categorymanagement.php">Categorymanagement</a><br>
        <a href='../checklog/logout.php'>Logout</a><br>
        <a href ='../cmtideafunc/cmtidea.php'>Write a comment for idea </a><br>
        <a href="dashboard.php">Dashboard </a><br>
        <a href="viewallstaffideas.php">List of idea </a>
    </body>
</html>