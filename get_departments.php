<?php
require_once "include/dbh.php";

$facID = isset($_GET['faculty_id']) ? $_GET['faculty_id'] : null;

if ($facID !== null) {
    $stmt = $conn->prepare("SELECT depID, depName FROM dep WHERE facID = ?");
    $stmt->bind_param("s", $facID);

    if ($stmt->execute()) {
        $stmt->bind_result($departmentId, $departmentName);

        $departments = array();
        while ($stmt->fetch()) {
            $department = array(
                'id' => $departmentId,
                'name' => $departmentName
            );
            $departments[] = $department;
        }

        $stmt->close();

        header('Content-Type: application/json');
        echo json_encode($departments);
    } else {
        echo json_encode(array('error' => 'Query execution failed'));
    }
} else {
    echo json_encode(array('error' => 'Faculty ID not provided'));
}

$conn->close();