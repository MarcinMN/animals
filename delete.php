<?php
	require 'db_configuration.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Animals Table</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/animals.css">
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <script src="js/animals.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>     
        <style>
            td {
                font-family: Arial, Helvetica, sans-serif;
                border: 5px solid;
                text-align: center;
                font-weight: bold;
            }
            #title {
                text-align: center;
                color: darkgoldenrod;
            }
            #toggle {
                color: 	#4397fb;
            }
            #toggle:hover {
                color: #467bc7
            }
            thead input {
                width: 100%;
            }
            .thumbnailSize{
                height: 100px;
                width: 100px;
                transition:transform 0.25s ease;
            }
            .thumbnailSize:hover {
                -webkit-transform:scale(3.5);
                transform:scale(3.5);
            }
        </style>
    </head>

    <header style="background-color:white">
        <div id="secondary_screen_buttons">
            <div id="back_button" class="header_button">
                <a href="index.php"><img class="menu_button_image" src="images/back_icon.png" alt="Back Icon"></a>
            </div>
            <div id="add_button" class="header_button">
                <a href="create_word.php"><img class="menu_button_image" src="images/add_icon.png" alt="Add Icon"></a>
            </div>
        </div>
        <div id="secondary_screen_title">
            <p>Puzzle Word List</p>
        </div>
        <div id="secondary_screen_logo">
            <a href="https://telugupuzzles.com"><img class="logo_image" src="images/logo.png" alt="10000 Icon"></a>
        </div>
    </header>
    <body style="background-color:#f2edf2">

<?php $page_title = 'Animals > puzzle word list';
?>

<!-- Page Content -->
<br><br>
   
    <h2 id="title">Word List</h2><br>
    
    <?php
                    $conn = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
                    $word=$_GET['rn'];
                    $query = "DELETE FROM puzzle_words WHERE word = '$word'";
                    
                    $data=mysqli_query($conn,$query);
                    if($data) {
                        echo "<br><p style='text-align:center'>Record deleted successfully</p> <br>";
                    } else {
                        echo "Error <br><br> <a href='list_words.php'>Return To List</a>";
                    }
                    $conn -> close();
                    include('table_puzzle_words.php');
    ?>

</body>
</html>