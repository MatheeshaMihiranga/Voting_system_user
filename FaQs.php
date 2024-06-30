<?php
session_start();
include 'includes/faq.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="accountinformation.css" />
    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="FaQs.css" />
</head>

<body>
    <img src="Images/background.png" class="backgroundimg" style="backdrop-filter: blur(15px)" />
    <div class="hero">


        <?php
        include "includes/navigation.php";
        ?>


        <div class="faq_contentent">
            <div class="faq_box">
                <div class="title">
                    <h1>Frequently Asked Questions</h1>
                </div>
                <div class="container">
                    <div class="faq">

                        <?php
                        if (mysqli_num_rows($results) > 0) {
                            while ($row = mysqli_fetch_assoc($results)) {

                                echo "
                      <h2 class='question'>" . $row['question'] . "<span class='arrow'>&#9662;</span></h2>
                      <p class='answer'>" . $row['answer'] . "</p>";
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="FaQs.js"></script>
</body>

</html>