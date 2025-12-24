<?php
require_once 'Database.php';
$db = Database::instance(); 
$sql = "SELECT * FROM employees";
$result = $db->query($sql );


echo "<a href='add.php' 
      style='display:inline-block;
             margin-bottom:15px;
             padding:10px 15px;
             background:#4CAF50;
             color:white;
             text-decoration:none;
             border-radius:5px;'>
     + Add Employee
      </a>";
echo "<table border='2'>";

echo "<tr>
        <th style='padding:20px' >ID</th>
        <th style='padding:20px' >Name</th>
        <th style='padding:20px' >Address</th>
        <th style='padding:20px' >Salary</th>
        <th style='padding:20px' >Action</th>
      </tr>";

while ($row = $result->fetch()) {
    echo "<tr>"
        . "<td style='padding:20px'>" . $row["id"] . "</td>"
        . "<td style='padding:20px'>" . $row["name"] . "</td>"
        . "<td style='padding:20px'>" . $row["Address"] . "</td>"
        . "<td style='padding:20px'>" . $row["salary"] . "</td>"
        . "<td style='padding:20px'>
              <a href='update.php?id=" . $row["id"] . "'>Edit</a>
              |
              <a href='read.php?id=" . $row["id"] . "'> View</a>
              |
              <a href='delete.php?id=" . $row["id"] . "' 
                 onclick=\"return confirm('Are You Sure');\">
                Delete
              </a>
          </td>"
        . "</tr>";
}

echo "</table>";

?>