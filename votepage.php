<?php session_start();
include 'includes/votePage.inc.php';
include 'includes/votingbutton.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Home</title>
    <link rel="stylesheet" href="accountinformation.css"/>
    <link rel="stylesheet" href="votepage.css"/>
    <link rel="stylesheet" href="index.css"/>
</head>

<body>
<img src="Images/background.png" class="backgroundimg"/>
<div class="hero">
    <?php
    include "includes/navigation.php";
    ?>
    <div style="padding: 40px;color: white;">
        <?php
        $eventName = "";
        if ($contestants) {
            while ($contestant = mysqli_fetch_assoc($contestants)) {
                $eventName = $contestant["eDescription"];
            }
        }
        echo '<h1>' . $eventName . '</h1>'
        ?>


        <h2>Available Contestants</h2>
    </div>
    <div class="flex-container custom-main-view" id="demo">
        <?php
        $sql = "SELECT * FROM contestant_details, contestant_number, event_details WHERE contestant_details.cNIC = contestant_number.cNIC AND event_details.eventStatus = 'ongoing' AND event_details.eventID = contestant_number.eventID";
        $contestants = mysqli_query($conn, $sql);

        if ($contestants) {
            while ($contestant = mysqli_fetch_assoc($contestants)) {
                $sql2 = "SELECT * FROM contestant_image WHERE cNIC = {$contestant['cNIC']}";
                $cImageResult = mysqli_query($conn, $sql2);

                $imageSrc = 'Images/default.png'; // Default image source

                if ($cImageResult && mysqli_num_rows($cImageResult) > 0) {
                    $cImage = mysqli_fetch_assoc($cImageResult);
                    $imageData = $cImage['ImageFile'];
                    $imageSrc = 'data:image/jpeg;base64,' . base64_encode($imageData);
                }

                echo '
        <div class="flex-item">
            <img src="' . $imageSrc . '" class="logo-user" />
            <p class="element">' . $contestant['iName'] . '</p>
            <p class="element">Content No: ' . $contestant['cNo'] . '</p>
            <button id="openModal" onclick="openModal(\'' . $contestant['cNIC'] . '\')">Vote now</button>
        </div>
        <div id="myModal' . $contestant['cNIC'] . '" class="modal" style="display:none">
            <div class="modal-content">
                <span id="close' . $contestant['cNIC'] . '" class="close">&times;</span>
                <h2>Contestant Name: ' . $contestant['iName'] . '</h2> 
                <h2>Contestant No: ' . $contestant['cNo'] . '</h2>
                <h2>Bio</h2>
                <p>' . $contestant['cDescription'] . '</p>
                <form action="votepage.php" method="POST">
                    <input type="hidden" name="cNIC" value="' . $contestant['cNIC'] . '">
                    <input type="hidden" name="eventID" value="' . $contestant['eventID'] . '">
                    <button name="sub" class="votebtn" type="submit">Vote</button>
                </form>
            </div>
        </div>';
            }
        }
        ?>
    </div>
</div>
<script>
    function openModal(modal) {
        console.log(modal);
        // Get the modal element
        var newModal = document.getElementById("myModal" + modal);
        // Get the close button element
        var closeModalBtn = document.getElementById("close" + modal);
        // Open the modal when the open button is clicked
        newModal.style.display = "block";

        // Close the modal when the close button is clicked
        closeModalBtn.onclick = function () {
            newModal.style.display = "none";
        };
        // Close the modal when the user clicks anywhere outside of it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    }

    function closeConfirm() {
        document.getElementById("modal").style.display = "none";
    }
</script>
</body>

</html>