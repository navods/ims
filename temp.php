<?php
require_once "include/dbh.php";

// Prepare SQL query
$stmt = $conn->prepare ("SELECT username, fullname, email, 
               CASE 
                   WHEN userP = 1 THEN 'Lab Assistant'
                   WHEN userP = 2 THEN 'Supervisor'
                   WHEN userP = 3 THEN 'Administrator'
                   ELSE 'Unknown'
               END AS title,
               (SELECT secName FROM sections WHERE secID = userSection) AS section
        FROM users");

// Execute query
$stmt = execute();

// Fetch data and display in HTML table
echo "<table border='1'>
        <tr>
            <th>Username</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Title</th>
            <th>Section</th>
            <th>Action</th>
        </tr>";
        

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>".$row['username']."</td>";
    echo "<td>".$row['fullname']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>".$row['title']."</td>";
    echo "<td>".$row['section']."</td>";
    echo "<td>Action</td>"; // You can customize this column as per your requirements
    echo "</tr>";
}

echo "</table>";

// Close connection
$conn = null;
?>
