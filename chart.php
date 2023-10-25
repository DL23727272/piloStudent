<?php
require 'dbconnection.php';

$query = "SELECT COUNT(*) AS student_count FROM dl";
$query_run = mysqli_query($con, $query);

if ($query_run) {
    $result = mysqli_fetch_assoc($query_run);
    $data = array('student_count' => $result['student_count']);
    echo json_encode($data);
} else {
    echo json_encode(array('student_count' => 0)); 
}
?>
