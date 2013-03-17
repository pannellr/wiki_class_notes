<?php if(!empty($data['user'])) { ?>
<h3>Welcome <?php echo($data['user']['user_name']); ?>!</h3>

<?php
echo "<table><tr><td>user_name</td><td>created on</td><td>person id</td></td><td>edit</td><td>delete</td></tr>";

echo "<tr><td>".$data['user']['id']."</td><td>" . $data['user']['user_name'] . "</td>";
echo "<td>".$data['user']['created_at']."</td>";
echo "<td><a href=\"edit?id=" . $data['user']['id'] . "\">Edit</a></td>";
echo "<td><a href=\"destroy?id=" . $data['user']['id'] . "\">Delete</a></td></tr>";
echo "</table>";

} else { ?>
	<h3>You are not logged in!</h3>
<?php }  
// echo "<pre>";
// echo "</pre>";
// echo "<tr><td>".$data['id']."</td><td>" . $data['user_name'] . "</td>";
// echo "<td>".$data['created_at']."</td>";
//echo "<td><a href=\"edit?id=" . $data['id'] . "\">Edit</a></td>"
// echo "<td><a href=\"destroy?id=" . $data['id'] . "\">Delete</a></td></tr>";
//echo "</table>";

?>