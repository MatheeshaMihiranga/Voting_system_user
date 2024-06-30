<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Home</title>
    <link rel="stylesheet" href="index.css"/>

</head>

<body>
<video autoplay loop muted plays-inline class="back-video">
    <source src="Images/My project video.mp4" type="video/mp4"/>
</video>
<div class="hero">

    <?php
    include "includes/navigation.php";
    ?>

    <div class="content">
        <div class="contentView">
            <h5>
                The Sliver is a Global Singing Competition talented young singers
                <br/>
                all around the world to vote for your favourite constests.<br/><br/>
                Click the button below
            </h5>
            <br/>
            <?php
            if (isset($_SESSION['email'])) {
                echo '<button onclick="window.location.href = \'votepage.php\';" class="votebutton" type="button">Vote Now</button>';
            } else {
                echo '<button onclick="window.location.href = \'login.php\';" class="votebutton" type="button">Vote Now</button>';
            }
            ?>

        </div>
    </div>
</div>
</body>

</html>