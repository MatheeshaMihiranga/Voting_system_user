<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Image Gallery</title>
    <link rel="stylesheet" href="accountinformation.css"/>
    <link rel="stylesheet" href="index.css"/>
    <link rel="stylesheet" href="Galleryuserview.css"/>
</head>
<body>
<img src="Images/background.png" class="backgroundimg" style="backdrop-filter: blur(15px);"/>
<div class="hero">

    <?php
    include "includes/navigation.php";
    ?>
    <div class="gallery_box">
        <h1 class="galleryTopic" style="align-content:flex-start; color: white; margin: 60px 10px">Image Gallery</h1>
        <div class="gallery">
            <?php
            // Database connection
            include_once 'includes/dbh.inc.php';
            // Retrieve images from the database
            $query = "SELECT * FROM media";
            $result = mysqli_query($conn, $query);
            $path = "includes/";
            // Display images
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<img src="' . $path . $row['mlocation'] . '" alt="' . $row['mDescription'] . '">';
            }

            // Close database connection
            mysqli_close($conn);
            ?>
        </div>
    </div>
</div>
</body>
</html>
