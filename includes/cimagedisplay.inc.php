<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';


$sql = "SELECT * FROM contestant_image WHERE cNIC='$cNIC'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();


?>
