<?php
require_once "include/dbh.php";

$depID = isset($_GET['department_id']) ? $_GET['department_id'] : null;

if ($depID !== null) {
    $stmt = $conn->prepare("SELECT labID, labName FROM lab WHERE depID = ?");
    $stmt->bind_param("s", $depID);

    if ($stmt->execute()) {
        $stmt->bind_result($labId, $labName);

        $labs = array();
        while ($stmt->fetch()) {
            $lab = array(
                'id' => $labId,
                'name' => $labName
            );
            $labs[] = $lab;
        }

        $stmt->close();

        header('Content-Type: application/json');
        echo json_encode($labs);
    } else {
        echo json_encode(array('error' => 'Query execution failed'));
    }
} else {
    echo json_encode(array('error' => 'Faculty ID not provided'));
}

$conn->close();