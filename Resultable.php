<?php
session_start();
include 'includes/Resultable.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Home</title>
    <link rel="stylesheet" href="accountinformation.css"/>
    <link rel="stylesheet" href="index.css"/>
    <link rel="stylesheet" href="Eventschedule.css"/>
</head>

<body>
<img src="Images/background.png" class="backgroundimg" style="backdrop-filter: blur(15px);"/>
<div class="hero">
    <?php
    include "includes/navigation.php";
    ?>
    <?php
    $sqlTotalResultsQuery = "select * from results,contestant_details,contestant_number where results.eventID ='{$_GET['eventID']}'and contestant_details.cNIC=results.cNIC and contestant_details.cNIC =contestant_number.cNIC and contestant_number.eventID = results.eventID";
    $result = mysqli_query($conn, $sqlTotalResultsQuery);

    $sqlAllClosedEventsQuery = "SELECT * FROM event_details WHERE eventStatus = 'closed'";
    $eventList = mysqli_query($conn, $sqlAllClosedEventsQuery);


    ?>

    <div class="container">
        <h1 style="margin-top: 20px; margin-left: 30px; color:white">Vote Results</h1>
        <br/>
        <h2 style=" margin-left: 30px; color:white">Select an Event</h2>
        <select style="margin-top: 20px; margin-left: 30px;width: 160px;height: 25px" name=" events" id="events"
                onchange="location =
        this.value;">
            <option style="margin-top: 20px; margin-left: 30px;" value="
        " selected disabled>Select event
            </option>
            <?php
            if ($eventList) {
                while ($row = mysqli_fetch_assoc($eventList)) {
                    echo '<option value="Resultable.php?eventID=' . $row['eventID'] . '"';
                    if (isset($_GET['eventID']) && $row['eventID'] == $_GET['eventID']) {
                        echo 'selected="selected"';
                    }
                    echo '>' . $row['eDescription'] . '</option>';
                }
            }
            ?>
        </select>

        <div class="table_content">
            <table>
                <tr>
                    <th>
                        Contestant No
                    </th>
                    <th>
                        Contestant Name
                    </th>
                    <th>
                        Total Votes
                    </th>
                </tr>
                <?php
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                        <td>' . $row['cNo'] . '</td>
                        <td>' . $row['fName'] . ' ' . $row['iName'] . '</td>
                        <td>' . $row['totVotes'] . '</td>
                    </tr>';
                    }
                }
                ?>

            </table>
        </div>

    </div>
</body>

</html>