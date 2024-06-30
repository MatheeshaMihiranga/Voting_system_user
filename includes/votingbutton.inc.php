<?php
global $conn;
include 'dbh.inc.php';

if (isset($_POST['sub'])) {

    $cNIC = $_POST['cNIC'];
    $eventID = $_POST['eventID'];

    $sql1 = "SELECT COUNT(voteCount) as 'count' from votes where uEmail = '{$_SESSION['email']}' and eventID = '$eventID'";

    $result = mysqli_query($conn, $sql1);

    $row = $result->fetch_row();

    $voteCountByUser = $row[0];

    if ($voteCountByUser < 3) {
        $sql4 = "INSERT INTO votes (uEmail, eventID, cNIC, voteCount) VALUES ('{$_SESSION['email']}', '$eventID', '$cNIC', 1)";
        if (mysqli_query($conn, $sql4)) {
            echo '<div class="modal" id="modal" style="display:block">
            <div class="modal-content" id="alertBox">
                <span class ="close" id="close" onclick="closeConfirm()" >&times;</span>
                <h3>Voting confirmed!</h3>
            </div>
        </div>';
        } else {
            echo "something went wrong";
        }
    } else {
        echo '<div class="modal" id="modal" style="display:block">
        <div class="modal-content" id="alertBox" >
            <span class ="close" id="close" onclick="closeConfirm()" >&times;</span>
            <h3>Voting limit reached</h3>
        </div>
    </div>';
    }
}
