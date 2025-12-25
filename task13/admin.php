<?php
require_once 'Database.php';
$db = Database::instance(); 
$sql = "SELECT * FROM users";
$result = $db->query($sql );
session_start();


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
        <th style='padding:20px' >Email</th>
        <th style='padding:20px' >password</th>
        <th style='padding:20px' >date created</th>
        <th style='padding:20px' >last login</th>
        <th style='padding:20px' >Edit</th>
        <th style='padding:20px' >Delete</th>
      </tr>";
while ($row = $result->fetch()) {
    echo "<tr>"
        . "<td style='padding:20px'>" . $row["id"] . "</td>"
        . "<td style='padding:20px'>" . " ". $row["fname"] . " " . $row["lname"] . " ". $row["faname"] ."</td>"
        . "<td style='padding:20px'>" . $row["email"] . "</td>"
        . "<td style='padding:20px'>" . $row["password"] . "</td>"
        . "<td style='padding:20px'>" . $row["created_at"] . "</td>"
        . "<td style='padding:20px'>" . $row["last_login"] . "</td>"
        . "<td style='padding:20px'> <a href='update.php?id=" . $row["id"] . "'>Edit</a> </td>"
        . "<td>  <a href='delete.php?id=" . $row["id"] . "' 
                 onclick=\"return confirm('Are You Sure');\">
                Delete
              </a>
          </td>"
        . "</tr>";
}

echo "</table>";

?>