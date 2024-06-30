<?php
session_start();
include 'includes/Eventschedule.inc.php';
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
    <link rel="stylesheet" href="Eventschedule.css" />
</head>

<body>
    <img src="Images/background.png" class="backgroundimg" style="backdrop-filter: blur(15px);" />
    <div class="hero">
        <?php
        include "includes/navigation.php";
        ?>
        <div class="table_content">
            <table>
                <tr>
                    <th>
                        Event Name
                    </th>
                    <th>
                        Start Date
                    </th>
                    <th>
                        End Date
                    </th>
                    <th>
                        Start Time
                    </th>
                    <th>
                        End Time
                    </th>
                </tr>
                <?php
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                        <td>' . $row['eDescription'] . '</td>
                        <td>' . $row['sDate'] . '</td>
                        <td>' . $row['eDate'] . '</td>
                        <td>' . $row['sTime'] . '</td>
                        <td>' . $row['eTIME'] . '</td>
                    </tr>';
                    }
                }
                ?>

            </table>
        </div>

    </div>
</body>

</html>