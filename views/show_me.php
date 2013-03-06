<h3>Welcome <?php echo($data['user']['user_name']); ?>!</h3>

<?php
echo "<table><tr><td>user_name</td><td>created on</td><td>person id</td></td><td>edit</td><td>delete</td></tr>";
echo "<tr><td>".$data['user']['id']."</td><td>" . $data['user']['user_name'] . "</td>";
echo "<td>".$data['user']['created_at']."</td>";
echo "<td><a href=\"edit?id=" . $data['user']['id'] . "\">Edit</a></td>"
. "<td><a href=\"destroy?id=" . $data['user']['id'] . "\">Delete</a></td></tr>";
echo "</table>";
echo "<pre>";
echo "</pre>";

?>