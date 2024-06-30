<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="accountinformation.css" />
    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="about.css" />
</head>

<body>
    <img src="Images/background.png" class="backgroundimg" style="backdrop-filter: blur(15px);" />
    <div class="hero">

        <?php
        include "includes/navigation.php";
        ?>
        <div class="content_box">
            <div class="about">
                <h1 class="topic">
                    About Us
                </h1>
                <br>
                <br>
                <p class="description">
                    The Silver Voice is the best place to cast your vote online in the exciting world of singing reality
                    programs! With the help of our innovative online platform, fans, aspiring singers, and music lovers from
                    all over the world may take part in the thrilling process of selecting the next singing sensation. At
                    The Silver Voice, we are firm believers in the ability of music to bring people together and display
                    great talent. Through the interactive and open voting mechanism offered by our platform, viewers may
                    take an active role in the competition by supporting their favorite competitors and influencing how it
                    plays out. Join our community, indulge your passion for music, and cast your vote for your
                    preferred competitors.
                </p>
            </div>
        </div>

    </div>
</body>

</html>