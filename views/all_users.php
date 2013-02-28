<h3>Showing all Users</h3>

<?php
echo "<table><tr><td>user_name</td><td>created on</td><td>person id</td></td><td>edit</td><td>delete</td></tr>";
foreach ($data as $user){
  echo "<tr><td>".$user['id']."</td><td>" . $user['user_name'] . "</td>";
  echo "<td>".$user['created_at']."</td>";
  echo "<td><a href=\"edit?id=" . $user['id'] . "\">Edit</a></td>"
    . "<td><a href=\"destroy?id=" . $user['id'] . "\">Delete</a></td></tr>";
}
echo "</table>";

?>