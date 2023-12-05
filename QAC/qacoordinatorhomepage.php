    <?php
    session_start();

    ?>
    <html>
        <head>
        <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title> QAC Page</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            <style>
                .w3-bar {
                    color: rgb(255, 255, 255);
                    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
                }
                .top-nav-index {
        background-color:rgb(87, 6, 140) ;
            color: rgb(255, 255, 255);
            font-size: 28px;
            padding: 10px 15px;
            font-weight: bold;
            font-family:'Times New Roman', Times, serif
                }

            </style>
        </head>

        <body>
            <div class="top-nav-index">QAC </div>
        <div class="w3-bar" style="background-color:#C02F2F;float:right;">
                <a href="qacoordinatorhomepage.php" class="w3-bar-item w3-button">Home</a>

                <div class="w3-dropdown-hover">
                    <button class="w3-button">Idea</button>
                    <div class="w3-dropdown-content w3-bar-block w3-card-4">
                        <a href="ideaviewlistforqac.php" class="w3-bar-item w3-button">View All Idea</a>
                        
                    </div>
                </div>
                
                
            
                <div class="w3-dropdown-hover">
                    <button class="w3-button">QAC</button>
                    <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    
                        <a href='../checklog/logout.php' class="w3-bar-item w3-button">Logout</a>
                    </div>
                </div>

            </div>
        
            
        </body>
    </html>