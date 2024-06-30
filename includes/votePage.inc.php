<?php
require_once 'dbh.inc.php';
require_once 'functions.inc.php';

$sql = "SELECT * FROM contestant_details, contestant_number,event_details WHERE contestant_details.cNIC = contestant_number.cNIC AND event_details.eventStatus = 'ongoing' and event_details.eventID = contestant_number.eventID";

$contestants = mysqli_query($conn, $sql);
