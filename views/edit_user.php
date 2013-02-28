<?php 
echo "<pre>";
print_r($data);
echo "</pre>";

?>
<h3>Edit user <?php echo $data[0]['user_name']; ?></h3>

<form method="get" action="update" >
   
  <input type="hidden" name="id" value="<?php echo $data[0]['id']; ?>" />
  
  <p>
    <label for="user_name">username</label><br />
    <input name="user_name" />
  </p>

  <input type="submit" value="update" />
</form>