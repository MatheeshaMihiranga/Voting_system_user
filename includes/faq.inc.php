<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

$sql = "SELECT * FROM faq ";

$results = mysqli_query($conn, $sql);

?>